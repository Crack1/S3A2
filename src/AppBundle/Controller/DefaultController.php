<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\JsonResponse;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    
      /**
     * @Route("/test", name="test")
     */
    public function testAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user   = $em->getRepository('BackendBundle:User')->findAll();
        
        //busca cualquier servicio que exista $this->get("")
        $helpers = $this->get("app.helpers");
        
        //$miArreglo = array('id' =>1,'name' =>'erwin' );
       //var_dump( $this->json($user));
        return $helpers->json($user);
     // die();
    }
    
    public function loginAction(Request $request){
         $helpers = $this->get("app.helpers");
         $auth = $this->get("app.jwt_auth");
         
         //recibir un Json por post
         $json = $request->get('json', null);
         
         if($json != null){
             ///erwin
          //   var_dump($json);
           
         $params = json_decode($json);
            //var_dump($params->email);
         $email = (isset($params->email))? $params->email : null;
         $password = (isset($params->password))? $params->password : null;
         
     
         $emailContraint = new Assert\Email();
         $emailContraint->message = "Email no valido";
         
         $validate_email = $this->get("validator")->validate($email,$emailContraint);
   
         if(count($validate_email)== 0 && $password != null){
          $signUp =  $auth->signup($email, $password);
     
       return new JsonResponse($signUp);
    
         // return $helpers->json($signUp);
         }else{
             echo 'Data incorrecta';
         }
         
         }else{
             echo "Send Json with post";
         }
        // echo 'hola';
         die();
        
    }
    

    
}

