<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GuestController extends Controller
{
    /**
     * @Route("/article-list")
     */
    public function articleAction()
    {
        return $this->render('Guest/article_list.html.twig', array(
            // ...
        ));
    }

}
