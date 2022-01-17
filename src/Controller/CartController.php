<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Produit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/mon-panier", name="cart", methods="GET")
     */
    public function index(Cart $cart)
    {
        $cartDetail = [];
// dd($cart);
        foreach ($cart->get() as $id => $quantity){
            $cartDetail[] = [
                'produit' => $this->em->getRepository(Produit::class)->findOneById($id),
                'quantity' => $quantity,
            ];
        }
// dd($cartDetail);

        return $this->render('cart/cart.html.twig', [
            'cart' => $cartDetail
        ]);
    }

    /**
     * @Route("/cart/add/{id}", name="add_to_cart")
     */
    public function add(Cart $cart, $id)
    {
        $cart->add($id);

        return $this->redirectToRoute('cart');
    }

    /**
     * @Route("/cart/remove", name="remove_my_cart")
     */
    public function remove(Cart $cart)
    {
        $cart->remove();
        return $this->redirectToRoute('homepage');
    }
}
