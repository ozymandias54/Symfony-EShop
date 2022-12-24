<?php

namespace App\Controller\Admin;

use App\Entity\ArrivalsDetails;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArrivalsDetailsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ArrivalsDetails::class;
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
