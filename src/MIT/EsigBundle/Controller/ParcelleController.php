<?php

namespace MIT\EsigBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use MIT\EsigBundle\Form\CreateParcelle;
use MIT\EsigBundle\Entity\parcelle;

class ParcelleController extends Controller
{
    public function indexAction()
    {
       $em = $this->getDoctrine()->getManager();
       $parcelles=$em ->getRepository('EsigBundle:parcelle')->findAll();   
        if($parcelles === null)
        {
            throw $this->createNotFoundException('Il faut ajouter une parcelle !!');
        }
        return $this->render('EsigBundle:Parcelles:index.html.twig',array('parcelles' => $parcelles,));
    }
    
    public function createParcelleAction()
    {
        $parcelle=new parcelle;
        $form=$this->createForm(new CreateParcelle(), $parcelle);
         $request = $this->get('request');
        if( $request->getMethod() == 'POST' )
        {
            $form->bind($request);
            if ($form->isValid()) 
            {
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($parcelle);
                $em->flush();

                $this->get('session')->getFlashBag()->add('notice', 'Parcelle enregistrée');
                return $this->redirect( $this->generateUrl('parcelles') );
            }
        }
        // Si on n'est pas en POST, alors on affiche le formulaire
        return $this->render('EsigBundle:Parcelles:createParcelle.html.twig',array('form' => $form->createView(),));
  

           
           
    }

}
