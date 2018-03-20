<?php

namespace AppBundle\Entity\Repository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Class AbstractEntityRepository
 * @package AppBundle\Entity\Repository
 */
abstract class AbstractEntityRepository extends EntityRepository
{
    /**
     * {@inheritDoc}
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $metadata = $entityManager->getClassMetadata($this->getEntityClass());
        parent::__construct($entityManager, $metadata);
    }

    /**
     * @param object $entity
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save($entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush($entity);
    }

    /**
     * @param object $entity
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function merge($entity)
    {
        $this->getEntityManager()->merge($entity);
        $this->getEntityManager()->flush();
    }

    /**
     * @param object $entity
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete($entity)
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush($entity);
    }

    /**
     * @return string
     */
    abstract public function getEntityClass() :string;
}