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
            $this->view($projects, Codes::HTTP_OK)
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
     * @ParamConverter("project", class="ProjectBundle\Entity\Project")
     *
     * @param ProjectBundle\Entity\Project $project
     * @return type
     */
	public function getProjectAction(Project $project)
	{
		return $this->handleView(
            $this->view($project, Codes::HTTP_OK)
        );
	}

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
                    ['id' => $project->getId()],
                    Codes::HTTP_CREATED
                )
            );
        }

        return ['form' => $form];
	}

    /**
     *
     *
     * @ParamConverter("project", class="ProjectBundle\Entity\Project")
     *
     * @param type $project
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
                ['id' => $projectId],
                Codes::HTTP_NO_CONTENT
            )
        );
	}

//	public function putUpsertProjectAction($id)
//	{
//
//	}


}
