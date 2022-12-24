<?php

namespace App\Controller\Admin;

use App\Entity\CouponsTypes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CouponsTypesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CouponsTypes::class;
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
