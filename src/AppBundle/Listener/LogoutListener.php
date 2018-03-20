<?php

namespace AppBundle\Listener;

use AppBundle\Entity\User;
use AppBundle\Service\EventLogger;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;

/**
 * Class LogoutListener
 * @package AppBundle\Listeners
 */
class LogoutListener implements LogoutHandlerInterface
{
    /**
     * @var EventLogger
     */
    protected $eventLogger;

    /**
     * LogoutListener constructor.
     * @param EventLogger $eventLogger
     */
    public function __construct(EventLogger $eventLogger)
    {
        $this->eventLogger = $eventLogger;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param TokenInterface $token
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function logout(Request $request, Response $response, TokenInterface $token)
    {
        /** @var User $user */
        $user = $token->getUser();

        $this->eventLogger->logEvent('logout', $user);
    }
}