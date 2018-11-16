<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MonController extends Controller
{
    /**
     * @Route("/index/{nom}/{prenom}")
     */
    public function indexAction(Request $request,$nom,$prenom)
    {
        $session = $request->getSession();
        $session->set('test','test');
        $session->getFlashBag()->add('success','it\'s ok');
        $session->getFlashBag()->add('info','Session initialisée avec succès :D');
//        $session->getFlashBag()->add('error','it\'s  ! ok');
//        $session->getFlashBag()->add('info','i dont catre');
        return $this->render('@App/Mon/index.html.twig',array(
            'monNom'=>$nom,
            'monPrenom'=>$prenom,
        ));
    }

}
