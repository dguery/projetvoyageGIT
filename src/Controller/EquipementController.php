<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Etablissement;
use App\Entity\Equipement;

class EquipementController extends AbstractController {
    /**
     * @Route("/etablissement/ajoutEquipement/{libelle}", name="equipement")
     */
    public function etablissementAjoutEquipement($libelle) {
      //vas chercher notre établissement
      $etablissement = $this->getDoctrine()
        ->getRepository(etablissement::class)
        ->find(1);

      $equipement = new Equipement();
      $equipement->setLibelle($libelle);

      $etablissement->addLesEquipement($equipement);

      $em = $this->getDoctrine()->getManager();

      //gestion de $membre par l’ORM
      $em->persist($equipement);
      $em->persist($etablissement);

      $em->flush();


      $monArray = array('equipement' => $equipement,
                        'etablissement' => $etablissement);
      return $this->render('equipement\ajoutEquipement.html.twig', $monArray);
    }

    /**
     * @Route("/equipement/ajoutEtablissement/{id}", name="etablissement")
     */
    public function equipementAjoutEtablissement($id) {
      //vas chercher notre établissement
      $etablissement = $this->getDoctrine()
        ->getRepository(etablissement::class)
        ->find($id);

      $equipement = $this->getDoctrine()
        ->getRepository(equipement::class)
        ->find(2);

      $equipement->addLesEtablissement($etablissement);

      $em = $this->getDoctrine()->getManager();

      //gestion de $membre par l’ORM
      $em->persist($equipement);
      $em->persist($etablissement);

      //$em->flush();


      $monArray = array('equipement' => $equipement,
                        'etablissement' => $etablissement);
      return $this->render('equipement\ajoutEtablissementEquipement.html.twig', $monArray);
    }
}
