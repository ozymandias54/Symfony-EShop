<?php

namespace App\Controller\Admin;

use App\Entity\Images;
use App\Entity\Products;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ImagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Images::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            ImageField::new('file')
                ->setBasePath('upload/images/products')
                ->setUploadDir('public/upload/images/products')
                ->setUploadedFileNamePattern('[contenthash] . [extension]')
                ->setRequired(false),
            AssociationField::new('products')
        ];
    }
}
