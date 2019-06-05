<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmationEquipementController extends AbstractController
{
    /**
     * @Route("/confirmation/equipement", name="confirmation_equipement")
     */
    public function index()
    {
        return $this->render('confirmation_equipement/index.html.twig', [
            'controller_name' => 'ConfirmationEquipementController',
        ]);
    }
}
