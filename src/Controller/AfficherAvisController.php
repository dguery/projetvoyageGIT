<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Avis;
use Symfony\Component\HttpFoundation\Response;


class AfficherAvisController extends AbstractController {
    /**
     * @Route("/afficher/avis/{id}")
     */
    public function index($id) {
      $avis = $this->getDoctrine()
        ->getRepository(avis::class)
        ->find($id);

        $monArray = array('avis' => $avis);
        return $this->render('afficher_avis\index.html.twig', $monArray);
    }
}
