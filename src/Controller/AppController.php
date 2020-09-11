<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index() : Response
    {
        return $this->render('app/index.html.twig');
    }

    /**
     * @Route("/about", name="app_about")
     */
    public function about() : Response
    {
        return $this->render('app/about.html.twig');
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/home", name="app_home")
     */
    public function home() : Response
    {
        $roles = $this->getUser()->getRoles();

        if (in_array("ROLE_CLIENT", $roles)) {
            return $this->redirectToRoute("client_home");
        }
        if (in_array("ROLE_RESTAURATEUR", $roles)) {
            return $this->redirectToRoute("restaurateur_home");
        }

        $this->addFlash("warning", "Vous n'avez pas le droit d'accéder à cette page.");

        return $this->redirectToRoute("app_index");
    }
}
