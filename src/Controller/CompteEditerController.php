<?php

namespace App\Controller;

use App\Form\FormEditeProfilType;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CompteEditerController extends AbstractController
{
    public function __construct(private UrlGeneratorInterface $urlGenerator)
    {
    }

    #[Route('/compte/editer', name: 'compteEditer')]
    public function index(Request $request, UserPasswordHasherInterface $encoder, ManagerRegistry $registry): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(FormEditeProfilType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $doctrine = new UserRepository($registry);
            $doctrine->save($user, true);
            return new RedirectResponse($this->urlGenerator->generate('compte'));
        }
        return $this->render('compte/editer.html.twig', [
            'form' => $form
        ]);
    }
}
