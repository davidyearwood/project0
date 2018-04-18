<?php
    $menu = simplexml_load_file('../menu.xml');
    function productHTML($elCategory, $elItem, $imgsrc){
        $productName = $menu->category[$elCategory]->item[$elItem]['name'];
        $productPriceSmall = $menu->category[$elCategory]->item[$elItem]->size['small'];
        $productPriceLarge = $menu->category[$elCategory]->item[$elItem]->size['large'];
        $productid = $menu->category[$elCategory]->item[$elCategory]['id'];
        
        $html = <<<EOT
        <div class='order-item'>
        <figure class='order-image'>
            <img src='{$imgsrc}' alt='Ultimate Cheese'>
        </figure>
        <div class='order-form'>
            <h1 class='order-header'>{$productName}</h1>
            <h2 class='order-price'>{$productPriceSmall}</h2>
            <form action='cart.php' method='post'>
                <select name='size' class='order-size'>
                    <option value='{$productPriceSmall}'>small</option>
                    <option value='{$productPriceLarge}'>large</option>
                </select>
                <button class='order-btn itemid' value='{$productid}' type='submit'>add to cart</button>
            </form>
        </div>
        </div>
EOT;
    echo $html;
    }
?>

<?php 
    productHTML(0, 0, 0);
    
?>