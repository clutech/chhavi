<?php

namespace Clutech\Chhavi;

class Chhavi
{

    /**
     * Multiplies the two given numbers
     * @param int $a
     * @param int $b
     * @return int
     */
    public static function test($a, $b)
    {
        return $a * $b;
    }

    /**
    * Returns string url for given src input of 
    * @param $array
    * @param url
    * @return string
    */
    public static function url($url = '', $array = []){
        if(!$url)
            return;
        $ext = explode(".", $url);
        if(!count($ext) >= 2)
            return $url;
        $ext = strtolower(end($ext));

        $allowedExtension = ["jpeg", "jpg", "png", "js"];

        if(isset($array["no-transform"]) && $array["no-transform"] == 1)
            return $url;
        if(!in_array($ext, $allowedExtension) || $ext == "js")
            return $url;
        
        $urlParams = self::urlParams($ext, $array);
        if(!$urlParams)
            return $url;

        $url = $url . "?" . http_build_query($urlParams, '', "&");
        print_r($url);   
        // return $url;    
    }
    public static function urlParams($ext, $array){
        if(!$array)
            return false;

        $allowedParams = [
                        "width"=>["type"=> "integer", "default"=> '', "checkType" => true],
                        "height"=>["type"=> "integer", "default"=> '', "checkType" => true],
                        "no-transform"=>["type"=> "int", "default"=> '',  "checkType" => false],
                        "nocrop"=>["type"=> "int", "default"=> '', "checkType" => false],
                        "quality"=>["type"=> "integer", "default"=> 75, "checkType" => true],
                        "compression"=>["type"=> "int", "default"=> 9, "checkType" => true],
                        "rotate"=>["type"=> "integer", "default"=> 0, "checkType" => true],
                    ];
        $paramArray = [];
        $paramArray["nocrop"] = true;            
                    
        foreach($array as $key => $value){
            if(array_key_exists($key, $allowedParams)){
                if(gettype($value) == $allowedParams[$key]["type"] && $allowedParams[$key]["checkType"])
                    $paramArray[$key] = $value;
                    $paramArray["type"] = $ext;
                    // if($key == 'quality' &&($ext == 'jpeg' || $ext == 'jpg')){
                    //     $paramArray[$key] = $value;
                    //     $paramArray["type"] = $ext;
                    // }else if($key == 'compression' && $ext == 'png'){
                    //     $paramArray[$key] = $value;
                    //     $paramArray["type"] = $ext;
                    // }else {
                    //     $paramArray["type"] = $ext;
                    // }
            }
        }  
        print_r($paramArray);          
        return $paramArray;

    }


}