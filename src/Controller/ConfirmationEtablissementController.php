<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmationEtablissementController extends AbstractController
{
    /**
     * @Route("/confirmation/etablissement", name="confirmation_etablissementt")
     */
    public function index()
    {
        return $this->render('c1onfirmation_etablissement/index.html.twig', [
            'controller_name' => 'ConfirmationEtablissementController',
        ]);
    }
}
