<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController{

    /**
     * @Route("/")
     */
    public function afficherAccueil() : Response {
        return $this-> render('accueil.html.twig');
    }

        /**
     * @Route("/RI")
     */
    public function RI(): Response {
        return $this->render('ri.html.twig');
    }


}