<?php

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Entity\Menu;
use App\Form\MenuType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


/**
 * Liste des controleurs des pages ppales du site web. Le nom doit touours etre identique au nom du fichier
 */
class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index()
    {
        // Cette page appellera la vue templates/main/index.html.twig
        return $this->render('main/index.html.twig');
    }

    /**
     * @Route("/menu", name="menu")
     */
    public function menu()
    {

        // Cette page appellera la vue templates/main/menu.html.twig
        return $this->render('main/menu.html.twig');
    }

    /**
     * @Route("/location", name="location")
     */
    public function location()
    {

        // Cette page appellera la vue templates/main/location.html.twig
        return $this->render('main/location.html.twig');
    }

     /**
     * @Route("/card", name="card")
     */
    public function card()
    {

        // Cette page appellera la vue templates/main/card.html.twig
        return $this->render('main/card.html.twig');
    }

    /**
     * @Route("/presentation", name="presentation")
     */
    public function presentation()
    {

        // Cette page appellera la vue templates/main/presentation.html.twig
        return $this->render('main/presentation.html.twig');
    }

    /**
     * @Route("/reservation", name="reservation")
     */
    public function reservation()
    {

        // Cette page appellera la vue templates/main/reservation.html.twig
        return $this->render('main/reservation.html.twig');
    }

    
 
}
