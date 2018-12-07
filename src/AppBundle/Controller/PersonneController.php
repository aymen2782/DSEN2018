<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Personne;
use AppBundle\Service\MailerService;
use AppBundle\Service\PdfService;
use AppBundle\Service\UtilitiesService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class PersonneController
 * @package AppBundle\Controller
 * @Route("/personne")
 */
class PersonneController extends Controller
{
    /**
     * @Route("/list", name="liste-personne")
     */
    public function listAction(LoggerInterface $logger, UtilitiesService $utilitiesService, PdfService $pdfService)
    {
        //Récupérer Répository
        $repository = $this->getDoctrine()->getRepository('AppBundle:Personne');
        //Récupérer la liste des personnes
        $personnes = $repository->findAll();

        $logger->alert('Liste des personnes affichée'.$utilitiesService->getRandomString(6));
        //$personnes = $repository->findBy(array(),array('name'=>'desc'),($page-1)*10,10);
        return $this->render('@App/Personne/list.html.twig', array(
            'personnes'=>$personnes,
        //    'nbPages'=>count($personnes)/10
        ));
    }

    /**
     * @Route("/listPdf",name="personne.list.pdf")
     */
     public function pdfListAction(PdfService $pdfService, MailerService $mailerService) {
         //Récupérer Répository
         $repository = $this->getDoctrine()->getRepository('AppBundle:Personne');
         //Récupérer la liste des personnes
         $personnes = $repository->findAll();

         $pdfService->create();
         $template = $this->renderView('@App/Personne/personnePdf.html.twig',array(
             'personnes'=>$personnes
         ));
         $attachement = $pdfService->generatePdf($template,'test');
         dump($attachement);
         die();
         $mailerService->sendMessage('Bonjour','aymen.sellaouti@gmail.com',false);
         return $this->render('@App/Personne/list.html.twig',array(
             'personnes'=>$personnes
         ));
     }

    /**
     * @param $name
     * @param $firstName
     * @param $age
     *
     * @Route("/add/{name}/{firstName}/{age}",name="add-personne")
     */
    public function addAction($name,$firstName, $age){
        $personne = new Personne($name,$firstName,$age);

        $em = $this->getDoctrine()->getManager();

        //ajoute personne dans la transaction
        $em->persist($personne);

        //Commit
        $em->flush();
        return $this->forward('AppBundle:Personne:list');
    }

    /**
     * @Route("/listAge/{min}/{max}", name="liste-personne-age")
     */
    public function listAgeAction($min,$max)
    {
        //Récupérer Répository
        $repository = $this->getDoctrine()->getRepository('AppBundle:Personne');
        //Récupérer la liste des personnes
        $personnes = $repository->getPersonnesByAgeInterval($min,$max);

        //$personnes = $repository->findBy(array(),array('name'=>'desc'),($page-1)*10,10);
        return $this->render('@App/Personne/list.html.twig', array(
            'personnes'=>$personnes,
            //    'nbPages'=>count($personnes)/10
        ));
    }

}
