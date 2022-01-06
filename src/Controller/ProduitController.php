<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitController extends AbstractController
{

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/produits", name="produits")
     */
    public function index(ProduitRepository $repo): Response
    {
        $produits = $repo->findAll();
        return $this->render('produit/produits.html.twig', compact('produits'),
        );
    }
}
