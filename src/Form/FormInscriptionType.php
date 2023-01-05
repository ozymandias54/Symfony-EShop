<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormInscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class)
            ->add('lastname', TextType::class, [
                'label' => 'Prenom'
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Nom'
            ])
            ->add(
                'password',
                RepeatedType::class,
                [
                    'type' => PasswordType::class,
                    'invalid_message' => 'Le Mot de Passe et la confirmation doivent etre identique',
                    'label' => 'Mot de Passe',
                    'required' => true,
                    'first_options' => ['label' => 'Mot de Passe'],
                    'second_options' => ['label' => 'Confirmer Mot de Passe'],
                ]
            )
            ->add('submit', SubmitType::class, [
                'label' => 'S\' inscrire'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
