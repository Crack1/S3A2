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
      /*  $em = $this->getDoctrine()->getManager();
        $user   = $em->getRepository('BackendBundle:User')->findAll();
        */
        //busca cualquier servicio que exista $this->get("")
        $helpers = $this->get("app.helpers");
        //$jwt_auth = $this->get("app.jwt_auth");
        
        $hash = $request->get("autorization",null);
        
        //$check = $jwt_auth->checktoken($hash);
        $check = $helpers->authCheck($hash);
        var_dump($check);
        //$miArreglo = array('id' =>1,'name' =>'erwin' );
       //var_dump( $this->json($user));
       // return $helpers->json($user);
      die();
    }
    
    public function loginAction(Request $request){
         $helpers = $this->get("app.helpers");
         $auth = $this->get("app.jwt_auth");
         
         //recibir un Json por post
         $json = $request->get('json', null);
         
         if($json != null){

           
         $params = json_decode($json);

         $email = (isset($params->email))? $params->email : null;
         $password = (isset($params->password))? $params->password : null;
         $getHash = (isset($params->getHash))? $params->getHash : null;
     
         $emailContraint = new Assert\Email();
         $emailContraint->message = "Email no valido";
         
         $validate_email = $this->get("validator")->validate($email,$emailContraint);

   
         if(count($validate_email)== 0 && $password != null){
             
             
            if ($getHash == null) {
                $pwt = hash("sha256",$password);
                 $signUp =  $auth->signup($email, $pwt);
     
            } else {
                $pwt = hash("sha256",$password);
                 $signUp =  $auth->signup($email, $pwt, true);
     
            }
 
         }else{
             
             return $helpers->json(array(
                    'status'=>'Error','data'=>'Login not Valid'
                 ));
      
         }
          return new JsonResponse($signUp);
         
         }else{
             echo "Send Json with post";
         }
         die();
        
    }
    

    
}

