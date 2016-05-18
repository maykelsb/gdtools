<?php

namespace ProjectBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\FOSRestController;

class DefaultController extends FOSRestController
{
	protected $data = [
		['id' => 1, 'name' => 'Guild Wars', 'description' => 'Um jogo de cartinhas para descobrir quem é o melhor gestor de guildas'],
		['id' => 2, 'name' => 'Zankar', 'description' => 'Um tower defense de tabuleiro com uma mecânica bizarra de movimentação'],
		['id' => 3, 'name' => 'Dragonaltas', 'description' => 'E então, você é o melhor piloto de dragão?'],
	];

    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('ProjectBundle:Default:index.html.twig');
    }

    /**
     * @Route("/projects")
     */
	public function getProjectsAction()
	{
		$view = View::create();
        return $view->setData($this->data);
	}

    /**
     * @Route("/projects/{id}")
     */
	public function getProjectAction($id)
	{
		$view = View::create();
		return $view->setData($this->data[$id])->handleView();
	}

    /**
     * @Route("/projects/{id}")
     * @Route("/projects")
     */
	public function postSaveProjectAction($id = null)
	{

	}

    /**
     * @Route("/projects/{id}")
     */
	public function putUpsertProjectAction($id)
	{
		
	}

    /**
     * @Route("/projects/{id}")
     */
	public function deleteProjectAction($id)
	{

	}
}
