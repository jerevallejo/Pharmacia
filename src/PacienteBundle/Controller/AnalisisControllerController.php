<?php

namespace PacienteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AnalisisControllerController extends Controller
{

	 /**
     * Lists all analisis entities.
     *
     * @Route("/", name="analisis_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $analisis = $em->getRepository('PacienteBundle:Analisis')->findAll();
        return $this->render('PacienteBundle:view:analisis:index.html.twig', array(
            'analisis' => $analisis,
        ));
    }

 




}
