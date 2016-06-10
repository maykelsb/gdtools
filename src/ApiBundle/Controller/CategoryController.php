<?php

namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;

class CategoryController extends FOSRestController
{

    public function getCategoriesAction()
    {
        $categories = $this->getDoctrine()
            ->getRepository('ApiBundle:Category')
            ->findAll();

        return $this->handleView($this->view($categories, Codes::HTTP_OK));
    }
}
