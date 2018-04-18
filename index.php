<?php 
    session_start();
    include_once 'helper/master-template.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?= head(['css/stylesheet.css'], 'Aces Pizza Home Page'); ?>
</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <?= navbar(); ?>
  <div class="container">
    <div class='row'>
      
      <div class="twelve columns">
        <div id='title'>
          <h1>Pizzas &amp; Specialty Pizzas</h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eleifend velit ac sapien rhoncus ornare. Quisque et ligula sed sapien gravida 
            scelerisque at vel tellus. 
            Integer vitae semper sem. Nullam sem elit, congue lobortis lacinia vel, vehicula ut nibh. Vivamus porta, sem ut blandit tincidunt, 
            mauris metus vehicula est, eu sollicitudin dui magna quis metus. 
          </p>
        </div>
      </div>
      
    </div>
    
    <div class="row">
      <div class='six columns'>
        <div class='order-container'>
          <figure class='order-img-container'>
            <img src="http://www.saycheesepizza.biz/images/pizza35.jpg" >
          </figure>
          <div class='order-info'>
            <h3><?= $acesMenu->category[0]->item[1]['name']; ?></h3>
            <p>$5.50</p>
            <p class='order-des'>
              Ut efficitur turpis ornare tellus sodales volutpat. Aliquam erat volutpat. 
              Donec tempus vehicula venenatis. Duis at sapien at neque finibus tincidunt. 
              Vivamus semper sodales sapien non varius. Donec sed molestie felis. 
              Nullam vitae nisi eu nulla cursus porttitor. Nulla felis sem, ultricies dignissim ligula ac, malesuada fermentum neque. 
              Ut est nulla, elementum quis efficitur in, eleifend eget urna.
            </p>
            <form action='shoppingcart.php' method='POST' class='order-form'>
              <label for="quantity">Quantity</label>
              <input type="text" name="quantity" value="1" />
              <select name="size" id="" >
                <option value="small">Small</option>
                <option value="large">Large</option>
              </select>
              <button name='id' value='<?= $acesMenu->category[0]->item[1]['id']; ?>' type="submit"><i class="fa fa-shopping-bag fa-2x"></i></button>
              <input type="hidden" name="category" value='0' />
            </form>
          </div>
        </div>
      </div>
      <div class='six columns'>
        <?= orderItem(0, 2); ?>
      </div>
    </div>
    <div class="row">
      <div class="six columns">
        <?= orderItem(0, 3) ?>
      </div>
      <div class="six columns">
        <?= orderItem(0, 0); ?>
      </div>
    </div>
    <div class="row">
      <div class="six columns">
        <?= orderItem(1, 0); ?>      
      </div>
      <div class="six columns">
        <?= orderItem(1, 1); ?>
      </div>
    </div>
    <div class="row">
      <div class="six columns">
        <?= orderItem(1, 2); ?>
      </div>
      <div class="six columns">
        <?= orderItem(1, 3); ?>
      </div>
    </div>
    
  </div>
  <?= footer(); ?>
    
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
    
    (function(){
      "use strict";
      var $select = $(".price");
      
      // Changes Price Display Value
      $select.change(function(event){
        var data = $(event.target).find(":selected").data();
        var $p = $(event.target).closest(".order-info").find("p").eq(0);
        
        $p.html("<p>$" + data.price + "</p>");
      });
      
    }());
  </script>
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
