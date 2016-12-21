<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\JsonResponse;
use BackendBundle\Entity\User;


class UserController extends Controller
{
    public function newAction(Request $request){
      $helpers = $this->get("app.helpers");
       $json = $request->get("json",null);
       $params = json_decode($json);
       $data = array();
       
       if ($json != null) {
           $createAt = new \DateTime("Now");
           $image = null;
           $role = "user";
           $email = (isset($params->email))? $params->email : null;
           $name= (isset($params->name) && ctype_alpha($params->name ) )? $params->name : null;
           $surname= (isset($params->surname) && ctype_alpha($params->surname ) )? $params->surname : null;
           $password = (isset($params->password))? $params->password : null;
           
            $emailContraint = new Assert\Email();
         $emailContraint->message = "Email no valido";
         
         $validate_email = $this->get("validator")->validate($email,$emailContraint);
         
         if ($email != null && count($validate_email) == 0 && $password !=null && $name !=null && $surname!=null){
             
             $user = new User();
             $user->setCreatedAt($createAt);
             $user->setImage($image);
             $user->setRole($role);
             $user->setEmail($email);
             $user->setName($name);
             $user->setSurname($surname);
             
             $pwt = hash("sha256",$password);
             $user->setPassword($pwt);
             
             $em = $this->getDoctrine()->getManager();
             $isset_user = $em->getRepository("BackendBundle:User")->findBy(array("email" => $email ));
            if (count($isset_user)== 0){  
                 $em->persist($user);
                 $em->flush();
                 $data["status"] = "Success";
                 $data["code"]= 200;
                 $data["msg"] = "New user created";
             }else{
                 $data = array(
               "status" => "Error",
               "code"   => 400,
               "msg"    => "User not Created, Duplicated"
               );
             }
             }
       }else{
           $data = array(
               "status" => "Error",
               "code"   => 400,
               "msg"    => "User not Created"
               );
       }
       
       return $helpers->json($data);
       
    }
    
    public function editAction(Request $request){
      $helpers = $this->get("app.helpers");
       $json = $request->get("json",null);
       $params = json_decode($json);
       $data = array();
       
       if ($json != null) {
           $createAt = new \DateTime("Now");
           $image = null;
           $role = "user";
           $email = (isset($params->email))? $params->email : null;
           $name= (isset($params->name) && ctype_alpha($params->name ) )? $params->name : null;
           $surname= (isset($params->surname) && ctype_alpha($params->surname ) )? $params->surname : null;
           $password = (isset($params->password))? $params->password : null;
           
            $emailContraint = new Assert\Email();
         $emailContraint->message = "Email no valido";
         
         $validate_email = $this->get("validator")->validate($email,$emailContraint);
         
         if ($email != null && count($validate_email) == 0 && $password !=null && $name !=null && $surname!=null){
             
             $user = new User();
             $user->setCreatedAt($createAt);
             $user->setImage($image);
             $user->setRole($role);
             $user->setEmail($email);
             $user->setName($name);
             $user->setSurname($surname);
             
             $pwt = hash("sha256",$password);
             $user->setPassword($pwt);
             
             $em = $this->getDoctrine()->getManager();
             $isset_user = $em->getRepository("BackendBundle:User")->findBy(array("email" => $email ));
            if (count($isset_user)== 0){  
                 $em->persist($user);
                 $em->flush();
                 $data["status"] = "Success";
                 $data["code"]= 200;
                 $data["msg"] = "New user created";
             }else{
                 $data = array(
               "status" => "Error",
               "code"   => 400,
               "msg"    => "User not Created, Duplicated"
               );
             }
             }
       }else{
           $data = array(
               "status" => "Error",
               "code"   => 400,
               "msg"    => "User not Created"
               );
       }
       
       return $helpers->json($data);
       
    }
}

?>