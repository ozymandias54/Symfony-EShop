<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PasswordEditeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'disabled' => true
            ])
            ->add('oldpassword', PasswordType::class, [
                'label' => 'Mot de passe actuel',
                'mapped' => false
            ])
            ->add(
                'newpassword',
                RepeatedType::class,
                [
                    'type' => PasswordType::class,
                    'invalid_message' => 'Le Mot de Passe et la confirmation doivent etre identique',
                    'label' => 'Le nouveau Mot de Passe',
                    'mapped' => false,
                    'required' => true,
                    'first_options' => ['label' => 'Le nouveau Mot de Passe'],
                    'second_options' => ['label' => 'Confirmer le nouveau Mot de Passe'],
                ]
            )
            ->add('submit', SubmitType::class, [
                'label' => 'Editer'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
