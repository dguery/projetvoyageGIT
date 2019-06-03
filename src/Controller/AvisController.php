<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    /**
     * @Route("/voyage/avis/{nombre}")
     */
    public function index($nombre) {
        return $this->render("/avis/index.html.twig", ["nombre" => $nombre]);
    }
}
