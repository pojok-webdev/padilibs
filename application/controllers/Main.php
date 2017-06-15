<?php
class Main extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        $params = $this->uri->segment(3);
        $str = "";
        $no_se = array(2,5,8);
        $with_satu = array(1,4,7);
        $belas = false;
        $has_zero = false;
        for($c = 0;$c < strlen($params); $c++){
            $urutdigit = strlen($params) - $c;
            if(!$has_zero){
                switch($urutdigit){
                    case 1:
                    if(!$belas){
                        $str.= " puluh";
                    }
                    break;
                    case 2:
                    $str.= " ratus";
                    break;
                    case 3:
                    $str.= " ribu";
                    break;
                    case 4:
                    if(!$belas){
                        $str.= " puluh";
                    }
                    break;
                    case 5:
                    $str.= " ratus";
                    break;
                    case 6:
                    $str.= " juta";
                    break;
                    case 7:
                    if(!$belas){
                        $str.= " puluh";
                    }
                    break;
                }
                
            }else{
                $has_zero = false;
            }
            switch($params[$c]){
                case '1':
                    if(in_array($urutdigit,$no_se)){

                    }elseif($belas){
                        $str.= " se";
                    }elseif(in_array($urutdigit,$with_satu)){
                        $str.= " satu";
                    }else{
                        $str.= " se";
                    }
                break;
                case '2':$str.= " dua";break;
                case '3':$str.= " tiga";break;
                case '4':$str.= " empat";break;
                case '5':$str.= " lima";break;
                case '6':$str.= " enam";break;
                case '7':$str.= " tujuh";break;
                case '8':$str.= " delapan";break;
                case '9':$str.= " sembilan";break;
                case '0':$has_zero=true;break;
            }
            if($belas){
                $str.= " belas";
                $belas = false;
            }
            if(($params[$c]==='1')&&(in_array($urutdigit,$no_se))){
                $belas = true;
            }
        }
        echo number_format($params) . "<br />";
        echo $str;
    }
    function test(){
        $this->load->helper("common");
        terbilang(23456578);
    }
}