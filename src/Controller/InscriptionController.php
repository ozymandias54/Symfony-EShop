<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\FormInscriptionType;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'inscription')]
    public function index(Request $request, ManagerRegistry $registry, UserPasswordHasherInterface $encoder): Response
    {
        $user = new User();
        $form = $this->createForm(FormInscriptionType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $password = $encoder->hashPassword($user, $user->getPassword());
            $user->setPassword($password);
            $user->setCreateAt(new \DateTimeImmutable);
            $doctrine = new UserRepository($registry);
            $doctrine->save($user, true);
            return $this->redirectToRoute('compte');
        }
        return $this->render('inscription/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
