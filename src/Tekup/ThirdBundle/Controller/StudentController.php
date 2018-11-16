<?php

namespace Tekup\ThirdBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StudentController extends Controller
{
    public function indexAction()
    {
        return $this->render('TekupThirdBundle:Student:index.html.twig', array(
            // ...
        ));
    }

}
