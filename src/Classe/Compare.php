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
    $size = count((is_countable($compare) ? $compare : []));

    if(!in_array($id, $compare)){
      if($size >2) {
        array_shift($compare);
      }
      $compare[] = $id;
    }

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
