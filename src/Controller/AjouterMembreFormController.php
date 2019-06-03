<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Membre;
use App\Form\AjouterMembreType;

class AjouterMembreFormController extends AbstractController
{
    /**
     * @Route("/ajouter/membre/form", name="ajouter_membre_form")
     */
    public function index()
    {
        $unmembre = new Membre();
        $form = $this->createForm(AjouterMembreType::class, $unmembre);
        return $this->render('ajouter_membre_form/index.html.twig', array('form' =>$form->createView()));
    }
}
