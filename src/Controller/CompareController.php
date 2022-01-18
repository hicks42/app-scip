<?php

namespace App\Controller;

use App\Classe\Compare;
use App\Entity\Produit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CompareController extends AbstractController
{
  private $em;

  public function __construct(EntityManagerInterface $em)
  {
    $this->em = $em;
  }

  /**
   * @Route("/comparateur", name="Compare", methods="GET")
   */
  public function index(Compare $compare)
  {
    $compareDetail = [];
    // dd($compare);
    foreach ($compare->get() as $id) {
      $compareDetail[] = [
        'produit' => $this->em->getRepository(Produit::class)->findOneById($id),
      ];
    }
    // dd($compareDetail);

    return $this->render('compare.html.twig', [
      'compare' => $compareDetail
    ]);
  }

  /**
   * @Route("/compare/add/{id}", name="add_to_compare")
   */
  public function add(Compare $compare, $id)
  {
    $compare->add($id);

    return $this->redirectToRoute('compare');
  }

  /**
   * @Route("/compare/erase", name="erase_compare")
   */
  public function remove(Compare $compare)
  {
    $compare->remove();

    return $this->redirectToRoute('homepage');
  }
}
