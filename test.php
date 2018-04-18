<?php 
    session_start();
    include_once 'config.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Cardo:400,400italic|Oswald:400,700,300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat+Alternates:400,700|Qwigley' rel='stylesheet' type='text/css'>

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/stylesheet.css" type="text/css" />

  <!-- Favicon <a href='http://www.freepik.com/free-vector/pizzeria-badges-pack_753729.htm'>Designed by Freepik</a>
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <header id="nav-header">
    <div class="container">
      <div class='row'>
        <div class='header-logo'>
          <a href="#"><img src="css/aces.png"></a>
        </div>
        <a href="#" class='menu-trigger' id='m-trigger'>
          <i class="fa fa-bars"></i>
          <span>Menu</span>
        </a>
        <div id='nav-panel' style='display: none;'>
          <ul id='nav-tab'>
            <li><a href="#">Food We Serve</a></li>
            <li>
              <a href="#"><i class="fa fa-shopping-bag fa-lg"></i></a>
              <?php if(totalItems($_SESSION['cart']) > 0): ?>
                <span id='cart-items'><?php echo totalItems($_SESSION['cart']); ?></span>
              <?php endif; ?>
            </li>
          </ul>
          <ul class='active-nav-menu'>
            <li><a href="#">Pizzas</a></li>
            <li><a href="#">Special Dinners</a></li>
            <li><a href="#">Side Orders</a></li>
            <li><a href="#">Salads</a></li>
            <li><a href="#">Spaghetti</a></li>
            <li><a href="#">Lasagna</a></li>
            <li><a href="#">Calzones</a></li>
            <li><a href="#">Wraps</a></li>
            <li><a href="#">Grinder</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <main id="home-banner">
    <div class='container'>
      <div class='row'>
        <div class='twelve column'>
          <h1>Welcome</h1>
          <h2>Enjoy!</h2>
        </div>
      </div>
    </div>
  </main>
  <!-- Needs to be turned into a template -->
  <!--<div class="container" >
      <div class="row header">
        <div class="twelve columns">
          <h1>ORDER A SLICE OR TWO? </h1>
          <p>Our pizza made us famous, specifically our Tomato & Cheese. All of the others are great too, but Tomato & Cheese is the best. </p>
        </div>
      </div>
      <div class="row">
        <div class="twelve columns">
          <div class='card'>
            <figure>
              <img src="http://schwans.web.products.s3.amazonaws.com/73184.jpg">
              <div class='card-content'>
                <figcaption><?php echo $acesMenu->category[0]->item[0]['name']; ?></figcaption>
                <figcaption>$5.50</figcaption>
              </div>
            </figure>
            <form action='shoppingcart.php' method='post'>
              <button class='' name='id' value='<?php echo $acesMenu->category[0]->item[0]['id']; ?>' type='submit'>add to cart</button>
              <select name="size" class='order-size order-btn'>
                <option value="small" data-price="$<?php echo $acesMenu->category[0]->item[0]->size['small']; ?>">small</option>
                <option value="large" data-price="$<?php echo $acesMenu->category[0]->item[0]->size['large'];?>">large</option>
              </select>
              <input type="hidden" name="category" value='0' />
            </form>
          </div>
          <div class='card'>
            <figure>
              <img src="http://www.joecorbi.com/images/products/pizzakits/srpep.jpg">
              <div class='card-content'>
                <figcaption><?php echo $acesMenu->category[0]->item[1]['name']; ?></figcaption>
                <figcaption>$5.50</figcaption>
              </div>
            </figure>
            <form action='shoppingcart.php' method='post'>
              <button class='order-btn itemid' name='id' value='<?php echo $acesMenu->category[0]->item[1]['id']; ?>' type='submit'>add to cart</button>
              <select name="size" class='order-size order-btn'>
                <option value="small" data-price="$<?php echo $acesMenu->category[0]->item[1]->size['small']; ?>">small</option>
                <option value="large" data-price="$<?php echo $acesMenu->category[0]->item[1]->size['large'];?>">large</option>
              </select>
              <input type="hidden" name="category" value='0' />
            </form>
          </div>
          <div class='card'>
            <figure>
              <img src="http://clipartzebra.com/images/2/pizza-food/pizza-food-06.jpg">
              <div class='card-content'>
                <figcaption><?php echo $acesMenu->category[0]->item[2]['name']; ?></figcaption>
                <figcaption>$5.50</figcaption>
              </div>
            </figure>
            <form action='shoppingcart.php' method='post'>
              <button class='' name='id' value='<?php echo $acesMenu->category[0]->item[2]['id']; ?>' type='submit'>add to cart</button>
              <select name="size" class=''>
                <option value="small" data-price="$<?php echo $acesMenu->category[0]->item[2]->size['small']; ?>">small</option>
                <option value="large" data-price="$<?php echo $acesMenu->category[0]->item[2]->size['large'];?>">large</option>
              </select>
              <input type="hidden" name="category" value='0' />
            </form>
          </div>
        </div>
      </div>
    </div> -->
    
  <footer>
      <div class='container'>
        <div class='row'>
          <div class='footer-logo'>
            <h4>The Delicious</h4>
            <h2>Aces Pizza</h2>
          </div>
          <div class='social'>
            <div class='social-links'>
                <ul>
                  <li><a href="#"><i class="fa fa-yelp fa-2x"></i></a></li>
                  <li><a href="#"><i class="fa fa-facebook-official fa-2x"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
                  <li><a href="#"><i class="fa fa-envelope fa-2x"></i></a></li>
                </ul>
              </div>
              <div class='social-caption'>
                <h4>don't be shy</h4>
                <h3>get social</h3>
            </div>
          </div>
          </div>
        </div>
    </footer>
    
<!-- Javascript 
  -------------------------------------------------- -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script type="text/javascript">
    (function(){
      'use strict'; 
      var menuTrigger = $('#m-trigger');
      var navPanel = $('#nav-panel');
      
      menuTrigger.click(function(){
        navPanel.toggle();
        menuTrigger.toggleClass('active-bg');
      });
      
    }());

  </script>
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
