<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Membre;
use App\Form\AjouterMembreType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjouterMembreV2FormController extends AbstractController
{
    /**
     * @Route("/ajouter/membre/v2/form", name="ajouter_membre_v2")
     */
    public function index(Request $request)
    {
        $unmembre = new Membre();
        $form = $this->createForm(AjouterMembreType::class, $unmembre);
        $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
            $unmembre = $form->getData();
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($unmembre);
        $entityManager->flush();
        return new Response('le membre a été enrengistré');
    }
        return $this->render('ajouter_membre_v2_form/index.html.twig', array( 'form' => $form->createView()));
    }
}
