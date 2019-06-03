<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Membre; //à ne pas oublier
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AjoutMembreController extends AbstractController {
 /**
 * @Route("/ajout/membre")
 */
 public function ajouterAction(Request $request) {
   // Création de l'entité
   $membre = new Membre();
   $membre->setNom($request->get("nom"));
   $membre->setPrenom($request->get("prenom"));
   $membre->setEmail($request->get("email"));

   //Récupération de l’EntityManager
   $em = $this->getDoctrine()->getManager();

   //gestion de $membre par l’ORM
   $em->persist($membre);

   //l’ORM regarde les objets qu’il gère pour savoir s’ils doivent être persistés
   $em->flush();
   //redirection ou affichage d’une vue
   return new Response($membre->getPrenom()." ".$membre->getNom()." a été enregistré dans la base de données avec l’id ".$membre->getId());
 }
}
?>
