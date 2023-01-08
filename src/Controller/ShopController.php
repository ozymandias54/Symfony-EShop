<?php

namespace App\Controller;

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
    public function index(ManagerRegistry $registry): Response
    {

        $product = new ProductsRepository($registry);
        $products = $product->findAll();
        $categorie = new CategoriesRepository($registry);
        $list = $categorie->findAll();
        return $this->render('shop/index.html.twig', [
            'categories' => $list,
            'products' => $products,
        ]);
    }

    #[Route('/shop/{idCat}', name: 'shopCategorie')]
    public function indexCategorie(ManagerRegistry $registry, int $idCat): Response
    {


        $categorie = new CategoriesRepository($registry);
        $list = $categorie->findAll();
        $cat = $categorie->find($idCat);
        $products = $cat->getProducts();
        return $this->render('shop/index.html.twig', [
            'categories' => $list,
            'products' => $products,
        ]);
    }
}
