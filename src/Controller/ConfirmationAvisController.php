<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmationAvisController extends AbstractController
{
    /**
     * @Route("/confirmation/avis", name="confirmation_avis")
     */
    public function index()wtf
    {
        return $this->render('confirmation_avis/index.html.twig', [
            'controller_name' => 'ConfirmationAvisController',
        ]);
    }
}
