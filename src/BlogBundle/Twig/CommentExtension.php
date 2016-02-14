<?php

namespace BlogBundle\Twig;
use BlogBundle\Entity\Article;
use BlogBundle\CommentManager\CommentManager;

class CommentExtension extends \Twig_Extension
{
    private $commentManager;

    public function __construct(CommentManager $commentManager)
    {
        $this->commentManager = $commentManager;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('get_article_comment_count', array($this, 'getCommentCount')),
        );
    }

    public function getCommentCount(Article $article)
    {
        return $this->commentManager->getCommentCount($article);
    }

    public function getName()
    {
        return 'blog_article_comment';
    }
}
