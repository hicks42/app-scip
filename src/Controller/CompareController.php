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
   * @Route("/comparator/{str}", name="compare_array", methods="GET")
   */
  public function view($str)
  {
    if (!is_null($str)) {
      $compareDetail = [];
      $produitsIds = explode(',', $str);
      // les compare de la session sont captés par l'ID et stocké ds compareDetail[]
      foreach ($produitsIds as $id) {
        $compareDetail[] = [
          'produit' => $this->em->getRepository(Produit::class)->findOneById($id),
        ];
      }
    } else {
      $compareDetail = null;
    }
    return $this->render('compare.html.twig', [
      'compare' => $compareDetail
    ]);
  }

  /**
   * @Route("/comparateur", name="compare", methods="GET")
   */
  public function index(Compare $compare)
  {
    if (!is_null($compare->get())) {

      $compareDetail = [];
      // les compare de la session sont captés par l'ID et stocké ds compareDetail[]
      foreach ($compare->get() as $id) {
        $compareDetail[] = [
          'produit' => $this->em->getRepository(Produit::class)->findOneById($id),
        ];
      }
    } else {
      $compareDetail = null;
    }

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

    return $this->redirectToRoute('produits');
  }
}
