<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/test")
     */
    public function testAction()
    {

        return new Response("test");
    }

    /**
     * @Route("/hello/{age}/{name}/{firstName}",name="hellopage",
     *          defaults={"firstName"="toto","name"="tata"},
     *          requirements={"age"="\d{1,3}"}
     * )
     */
    public function hello($name, $firstName, $age)
    {

        return $this->render("default/hello.html.twig",[
            "name"=>$name,
            "firstName"=>$firstName,
            "age"=>$age,
            "message"=>"Symfony  c'est cool",
            "now"=>new \Datetime()
        ]);
    }

    /**
     * @Route("/fruits",name="fruitpage")
     */
    public function fruitAction ()
    {
        $fruit= array("Pomme","Poire","Cerise");


        return $this->render("fruits.html.twig",["fruitList"=>$fruit]);

    }
}
