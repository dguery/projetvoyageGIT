<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Membre; //à ne pas oublier
use Symfony\Component\HttpFoundation\Response;

class AfficherMembreController extends AbstractController {
  /**
  * @Route("/afficherUnMembre/{id}", name="affiche_unmembre")
  */
  public function unMembre($id) {
    $membre = $this->getDoctrine()
    ->getRepository(membre::class)
    ->find($id);
    if (!$membre) {
      throw $this->createNotFoundException( 'pas de membre trouvé pour identifiant '.$id );
    }else {
      return new Response('voici le membre: '.$membre->getNom());}
    }
    /**
    * @Route("/afficher/lesmembres")
    */
    public function lesMembres() {
      $membre = $this->getDoctrine()
      ->getRepository(membre::class)
      ->findAll();
      $return = "";
      if (!$membre) {
        throw $this->createNotFoundException( 'pas de membres trouvé' );
      }else {
        foreach ($membre as $unMembre) {
          $return .= 'voici le membre: '.$unMembre->getNom()."<br/>";
        }
      }
        return new Response($return);
      }
  }
  ?>
