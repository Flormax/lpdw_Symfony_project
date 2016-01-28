<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArticleTag
 *
 * @ORM\Table(name="articleTag")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\ArticleTagRepository")
 */
class ArticleTag
{

    /**
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumn(name="articleId", referencedColumnName="id", onDelete="CASCADE")
     */
    private $article;

    /**
     * @ORM\ManyToOne(targetEntity="Tag")
     * @ORM\JoinColumn(name="tagId", referencedColumnName="id", onDelete="CASCADE")
     */
    private $tag;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="articleId", type="integer")
     */
    private $articleId;

    /**
     * @var int
     *
     * @ORM\Column(name="tagId", type="integer")
     */
    private $tagId;


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
     * Set articleId
     *
     * @param integer $articleId
     *
     * @return ArticleTag
     */
    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;

        return $this;
    }

    /**
     * Get articleId
     *
     * @return int
     */
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * Set tagId
     *
     * @param integer $tagId
     *
     * @return ArticleTag
     */
    public function setTagId($tagId)
    {
        $this->tagId = $tagId;

        return $this;
    }

    /**
     * Get tagId
     *
     * @return int
     */
    public function getTagId()
    {
        return $this->tagId;
    }

    /**
     * Set article
     *
     * @param \BlogBundle\Entity\Article $article
     *
     * @return ArticleTag
     */
    public function setArticle(\BlogBundle\Entity\Article $article = null)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \BlogBundle\Entity\Article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set tag
     *
     * @param \BlogBundle\Entity\Tag $tag
     *
     * @return ArticleTag
     */
    public function setTag(\BlogBundle\Entity\Tag $tag = null)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return \BlogBundle\Entity\Tag
     */
    public function getTag()
    {
        return $this->tag;
    }
}
