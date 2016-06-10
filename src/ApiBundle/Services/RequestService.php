<?php
namespace ApiBundle\Services;

use ApiBundle\Entity;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;

class RequestService implements RequestServiceInterface
{
    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @var Symfony\Component\Form\FormFactory
     */
    protected $ff;

    protected $sc;

    public function __construct(EntityManager $em, FormFactory $ff, ContainerInterface $sc)
    {
        $this->em = $em;
        $this->ff = $ff;
        $this->sc = $sc;
    }

    public function all($entityName)
    {
        return $this
            ->em
            ->getRepository($entityName)
            ->findAll();
    }

    public function find($entityName, array $criteria)
    {
        return $this
            ->em
            ->getRepository($entityName)
            ->findBy($criteria);
    }

    public function persist(EntityInterface $entity, array $parameters)
    {
//        $form = $this->ff->create()





//        $project = new Project();
//        $form = $this->createForm(ProjectType::class, $project);
//        $form->submit($request->request->all());
//
//        if ($form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($project);
//            $em->flush();
//
//            return $this->handleView(
//                $this->routeRedirectView(
//                    'api_get_project',
//                    ['project' => $project->getId()],
//                    Codes::HTTP_CREATED
//                )
//            );
//        }

    }
}