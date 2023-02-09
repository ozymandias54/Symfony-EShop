<?php

namespace App\Controller;

use App\Classe\Panier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompteController extends AbstractController
{
    #[Route('/compte', name: 'compte')]
    public function index(Panier $panier): Response
    {
        $nbre = $panier->nbreProduit();
        return $this->render('compte/index.html.twig', []);
    }
}
