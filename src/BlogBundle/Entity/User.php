<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\OneToMany(targetEntity="Article", mappedBy="user")
     */
    private $articles;

    /**
     * @var int
     *
     * @ORM\Column(name="use_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="use_username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="use_mailAdress", type="string", length=255, unique=true)
     */
    private $mailAdress;

    /**
     * @var string
     *
     * @ORM\Column(name="use_password", type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(name="use_role", type="array")
     */
    private $roles = array();

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set mailAdress
     *
     * @param string $mailAdress
     *
     * @return User
     */
    public function setMailAdress($mailAdress)
    {
        $this->mailAdress = $mailAdress;

        return $this;
    }

    /**
     * Get mailAdress
     *
     * @return string
     */
    public function getMailAdress()
    {
        return $this->mailAdress;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function __construct()
    {
      $this->articles = new ArrayCollection();
      $this->roles = array("ROLE_USER");
    }

    /**
     * Add article
     *
     * @param \BlogBundle\Entity\Article $article
     *
     * @return User
     */
    public function addArticle(\BlogBundle\Entity\Article $article)
    {
        $this->articles[] = $article;

        return $this;
    }

    /**
     * Remove article
     *
     * @param \BlogBundle\Entity\Article $article
     */
    public function removeArticle(\BlogBundle\Entity\Article $article)
    {
        $this->articles->removeElement($article);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticles()
    {
        return $this->articles;
    }

    public function serialize()
    {
        return serialize(array(
          $this->id,
          $this->mailAdress,
          $this->password,
        ));
    }
    public function unserialize($serialized)
    {
        list (
          $this->id,
          $this->mailAdress,
          $this->password,
        ) = unserialize($serialized);
    }

    public function getSalt()
    {
      return null;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function eraseCredentials()
    {
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
}
