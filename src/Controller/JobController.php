<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Job;

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
$job=new Job();
$job->setTitle('developpeur symfony');
$job->setCompany('sloth-lab');
$job->setDescription('nous recherchons un developpeur symfony expert disponible sur sousse');
$job->setIsactivated(1);
$job->setExpiresat(new \DateTime());
// $job->setEmail('iheb.chebil@hotmail.fr');


$em=$this->getDoctrine()->getManager();
$em->persist($job);
$em->flush();


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
return $this->render('job/sidebar.html.twig',['listjobs'=>$listjobs]);
}

}
