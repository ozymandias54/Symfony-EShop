<?php

namespace App\Controller\Admin;

use App\Entity\Alerts;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AlertsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Alerts::class;
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
