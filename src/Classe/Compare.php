<?php

namespace App\Classe;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Compare
{
  public function __construct(SessionInterface $session)
  {
    $this->session = $session;
  }

  public function add($id)
  {
    $compare = $this->session->get('compare', []);

    if (!empty($compare[$id])) {
      $compare[$id];
    } else {
      $compare[$id] = 1;
    }

    // dd($compare); #/works
    $this->session->set('compare', $compare);
  }

  public function get()
  {
    return $this->session->get('compare');
  }

  public function remove()
  {
    $this->session->remove('compare');
  }
}
