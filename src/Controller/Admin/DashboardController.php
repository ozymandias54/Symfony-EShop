<?php

namespace App\Controller\Admin;

use App\Entity\Arrivals;
use App\Entity\ArrivalsDetails;
use App\Entity\Categories;
use App\Entity\Coupons;
use App\Entity\CouponsTypes;
use App\Entity\Customers;
use App\Entity\Deliveries;
use App\Entity\Products;
use App\Entity\User;
use App\Entity\Images;
use App\Entity\Orders;
use App\Entity\OrdersDetails;
use App\Entity\Payments;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('EShop:boutique en ligne');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Clients', 'fas fa-users', Customers::class);
        yield MenuItem::linkToCrud('Categories', 'fas fa-tag', Categories::class);
        yield MenuItem::linkToCrud('Image', 'fas fa-database', Images::class);
        yield MenuItem::linkToCrud('Produit', 'fas fa-list', Products::class);
        yield MenuItem::linkToCrud('Type de Coupon', 'fas fa-list', CouponsTypes::class);
        yield MenuItem::linkToCrud('Coupon', 'fas fa-list', Coupons::class);
        yield MenuItem::linkToCrud('Livraisons', 'fas fa-list', Deliveries::class);
        yield MenuItem::linkToCrud('ArrivalsDetails', 'fas fa-list', ArrivalsDetails::class);
        yield MenuItem::linkToCrud('Arrivals', 'fas fa-list', Arrivals::class);
        yield MenuItem::linkToCrud('Orders', 'fas fa-list', Orders::class);
        yield MenuItem::linkToCrud('OrdersDetails', 'fas fa-list', OrdersDetails::class);
        yield MenuItem::linkToCrud('Payements', 'fas fa-list', Payments::class);
    }
}
