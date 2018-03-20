<?php

namespace AppBundle\Entity\Repository;

use AppBundle\Entity\Event;

/**
 * Class EventRepository
 * @package AppBundle\Entity\Repository
 */
class EventRepository extends AbstractEntityRepository
{
    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Event::class;
    }
}