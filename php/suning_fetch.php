<?php
//fetch useful information and output as an array, prices excluded
function get_suning_html($content,$query){

    $suning_data = [];
    $num = 0;
    $html = str_get_html($content);
    //echo $html;
    foreach ($html->find('div[id=productTab] li[name]') as $element) {
        //echo $element;
        $name_fetched = $element->find('a',0)->title;
        if(compare_array($query,$name_fetched)){
            $suning_data[$num] =new data();
            $suning_data[$num] ->name  = $name_fetched;

        }else{
            continue 1;
        }
        //regular expression
        $pattern = '/^0+(\d+$)/';
        $id_feteched = $element->name;
        if(preg_match($pattern,$id_feteched,$matches)){
            $suning_data[$num] ->id = $matches[1];

        }


        $img = $element->find('a img', 0)->src;
        if($img!==false){
            $suning_data[$num] -> img = $img;

        }else{
            $suning_data[$num] -> img = $element->find('a img', 0)->src2;

        }

        //note the price presented by an img(png)
        if($element->find('p[class=price] img',0) !== null){
            $price = $element->find('p[class=price] img',0) -> src2;
            $suning_data[$num] -> price = $price;

        }else{
            $suning_data[$num] -> price = null;

        }



        $num +=1;
    }
    //free memory
    $html->clear();
    unset($html);
    return $suning_data;

}


