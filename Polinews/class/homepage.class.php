<?php

class homepage extends View
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    
    public function renderPage()
    {
        $message .= $this->makeHead();
        $message .= $this->makeMain();
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
        <script src="js/script.js"></script>
        <title>Polinews - Maquette</title>';
        
        return $message;
    }
    
    public function makeMain()
    {
        $message = '<!-- SECTION HERO -->
  <section id="hero">
    <h1>H1</h1>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim 
      veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea 
      commodo consequat.
    </p>
    <div class="hero-buttons">
      <a href="#" class="btn-hero get-started">Get started for Free</a>
      <a href="#" class="btn-hero log-in-homepage">Log In</a>
    </div>
    <div class="hero-image">
      <!-- Placeholder pour image principale -->
    </div>
  </section>

  <!-- FRAME 13 & AUTRES BLOCS -->
  <section id="frame13">
    <div class="frame13-block">
      <div class="frame13-text">
        <h2>Create a one-stop content hub</h2>
        <p>
          Save items to read later, collect web pages, and manage your 
          reading list with tags.
        </p>
      </div>
      <div class="frame13-image"></div>
    </div>

    <div class="frame13-block">
      <div class="frame13-image"></div>
      <div class="frame13-text">
        <h2>Access Politics at a Glance</h2>
        <p>
          Making international politics accessible to young people 
          through social media-inspired formats.
        </p>
      </div>
    </div>

    <div class="frame13-block">
      <div class="frame13-text">
        <h2>Learn to Inform Yourself Intelligently and Completely</h2>
        <p>
          Reliable and diverse sources, tailored to your needs, for critical 
          and well-rounded learning.
        </p>
      </div>
      <div class="frame13-image"></div>
    </div>
  </section>';
        return $message;
    }

    public function __toString()
    {
        $message = $this->renderPage();
        return $message;
    }
}
?>
