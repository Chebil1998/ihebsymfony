<?php

namespace App\Controller;
use App\Entity\Categorie;

use App\Entity\Condidature;
use App\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Job;
use App\Form\JobType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

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
    public function ajouter(Request $request)
    {
       /* $cat=new categorie();

$img=new Image();
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


$condidature=new Condidature();
        $condidature->setCondidat('yosra');
        $condidature->setContenu('je suis un déveeloppeur senior symfony');
        $condidature->setDate(new \DateTimeImmutable());
        $condidature->setJob($job);

        $condidature1=new Condidature();
        $condidature1->setCondidat('iheb');
        $condidature1->setContenu('je suis un déveeloppeur mineur symfony');
        $condidature1->setDate(new \DateTimeImmutable());
        $condidature1->setJob($job);
        $em->persist($condidature);
        $em->persist($condidature1);

$em=$this->getDoctrine()->getManager();
$em->persist($job);
$em->flush();*/
$job=new job();
// $form=$this->createFormBuilder($job)
// ->add('title',TextType::class)
// ->add('company',TextType::class)
// ->add('description',TextareaType::class)
// ->add('isActivated',CheckboxType::class)
// ->add('expiresAt',DateType::class)
// // ->add('email',TextType::class)
// ->add('save',SubmitType::class)
// ->getForm();
$form=$this->createForm(JobType::class,$job);

if($request->isMethod('POST'))
{$form->handleRequest($request);
if($form->isValid()){
    $entityManager=$this->getDoctrine()->getManager();
    $entityManager->persist($job);
    $entityManager->flush();
}}
        return $this->render('job/ajouter.html.twig', [
            'controller_name' => 'JobController',
            'form'=>$form->createView(),

            
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
