<?php

namespace App\Twig;

use App\Entity\Categories;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CategoriesExtension extends AbstractExtension
{
    private $entityManager;

    function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('categories', [$this, 'getCategories'])
        ];
    }

    public function getCategories()
    {
        //return $this->entityManager->getRepository(Category::class)->findAll();
        return $this->entityManager->getRepository(Categories::class)->findBy([], ['name' => 'ASC']);
    }
}
