<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home_page")
     */
    public function homeAction(): Response
    {
        return $this->render('Home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    /**
     * @Route("/home", name="home_page")
     */
    public function showProductAction(ProductRepository $repo): Response
    {
        $product = $repo->findAll();
        return $this->render('Home/index.html.twig',[
            'product'=> $product
        ]);
    }
}
