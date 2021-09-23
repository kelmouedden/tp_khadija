<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Accueil1Controller extends AbstractController
{
    #[Route('/accueil1', name: 'accueil1')]
    public function index(): Response
    {
        return $this->render('accueil1/index.html.twig', [
            'controller_name' => 'Accueil1Controller',
        ]);
    }
}
