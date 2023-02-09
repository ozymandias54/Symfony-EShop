<?php

namespace App\Twig;

use App\Classe\Panier;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PanierExtension extends AbstractExtension
{
    private $panier;

    function __construct(Panier $panier)
    {
        $this->panier = $panier;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('panier', [$this, 'getNombreProduit'])
        ];
    }

    public function getNombreProduit()
    {
        return $this->panier->nbreProduit();
    }
}
