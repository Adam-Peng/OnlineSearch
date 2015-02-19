<?php




class Fetch_Jd{
    public $url;

    public function __construct($url){
        $this -> url = $url;
    }

    public function get_jd_id(){
        $pattern = '/(?:http:\/\/)?item\.jd\.com\/(\d+)\.html/';
        preg_match($pattern,$this->url,$matches);
        return $matches[1];

    }

    public function get_jd_price(){

        $call = $this->set_up_jd_url_to_call($this->get_jd_id());
        $price = json_decode(file_get_contents($call));
        return $price[0]->p;

    }

    private function set_up_jd_url_to_call($jd_id){
        $add = "J_".$jd_id;
        $call = "http://p.3.cn/prices/mgets?skuIds=".$add;
        return $call;
    }

    public function get_jd_name(){
        $html = file_get_html($this->url);


        foreach ($html->find("div[id=name] h1") as $element) {
            return $element->plaintext;
        }

    }

}

class Jd extends Fetch_jd{
    public $url;
    public $jd_id;
    public $jd_price;
    public function __construct($url){
        $this -> url = $url;
        $this -> jd_id = $this->get_jd_id();
        $this -> jd_price = $this->get_jd_price();
        //regex


    }



}



?>