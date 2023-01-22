<?php

namespace App\Classe;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Panier
{

    private $request;
    public function __construct(RequestStack $request)
    {
        $this->request = $request;
    }
    public function add($id, $quantite)
    {
        $session = $this->request->getSession();
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            $panier[$id] = $panier[$id] + $quantite;
        } else {
            $panier[$id] = $quantite;
        }

        $session->set('panier', $panier);
    }

    public function get()
    {
        $session = $this->request->getSession();
        return $session->get('panier');
    }

    public function remove($id)
    {
        $session = $this->request->getSession();
        $panier = $session->get('panier', []);
        unset($panier[$id]);
        $session->set('panier', $panier);
    }
    public function supp()
    {
        $session = $this->request->getSession();
        return $session->remove('panier');
    }
}
