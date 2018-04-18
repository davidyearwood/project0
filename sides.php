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
      <div class="row">
          <div class="twelve columns">
              <?= pageHeader("Side Orders"); ?>
          </div>
      </div>
      <div class="row">
          <div class="six columns">
              <?= orderItem(3, 0); ?>
          </div>
          <div class="six columns">
              <?= orderItem(3, 1); ?>
          </div>
      </div>
      <div class="row">
          <div class="six columns">
              <?= orderItem(3, 2); ?>
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

  </script>
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
