<?php

namespace Tekup\ThirdBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@TekupThird\Default\index.html.twig');
    }


}
