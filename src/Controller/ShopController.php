<?php

namespace App\Controller;

use App\Classe\Panier;
use App\Repository\CategoriesRepository;
use App\Repository\ImagesRepository;
use App\Repository\ProductsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    #[Route('/shop', name: 'shop')]
    public function index(ManagerRegistry $registry, Panier $panier): Response
    {

        $product = new ProductsRepository($registry);
        $products = $product->findAll();

        $nbre = $panier->nbreProduit();
        return $this->render('shop/index.html.twig', [
            'products' => $products,
            'panierProduit' => $nbre
        ]);
    }

    #[Route('/shop/{slug}', name: 'shopCategorie')]
    public function indexCategorie(ManagerRegistry $registry, $slug, Panier $panier): Response
    {


        $categorie = new CategoriesRepository($registry);
        $cat = $categorie->findOneBySlug($slug);
        $products = $cat->getProducts();

        $nbre = $panier->nbreProduit();
        return $this->render('shop/shopCategorie.html.twig', [
            'products' => $products,
            'panierProduit' => $nbre
        ]);
    }
}
