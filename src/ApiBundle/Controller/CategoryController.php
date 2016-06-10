<?php

namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;

class CategoryController extends FOSRestController
{

    public function getCategoriesAction()
    {
        return $this->handleView($this->view([], Codes::HTTP_OK));
    }
}
