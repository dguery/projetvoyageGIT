<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DifferentsAffichagesController extends AbstractController
{
    /**
     * @Route("/differents/affichages", name="differents_affichages")
     */
    public function index()
    {
        return $this->render('differents_affichages/index.html.twig', [
            'controller_name' => 'DifferentsAffichagesController',
        ]);
    }
}
