<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BlogBundle\Entity\Article;
use BlogBundle\Entity\User;
use BlogBundle\Entity\Category;
use BlogBundle\Entity\Comment;
use BlogBundle\Form\Type\ArticleType;
use BlogBundle\Form\Type\SearchType;
use BlogBundle\Form\Type\CommentType;

class ArticleController extends Controller
{
    public function indexAction(Request $request, $page, $category_name)
    {
      $em = $this->getDoctrine()->getManager();
      $repository_article = $em->getRepository('BlogBundle:Article');
      $repository_category = $em->getRepository('BlogBundle:Category');
      $repository_comment = $em->getRepository('BlogBundle:Comment');

      if(isset($category_name))
      {
        $category = $repository_category->getByName($category_name);
        $articles = $repository_article->getListByCategory($page, 2, $category);
        $articles_count = $repository_article->getTotalByCategory($category);
        $route = "blog_list_by_category";
      } else {
        if(isset($page))
        {
          $articles = $repository_article->getList($page, 2);
          $articles_count = $repository_article->getTotal();
          $route = "blog_list";
        } else {
          $articles = $repository_article->getLastFive();
          return $this->render('BlogBundle:Article:index.html.twig', array(
            'articles' => $articles
          ));
        }
      }

      $pagination = array(
        'page' => $page,
        'route' => $route,
        'category' => $category_name,
        'pages_count' => ceil($articles_count / 2),
        'route_params' => array()
      );

      return $this->render('BlogBundle:Article:index.html.twig', array(
        'articles' => $articles,
        'pagination' => $pagination,
        'total' => $articles_count
      ));
    }

    public function viewAction(Request $request, $id)
    {
      $repository_article = $this
          ->getDoctrine()
          ->getRepository('BlogBundle:Article');

      $repository_comment = $this
          ->getDoctrine()
          ->getRepository('BlogBundle:Comment');

      $article = $repository_article->getById($id);
      $comments = $repository_comment->getByArticle($article);

      $comment = new Comment();
      $comment->setTarget($article);
      $comment->setPostDate(new \DateTime());
      
      $form = $this->createform(CommentType::class, $comment);
      $form->handleRequest($request);

      if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($comment);
        $em->flush($comment);
        return $this->redirectToRoute('blog_view', ['id' => $article->getId()]);
      }

      return $this->render('BlogBundle:Article:view.html.twig', array(
        'article' => $article,
        'comments' => $comments,
        'form' => $form->createView()
      ));
    }

    public function addAction(Request $request)
    {
      $article = new Article();
      //getuser
      $user = $this->get('security.token_storage')->getToken()->getUser();
      $article->setUser($user);
      $article->setPostDate(new \DateTime());

      $form = $this->createForm(ArticleType::class, $article);
      $form->handleRequest($request);

      if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush($article);
        return $this->redirectToRoute('blog_view', ['id' => $article->getId()]);
      }

      return $this->render('BlogBundle:Article:add.html.twig', array(
        'form' => $form->createView()
      ));
    }

    public function deleteAction(Request $request, $id)
    {
      $em = $this->getDoctrine()->getManager();
      $repository = $this->getDoctrine()->getRepository('BlogBundle:Article');
      $article = $repository->find($id);

      $em->remove($article);
      $em->flush();

      return $this->redirectToRoute('blog_homepage');
    }

    public function searchAction(Request $request, $filters, $page)
    {
      $repository_article = $this
          ->getDoctrine()
          ->getRepository('BlogBundle:Article');
      $repository_tag = $this
          ->getDoctrine()
          ->getRepository('BlogBundle:Tag');

      if(isset($filters))
      {
        $filterTab = explode("_", $filters);
        // var_dump($filterTab);
        // die;
        $article_title = (strlen($filterTab[0]) > 0 ? $filterTab[0] : null);
        $tag_name = (strlen($filterTab[1]) > 0 ? $filterTab[1] : null);
        $tag = (isset($tag_name) ? $repository_tag->getByName($tag_name) : null);
        $articles = $repository_article->getListBySearch($page, 2, $article_title, $tag);
        $articles_count = $repository_article->getTotalBySearch($article_title, $tag);

        if(!isset($articles_count) || $articles_count == 0)
        {
          echo('no results');
          die;
        }

        $pagination = array(
          'page' => $page,
          'route' => 'blog_search',
          'filters' => $filters,
          'pages_count' => ceil($articles_count / 2),
          'route_params' => array()
        );

        return $this->render('BlogBundle:Search:index.html.twig', array(
          'articles' => $articles,
          'pagination' => $pagination,
          'total' => $articles_count
        ));
      } else {
        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);

        if ($form->isValid()) {
          $filters = $form->get('name')->getData();
          $filters = $filters.'_'.$form->get('tag')->getData();
          return $this->redirectToRoute('blog_search', array(
            'filters' => $filters,
            'page' => 1
          ));
        }

        return $this->render('BlogBundle:Search:index.html.twig', array(
          'form' => $form->createView()
        ));
      }
    }
}
