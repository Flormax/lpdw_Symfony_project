<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\TagRepository")
 */
class Tag
{
    /**
     * @ORM\OneToMany(targetEntity="ArticleTag", mappedBy="tag")
     */
    private $articleTag;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;


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
     * Set name
     *
     * @param string $name
     *
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articleTag = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add articleTag
     *
     * @param \BlogBundle\Entity\ArticleTag $articleTag
     *
     * @return Tag
     */
    public function addArticleTag(\BlogBundle\Entity\ArticleTag $articleTag)
    {
        $this->articleTag[] = $articleTag;

        return $this;
    }

    /**
     * Remove articleTag
     *
     * @param \BlogBundle\Entity\ArticleTag $articleTag
     */
    public function removeArticleTag(\BlogBundle\Entity\ArticleTag $articleTag)
    {
        $this->articleTag->removeElement($articleTag);
    }

    /**
     * Get articleTag
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticleTag()
    {
        return $this->articleTag;
    }
}
