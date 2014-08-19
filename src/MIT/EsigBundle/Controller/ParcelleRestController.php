<?php

namespace MIT\EsigBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ParcelleRestController extends Controller
{
    /*
     * return all parcelles in an array
     * @return array
     */
    public function getParcellesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $parcelles = $em->getRepository('EsigBundle:Parcelle')->findAll();
        
        if($parcelles){
            return $parcelles;
        } else{ 
            return null;
        }
    }
    
    
    /*
     * @param integer $id 
     * return the parcelle matching the given ID
     * @return array
     */
    public function getParcelleAction($id) {
        $em = $this->getDoctrine()->getManager();
        
        $parcelle = $em->getRepository('EsigBundle:Parcelle')->find($id);
        
        if($parcelle){
            return $parcelle;
        } else{ 
            return null;
        }
    }
}
