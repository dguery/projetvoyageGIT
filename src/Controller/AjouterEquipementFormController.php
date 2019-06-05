<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Equipement;
use App\Form\AjouterEquipementType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjouterEquipementFormController extends AbstractController
{
    /**
     * @Route("/ajouter/equipement/form", name="ajout_equipement_form")
     */
    public function index(Request $request)
    {
        $unequipement = new Equipement();
        $form = $this->createForm(AjouterEquipementType::class, $unequipement);
        $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
            $unequipement = $form->getData();
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($unequipement);
        $entityManager->flush();
        return $this->redirectToRoute("confirmation_equipement");
    }
        return $this->render('ajouter_equipement_form/index.html.twig', array( 'form' => $form->createView()));
    }
}
