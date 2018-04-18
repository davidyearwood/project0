<?php 
    require_once 'config.php';
    $xmlStr = file_get_contents('menu.xml');
    $xml = new SimpleXMLElement($xmlStr);
    
    $res = $xml->xpath("//item[@id='2']");
    $size = '1';
    $category = 2;
    $item = 1; 
    $res = $xml->xpath("//category[3]/item[1]/size[@size='small']");
    print_r($res);
?>
<pre>
</pre>

<?php
        
?>

<h1>
</h1>