<?php
//fetch useful information and output as an array, prices excluded
function get_yhd_html($content,$query){

    $yhd_data = [];
    $num = 0;
    $html = str_get_html($content);
    //echo $html;
    foreach ($html->find('li[class=search_item]') as $element) {

        $name_fetched = $element->find('p[class=title]', 0)->plaintext;

        //$name_fetched = $name->plaintext;
        if(compare_array($query,$name_fetched)){
            $yhd_data[$num] =new data();
            $yhd_data[$num] ->name  = $name_fetched;

        }else{
            continue 1;
        }

        $id = $element->find('p[class=title]', 0)->find('a',0)->pmid;
        $yhd_data[$num] ->id = $id;

        $img = $element->find('a[class=search_prod_img]', 0)->find('img',0)->src;
        if($img!==false){
            $yhd_data[$num] -> img = $img;
        }else{
            $img2 = $element->find('a[class=search_prod_img]', 0)->find('img',0)->original;
            $yhd_data[$num] -> img = $img2;
        }

        $price = $element->find('div[class=pricebox] span',0) -> yhdprice;
        $price_formated = number_format($price,2,'.','');
        $yhd_data[$num] -> price = $price_formated;



        $num +=1;
    }
    $html->clear();
    unset($html);

    return $yhd_data;

}


