<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use BlogBundle\Entity\Article;
use BlogBundle\Entity\User;
use BlogBundle\Entity\Category;
use BlogBundle\Entity\Comment;
use BlogBundle\Form\Type\ArticleType;
use BlogBundle\Form\Type\SearchType;
use BlogBundle\Form\Type\CommentType;

class ArticleController extends Controller
{
    public function indexAction(Request $request, $page, $categoryName)
    {
      $em = $this->getDoctrine()->getManager();
      $repositoryArticle = $em->getRepository('BlogBundle:Article');
      $repositoryCategory = $em->getRepository('BlogBundle:Category');
      $repositoryComment = $em->getRepository('BlogBundle:Comment');

      if(isset($categoryName)){
        $category = $repositoryCategory->getByName($categoryName);
        $articles = $repositoryArticle->getListByCategory($page, 5, $category);
        $articlesCount = count($articles);
        $route = "blog_list_by_category";
      } else {
        if(isset($page)){
          $articles = $repositoryArticle->getList($page, 5);
          $articlesCount = count($articles);
          $route = "blog_list";
        } else {
          $articles = $repositoryArticle->getLastFive();
          return $this->render('BlogBundle:Article:index.html.twig', array(
            'articles' => $articles
          ));
        }
      }

      $pagination = array(
        'page' => $page,
        'route' => $route,
        'category' => $categoryName,
        'pages_count' => ceil($articlesCount / 5),
        'route_params' => array()
      );

      return $this->render('BlogBundle:Article:index.html.twig', array(
        'articles' => $articles,
        'pagination' => $pagination,
        'total' => $articlesCount
      ));
    }

    public function cookiesAction(Request $request)
    {
      $cookieWarning = array(
      'name' => 'CookieWarning',
      'value' => 'checked',
      'time' => time() + 3600 * 24 * 7 * 52 * 5
      );

      $cookie = new Cookie($cookieWarning['name'], $cookieWarning['value'], $cookieWarning['time']);

      $response = new Response();
      $response->headers->setCookie($cookie);
      $response->send();
      return $this->redirectToRoute('blog_homepage');
    }

    public function viewAction(Request $request, $id)
    {
      $repositoryArticle = $this
          ->getDoctrine()
          ->getRepository('BlogBundle:Article');

      $repositoryComment = $this
          ->getDoctrine()
          ->getRepository('BlogBundle:Comment');

      $article = $repositoryArticle->getById($id);
      $comments = $repositoryComment->getByArticle($article);

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
      $user = $this->get('security.token_storage')->getToken()->getUser();
      $article->setUser($user);

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

    public function editAction(Request $request, $id)
    {
      $repositoryArticle = $this
          ->getDoctrine()
          ->getRepository('BlogBundle:Article');
      $article = $repositoryArticle->getById($id);
      $user = $this->get('security.token_storage')->getToken()->getUser();
      $article->setUser($user);

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
      $repositoryArticle = $this
          ->getDoctrine()
          ->getRepository('BlogBundle:Article');

      if(isset($filters)){
        $filterTab = explode("_", $filters);
        $queryFilterTab = array();

        if(strlen($filterTab[1]) > 0)
        {
          $queryFilterTab['tagName'] = $filterTab[1];
        }

        if(strlen($filterTab[0]) > 0)
        {
          $queryFilterTab['title'] = $filterTab[0];
        }

        $articles = $repositoryArticle->getListBySearch($page, 5, $queryFilterTab);
        $articlesCount = count($articles);

        if($articlesCount == 0)
        {
          return $this->redirectToRoute('blog_search', array(
            'page' => 1,
            'status' => 204
          ));
        }

        $pagination = array(
          'page' => $page,
          'route' => 'blog_search',
          'filters' => $filters,
          'pages_count' => ceil($articlesCount / 5),
          'route_params' => array()
        );

        return $this->render('BlogBundle:Search:index.html.twig', array(
          'articles' => $articles,
          'pagination' => $pagination,
          'total' => $articlesCount
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
