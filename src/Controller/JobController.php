<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobController extends AbstractController
{
    /**
     * @Route("/job", name="job")
     */
    
    
    public function index(): Response
    {
        return $this->render('job/index.html.twig', [
            'controller_name' => 'JobController',
        ]);
    }
    /**
     * @Route("/acceuil", name="acceuil")
     */
    public function acceuil(): Response
    {
        return $this->render('job/acceuil.html.twig', [
            'controller_name' => 'JobController',
        ]);
    }
   
   
    /**
     * @Route("/voir/{id}", name="voir",requirements={"id"="\d+"})
     */
    public function voir( $id): Response
    {
       // return $this->render('job/index.html.twig', [
        //    'controller_name' => 'JobController',
        //]);
        return new Response("details de la fonction voir ".$id);
    }


     /**
     * @Route("/ajouter", name="ajouter")
     */
    public function ajouter(): Response
    {
        return $this->render('job/ajouter.html.twig', [
            'controller_name' => 'JobController',

            
        ]);
    }


public function menu():response
{
$mymenu=array(
['route'=>'job','intitule' => 'Acceuil'],
['route'=>'ajouter','intitule' => 'Ajouter'],
['route'=>'list','intitule' => 'AFFICHER TOUS LES JOBS'],


);
return $this->render('job/menu.html.twig',['mymenu'=>$mymenu]);
}
public function menuvertical():response
{
$listjobs=array(
['id'=>'1','nomjob' => 'Developpeur web'],
['id'=>'2','nomjob' => 'Responsable marketing '],
['id'=>'3','nomjob' => 'Team Leader'],


);
return $this->render('job/sidebar.html.twig',['mymenu'=>$listjobs]);
}

}
