<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmationMembreController extends AbstractController
{
    /**
     * @Route("/confirmation/membre", name="confirmation_membre")
     */
    public function index()
    {
        return $this->render('confirmation_membre/index.html.twig', [
            'controller_name' => 'ConfirmationMembreController',
        ]);
    }
}
