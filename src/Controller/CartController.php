<?php

namespace App\Controller;

use App\Classe\Panier;
use App\Entity\Products;
use App\Repository\CategoriesRepository;
use App\Repository\ProductsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    private $entity;
    public function __construct(EntityManagerInterface $entity)
    {
        $this->entity = $entity;
    }

    #[Route('/cart', name: 'cart')]
    public function index(Panier $panier, ManagerRegistry $request): Response
    {
        $panierComplete = [];
        $productRepository = new ProductsRepository($request);
        if ($panier->get() != null) {
            foreach ($panier->get() as $id => $quantite) {
                $produit = $productRepository->findOneById($id);
                $panierComplete[$id] = [
                    'id' => $id,
                    'image' => $produit->photo(),
                    'name' => $produit->getName(),
                    'prix' => $produit->getPrice(),
                    'quantite' => $quantite,

                ];
            }
        }

        $nbre = $panier->nbreProduit();
        //dd($panier->get());
        return $this->render('cart/index.html.twig', [
            'panierComplete' => $panierComplete,
            'panierProduit' => $nbre
        ]);
    }

    #[Route('/cart/add', name: 'addcart')]
    public function add(Panier $panier): Response
    {
        if ($_GET != null) {
            $id = $_GET['id'];
            $quantite = $_GET['quantite'];
            $panier->add($id, $quantite);
        }

        return $this->redirectToRoute('cart');
    }
    #[Route('/cart/remove/{id}', name: 'removecart')]
    public function remove($id, Panier $panier): Response
    {
        $panier->remove($id);
        return $this->redirectToRoute('cart');
    }

    #[Route('/cart/removeall', name: 'removeallcart')]
    public function supprimer(Panier $panier): Response
    {
        $panier->supp();
        return $this->redirectToRoute('cart');
    }
}
