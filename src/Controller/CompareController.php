<?php

namespace App\Controller;

use App\Classe\Compare;
use App\Entity\Produit;
use App\Service\NameFormater;
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
  public function view($str, NameFormater $nameFormat)
  {
    $directfields = $this->em->getClassMetadata(Produit::class)->getFieldNames();
    array_shift($directfields);
    array_splice($directfields, -2);
    $temparray = array_diff($directfields, ["slug", "imageName", "isPromo"]);
    $assocfields = $this->em->getClassMetadata(Produit::class)->getAssociationNames();
    $allfields = array_merge($temparray, $assocfields);

    foreach ($allfields as $field) {
      $fieldnames[] = $this->snakeToCamel($field);
    }

    $olCatKey = array_search('categorie', $allfields);
    $newCatKey = array_search('soc_gest', $allfields) + 1;
    $this->moveElement($fieldnames, $olCatKey, $newCatKey);

    $olPerfdKey = array_search('performances', $allfields);
    $newPerfKey = array_search('nb_assoc', $allfields) + 1;
    $this->moveElement($fieldnames, $olPerfdKey, $newPerfKey);

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
    return $this->render('produit/compare.html.twig', [
      'compare' => $compareDetail,
      'fieldnames' => $fieldnames,
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

    return $this->render('produit/compare.html.twig', [
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

  private function moveElement(&$array, $a, $b)
  {
    $out = array_splice($array, $a, 1);
    array_splice($array, $b, 0, $out);
  }

  function camel_to_snake($input)
  {
    return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
  }

  function snakeToCamel($input)
  {
    return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $input))));
  }
}
