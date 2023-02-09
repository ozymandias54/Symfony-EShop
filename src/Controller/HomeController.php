<?php

namespace App\Controller;

use App\Classe\Panier;
use App\Entity\Categories;
use App\Repository\CategoriesRepository;
use App\Repository\ProductsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entity;

    function __construct(EntityManagerInterface $entity)
    {
        $this->entity = $entity;
    }

    #[Route('/', name: 'home')]
    public function index(ManagerRegistry $registry, Panier $panier): Response
    {

        $product = new ProductsRepository($registry);
        $produitRecent = $product->findBy(array(), ['createdAt' => 'DESC'], 8, null);
        $produit = $product->findBy(array(), array(), 8, null);

        $nbre = $panier->nbreProduit();
        return $this->render('home/index.html.twig', [
            'produitRecent' => $produitRecent,
            'produits' => $produit,
        ]);
    }
}
