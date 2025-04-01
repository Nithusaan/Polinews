<?php
class IobcPDO
{
    const HOST = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DB_NAME = 'polinews';

    protected $cnxDB;

    public function __construct()
    {
        try {
            // Connect to the MySQL server
            $this->cnxDB = new PDO(
                "mysql:host=" . self::HOST . ";dbname=" . self::DB_NAME . ";charset=utf8mb4",
                self::USERNAME,
                self::PASSWORD,
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
                )
            );
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->cnxDB;
    }

    public function SQLSetup()
    {
        try {
            // Vérifier si la base de données existe
            $stmt = $this->cnxDB->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '" . self::DB_NAME . "'");
            $dbExists = $stmt->fetch();

            if (!$dbExists) {
                // Create the database if it doesn't exist
                $this->cnxDB->exec("CREATE DATABASE IF NOT EXISTS " . self::DB_NAME);
                $this->cnxDB->exec("USE " . self::DB_NAME);

                // Execute SQL dump only if database was just created
                $sqlDump = file_get_contents('data/db_iobc.sql');
                $this->cnxDB->exec($sqlDump);
            } else {
                // Just use the existing database
                $this->cnxDB->exec("USE " . self::DB_NAME);
            }
        }
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function query($query)
    {
        $resultat = $this->cnxDB->query($query);
        $tabresultat = $resultat->fetchAll();
        if (!empty($tabresultat)) {
            return $tabresultat[0][0];
        } else {
            return null; // Return null if there are no results
        }
    }

    /**
     * Méthode pour récupérer 50 flux RSS et insérer/mettre à jour les articles dans la table `articles`
     */
    public function fetchRSSArticles()
    {
        // Tableau contenant les 50 URL de flux RSS à récupérer
        $rssFeeds = [
            "https://www.francetvinfo.fr/politique.rss",  
            "https://www.bfmtv.com/rss/politique/",  
            "https://lactualite.com/politique/feed",  
            "https://www.lemonde.fr/politique/rss_full.xml",  
            "https://www.liberation.fr/arc/outboundfeeds/rss-all/category/politique/?outputType=xml",  
            "https://www.20minutes.fr/feeds/rss-politique.xml",  
            "https://rss.politico.com/economy.xml",  
            "https://www.courrierinternational.com/feed/rubrique/economie/rss.xml",  
            "https://www.courrierinternational.com/feed/rubrique/societe/rss.xml",  
            "https://rss.politico.com/defense.xml",  
            "https://rss.politico.com/energy.xml",  
            "https://rss.nytimes.com/services/xml/rss/nyt/Politics.xml",  
            "https://www.thenation.com/subject/politics/feed/",  
            "https://www.washingtontimes.com/rss/headlines/news/politics/",  
            "https://feeds.skynews.com/feeds/rss/politics.xml",  
            "https://www.theguardian.com/world/rss",  
            "https://www.numerama.com/politique/feed/",  
            "https://techcrunch.com/tag/politics/feed/",  
            "https://www.komitid.fr/feed/",  
            "https://www.thepinknews.com/topic/politics/feed/",  
            "https://thecrimereport.org/feed/",  
            "https://asialyst.com/fr/feed/",  
            "https://www.euractiv.fr/feed/",  
            "https://www.jeuneafrique.com/feed/",  
            "https://vnexpress.net/rss/the-gioi.rss",  
            "https://vnexpress.net/rss/phap-luat.rss",  
            "https://tuoitre.vn/rss/giao-duc.rss",  
            "https://tuoitre.vn/rss/suc-khoe.rss",  
            "https://www.lefigaro.fr/rss/figaro_elections.xml",  
            "https://www.courrierinternational.com/feed/rubrique/geopolitique/rss.xml",  
            "https://www.challenges.fr/finance-et-marche/rss",  
            "https://www.lemonde.fr/justice/rss_full.xml",  
            // ... ajoutez ici les 48 autres URL de flux RSS
        ];

        $pdo = $this->getConnection();

        // Préparation de la requête d'insertion avec mise à jour en cas de doublon
        $sql = "INSERT INTO articles (title, link, description, pubDate, guid, category_id, comments_url)
                VALUES (:title, :link, :description, :pubDate, :guid, :category_id, :comments_url)
                ON DUPLICATE KEY UPDATE 
                    title = VALUES(title),
                    description = VALUES(description),
                    pubDate = VALUES(pubDate),
                    category_id = VALUES(category_id),
                    comments_url = VALUES(comments_url)";
        $stmt = $pdo->prepare($sql);

        foreach ($rssFeeds as $feedUrl) {

            // Récupération du contenu du flux
            $feedContent = @file_get_contents($feedUrl);
            if ($feedContent === false) {
                echo "Erreur lors de la récupération du flux : $feedUrl\n";
                continue;
            }

            // Chargement du XML
            $rss = @simplexml_load_string($feedContent);
            if ($rss === false) {
                echo "Erreur lors de l'analyse du flux : $feedUrl\n";
                continue;
            }

            // Détermination du type de flux (RSS ou Atom)
            if (isset($rss->channel)) {
                // Flux RSS classique
                $items = $rss->channel->item;
            } elseif (isset($rss->entry)) {
                // Flux Atom
                $items = $rss->entry;
            } else {
                echo "Format de flux non reconnu : $feedUrl\n";
                continue;
            }

            // Traitement de chaque article du flux
            foreach ($items as $item) {
                // Récupération des données de l'article
                $title = isset($item->title) ? (string)$item->title : '';
                $link = isset($item->link) ? (string)$item->link : '';
                $description = isset($item->description) ? (string)$item->description : (isset($item->summary) ? (string)$item->summary : '');

                // Pour le guid, on le prend s'il existe sinon on utilise le lien
                $guid = isset($item->guid) ? (string)$item->guid : $link;

                // Date de publication (on vérifie si pubDate existe sinon on tente "updated" pour Atom)
                if (isset($item->pubDate)) {
                    $pubDate = (string)$item->pubDate;
                } elseif (isset($item->updated)) {
                    $pubDate = (string)$item->updated;
                } else {
                    $pubDate = date('Y-m-d H:i:s');
                }
                $pubDate = date('Y-m-d H:i:s', strtotime($pubDate));

                // Récupération de l'URL des commentaires s'ils existent
                $comments_url = isset($item->comments) ? (string)$item->comments : null;

                // La catégorie reste à NULL par défaut (à personnaliser si besoin)
                $category_id = null;

                // Exécution de la requête préparée
                try {
                    $stmt->execute([
                        ':title'         => $title,
                        ':link'          => $link,
                        ':description'   => $description,
                        ':pubDate'       => $pubDate,
                        ':guid'          => $guid,
                        ':category_id'   => $category_id,
                        ':comments_url'  => $comments_url,
                    ]);
                } catch (PDOException $e) {
                    echo "Erreur lors de l'insertion d'un article : " . $e->getMessage() . "\n";
                }
            }
        }
    }
}
?>
