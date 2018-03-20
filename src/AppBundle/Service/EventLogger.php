<?php

namespace AppBundle\Service;

use AppBundle\Entity\Event;
use AppBundle\Entity\Repository\EventRepository;
use FOS\UserBundle\Model\User;

/**
 * Class EventLogger
 * @package AppBundle\Service
 */
class EventLogger
{
    /**
     * @var EventRepository
     */
    private $eventRepository;

    /**
     * EventLogger constructor.
     * @param EventRepository $eventRepository
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * @param string$action
     * @param User|null $user
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function logEvent(string $action, User $user = null)
    {
        $event = new Event();
        $event->setAction($action);
        $event->setUser($user);

        $this->eventRepository->save($event);
    }
}