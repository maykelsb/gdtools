<?php

namespace ProjectBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class DefaultController extends FOSRestController
{
    /**
     * Retrieve from the database all projects and return them as a collection.
     *
     * @ApiDoc(
     *  description="Gets a collection of Project",
     *  output = { "class" = "ProjectBundle\Entity\Project", "collection" = true },
     *  statusCodes = {
     *      200 = "Returned when successful"
     *  }
     * )
     * @return type
     */
	public function getProjectsAction()
	{
        $projects = $this->getDoctrine()
            ->getRepository('ProjectBundle:Project')
            ->findAll();

        return $this->handleView(
            $this->view($projects, 200)
        );
	}

    /**
     * Retrieve a single Project from the database.
     *
     * @ApiDoc(
     *  description = "Gets a Project for a given id",
     *  output = "ProjectBundle\Entity\Project",
     *  statusCodes = {
     *      200 = "Returned when successful",
     *      404 = "Returned when the project is not found"
     *  }
     * )
     * @param type $id
     * @return type
     */
	public function getProjectAction($id)
	{
        $project = $this->getDoctrine()->getRepository('ProjectBundle:Project')
            ->find($id);

		return $this->handleView(
            $this->view($project, 200)
        );
	}

//	public function postProjectAction($id = null)
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
