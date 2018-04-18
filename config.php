<?php
    // The XML File 
    $xmlfile = file_get_contents('menu.xml');
    $acesMenu = new SimpleXMLElement($xmlfile);
    $grandTotal = 0;
    
    // Fees that are charged when purchasing food
    $fees = array(
        'sales' => .0625,
        'delivery' => .005,
        'internet' => .034
    );
    
    
    // Checks to see if there is already an item inside of the shhopping cart
    function isDuplicate($item){
        for ($i = 0; $i < count($_SESSION['cart']); $i++)
        {
            if ($item['id'] == $_SESSION['cart'][$i]['id'] && $item['size'] == $_SESSION['cart'][$i]['size']){
                $_SESSION['cart'][$i]['quantity'] += 1;
                return true;
            }
        }
        return false;
    }
    
    // adds an item to the cart by id
    function addToCart($item){
        global $acesMenu; 
        for($parentEl = 0; $parentEl < count($acesMenu->category); $parentEl++)
        {
            for ($childEl = 0; $childEl < count($acesMenu->category[$parentEl]); $childEl++)
            {
                if ($item['id'] == $acesMenu->category[$parentEl]->item[$childEl]['id'])
                {
                        $cart_array = array(
                                'id' =>  $item['id'],
                                'size' => $item['size'],
                                'category' => $item['category'],
                                'quantity' =>  $item['quantity']
                        );
                        array_push($_SESSION['cart'], $cart_array);
                        return true;
                }
            }
        }
        print('Was not added!');
    }
    
    // Removes an item from the cart with the specify index and returns a new array
    function deleteFromCart($cart, $id, $size){
        $cartLength = count($cart);
        
        if(isId($id)){
            for($i = 0; $i < $cartLength; $i++)
            {
                if($cart[$i]['id'] == $id && $cart[$i]['size'] == $size){
                    // remove item from that index value
                    unset($cart[$i]);
                    $cart = array_values($cart);
                    return $cart;
                }   
            }
        }
        return $cart;
    }
    
    // returns a boolean for a valid id - you must pass the xpath
    function isId($id){
        global $acesMenu; 
        if(null != $acesMenu->xpath("//item[@id={$id}]"))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    // returns a boolean for a valid quantity value
    function isQuantity($quantity){
        if($quantity > 0 && is_int($quantity)){
            return true;
        }else{
            return false;
        }
    }
    
    // returns an item with an array length 1 by ID
    function getItem($id){
        global $acesMenu;
        $item;
        if (isId($id)){
            $item = $acesMenu->xpath("//item[@id={$id}]");
            if(count($item) == 1){
                return $item;   
            }
        }else{
            $item = array();
            return $item;
        }
    }
    
    function totalCostOfCartItems($cart){
        global $acesMenu;
        $cartLength = count($cart);
        $total = 0;
        for($item = 0; $item < $cartLength; $item++){
            if(isId($cart[$item]['id'])){
                $tempItem = getItem($cart[$item]['id']);
                $tempQuantity = $cart[$item]['quantity'];
                $tempPrice = $tempItem[0]->size[$cart[$item]['size']]; 
                $total = $tempQuantity * $tempPrice +  $total; 
            }
        }
        return $total;  
        // total += (item *  quantity)
    }
    function totalItems($cart){
        $cartLength = count($cart);
        $total  = 0;
        for($item = 0; $item < $cartLength; $item++){
            $total += $cart[$item]['quantity'];
        }
        return $total;
    }
    
    function updateQuantity($cart, $id, $size, $newQuantity){
        $cartLength = count($cart);
        if (isIntInRange($newQuantity)){
            for($currentItem = 0; $currentItem < $cartLength; $currentItem++){
                if($cart[$currentItem]['id'] == $id && $cart[$currentItem]['size'] == $size){
                    $cart[$currentItem]['quantity'] = $newQuantity;
                    return $cart;
                }
            }
            return $cart;
        }
    }
    
    function isIntInRange($n){
        if ( !is_int((int) $n) )
            return false;
        
        if((int) $n < 1 || (int) $n > 15)
            return false;
        
        return true;
    }