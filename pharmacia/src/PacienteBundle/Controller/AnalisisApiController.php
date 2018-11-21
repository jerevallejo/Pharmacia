<?php

namespace PacienteBundle\Controller;

use PacienteBundle\Entity\Analisis;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class AnalisisApiController extends Controller
{
	 /**
     * @Route("analisis/api/analisis/list", name="analisis_api_analisis_list")
     * @Method("GET")
     */
    public function listAction()
    {	
    	$em = $this->getDoctrine()->getManager();

        $analisis = $em->getRepository('PacienteBundle:Analisis')->findAll();
        
        $response= new Response();
        $response->headers->add([
                                    'Content-Type' => 'application/json'
                                ]);
        $response->setContent(json_encode($analisis));
        return $response;
    }

	/**
	 *@Route("/analisis/api/add", name="analisis_api_add")
	 *@Method("POST")
	 */
	public function addAction(Request $r){
		$analisis = new Analisis();
		$form = $this->createForm(
			'PacienteBundle\Form\AnalisisApiType',
			$analisis,
			[
				'csrf_protection' => false
			]
		);

		$form->bind($r);

		$valid = $form->isValid();

		$response = new Response();

		if(false === $valid)
		{
			$response->setStatusCode(400);
			$response->setContent(json_encode($this->getFormErrors($form)));

			return $response;
		}

		if (true === $valid)
		{
			$em = $this->getDoctrine()->getManager();
			$em->persist($analisis);
			$em->flush();
			$response->setContent(json_encode($analisis));
		}

		return $response;
	}
//funcion para obtener los errores de un formulario
	public function getFormErrors($form)
	{
		$errors = [];

		if (0 === $form->count())
		{
			return $errors;
		}

		foreach ($form->all() as $child)
		 {
			if (!$child->isValid()) 
			{
				$errors[$child->getName()] = (string) $form[$child->getName()]->getErrors();
			}
		}

		return $errors;
	}


}