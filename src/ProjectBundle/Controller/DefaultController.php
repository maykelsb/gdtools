<?php

namespace ProjectBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class DefaultController extends FOSRestController
{
	public function getProjectsAction()
	{
        $projects = $this->getDoctrine()
            ->getRepository('ProjectBundle:Project')
            ->findAll();

        return $this->handleView(
            $this->view($projects, 200)
        );
	}

	public function getProjectAction($id)
	{
        $project = $this->getDoctrine()->getRepository('ProjectBundle:Project')
            ->find($id);

		return $this->handleView(
            $this->view($project, 200)
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
