<?php
class IobcPDO
{
    const HOST = 'localhost';
    const USERNAME = '12206304';
    const PASSWORD = '090976392AF';
    const DB_NAME = '12206304_polinews';

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
	  $sql=$query;
	  $resultat=$this->cnxDB->query($query);
	  $tabresultat=$resultat->fetchAll();
	  if (!empty($tabresultat)) {
        return $tabresultat[0][0];
        } else {
        return null; // Return null if there are no results
        }
		}      
}
?>
