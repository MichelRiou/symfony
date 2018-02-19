<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
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
        $food=[
            ["name"=>"Pommes","type"=>"fruit","edible"=>true],
            ["name"=>"Radis","type"=>"légume","edible"=>true],
            ["name"=>"Chromium","type"=>"métal","edible"=>false],
            ["name"=>"Canard","type"=>"viande","edible"=>true],
            ["name"=>"Kebab","type"=>"plat","edible"=>false],
        ];

        return $this->render("fruits.html.twig",["fruitList"=>$fruit,"foodList"=>$food]);

    }

    /**
     * @Route("/new-contact", name="new_contactpage" )
     */
    public function newContactAction(){
        $contact= new Contact();
        $contact->setName("Hugo")->setFirstName("victor")->setEmail('vh@mail6.com')->setDateOfbirth(new \DateTime("1865-05-12"));
        // Récupération du gestionnaire d'entité
        $em=$this->getDoctrine()->getManager();
        $em->persist($contact);
        $em->flush();
        return $this->render("default/new-contact.html.twig",["contact"=>$contact]);
    }
}
