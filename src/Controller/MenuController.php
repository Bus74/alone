<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\Menu;

use App\Entity\User;
use App\Form\MenuType;
use App\Repository\MenuRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


/**
 * Liste des controleurs des pages ppales du site web. Le nom doit touours etre identique au nom du fichier
 */
class MenuController extends AbstractController
{


    /**
     * @Route("/creer-le-menu", name="createMenu")
     * @Security("is_granted('ROLE_USER')")
     */
    public function createMenu(Request $request){

        // Création d'un nouvel objet de la classe Menu, vide pour le moment
        $newMenu = new Menu();

        // Création d'un nouveau formulaire à partir de notre formulaire MenuType et de notre nouvel "article" encore vide
        $form = $this->createForm(MenuType::class, $newMenu);

        // Symfony va remplir $newMenu grâce aux données du formulaire envoyé (accessibles dans l'objet Request, c'est pour ça qu'on doit lui donner)
        $form->handleRequest($request);

        // Pour savoir si le formulaire a été envoyé, on a accès à cette condition :
            if($form->isSubmitted() && $form->isValid()){

                // Si le formulaire a été envoyé, on dump notre "article", qui est pré-rempli automatiquement avec les données provenant du formulaire !
                //dump($newMenu);

                $newMenu->setAuthor($this->getUser());
                // récupération du manager des entités et sauvegarde en BDD de $newMenu
                $em = $this->getDoctrine()->getManager();

                $em->persist($newMenu);

                $em->flush();

                // Création d'un flash message de type "success"
                $this->addFlash('success', 'Menu créé avec succès !');

                // Redirection de l'utilisateur sur la route "home" (la page d'accueil)
                return $this->redirectToRoute('main');
            }

        // Pour que la vue puisse afficher le formulaire, on doit lui envoyer le formulaire généré, avec $form->createView()
        return $this->render('main/createMenu.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * Page d'affichage du menu
     *
     * @Route("/menu/{slug}/", name="menuView")
     */
    public function menuView(Menu $menu, Request $request)
    {

         // Récupération de l'user actuellement connecté
         $userConnected = $this->getUser();
         
        return $this->render('menu/menuView.html.twig',[
        'menu' => $menu,
        ]);
    }    
}