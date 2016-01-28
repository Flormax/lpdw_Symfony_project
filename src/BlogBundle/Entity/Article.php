<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="articles")
     * @ORM\JoinColumn(name="categoryId", referencedColumnName="id")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="articles")
     * @ORM\JoinColumn(name="userId", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="ArticleTag", mappedBy="articles")
     */
    private $articleTags;

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
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=2000)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="postDate", type="datetime", options={"default" = "CURRENT_TIMESTAMP"})
     */
    private $postDate;

    /**
     * @var int
     *
     * @ORM\Column(name="userId", type="integer")
     */
    private $userId;
    /**
     * @var int
     *
     * @ORM\Column(name="categoryId", type="integer")
     */
    private $categoryId;


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
     * Set title
     *
     * @param string $title
     *
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set postDate
     *
     * @param \DateTime $postDate
     *
     * @return Article
     */
    public function setPostDate($postDate)
    {
        $this->postDate = $postDate;

        return $this;
    }

    /**
     * Get postDate
     *
     * @return \DateTime
     */
    public function getPostDate()
    {
        return $this->postDate;
    }

    /**
     * Set categoryId
     *
     * @param integer $categoryId
     *
     * @return Article
     */
    public function setcategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return int
     */
    public function categoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Article
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Get categoryId
     *
     * @return integer
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set category
     *
     * @param \BlogBundle\Entity\Category $category
     *
     * @return Article
     */
    public function setCategory(\BlogBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \BlogBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set user
     *
     * @param \BlogBundle\Entity\User $user
     *
     * @return Article
     */
    public function setUser(\BlogBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \BlogBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articleTags = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add articleTag
     *
     * @param \BlogBundle\Entity\ArticleTag $articleTag
     *
     * @return Article
     */
    public function addArticleTag(\BlogBundle\Entity\ArticleTag $articleTag)
    {
        $this->articleTags[] = $articleTag;

        return $this;
    }

    /**
     * Remove articleTag
     *
     * @param \BlogBundle\Entity\ArticleTag $articleTag
     */
    public function removeArticleTag(\BlogBundle\Entity\ArticleTag $articleTag)
    {
        $this->articleTags->removeElement($articleTag);
    }

    /**
     * Get articleTags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticleTags()
    {
        return $this->articleTags;
    }
}
