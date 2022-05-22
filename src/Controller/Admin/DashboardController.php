<?php

namespace App\Controller\Admin;

use App\Entity\Actu;
use App\Entity\User;
use App\Entity\Produit;
use App\Entity\Categorie;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\ProduitCrudController;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    public function __construct(AdminUrlGenerator $adminUrlGen)
    {
        $this->adminUrlGen = $adminUrlGen;
    }
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // return parent::index();

        // redirect to some CRUD controller
        $routeBuilder = $this->adminUrlGen;

        return $this->redirect($routeBuilder->setController(ProduitCrudController::class)->generateUrl());

        // you can also redirect to different pages depending on the current user
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<a href="/">SCIP</a>');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Actus', 'fa fa-newspaper', Actu::class);
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Créer', 'fas fa-plus', Actu::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir', 'fas fa-eye', Actu::class)
        ]);

        yield MenuItem::section('Categories', 'fa fa-tag', Categorie::class);
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Créer', 'fas fa-plus', Categorie::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir', 'fas fa-eye', Categorie::class)
        ]);

        yield MenuItem::section('Produits', 'fa fa-box', Produit::class);
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Créer', 'fas fa-plus', Produit::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir', 'fas fa-eye', Produit::class)
        ]);

        yield MenuItem::section('Utilisateurs', 'fa fa-user', User::class);
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Créer', 'fas fa-plus', User::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir', 'fas fa-eye', User::class)
        ]);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', Entityclass::class);
    }
}
