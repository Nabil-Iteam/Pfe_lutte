<?php

namespace App\Controller\Admin;
use App\Entity\Category;
use App\Entity\Product;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        
        return $this->render('admin/index.html.twig');

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // the name visible to end users
            // you can include HTML contents too (e.g. to link to an image)

            // by default EasyAdmin displays a black square as its default favicon;
            // use this method to display a custom favicon: the given path is passed
            // "as is" to the Twig asset() function:
            // <link rel="shortcut icon" href="{{ asset('...') }}">

            // the domain used by default is 'messages'

            // there's no need to define the "text direction" explicitly because
            // its default value is inferred dynamically from the user locale
           

            // set this option if you prefer the page content to span the entire
            // browser width, instead of the default design which sets a max width

            // set this option if you prefer the sidebar (which contains the main menu)
            // to be displayed as a narrow column instead of the default expanded design

            // by default, users can select between a "light" and "dark" mode for the
            // backend interface. Call this method if you prefer to disable the "dark"
            // mode for any reason (e.g. if your interface customizations are not ready for it)

            // by default, all backend URLs are generated as absolute URLs. If you
            // need to generate relative URLs instead, call this method
        ;
    }


    public function configureMenuItems(): iterable
    {
        return [
           yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

           yield MenuItem::section('category'),
           yield MenuItem::linkToCrud('Category', 'fa fa-tags', Category::class),

           yield MenuItem::section('product'),
           yield MenuItem::linkToCrud('product', 'fa fa-comment', Product::class),
        ];
    }
}
