<?php

namespace App\Controller;

use App\Entity\Image;
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
     * @Route("/acceuil/{id}", name="acceuil")
     */
    public function acceuil($id): Response
    {
        $repository=$this->getDoctrine()->getManager()->getRepository(Job::class);

        $job=$repository->find($id);
        return $this->render('job/acceuil.html.twig', [

            'controller_name' => 'JobController',
            'job'=>$job,
        ]);
    }
   
   
    /**
     * @Route("/voir/{id}", name="voir",requirements={"id"="\d+"})
     */
  //  public function voir( ): Response
    //{
       // return $this->render('job/index.html.twig', [
        //    'controller_name' => 'JobController',
        //]);

  //  }


     /**
     * @Route("/ajouter", name="ajouter")
     */
    public function ajouter(): Response
    {$img=new Image();
        $img->setUrl('https://symfony.com/logos/symfony_black_03.png');
        $img->setAlt('my logo');
        $em=$this->getDoctrine()->getManager();
$em->persist($img);
$em->flush();

$job=new Job();
$job->setTitle('developpeur symfony');
$job->setCompany('sloth-lab');
$job->setDescription('nous recherchons un developpeur symfony expert disponible sur sousse');
$job->setIsactivated(1);
$job->setExpiresat(new \DateTime());

// $job->setEmail('iheb.chebil@hotmail.fr');
$job->setImage($img);

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
