<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/bonjour", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/premiertest/{name}/{prenom}", name="premiertest")
     */
    public function premierAction(Request $request, $name, $prenom) {
        dump($request);
        dump($name, $prenom); die();
       return $this->render("@App/mesFichiers/index.html.twig");
    }

    /**
     * @Route("/test", name="test-action")
     */
    public function testRouteAction(){
       $tab = array('aymen',
                    'ahmed',
                    'dhia',
                    'Mohamed',
                    'Fathi',
           );
       return $this->render('@App/mesFichiers/index.html.twig',array(
           'tableau'=>$tab
       ));
    }


}
