<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Avis;
use App\Form\AjouterAvisV1Type;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjouterAvisFormController extends AbstractController
{
    /**
     * @Route("/ajouter/avis/form", name="ajout_avis_form")
     */
    public function index(Request $request)
    {
        $unavis = new Avis();
        $form = $this->createForm(AjouterAvisV1Type::class, $unavis);
        $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
            $unavis = $form->getData();
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($unavis);
        $entityManager->flush();
        return $this->redirectToRoute("confirmation_avis");
    }
        return $this->render('ajouter_avis_form/index.html.twig', array( 'form' => $form->createView()));
    }
}
