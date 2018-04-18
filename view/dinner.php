<?php 
$menu = simplexml_load_file('../menu.xml');
?>
<div class='col-md-12'>
    <a href="index.php" id="back-button">Back</a>
</div>
<div class='col-md-4'>
    <h2><?php echo $menu->category[2]->item[0]['name']; ?></h2>
    <form class='menu-form'>
          <select>
            <option>S</option>
            <option>L</option>
          </select>
          <p>$<?php echo $menu->category[2]->item[0]->size['regular'];?></p>
          <button>Add to Cart</button>
        </form>
</div>
<div class='col-md-4'>
    <h2><?php echo $menu->category[2]->item[1]['name']; ?></h2>
    <form class='menu-form'>
          <select>
            <option>S</option>
            <option>L</option>
          </select>
          <p>$<?php echo $menu->category[2]->item[1]->size['regular'];?></p>
          <button>Add to Cart</button>
    </form>    
</div>
<div class='col-md-4'>
    <h2><?php echo $menu->category[2]->item[2]['name']; ?></h2>
    <form class='menu-form'>
          <select>
            <option>S</option>
            <option>L</option>
          </select>
          <p>$<?php echo $menu->category[2]->item[2]->size['regular'];?></p>
          <button>Add to Cart</button>
    </form>    
</div>