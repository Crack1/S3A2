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