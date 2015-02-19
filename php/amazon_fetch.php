<?php
//fetch useful information and output as an array, prices excluded
function get_amazon_html($content,$query){

    $amazon_data = [];
    $num = 0;
    $html = str_get_html($content);
    foreach ($html->find('li[class=s-result-item]') as $element) {

        $temp = "data-asin";
        $id = $element->$temp;
        //echo "in!";
        foreach($element->find('h2') as $name){
            $name_fetched = $name->plaintext;
            //html decode fetched results (original results were html encoded
            $name_fetched_html_decode = html_entity_decode($name_fetched);
            //echo $name_fetched_url_decode;
            if(compare_array($query,$name_fetched_html_decode)){
                $amazon_data[$num] =new data();
                $amazon_data[$num] ->id = $id;
                $amazon_data[$num] ->name  = $name_fetched_html_decode;

            }else{
                continue 2;
            }

        }

        foreach($element->find('img') as $img){
            $amazon_data[$num] -> img = $img -> src;
        }

        foreach($element->find('span[class=s-price]') as $price){
            $amazon_data[$num] -> price = $price -> plaintext;
        }
        
        $num +=1;
    }
    $html->clear();
    unset($html);
    return $amazon_data;

}


