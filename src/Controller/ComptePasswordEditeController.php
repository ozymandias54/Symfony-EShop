<?php

namespace App\Controller;

use App\Form\PasswordEditeType;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ComptePasswordEditeController extends AbstractController
{
    #[Route('/compte/password/edite', name: 'password_edite')]
    public function index(Request $request, UserPasswordHasherInterface $encoder, ManagerRegistry $registry): Response
    {
        $note = null;

        $user = $this->getUser();
        $form = $this->createForm(PasswordEditeType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $oldpwd = $form->get('oldpassword')->getData();
            if ($encoder->isPasswordValid($user, $oldpwd)) {
                $newpwd = $form->get('newpassword')->getData();
                $password = $encoder->hashPassword($user, $newpwd);
                $user->setPassword($password);
                $doctrine = new UserRepository($registry);
                $doctrine->save($user, true);
                $note = "Mot de passe mis a jour";
                return $this->redirectToRoute('compte');
            } else {
                $note = "Mot de passe actuel est incorrect";
            }
        }
        return $this->render('compte/passwordEdite.html.twig', [
            'form' => $form,
            'note' => $note,
        ]);
    }
}
