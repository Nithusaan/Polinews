<?php

class Base
{
    protected $monPDO;

    public function __construct($pdo = null)
    {
        $this->monPDO = $pdo;
    }

    public function laPage()
    {
        $message = $this->debut_html();
        $message .= $this->faire_head();
        $message .= $this->faire_nav();
        $message .= $this->faire_body();
        $message .= $this->faire_footer();
        $message .= $this->faire_script();
        $message .= $this->fin_html();
        return $message;
    }

    public function debut_html()
    {
        $message = '<!DOCTYPE html>
                    <html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">';
        return $message;
    }

    public function faire_head()
    {
        $message = '<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="style/style.css">
  <script src="style/script.js">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- Police Inter -->
  <link 
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" 
    rel="stylesheet">
  <title>Polinews</title>
                    </head>
                    <body>';
        return $message;
    }

    public function faire_nav()
    {
        $message = '<header>
    <div id="logo">
      <a href="index.php"><img src="logo.png" alt="Logo" /></a>
    </div>
    <div id="header-links">
      <a href="index.php?action=videopage">On Intelligent Research</a>
      <a href="#">About Polinews</a>
      <a href="#">Press Review</a>
    </div>
    <div id="header-right">
      <div id="languages">
        <div id="language-selected">EN</div>
        <div id="language-dropdown">
          <div onclick="changeLanguage(\'FR\')">Français</div>
          <div onclick="changeLanguage(\'EN\')">Anglais</div>
          <div onclick="changeLanguage(\'VT\')">Vietnamien</div>
        </div>
      </div>
      <div><a href="index.php?action=login">Log In</a></div>
      <div id="create-account"><a href="index.php?action=register">Create account</a></div>
    </div>
  </header>';
        return $message;
    }

    public function faire_body()
    {
        $message = '';
        return $message;
    }

    public function faire_footer()
    {
        $message = '<div class="footer">
                        <div class="footer-left">
                            <div class="logo">LOGO</div>
                            <div class="footer-links">
                                <span>About Pointnews</span>
                                <span>Legal Notices</span>
                                <span>Terms of Use</span>
                            </div>
                        </div>
                        <div class="footer-right">
                            <div class="footer-buttons">
                                <div class="languages">
                                    <div class="language-selected">EN</div>
                                    <div class="language-dropdown">
                                        <div onclick="changeLanguage(\'FR\')">FR</div>
                                        <div onclick="changeLanguage(\'VT\')">VT</div>
                                    </div>
                                </div>
                                <button class="button">Create account</button>
                            </div>
                            <div class="footer-images">
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </div>';
        return $message;
    }
    
    public function faire_script()
    {
        $message = '
        <script>
        // Menu des langues
  document.getElementById("language-selected").addEventListener("click", function() {
      let dropdown = document.getElementById("language-dropdown");
      dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
    });

    function changeLanguage(lang) {
      document.getElementById("language-selected").innerText = lang;
      document.getElementById("language-dropdown").style.display = "none";
    }

    document.addEventListener("click", function(event) {
      let languages = document.getElementById("languages");
      if (!languages.contains(event.target)) {
        document.getElementById("language-dropdown").style.display = "none";
      }
    });
    
     /* ---- SECTION CATEGORIE ---- */
  const carousel = document.querySelector(\'.carousel\');
  const leftBtn = document.querySelector(\'.left-btn\');
  const rightBtn = document.querySelector(\'.right-btn\');

  let scrollAmount = 0;
  const scrollStep = 160;

  leftBtn.addEventListener(\'click\', () => {
    scrollAmount = Math.max(scrollAmount - scrollStep, 0);
    carousel.style.transform = `translateX(-${scrollAmount}px)`;
  });

  rightBtn.addEventListener(\'click\', () => {
    const maxScroll = carousel.scrollWidth - carousel.clientWidth;
    scrollAmount = Math.min(scrollAmount + scrollStep, maxScroll);
    carousel.style.transform = `translateX(-${scrollAmount}px)`;
  });

  // Défilement automatique du carrousel toutes les 2 secondes
  setInterval(() => {
    const maxScroll = carousel.scrollWidth - carousel.clientWidth;
    if (scrollAmount < maxScroll) {
      scrollAmount = Math.min(scrollAmount + scrollStep, maxScroll);
    } else {
      scrollAmount = 0; // revient au début
    }
    carousel.style.transform = `translateX(-${scrollAmount}px)`;
  }, 2000);
  </script>';
        return $message;
    }
    
    public function fin_html()
    {
        return "</body>
                </html>";
    }

    public function __toString()
    {
        return $this->laPage();
    }
}
?>
