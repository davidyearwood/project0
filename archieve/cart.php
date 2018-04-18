<?php 
    session_start();
    $menu = simplexml_load_file('menu.xml');    
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    
    // Add an item to the shopping cart
    if (isset($_POST['id'])){ // Checks to see if the user has submitted data
        // Check to see if the data is inside the current cart
        if(!duplicate_id($_POST['id'])){ // Check to see if there is a duplicate inside the cart if false proceed with next step
           for($i = 0; $i < count($menu->category); $i++){
            for($j = 0; $j < count($menu->category[$i]); $j++){
                if($_POST['id'] ==  $menu->category[$i]->item[$j]['id']){
                    $cart_array = array(
                        'id' => $_POST['id'],
                        'quantity' => 1    
                    );
                    array_push($_SESSION['cart'], $cart_array);
                    break(1);
                }
            }    
           }
        }
        header('Location: cart.php');
        exit();
    }
    function duplicate_id($item) {
        for ($i = 0; $i < count($_SESSION['cart']); $i++)
        {
            if($item == $_SESSION['cart'][$i]['id'])
            {
                $_SESSION['cart'][$i]['quantity'] += 1;
                return true;
            }
        }
        return false;
    }

    
    # Delete an item from the cart's session
    function delete_item_from_cart($id){
        $cart_ids = array_column($_SESSION['cart'], 'id');
        $key = array_search($id, $cart_ids);
        if (is_int($key))
        {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            return true;
        }
        return 'nothing is deleted' . $key;
    }

    // returns the item as a associative array
    function get_item_from_cart($id){
        global $menu;
        for($i = 0; $i < count($menu->category); $i++){
            for($j = 0; $j < count($menu->category[$i]->item); $j++){
                if ($id == $menu->category[$i]->item[$j]['id']){
                    // returns  the item
                    print_r($menu->category[$i]->item[$j]);
                }
            }
        }
        return null; 
    }
    
    // update cart item's quantity
    function update_cart($id, $quantity){
        if (!is_int($quantity)){
            return false;
        }
        $cart_id = array_column($_SESSION['cart'], 'id');
        $key = array_search($id, $cart_id);
        if (is_int($key)){
            $_SESSION['cart'][$key]['quantity'] = $quantity;
            return 'The quantity value of id: ' . $id . " is" . $quantity;
        }
        return false;
    }
?>
<pre>
    <?php print($_POST['id']); ?>
    <?php print_r($_POST) ?>
    <?php print_r($_SESSION['cart']); ?>
</pre>
<pre>
</pre>
