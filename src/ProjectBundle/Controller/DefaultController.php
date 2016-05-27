<?php

namespace ProjectBundle\Controller;

use ProjectBundle\Entity\Project;
use ProjectBundle\Form\Type\ProjectType;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
// -- Annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
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
     *  description = "Retrieves a Project for a given id",
     *  output = "ProjectBundle\Entity\Project",
     *  resource = true,
     *  statusCodes = {
     *      200 = "Returned when successful",
     *      404 = "Returned when the project is not found"
     *  }
     * )
     *
     * @ParamConverter("id", class="ProjectBundle\Entity\Project")
     *
     * @param ProjectBundle\Entity\Project $id
     * @return type
     */
	public function getProjectAction(Project $id)
	{
		return $this->handleView(
            $this->view($id, 200)
        );
	}

	public function postProjectAction(Request $request)
	{
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);
        $form->submit($request->request->all());

        var_dump($form->getErrors());
        die();



        if ($form->isSubmitted() && $form->isValid()) {
            die('bom!');
        }

        die('ruim');
	}

//	public function putUpsertProjectAction($id)
//	{
//
//	}

//	public function deleteProjectAction($id)
//	{
//
//	}
}
