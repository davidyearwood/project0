<?php
    session_start();
    include_once 'config.php';

    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/reset.css" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Permanent+Marker' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800,600,600italic,700,700italic,800italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>
        <header id='header'>
            <div id='grandnav'>
                <nav id='nav'>
                    <ul>
                        <li><a href="#" class='logothmb'><img src="img/aces_logo.png" style='width: 65%'></a></li>
                        <li><a href="#">pizzas</a></li>
                        <li><a href="#">dinners</a></li>
                        <li><a href="#">pasta</a></li>
                        <li><a href="#">calzones</a></li>
                        <li><a href="#">grinders</a></li>
                        <li>
                            <a href="#" id='dropdown'>sides <i class="fa fa-caret-down"></i></i></a>
                            <ul id='subnav' style='display: none'>
                                <li><a href="#">sides</a></li>
                                <li><a href="#">salads</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href='#'><i class="fa fa-shopping-cart fa-2x"></i></a>
                        </li>
                    </ul>
                </nav>
                <nav class='mobile'>
                    <button id='toggle-btn'><i class="fa fa-bars"></i></button>
                    <div>
                        <a href="#">pizzas</a>
                        <a href="#">dinners</a>
                        <a href="#">pasta</a>
                        <a href="#">calzones</a>
                        <a href="#">grinders</a>
                        <a href="#">sides</a>
                        <a href="#">salads</a>
                    </div>
                </nav>
            </div>
        </header>
        <div style='width: 100%;'>
            <img src="banner2.png" style='width: 100%;'>
        </div>
        <div class='container'>
            <!--
            <div id='title'>
                <h1>Pizzas and Specialty Pizzas</h1>
            </div> -->
            <div id='home-body'>
                <div id='orders'>
                    <div class='order-item'>
                     
                    <figure class='order-image'>
                        <img src="https://www.pizzahut.com/assets/w/tile/thor/Ultimate_Cheese_Lovers_Pizza.png" alt="Ultimate Cheese Lover's®">
                    </figure>
                        <div class='order-form'>
                            <h1 class='order-header'><?php echo $acesMenu->category[0]->item[0]['name']; ?></h1>
                            <h2 class='order-price'>$<?php echo $acesMenu->category[0]->item[0]->size['small']; ?></h2>
                            <form action='shoppingcart.php' method='post'>
                                <select name="size" class='order-size'>
                                    <option value="small" data-price="$<?php echo $acesMenu->category[0]->item[0]->size['small']; ?>">
                                        small
                                    </option>
                                    <option value="large" data-price="$<?php echo $acesMenu->category[0]->item[0]->size['large'];?>">large</option>
                                </select>
                                <input type="hidden" name="category" value='0' />
                                <button class='order-btn itemid' name='id' value='<?php echo $acesMenu->category[0]->item[0]['id']; ?>' type='submit'>add to cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--
            <footer>
                <div id='footer-info'>
                    <h3>&copy; 2015 Project 0 - David Yearwood ~ This website is  not real <i class="fa fa-heart"></i></h3>
                </div>
                <div id='footer-links'> 
                    <ul>
                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-codepen"></i></a></li>
                    </ul>
                </div>
            </footer> -->
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript">
        (function($, window, document) {
         // Listen for the jQuery ready event on the document
          $(function(){
              // The DOM is ready!
              var ordersContainer = $('#orders');
              var navAnchor = $('#dropdown');
              
              ordersContainer.on("change", '.order-form', function() {
                var orderForm = $(this);
                var orderPrice = orderForm.find('.order-price');
                var orderid = orderForm.find('itemid').val();
                 
              });
              
              navAnchor.click(function(event){
                 event.preventDefault();
                 $('#subnav').toggle();
              });
              
          });
        }(window.jQuery, window, document));
        
        /*
        $(document).ready(function(){
           $('#toggle-btn').click(function(){
               $(this).toggleClass('expanded').siblings('div').slideToggle();
           }); 
           
           $('.size-dropdwn').change(function(){
               if ($(this).val() === 'large'){
                   // Change the p tag price to large
               }else {
                   // the price will stay regular
               }
               console.log($(this).parent().siblings('.price').html());
           });
        });  
        /*
            $(document).ready(function(){
               $('#dropdown').hover(function(event){
                   event.preventDefault();
                  $('#subnav').toggle(); 
               });
            }); */
        </script>
    </body>
</html>