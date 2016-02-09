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



    public function testAction()
    {
      // Les noms d'utilisateurs à créer
      $listNames = array('zywoa', 'kamou', 'toto');

      foreach ($listNames as $name) {
        // On crée l'utilisateur
        $user = new User;
        $entityManager = $this->getDoctrine()->getEntityManager();
        // Le nom d'utilisateur et le mot de passe sont identiques
        $user->setUsername($name);
        $user->setPassword($name);
        $user->setMailAdress($name."@mail.fr");
        $user->setIsActive(true);

        // On ne se sert pas du sel pour l'instant
        //$user->setSalt('');
        // On définit uniquement le role ROLE_USER qui est le role de base

        if($name == "zywoa"){
          $user->setRoles(array('ROLE_USER', 'ROLE_ADMIN'));
        }
        else {
          $user->setRoles(array('ROLE_USER'));
        }

        // On le persiste
        $entityManager->persist($user);
      }

      // On déclenche l'enregistrement
      $entityManager->flush();

      return $this->render('BlogBundle:Article:index.html.twig');
    }
}
