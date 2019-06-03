<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Avis; //à ne pas oublier
use App\Entity\Membre;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Validator\Constraints\DateTime;

class AjoutAvisController extends AbstractController
{
    /**
     * @Route("/ajoutAvis", name="ajout_avis")
     */
    public function index(Request $request)
    {
      // Création de l'entité
      $avis = new Avis();
        $avis->setTitre($request->get("titre"));
        $avis->setNote($request->get("note"));
        $avis->setDate(new \DateTime());
        $avis->setCommentaire($request->get("commentaire"));

      $idMembre = $request->get("idMembre");
      $membre = $this->getDoctrine()
        ->getRepository(membre::class)
        ->find($idMembre);

      $avis->setUnMembre($membre);

      //Récupération de l’EntityManager
      $em = $this->getDoctrine()->getManager();

      //gestion de $membre par l’ORM
      $em->persist($avis);

      //l’ORM regarde les objets qu’il gère pour savoir s’ils doivent être persistés
      $em->flush();
      //redirection ou affichage d’une vue
      //return new Response(" Un nouvel avis: '".$avis->getTitre()."' à été ajouté par le membre ".$avis->getUnMembre()->getPrenom());
      $monArray = array('titre' => $avis->getTitre(),
                        'note' => $avis->getNote(),
                        'date' => $avis->getDate()->format('Y-m-d'),
                        'commentaire' => $avis->getCommentaire(),
                        'nom' => $avis->getUnMembre()->getNom(),
                        'prenom' => $avis->getUnMembre()->getPrenom(),
                        'email' => $avis->getUnMembre()->getEmail(),
                        'avis' => $avis);

      return $this->render('ajout_avis\index.html.twig', $monArray);
    }
}
