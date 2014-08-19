<?php

namespace MIT\EsigBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->render('EsigBundle:Dashboard:index.html.twig', array(
                // ...
            ));    }

}
