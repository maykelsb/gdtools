<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use AppBundle\Entity\Deck;
use AppBundle\Form\Type\DeckType;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class DeckController extends FOSRestController
{
    /**
     *
     *
     * @ParamConverter("project", class="AppBundle\Entity\Project")
     *
     * @param Project $project
     */
    public function getProjectDecksAction(Project $project)
    {
        $decks = $this->getDoctrine()
            ->getRepository('AppBundle:Deck')
            ->findByProject($project);

        return $this->handleView(
            $this->view($decks, Codes::HTTP_OK)
                ->setTemplate('AppBundle:Default:show.html.twig')
        );
    }

    /**
     *
     * @ParamConverter("deck", class="AppBundle\Entity\Deck")
     *
     * @param Deck $deck
     * @return type
     */
    public function getDeckAction(Deck $deck)
    {
        return $this->handleView(
            $this->view($deck, Codes::HTTP_OK)
                ->setTemplate('AppBundle:Default:show.html.twig')
        );
    }

    public function postDeckAction(Request $request)
    {
        $deck = new Deck();
        $form = $this->createForm(DeckType::class, $deck);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($deck);
            $em->flush();

            return $this->handleView(
                $this->routeRedirectView(
                    'api_get_deck',
                    ['deck' => $deck->getId()],
                    Codes::HTTP_CREATED
                )
            );
        }

        return $this->handleView($this->view($form));
    }

    /**
     *
     * @ParamConverter("deck", class="AppBundle\Entity\Deck")
     *
     * @param Deck $deck
     * @return type
     */
    public function deleteDeckAction(Deck $deck)
    {
        $deckId = $deck->getId();

        $em = $this->getDoctrine()->getManager();
        $em->remove($deck);
        $em->flush();

        return $this->handleView(
            $this->routeRedirectView(
                'api_get_deck',
                ['deck' => $deckId],
                Codes::HTTP_NO_CONTENT
            )
        );
    }

    /**
     *
     * @ParamConverter("deck", class="AppBundle\Entity\Deck")
     *
     * @param Deck $deck
     */
    public function putDeckAction(Deck $deck, Request $request)
    {
        $form = $this->createForm(DeckType::class, $deck);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($deck);
            $em->flush();

            return $this->handleView(
                $this->routeRedirectView(
                    'api_get_deck',
                    ['deck' => $deck->getId()],
                    Codes::HTTP_NO_CONTENT
                )
            );
        }

        return $this->handleView($this->view($form));
    }
}
