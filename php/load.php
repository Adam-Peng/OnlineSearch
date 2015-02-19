<?php
include 'simple_html_dom.php';
include 'curlm.php';
include 'jd_fetch.php';
include 'amazon_fetch.php';
include 'yhd_fetch.php';
include 'suning_fetch.php';
//include 'amazon_fetch.php';
//get input

$item = $_GET["item"];


//validate input



//make urls to request
$url_array = make_url($item);


//multiple curl requests
$multi_results = multi_requests($url_array);


//get info and echo
//for jd info
$jd_info = get_jd_html($multi_results[0],$item);          //data that doesn't contain prices for jd
//$jd_info = append_jd_price($jd_partial_info);               //add prices for jd info

//for amazon info
$amazon_info = get_amazon_html($multi_results[1],$item);

//for amazon info
//$yhd_info = get_yhd_html($multi_results[2],$item);

//for suning info
$suning_info = get_suning_html($multi_results[3],$item);


//put 3 infos into an array and output as json
$info_array = array('jd' => $jd_info,'amazon' => $amazon_info,/*$yhd_info,*/'suning' => $suning_info);

print_r(json_encode($info_array,JSON_UNESCAPED_UNICODE));




//declare a data class that stores data fetched
class data{
    public $price;
    public $img;
    public $name;
    public $J_sku;
    public $id;
    public $url;
}



