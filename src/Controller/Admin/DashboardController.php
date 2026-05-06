<?php

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;

use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

use App\Controller\Admin\PhotoCrudController;
use App\Controller\Admin\CategoryCrudController;
use App\Controller\Admin\UserCrudController;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        return $this->redirect(
            $adminUrlGenerator
                ->setController(PhotoCrudController::class)
                ->generateUrl()
        );
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Focusgallery');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute(
            'Site principal',
            'fa fa-home',
            'app_home'
        );

        yield MenuItem::section('Gestion galerie');

        yield MenuItem::linkTo(
            PhotoCrudController::class,
            'Photos',
            'fas fa-image'
        );

        yield MenuItem::linkTo(
            CategoryCrudController::class,
            'Categories',
            'fas fa-tags'
        );

        yield MenuItem::section('Utilisateurs');

        yield MenuItem::linkTo(
            UserCrudController::class,
            'Users',
            'fas fa-users'
        );
    }
}