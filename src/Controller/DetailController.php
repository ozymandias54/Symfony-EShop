<?php

namespace App\Controller;

use App\Classe\Panier;
use App\Repository\CategoriesRepository;
use App\Repository\ProductsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    #[Route('/detail/{slug}', name: 'detail')]
    public function index($slug, ManagerRegistry $registry, Panier $panier): Response
    {
        $product = new ProductsRepository($registry);
        $product = $product->findOneBySlug($slug);

        $nbre = $panier->nbreProduit();

        return $this->render('detail/index.html.twig', [
            'product' => $product,
        ]);
    }
}
