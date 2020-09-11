<?php

namespace App\Controller\Auth;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ClientController
 * @package App\Controller\Auth
 *
 * @Route("/client")
 * @IsGranted("ROLE_CLIENT")
 */
class ClientController extends AbstractController
{
    /**
     * @Route("/", name="client_home", methods={"GET"})
     */
    public function home() : Response
    {
        return $this->render('auth/client/home.html.twig');
    }
}