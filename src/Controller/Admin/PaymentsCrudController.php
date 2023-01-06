<?php

namespace App\Controller\Admin;

use App\Entity\Payments;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PaymentsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Payments::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('ref'),
            TextField::new('mode'),
            AssociationField::new('orders'),
            TextField::new('details'),
            DateField::new('payedAt'),

        ];
    }
}
