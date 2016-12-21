<?php

namespace AppBundle\Services;


use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;
    
    /**
     * 
     */
    class Helpers
    {
        
        public $jwt_auth;
        public function __construct($jwt_auth){
            $this->jwt_auth = $jwt_auth;
        }
        
        public function authCheck($hash, $getIdentity = false){
                 $jwt_auth = $this->jwt_auth ;
                $auth= false;
                if ($hash != null) {
                    if ($getIdentity == false) {
                        $check_token = $jwt_auth->checkToken($hash);
                        if ($check_token == true) {
                            $auth = true;
                        }
                    }else{
                        $check_token = $jwt_auth->checkToken($hash, true);
                        if(is_object($check_token)){
                            $auth = $check_token;
                        }
                    }
                }
                return $auth;
        }
        
        /**
         * Uso de helper 
         */
        public function json($data){
        
        
        $normalizers = array(new ObjectNormalizer());
        //convierte cualquier cosas a Json
        $encoders = array(new JsonEncoder());
        $serializer = new Serializer($normalizers, $encoders);
        $json = $serializer->serialize($data,'json');
        
        $response = new Response();
        $response->setContent($json);
        $response->headers->set("Content-Type","application/json");
        return $response;
        
        
       /* $normalizers = array(new \Symfony\Component\Serializer\Normalizer\GetSetMethodNormalized());
        $encoders = array("json"=> new \Symfony\Component\Serializer\Encoder\JsonEncoder());
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, $encoders);
        $json = $serializer->serialize($data,'json');
        
       $response = new \Symfony\Component\HttpFoundation\Response();
        $response->setContent($json);
        $response->headers->set("Content-Type","application/json");
        return $response;*/
        return  $json;
        
    }
    }


?>