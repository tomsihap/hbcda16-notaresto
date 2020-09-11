<?php

namespace App\Controller\Auth;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RestaurateurController
 * @package App\Controller\Auth
 *
 * @Route("/restaurateur")
 * @IsGranted("ROLE_RESTAURATEUR")
 */
class RestaurateurController extends AbstractController
{
    /**
     * @Route("/", name="restaurateur_home", methods={"GET"})
     */
    public function home() : Response
    {
        return $this->render('auth/restaurateur/home.html.twig');
    }
}