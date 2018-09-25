<?php

namespace Tekup\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    /**
     * @Route("/list")
     */
    public function listAction(Request $request)
    {
        // je récupére ma session
        $session = $request->getSession();
        // je vérifie si j'ai la variable users dans ma session
        if (!$session->has('users')) {
            // Si non
            // je prépare ma variable et je l'insére dans ma session
            $users = array(
                'aymen2782'=>'aymen sellaouti',
                'ahmedbs'=>'ahmed ben slimen',
            );
            $session->set('users',$users);
            $session->getFlashBag()->add('info',"List created with success :D");


        }
                   // si oui j'affiche la liste
        return $this->render('@TekupUsers\Users\list.html.twig');
    }

    /**
     * @Route("/add/{username}/{name}")
     */
    public function addAction(Request $request, $username, $name) {
        // je récupére ma session
        $session = $request->getSession();
        //je vérifie la variable users
        if ($session->has('users')){
            // si oui
            $users = $session->get('users');
            // je vérifie si le username existe ou pas
            if (isset($users[$username])){
                // si il existe j affiche un message d'erreur
                $session->getFlashBag()->add('error','Username existant :(');
            } else {
                // si non je l'ajoute
                $users[$username]=$name;
                $session->set('users',$users);
                $session->getFlashBag()->add('success',"User  $username created with success :D");
            }
        } else {
            $session->getFlashBag()->add('error','The User list not found existant :(');
        }

        return $this->forward('TekupUsersBundle:Users:list');
    }

}
