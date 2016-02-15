<?php
namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BlogBundle\Entity\User;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {
      $authenticationUtils = $this->get('security.authentication_utils');

      $error = $authenticationUtils->getLastAuthenticationError();

      $lastUsername = $authenticationUtils->getLastUsername();
      return $this->render('BlogBundle:Login:login.html.twig', array(
        'last_username' => $lastUsername,
        'error' => $error,
        )
      );
    }

    public function loginCheckAction(Request $request)
    {
      return $this->render('BlogBundle:Article:index.html.twig');
    }
}
