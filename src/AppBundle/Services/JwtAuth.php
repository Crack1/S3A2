<?php

namespace AppBundle\Services;

use Firebase\JWT\JWT;

class JwtAuth{
    
    
    public $manager;
    
    public function __construct($manager){
        $this->manager = $manager;
    }
    
    public function _signup($email, $password, $getHash = NULL){
        $key = 'claver-secreta';
        
        $user = $this->manager->getRepository('BackendBundle:User')->findOneBy(
                
                array( 'email' => $email, 'password' => $password )
            
            );
            
        $signup = false;
        if (isObject($user)) {
            
            $signup = true;
            // code...
        }
        
        if($signup == true){
            return array('status'=>'OK','data'=>'Ok');
        }else{
            return array('status'=>'Error','data'=>'Error');
            
        }
    }
    
    
}




?>