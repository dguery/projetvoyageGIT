<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(Request $request):Response {
        return $this->render("/admin/index.html.twig");
    }

    /**
   * @Route ("/voyage/{valeur}")
   */
   public function voyage($valeur){
     $nom = "inconnu";
     if($valeur == "admin") $nom = "visiteur";
     return $this->redirect($this->generateUrl('voyage', array('nom'=> $nom)));
   }
}
