<?php

namespace AppBundle\Services;

use Firebase\JWT\JWT;

class JwtAuth{
    
    
    public $manager;
    private $key = 'clave-secreta';
    
    public function __construct($manager){
        $this->manager = $manager;
    }
    
    public function signup($email, $password, $getHash = NULL){
   
        
        $user = $this->manager->getRepository('BackendBundle:User')->findOneBy(
                
                array( "email" => $email, "password" => $password )

            );
            
        
        $signup = false;
        if (is_Object($user)) {
            
            $signup = true;
            // code...
        }
    
      // return $signup;
        
       if($signup == true){
             $token = array(
                'sub'=> $user->getId(),
                'email'=> $user->getEmail(),
                'name'=> $user->getName(),
                'surname'=> $user->getSurname(),
                'password'=> $user->getPassword(),
                'image'=> $user->getImage(),
                'iat'=> time(),
                'exp'=> time() + (7*24*60*60) 
                );
                
                $jwt = JWT::encode($token,$this->key,'HS256');
            
            $decoded = JWT::decode($jwt,$this->key,array('HS256'));
            
            if($getHash != null){
               
                return $jwt;
            }else{
                return $decoded;
            }
          
        }else{
            return array('status'=>'Error','data'=>'Login Fail');
         
        }
        
    }
    
    public function checkToken($jwt, $getIdentity = false){
        
        $key = $this->key;
        $auth = false;
        $decoded  = null;
        try{
            $decoded = JWT::decode($jwt,$this->key,array('HS256'));
        }catch(\UnexpectedValueException $e){
            $auth = false;
        }catch(\DomainException $e){
            $auth = false;
        }
        
        if(isset($decoded->sub)){
            $auth = true;
        }else{
            $auth = false;
        }
        
        if($getIdentity == true){
            return $decoded;
        }else{
            return $auth;
        }
        
        return ;
    }
    
    
}




?>