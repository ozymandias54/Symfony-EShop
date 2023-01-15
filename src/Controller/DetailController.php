<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use App\Repository\ProductsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    #[Route('/detail/{slug}', name: 'detail')]
    public function index($slug, ManagerRegistry $registry): Response
    {
        $categorie = new CategoriesRepository($registry);
        $list = $categorie->findAll();
        $product = new ProductsRepository($registry);
        $product = $product->findOneBySlug($slug);
        return $this->render('detail/index.html.twig', [
            'product' => $product,
            'categories' => $list,
        ]);
    }
}
