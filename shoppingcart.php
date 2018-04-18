<?php 
    session_start();
  
    include_once 'helper/master-template.php';
    
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    
    if(isset($_POST['id'])){
        if (!isDuplicate($_POST))
        {
            addToCart($_POST);
        }
        // Prevents double resubmission
        header('Location: shoppingcart.php');
        exit();
    }
    
    if(isset($_GET['delete'])){
        $_SESSION['cart'] = deleteFromCart($_SESSION['cart'], $_GET['delete'],  $_GET['size']);
    }
    
    if(isset($_GET['quantity'])){
            if (isIntInRange($_GET['quantity'])):
                $_SESSION['cart'] = updateQuantity($_SESSION['cart'], $_GET['update'], $_GET['size'], $_GET['quantity']);
            endif; 
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?= head(['css/stylesheet.css'], 'Aces Shopping Cart'); ?>
    </head>
    <body>
        <?= navbar(); ?>
        <div class='container' style='margin-top: 50px'>
            <div class='row'>
                <div class='twelve columns'>
                    <div id='title'>
                        <h1>Shopping Cart</h1>
                    </div>  
                </div>
            </div>
            <div class='row'>
                <div class='twelve columns'>
                    <table id="aces-cart">
                        <thead>
                            <tr>
                                <th>item</th>
                                <th>price</th>
                                <th>qty</th>
                                <th>total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                for($index = 0; $index < count($_SESSION['cart']); $index++): 
                                    $currentItem = getItem($_SESSION['cart'][$index]['id']);
                                    $size = $_SESSION['cart'][$index]['size'];
                                    $grandTotal = number_format((float) $currentItem[0]->size[$size] * $_SESSION['cart'][$index]['quantity'], 2) + $grandTotal;
                            ?>
                            <form action='shoppingcart.php' method='GET'>
                                <tr>
                                    <td><?= $currentItem[0]['name']; ?></td>
                                    <td>$<?= $currentItem[0]->size[$size]; ?></td>
                                    <td>
                                        <input type="number" name="quantity" value="<?= $_SESSION['cart'][$index]['quantity']; ?>" required min="1" max="15" />
                                        <button type="submit" name="update" value='<?php echo $_SESSION['cart'][$index]['id']; ?>'><i class="fa fa-refresh"></i></button>
                                    </td>
                                    <td>
                                        $<?= number_format((float) $currentItem[0]->size[$size] * $_SESSION['cart'][$index]['quantity'], 2); ?>
                                        
                                    </td>
                                    <td>
                                        <button type='submit' name='delete' value='<?= $_SESSION['cart'][$index]['id']; ?>'><i class="fa fa-trash"></i></button>
                                        <input type="hidden" name="size" value='<?php echo $size; ?>'/>
                                    </td>
                                </tr>
                            </form>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class='row'>
                <div class='twelve columns'>
                    <h4>Total: $<?= number_format($grandTotal, 2); ?></h4>
                </div>
            </div>
            <div class='row'>
                <div class='twelve columns'>
                    <form>
                        <button class="checkout-btn">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
        <?= footer(); ?>
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
    </body>
</html>

