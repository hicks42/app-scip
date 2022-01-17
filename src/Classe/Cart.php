<?php

namespace App\Classe;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Cart
{
  public function __construct(SessionInterface $session)
  {
    $this->session = $session;
  }

  public function add($id)
  {
    $cart = $this->session->get('cart', []);

    if(!empty($cart[$id]))
    {
      $cart[$id]++;
    } else {
      $cart[$id] = 1;
    }

    // dd($cart); #/works
    $this->session->set('cart', $cart);
  }

  public function get()
  {
    return $this->session->get('cart');
  }

  public function remove()
  {
    $this->session->remove('cart');
  }
}
