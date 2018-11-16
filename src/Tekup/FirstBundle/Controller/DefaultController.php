<?php

namespace Tekup\FirstBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@TekupFirst\Default\index.html.twig');
    }

    public function testAction($nom,$prenom)
    {
        return $this->render('@App/Mon/index.html.twig',array(
            'monNom'=>$nom,
            'monPrenom'=>$prenom,
        ));
    }
}
