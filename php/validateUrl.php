<?php
//jd url validate
function jdValidate($url){
    $pattern = '/(?:http:\/\/)?item\.jd\.com\/(\d+)\.html/';
    if(preg_match($pattern, $url, $matches)){
        echo "your url is correct with jd <br/>";
        $jd_product_id = "J_";
        $jd_product_id .= $matches[1];
        echo "ID: ".$jd_product_id;
        $jdItem = new Jd($url);
        echo "<br/>".$jdItem->url."<br/>".$jdItem->jd_id."<br/>".$jdItem->jd_price."<br/>".$jdItem->get_jd_name();
        return true;
    }else{
        echo "jd url is not correct";
        return false;
    }

}

?>