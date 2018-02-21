<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
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

        return $this->render("default/hello.html.twig", [
            "name" => $name,
            "firstName" => $firstName,
            "age" => $age,
            "message" => "Symfony  c'est cool",
            "now" => new \Datetime()
        ]);
    }

    /**
     * @Route("/fruits",name="fruitpage")
     */
    public function fruitAction()
    {
        $fruit = array("Pomme", "Poire", "Cerise");
        $food = [
            ["name" => "Pommes", "type" => "fruit", "edible" => true],
            ["name" => "Radis", "type" => "légume", "edible" => true],
            ["name" => "Chromium", "type" => "métal", "edible" => false],
            ["name" => "Canard", "type" => "viande", "edible" => true],
            ["name" => "Kebab", "type" => "plat", "edible" => false],
        ];

        return $this->render("fruits.html.twig", ["fruitList" => $fruit, "foodList" => $food]);

    }

    /**
     * @Route("/new-contact", name="new_contactpage" )
     *
     */
    public function newContactAction()
    {
        $contact = new Contact();
        $contact->setName("Hugo")->setFirstName("victor")->setEmail('vh@mail6.com')->setDateOfbirth(new \DateTime("1865-05-12"));
        // Récupération du gestionnaire d'entité
        $em = $this->getDoctrine()->getManager();
        $em->persist($contact);
        $em->flush();
        return $this->render("default/new-contact.html.twig", ["contact" => $contact]);
    }

    /**
     * @Route("/add-article")
     */
    public function addArticleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist(new Article("Symfony 4 arrive", "dev", true));
        $em->persist(new Article("La nouvelle gaffe de Trump", "politique", false));
        $em->persist(new Article("Les sorties de la semaine", "cinéma", true));
        $em->persist(new Article("Doctrine et Symfony", "dev", true));
        $em->persist(new Article("Cours de Macro économie", "politique", false));
        $em->persist(new Article("AngularJS vs ReactJS round 1", "dev", true));
        $em->flush();
        return new Response("Articles chargés");
    }

    /**
     * @Route("/article-list/page-{page}/{categoryName}",
     *     defaults={"categoryName"="all","page"=1},
     *     requirements={"page"="\d+"},
     *     name="article_list")
     */
    public function showArticleAction($categoryName, $page)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Article");
        $nbArticlePerPage = 10;
        if ($categoryName == "all") {
            // $articleList = $repository->findAll(['title'=>'ASC']); A voir pourquoi it doesn't work
            $articleList = $repository->findBy([], ['title' => 'ASC']);

        } else {
            $categoryRepository=$this->getDoctrine()->getRepository("AppBundle:Category");
            $category=$categoryRepository->findByName($categoryName);
            $articleList = $repository->findByCategory($category, ['category' => 'ASC']);

        }
        $nbArticles = count($articleList);
        $nbPages = ceil($nbArticles / $nbArticlePerPage);
        $offset = $nbArticlePerPage * ($page - 1);
        $articleList = array_slice($articleList, $offset, $nbArticlePerPage);
        return $this->render("article-list.html.twig", [
            "articleList" => $articleList,
            "nbPages" => $nbPages,
            "currentPage" => $page,
            "category" => $categoryName
        ]);

    }

    /**
     * @Route("/article-details/{id}",requirements={"id"="\d+"},name="article_details")
     */
    public function articleDetailsAction(Article $article)
    {     // Raccourci a voir...

        return $this->render("article-details.html.twig", ["article" => $article]);

    }


    /**
     * @Route("/article_delete/{id}",requirements={"id"="\d+"},name="article_delete")
     *
     */
    public function deleteArticleAction($id)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Article");
        $article = $repository->findOneById("$id");   //Le nom de la colonne de la table est utilisable findOneByCategory ...
        // Suppression de l'entité
        $em = $this->getDoctrine()->getManager();
        $em->remove($article);
        $em->flush();
        return $this->redirect("/article-list");
        // return $this->redirectToRoute("routeName"); si nommée dans son annotation

    }
}
