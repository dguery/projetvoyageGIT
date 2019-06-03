<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class VoyageController extends AbstractController {
    /**
     * @Route("/voyage", name="voyage")
     */
    public function index(Request $request):Response {
        return $this->render("/voyage/index.html.twig",["nom"=>$request->get("nom", "inconnu"), "pays"=>$request->get("pays", "un pays")]);
    }
}
