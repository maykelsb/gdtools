<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use AppBundle\Entity\Deck;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;

class DeckController extends FOSRestController
{
    public function getDecksAction(Project $project)
    {
    }

    public function getDeckAction(Deck $deck)
    {
    }

    public function postDeckAction(Project $project, Request $request)
    {
    }

    public function deleteDeck(Deck $deck)
    {
    }

    public function putDeckAction(Deck $deck)
    {
    }
}
