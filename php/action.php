<?php
require 'simple_html_dom.php';
include 'Fetch.php';
include 'validateUrl.php';

$inputUrl = $_POST["url"];


if($inputUrl!="") {
    echo "url entered! <br/>Let's search! </br>You url is: " . $inputUrl . "<hr>";


    jdValidate($inputUrl);
    //getUrlContent($inputUrl);
    /*    htmlParse($inputUrl);

        }else{
            echo "enter a url";
        };*/
}
function getUrlContent($url){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_HEADER,0);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

    $result = curl_exec($ch);
    curl_close($ch);
    var_dump($result);
}

function htmlParse($url){



}

function getElement(){

}

?>