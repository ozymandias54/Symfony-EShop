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
    #[Route('/detail/{id}', name: 'detail')]
    public function index($id, ManagerRegistry $registry): Response
    {
        $categorie = new CategoriesRepository($registry);
        $list = $categorie->findAll();
        $product = new ProductsRepository($registry);
        $product = $product->find($id);
        return $this->render('detail/index.html.twig', [
            'product' => $product,
            'categories' => $list,
        ]);
    }
}
