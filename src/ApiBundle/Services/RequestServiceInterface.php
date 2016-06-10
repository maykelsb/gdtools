<?php
namespace ApiBundle\Services;

use ApiBundle\Entity;

interface RequestServiceInterface
{
    public function all($entityName);

    public function find($entityName, array $criteria);

    public function persist(EntityInterface $entity, array $parameters);
}
