<?php

namespace App\Controller;

use App\Entity\Actu;
use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(EntityManagerInterface $em): Response
    {
        $promos = $em->getRepository(Produit::class)->findBy(['isPromo' => 'true'], ['id' => 'DESC']);
        $actus = $em->getRepository(Actu::class)->findBy(['isOnline' => 'true'], ['id' => 'DESC']);

        return $this->render(
            'homepage.html.twig',
            compact('promos', 'actus'),
        );
    }
}
