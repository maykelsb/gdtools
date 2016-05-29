<?php

namespace ProjectBundle\Controller;

use ProjectBundle\Entity\Project;
use ProjectBundle\Form\Type\ProjectType;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;
// -- Annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class DefaultController extends FOSRestController
{
    /**
     * Retrieves from the database all projects and return them as a collection.
     *
     * @ApiDoc(
     *  description="Gets a collection of Project",
     *  output = { "class" = "ProjectBundle\Entity\Project", "collection" = true },
     *  statusCodes = {
     *      200 = "Returned when successful"
     *  }
     * )
     * @return Response
     */
	public function getProjectsAction()
	{
        $projects = $this->getDoctrine()
            ->getRepository('ProjectBundle:Project')
            ->findAll();

        return $this->handleView(
            $this->view($projects, Codes::HTTP_OK)
        );
	}

    /**
     * Retrieves a single Project from the database.
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
     * @ParamConverter("project", class="ProjectBundle\Entity\Project")
     *
     * @param ProjectBundle\Entity\Project $project The Project to be fetched
     * @return Response
     */
	public function getProjectAction(Project $project)
	{
		return $this->handleView(
            $this->view($project, Codes::HTTP_OK)
        );
	}

    /**
     * Creates a new Project.
     *
     * @ApiDoc(
     *  description = "Creates a new Project",
     *  statusCodes = {
     *      201 = "Returned when a new Project has been created",
     *      400 = "Returned when the submitted form has errors"
     *  }
     * )
     *
     * @param Request $request Data for the new Project
     * @return Response
     */
	public function postProjectAction(Request $request)
	{
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();

            return $this->handleView(
                $this->routeRedirectView(
                    'api_get_project',
                    ['project' => $project->getId()],
                    Codes::HTTP_CREATED
                )
            );
        }

        return $this->handleView($this->view($form));
	}

    /**
     * Erases a Project.
     *
     * @ApiDoc(
     *  description = "Removes a Project for a given id",
     *  statusCodes = {
     *      201 = "When the project has been removed",
     *      404 = "When the project has not been found"
     *  }
     * )
     *
     * @ParamConverter("project", class="ProjectBundle\Entity\Project")
     *
     * @param ProjectBundle\Entity\Project $project The Project to be removed
     * @return Response
     */
	public function deleteProjectAction(Project $project)
	{
        $projectId = $project->getId();

        $em = $this->getDoctrine()->getManager();
        $em->remove($project);
        $em->flush();

        return $this->handleView(
            $this->routeRedirectView(
                'api_get_project',
                ['project' => $projectId],
                Codes::HTTP_NO_CONTENT
            )
        );
	}

    /**
     * Updates a Project.
     *
     * @ApiDoc(
     *  description = "Update the data for a given id with the submitted data",
     *  statusCodes = {
     *      201 = "When the project has been updated",
     *      400 = "When the submitted form was not valid",
     *      404 = "When the project has not been found"
     *  }
     * )
     *
     * @ParamConverter("project", class="ProjectBundle\Entity\Project")
     *
     * @param ProjectBundle\Entity\Project $project The Project to be updated
     * @param Request $request Data for update the Project
     * @return Response
     */
	public function putProjectAction(Project $project, Request $request)
	{
        $form = $this->createForm(ProjectType::class, $project);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();

            return $this->handleView(
                $this->routeRedirectView(
                    'api_get_project',
                    ['project' => $project->getId()],
                    Codes::HTTP_NO_CONTENT
                )
            );
        }

        return $this->handleView($this->view($form));
	}
}
