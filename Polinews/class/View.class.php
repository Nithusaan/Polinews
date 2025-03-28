<?php

class View
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    
    public function renderPage()
    {
        $message = $this->startHTML();
        $message .= $this->createHead();
        $message .= $this->makeHead();
        $message .= $this->endHead();
        $message .= $this->createBody();
        $message .= $this->createHeader();
        $message .= $this->createMain();
        $message .= $this->makeMain();
        $message .= $this->endMain();
        $message .= $this->createFooter();
        $message .= $this->endBody();        
        $message .= $this->endHTML();
        return $message;
    }

    public function startHTML()
    {
        $message = '<!DOCTYPE html>
        <html lang="en">';
        return $message;
    }
    
    public function createHead()
    {
        $message = '<head>';
        return $message;
    }

    public function makeHead()
    {
        $message = '
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900
        &display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/header.js"></script>
        <script src="js/script.js"></script>';
        
        return $message;
    }
    
    public function endHead()
    {
        $message = '</head>';
        return $message;
    }


    public function createBody()
    {
        $message = '<body>';
        return $message;
    }
    
    public function createHeader()
    {
        $message = '<header>
        <div id="logo">
            <a href="#"><img src="logo.png" alt="Logo"></a>
        </div>

        <div id="header-links">
            <a href="#">On Intelligent Research</a>
            <a href="#">About Polinews</a>
            <a href="#">Press Review</a>
        </div>

        <div id="header-right">
            <div id="languages">
                <div id="language-selected">EN</div>
                <div id="language-dropdown">
                    <div onclick="changeLanguage('FR')">FR</div>
                    <div onclick="changeLanguage('VT')">VT</div>
                </div>
            </div>

            <div><a href="#">Log In</a></div>
            <div id="create-account"><a href="#">Create account</a></div>
        </div>
    </header>';
        return $message;
    }
    
    public function createMain()
    {
        $message = '<main>';
        return $message;
    }
    
    public function makeMain()
    {
        $message = '';
        return $message;
    }
    
    public function endMain()
    {
        $message = '</main>';
        return $message;
    }
    
    public function createFooter()
    {
        $message = '';
        return $message;
    }
    
    public function endBody()
    {
        $message = '</body>';
        return $message;
    }
    
    public function endHTML()
    {
        $message = '</html>';
        return $message;
    }

    public function __toString()
    {
        $message = $this->renderPage();
        return $message;
    }
}
?>
