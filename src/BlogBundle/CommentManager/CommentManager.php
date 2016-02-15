<?php
namespace BlogBundle\CommentManager;

use Symfony\Bridge\Doctrine\ManagerRegistry;
use BlogBundle\Entity\Article;
use BlogBundle\Entity\Comment;

class CommentManager
{
    private $_doctrine;

    public function __construct($doctrine)
    {
        $this->_doctrine = $doctrine;
    }

    public function getCommentCount(Article $article)
    {
        $repository = $this->_doctrine->getRepository('BlogBundle:Comment');
        return $repository->getCountByArticle($article);
    }
}
