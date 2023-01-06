<?php

namespace App\Controller\Admin;

use App\Entity\Deliveries;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DeliveriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Deliveries::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
