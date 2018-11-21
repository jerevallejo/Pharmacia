<?php

namespace PacienteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/paciente")
     */
    public function indexAction()
    {
        return $this->render('PacienteBundle:Default:index.html.twig');
    }
}
