<?php

namespace UserBundle\Controller;

use FOS\UserBundle\Controller\ProfileController as BaseProfileController;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ProfileController extends BaseProfileController
{
    /**
     * Show the user
     */
    public function showAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->render('UserBundle:Profile:show.html.twig', array(
            'user' => $user,
            'town' => $user->getTown()->getTown()
        ));
    }
}
