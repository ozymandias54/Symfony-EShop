<?php

namespace App\Controller\Admin;

use App\Entity\Coupons;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CouponsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Coupons::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('code'),
            TextareaField::new('description'),
            NumberField::new('discount'),
            NumberField::new('maxUsage'),
            AssociationField::new('couponsTypes'),
            DateField::new('validity', 'Date de validité'),
            DateTimeField::new('createAt')->hideOnForm(),
            BooleanField::new('isValid', 'Valide'),
        ];
    }
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $entityInstance->setCreateAt(new \DateTimeImmutable);
        parent::persistEntity($entityManager, $entityInstance);
    }
}
