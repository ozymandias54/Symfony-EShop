<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
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
        return $this->render('home/index.html.twig', [
            'categories' => $list,
        ]);
    }
}
