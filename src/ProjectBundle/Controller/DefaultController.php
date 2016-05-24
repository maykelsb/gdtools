<?php

namespace ProjectBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends FOSRestController
{
	protected $data = [
		1 => ['id' => 1, 'name' => 'Guild Wars', 'description' => 'Um jogo de cartinhas para descobrir quem é o melhor gestor de guildas'],
		2 => ['id' => 2, 'name' => 'Zankar', 'description' => 'Um tower defense de tabuleiro com uma mecânica bizarra de movimentação'],
		3 => ['id' => 3, 'name' => 'Dragonaltas', 'description' => 'E então, você é o melhor piloto de dragão?'],
	];

	public function getProjectsAction()
	{
        return $this->handleView(
            $this->view($this->data, 200)
        );
	}

	public function getProjectAction($id)
	{
		return $this->handleView(
            $this->view($this->data[$id], 200)
        );
	}

//	public function postSaveProjectAction($id = null)
//	{
//
//	}

//	public function putUpsertProjectAction($id)
//	{
//
//	}

//	public function deleteProjectAction($id)
//	{
//
//	}
}
