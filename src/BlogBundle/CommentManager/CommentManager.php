<?php
namespace BlogBundle\CommentManager;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use BlogBundle\Entity\Article;
use BlogBundle\Entity\Comment;
class CommentManager
{
    private $doctrine;

    /**
     * @param ManagerRegistry $doctrine
     */
    public function __construct($doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getCommentCount(Article $article)
    {
        $repository = $this->doctrine->getRepository('BlogBundle:Comment');
        return $repository->getCountByArticle($article);
    }
}
