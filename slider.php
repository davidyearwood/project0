<?php 
    session_start();
    include_once 'helper/master-template.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?= head(['css/stylesheet.css', "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css"], 'Aces Pizza Home Page'); ?>
</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <?= navbar(); ?>
  <div id='slider-container'>
    <div class='gallery'>
      <figure class='gallery-fig image-1'>
      
      </figure>
      <figure class='gallery-fig'>
        <img src="http://rivista-cdn.pittsburghmagazine.com/Pittsburgh-Magazine/November-2012/The-Best-Pizza-in-Pittsburgh/120925-0008-Giovannis.jpg?ver=1350697515">
      </figure>
      <figure class='gallery-fig'>
        <img src="http://www.bagbypizza.com/site/img/carousel-0.jpg" alt="">
      </figure>
    </div>
    <div id="controls">
        <a href="#"><i class="fa fa-circle-thin"></i>a</a>
        <a href="#"><i class="fa fa-circle-thin"></i>b</a>
        <a href="#"><i class="fa fa-circle-thin"></i>c</a>
      </div>
  </div>
  <?= footer(); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
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
          'use strict';
          
          var $container = $('#slider-container');
          var $figures = $(".gallery-fig");
          var counter  = 0;
          var totalWidth = 0;

          
          // Each .gallery-fig gets the same width as the .slider-container
          $figures.each(function(index) {
            $("#controls a").eq(index).data("pos", totalWidth);
            $(this).width($container.width());
            totalWidth += $(this).outerWidth(true);
         });
         
         var maxScrollPosition = totalWidth - $container.outerWidth();
        
        setInterval(changeFigure(), 2000);
        
        function changeFigure() {
          var $gallery = $(".gallery"); 
          
          if (parseInt($gallery.css("right")) >= maxScrollPosition){
            $gallery.animate({
              right: 0
            });
          } else {
            $gallery.animate({
              right: "+=" + $figures.width()
            }, 3000);
          }
        } 
        
        $("#controls").on("click", "a", function(event) {
          var $gallery = $(".gallery");
          event.preventDefault();
          $gallery.animate({right: $(this).data("pos")}, 1000);
          console.log($(this).data('pos'));
        });
        // Change the ease effect
        // Make it responsive
        // add buttons to it 
        
        }());
  </script>
</body>