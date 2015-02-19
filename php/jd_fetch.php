<?php

//fetch useful information and output as an array, prices excluded
function get_jd_html($content, $query){

    $jd_data = [];
    $num = 0;
    $html = str_get_html($content);
    $li_content = $html->find('li[sku]') ;
    $book_content = $html->find('li[bookid]');
    if(!empty($li_content)){
        foreach ($li_content as $element) {
            foreach($element->find('div[class=p-name]') as $name){
                $name_fetched = $name->plaintext;
                //echo $name_fetched;
                if(compare_array($query,$name_fetched)){
                    $jd_data[$num] =new data();
                    $id = $element->sku;
                    $jd_data[$num]->id = $id;
                    $jd_data[$num]->J_sku = "J_".$id;
                    $jd_data[$num] ->name  = $name_fetched;

                }else{
                    continue 2;
                }

            }



            foreach ($element->find('div[class=p-img] img[data-lazyload]') as $img) {
                $replace = "data-lazyload";
                $jd_data[$num] ->img = $img-> $replace;
            }

            foreach($element->find('div[class=p-price] strong') as $price){
                $jd_data[$num] ->price  = $price->plaintext;
            }
            $num +=1;
        }


    }elseif(!empty($book_content)){

        foreach ($book_content as $element) {
            foreach($element->find('div[class=p-name]') as $name){
                $name_fetched = $name->plaintext;

                if(compare_array($query,$name_fetched)){
                    $jd_data[$num] =new data();
                    $id = $element->bookid;
                    $jd_data[$num]->id = $id;
                    $jd_data[$num]->J_sku = "J_".$id;
                    $jd_data[$num] ->name  = $name_fetched;

                }else{
                    continue 2;
                }

            }


            foreach ($element->find('div[class=p-img] img[data-lazyload]') as $img) {
                $replace = "data-lazyload";
                $jd_data[$num] ->img = $img-> $replace;
            }

            foreach($element->find('div[class=p-price] strong') as $price){
                $jd_data[$num] ->price  = $price->plaintext;
            }
            $num +=1;
        }
    }
    else{
        echo "item not found!";
    }

    $html->clear();
    unset($html);
    return $jd_data;




}

//add jd price info and return complete jd info
function append_jd_price($jd_data){

    $url_to_call = "http://p.3.cn/prices/mgets?skuIds=";

    foreach($jd_data as $array){
        $url_to_call .= $array->J_sku.",";
    }


    $price = json_decode(file_get_contents($url_to_call));

    for($i=0;$i<count($jd_data);$i++){
        $jd_data[$i] -> price = $price[$i]->p;
    }

    return $jd_data;
}


//convert multibytes char to an array using mbstring function
function mbstring_to_array($str,$charset) {
    $strlen = mb_strlen($str);
    //echo $strlen;
    while($strlen){
        $array[] = mb_substr($str,0,1,$charset);
        $str = mb_substr($str,1,$strlen,$charset);
        $strlen = mb_strlen($str);
    }
    return $array;
}


//return true if query matches the item title
function compare_array($must_have, $compare_to){
    $must_have_array = mbstring_to_array($must_have,"utf-8");
    //print_r($must_have_array);
    $compare_to_array = mbstring_to_array($compare_to,"utf-8");
    //print_r($compare_to_array);
    $compare_results = count(array_intersect(array_map('strtolower', $must_have_array), array_map('strtolower', $compare_to_array)));
    if($compare_results >= (count($must_have_array)-1)){
        return true;
    }else{
        return false;

    }
}

//echo compare_array("小米路由器","Lenovo 联想 newifi mini 新路由 1200M AC双频智能无线路由器");

