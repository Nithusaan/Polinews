<?php

class homepage extends Base
{
     public $monPDO;

    public function faire_body()
    {
        $message = '<section id="hero">
        <div id="hero-left">
    <h1>Stay informed on your own terms</h1>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim 
      veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea 
      commodo consequat.
    </p>
    <div class="hero-buttons">
      <a href="#" class="btn-hero get-started">Discover Polinews\' features</a>
      <a href="index.php?action=register" class="btn-hero log-in-homepage">Create account</a>
    </div>
    </div>
    <div class="hero-image">
      <!-- Placeholder pour l\'image principale -->
    </div>
  </section>

  <!-- FRAME 13 & AUTRES BLOCS -->
  <section id="frame13">
    <div class="frame13-block">
      <div class="frame13-text">
        <h2>Pick your topics of interest</h2>
        <p>
          Save items to read later, collect web pages, and manage your 
          reading list with tags.
        </p>
      </div>
      <div class="frame13-image"><img src="SCREEN.png" alt="Logo" width="619px" height="441px"/></div>
    </div>

    <div class="frame13-block">
      <div class="frame13-image"><img src="SCREEN.png" alt="Logo" width="619px" height="441px"/></div>
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
        <h2>Save references and check history</h2>
        <p>
          Reliable and diverse sources, tailored to your needs, for critical 
          and well-rounded learning.
        </p>
      </div>
      <div class="frame13-image"><img src="SCREEN.png" alt="Logo" width="619px" height="441px"/></div>
    </div>
  </section>

  <!-- SECTION CATEGORIE -->
  <section id="categories">
    <h1>H1</h1>

    <div class="carousel-container">
      
      <!-- Zone qui contient toutes les catégories -->
      <div class="carousel">
        <div class="category-card">CATEGORY 1</div>
        <div class="category-card">CATEGORY 2</div>
        <div class="category-card">CATEGORY 3</div>
        <div class="category-card">CATEGORY 4</div>
        <div class="category-card">CATEGORY 5</div>
        <!-- Ajoutez autant de catégories que nécessaire -->
      </div>

    </div>
  </section>
  
  ';
        return $message;
    }
    
public function __toString()
    {
        return $this->laPage();
    }
}
?>
