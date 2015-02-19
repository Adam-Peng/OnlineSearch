<?php

//get user input and concatinate with search url for each domain

function make_url($input){

    $url_encode = urlencode($input);

    $jd_url = "search.jd.com/search?keyword=$url_encode&enc=utf-8&wtype=1";
    $amazon_url = "http://www.amazon.cn/s/ref=sr_nr_p_6_0?rh=p_6%3AA1AJ19PSB66TGU&keywords=$url_encode";
    $yhd_url = "http://search.yhd.com/c0-0-0/b/a-s1-v0-p1-price-d0-f06-m1-rt0-pid-mid0-k$url_encode/?tc=3.0.21.6.11";
    $suning_url = "http://search.suning.com/$url_encode/ct=1&st=0";
    $url_array = array($jd_url, $amazon_url, $yhd_url,$suning_url);


    return $url_array;
}

// multi curl setup and execute function -> return results as an array

function multi_requests($url_array){

    $url_count = count($url_array);
    $curl_array = array();
    $mh = curl_multi_init();

    //loop through the array of urls to setup curl
    for($i = 0; $i < $url_count; $i++){

        $curl_array[$i] = curl_init($url_array[$i]);
        curl_setopt($curl_array[$i], CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_array[$i],CURLOPT_USERAGENT,"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.91 Safari/537.36");
        curl_setopt($curl_array[$i],CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($curl_array[$i], CURLOPT_ENCODING, "gzip");

        curl_multi_add_handle($mh, $curl_array[$i]);

    }

    //multi curl execution
    do {
        curl_multi_exec($mh,$running);
    } while($running > 0);

    //store results as an array

    $result_array = array();

    for($i=0; $i < $url_count; $i++){

        $result_array[$i] = curl_multi_getcontent($curl_array[$i]);

    }
    //close the handles
    for($i=0; $i < $url_count; $i++){
        curl_multi_remove_handle($mh, $curl_array[$i]);
        curl_close($curl_array[$i]);
    }

    curl_multi_close($mh);

    //return results as an array
    return $result_array;
}

// test
/*$results = multi_requests(make_url("小米手机"));
print_r($results) ;*/



/*
$nodes = array('http://www.google.com', 'http://www.pengboadam.com', 'http://www.jd.com');
$node_count = count($nodes);

$curl_arr = array();
$master = curl_multi_init();

for($i = 0; $i < $node_count; $i++)
{
    $url =$nodes[$i];
    $curl_arr[$i] = curl_init($url);
    curl_setopt($curl_arr[$i], CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_arr[$i],CURLOPT_USERAGENT,"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.91 Safari/537.36");
    curl_setopt($curl_arr[$i],CURLOPT_FOLLOWLOCATION,true);
    curl_setopt($curl_arr[$i], CURLOPT_ENCODING, "gzip");

    curl_multi_add_handle($master, $curl_arr[$i]);
}

do {
curl_multi_exec($master,$running);
} while($running > 0);

echo "results: ";
for($i = 0; $i < $node_count; $i++)
{
$results = curl_multi_getcontent  ( $curl_arr[$i]  );
echo( $i . "\n" . $results . "\n");
}
echo 'done';*/
