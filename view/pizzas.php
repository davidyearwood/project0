<?php 
session_start();
$menu = simplexml_load_file('../menu.xml');
?>
<div class='col-md-12'>
    <a href="index.php" id="back-button">Back</a>
</div>
<div class='col-md-4'>
    <h2><?php echo $menu->category[0]->item[0]['name']; ?></h2>
    <form class='menu-form' method='post' action='cart.php'>
          <select name='size'>
            <option value='small'>S</option>
            <option value='large'>L</option>
          </select>
          <p>$<?php echo $menu->category[0]->item[0]->size['small'];?></p>
          <button value='<?php echo $menu->category[0]->item[0]['id']; ?>' name='id'>Add to Cart</button>
    </form>
</div>
<div class='col-md-4'>
    <h2><?php echo $menu->category[0]->item[1]['name']; ?></h2>
    <form class='menu-form' action='cart.php' method='post'>
          <select>
            <option>S</option>
            <option>L</option>
          </select>
          <p>$<?php echo $menu->category[0]->item[1]->size['small'];?></p>
          <button value='2' name='id'>Add to Cart</button>
    </form>    
</div>
<div class='col-md-4'>
    <h2><?php echo $menu->category[0]->item[2]['name']; ?></h2>
    <form class='menu-form'>
          <select>
            <option>S</option>
            <option>L</option>
          </select>
          <p>$<?php echo $menu->category[0]->item[2]->size['small'];?></p>
          <button>Add to Cart</button>
    </form>    
</div>