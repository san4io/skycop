<?php

namespace AppBundle\Listener;

use AppBundle\Service\EventLogger;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

/**
 * Class LoginListener
 * @package AppBundle\Listeners
 */
class LoginListener {

    /**
     * @var EventLogger
     */
    protected $eventLogger;

    /**
     * LoginListener constructor.
     * @param EventLogger $eventLogger
     */
    public function __construct(EventLogger $eventLogger)
    {
        $this->eventLogger = $eventLogger;
    }

    /**
     * @param InteractiveLoginEvent $event
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function login(InteractiveLoginEvent $event)
    {
        $user = $event->getAuthenticationToken()->getUser();

        $this->eventLogger->logEvent('login', $user);
    }
}