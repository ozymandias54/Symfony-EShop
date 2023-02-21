<?php

namespace App\Controller;

use App\Classe\Panier;
use App\Entity\Reviews;
use App\Repository\CategoriesRepository;
use App\Repository\ProductsRepository;
use App\Repository\ReviewsRepository;
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
        $doctrine = new ReviewsRepository($registry);
        $list = $doctrine->findByProducts($product);
        if ($_GET != null) {
            $review = new Reviews();
            $review->setRate($_GET['rate']);
            $review->setComment($_GET['comment']);
            $review->setName($_GET['name']);
            $review->setEmail($_GET['email']);
            $review->setCreateAt(new \DateTimeImmutable());
            $review->setProducts($product);
            $doctrine->save($review, true);
            return $this->redirectToRoute('detail', ['slug' => $slug]);
        }
        return $this->render('detail/index.html.twig', [
            'product' => $product,
            'liste' => $list,
        ]);
    }
}
