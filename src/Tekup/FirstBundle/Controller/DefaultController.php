<?php

namespace Tekup\FirstBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@TekupFirst\Default\index.html.twig');
    }
}
