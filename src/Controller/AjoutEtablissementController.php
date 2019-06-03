<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Avis;
use App\Entity\Etablissement;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AjoutEtablissementController extends AbstractController {
    /**
     * @Route("/ajoutEtablissement")
     */
    public function index(Request $request) {
      // Création de l'entité
      $etablissement = new Etablissement();
        $etablissement->setNom($request->get("nom"));
        $etablissement->setAdresse($request->get("adresse"));
        $etablissement->setTel($request->get("tel"));
        $etablissement->setEmail($request->get("email"));


      $idAvis = $request->get("idAvis");
      $avis = $this->getDoctrine()
        ->getRepository(avis::class)
        ->find($idAvis);

      //Récupération de l’EntityManager
      $em = $this->getDoctrine()->getManager();

      //gestion de $membre par l’ORM
      $em->persist($etablissement);

      //l’ORM regarde les objets qu’il gère pour savoir s’ils doivent être persistés
      $em->flush();
      //redirection ou affichage d’une vue
      $monArray = array('etablissement' => $etablissement,
                        'avis' => $avis);

      return $this->render('ajout_etablissement\index.html.twig', $monArray);
    }
}
