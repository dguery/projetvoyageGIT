<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Etablissement;
use App\Form\AjouterEtablissementType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjouterEtablissementForm extends AbstractController
{
    /**
     * @Route("/ajouter/etablissement/form", name="ajouter_etablissement_form")
     */
    public function index(Request $request)
    {
        $unetablissement = new Etablissement();
        $form = $this->createForm(AjouterEtablissementType::class, $unetablissement);
        $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
            $unetablissement = $form->getData();
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($unetablissement);
        $entityManager->flush();
        return $this->redirectToRoute("confirmation_etablissement");
    }
        return $this->render('ajouter_etablissement_form/index.html.twig', array( 'form' => $form->createView()));
    }
}
