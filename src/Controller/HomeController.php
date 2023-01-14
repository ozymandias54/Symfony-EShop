<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use App\Repository\ProductsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ManagerRegistry $registry): Response
    {
        $categorie = new CategoriesRepository($registry);
        $list = $categorie->findAll();
        $product = new ProductsRepository($registry);
        $produitRecent = $product->findBy(array(), ['createdAt' => 'DESC'], 8, null);
        $produit = $product->findBy(array(), array(), 8, null);
        return $this->render('home/index.html.twig', [
            'categories' => $list,
            'produitRecent' => $produitRecent,
            'produits' => $produit,
        ]);
    }
}
