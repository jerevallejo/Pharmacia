<?php

namespace PacienteBundle\Controller;

use PacienteBundle\Entity\Paciente;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class PacienteApiController extends Controller
{
	 /**
     * @Route("paciente/api/pacientes/list", name="paciente_api_pacientes_list")
     * @Method("GET")
     */
    public function listAction()
    {	
    	$em = $this->getDoctrine()->getManager();

        $pacientes = $em->getRepository('PacienteBundle:Paciente')->findAll();
        
        $response= new Response();
        $response->headers->add([
                                    'Content-Type' => 'application/json'
                                ]);
        $response->setContent(json_encode($pacientes));
        return $response;
    }

	/**
	 *@Route("/paciente/api/add", name="paciente_api_add")
	 *@Method("POST")
	 */
	public function addAction(Request $r){
		$paciente = new Paciente();
		$form = $this->createForm(
			'PacienteBundle\Form\PacienteApiType',
			$paciente,
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
			$em->persist($paciente);
			$em->flush();
			$response->setContent(json_encode($paciente));
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