<?php 
include_once 'config.php';
function head($arr, $title) {
    $len = count($arr);
?>
    <head>
      <!-- Basic Page Needs
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
      <meta charset="utf-8">
      <title><?= $title ?></title>
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
      <?php for($i = 0; $i < $len; $i++):?> 
          <link rel="stylesheet" href="<?= $arr[$i]; ?>" type="text/css" />
      <?php endfor; ?>
      <!-- Favicon <a href='http://www.freepik.com/free-vector/pizzeria-badges-pack_753729.htm'>Designed by Freepik</a>
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    </head>
<?php } ?>

<?php function navbar(){  ?>
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
<?php } ?>

<?php function footer(){ ?>
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
<?php }?>

<?php function orderItem($category, $item, $imgsrc = '') { 
  global $acesMenu;
?>
  <div class='order-container'>
    <figure class='order-img-container'>
      <?php if (isset($imgssrc)) { ?>
        <img src="<?= $imgsrc; ?>" >
      <?php } else { ?>
        <img src="http://www.saycheesepizza.biz/images/pizza35.jpg" >
      <?php } ?>
    </figure>
    <div class='order-info'>
      <h3><?= $acesMenu->category[$category]->item[$item]['name']; ?></h3>
      <p>$<?= $acesMenu->category[$category]->item[$item]->size['small']; ?></p>
      <p class='order-des'>
        Ut efficitur turpis ornare tellus sodales volutpat. Aliquam erat volutpat. 
        Donec tempus vehicula venenatis. Duis at sapien at neque finibus tincidunt. 
        Vivamus semper sodales sapien non varius. Donec sed molestie felis. 
        Nullam vitae nisi eu nulla cursus porttitor. Nulla felis sem, ultricies dignissim ligula ac, malesuada fermentum neque. 
        Ut est nulla, elementum quis efficitur in, eleifend eget urna.
      </p>
      <form action='shoppingcart.php' method='POST' class='order-form'>
        <label for="quantity">Quantity</label>
                <input type="number" name="quantity" value="1" min="1" max="15" required/>
                <?php 
                // Must change this later
                $c = $category + 1; 
                $i = $item + 1;
                if($acesMenu->xpath("//category[{$c}]/item[{$i}]/size[@small]")) { ?>
                  <select name="size" class="price" >
                    <option value="small" data-price="<?= $acesMenu->category[$category]->item[$item]->size['small']; ?>">Small</option>
                    <option value="large" data-price="<?= $acesMenu->category[$category]->item[$item]->size['large']; ?>">Large</option>
                  </select>
                <?php } else { ?>
                  <select name="size" class="price" >
                    <option value="regular" data-price="<?= $acesMenu->category[$category]->item[$item]->size['regular']; ?>">Regular</option>
                  </select>
                <?php } ?>
                <button name='id' value='<?= $acesMenu->category[$category]->item[$item]['id']; ?>' type="submit"><i class="fa fa-shopping-bag fa-2x"></i></button>
                <input type="hidden" name="category" value='<?= $category ?>' />
              </form>
            </div>
          </div>
<?php } ?>

<?php function pageHeader($name) { ?>
    <div id='title'>
      <h1><?= $name; ?></h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eleifend velit ac sapien rhoncus ornare. Quisque et ligula sed sapien gravida 
            scelerisque at vel tellus. 
            Integer vitae semper sem. Nullam sem elit, congue lobortis lacinia vel, vehicula ut nibh. Vivamus porta, sem ut blandit tincidunt, 
            mauris metus vehicula est, eu sollicitudin dui magna quis metus. 
        </p>
      </div>
<?php } ?>