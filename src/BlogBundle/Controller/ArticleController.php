<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BlogBundle\Entity\Article;
use BlogBundle\Entity\User;
use BlogBundle\Entity\Category;
use BlogBundle\Form\Type\ArticleType;

class ArticleController extends Controller
{
    public function indexAction(Request $request, $page, $category_name)
    {
      $em = $this->getDoctrine()->getManager();
      $repository_article = $em->getRepository('BlogBundle:Article');
      $repository_category = $em->getRepository('BlogBundle:Category');

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
      $repository = $this
          ->getDoctrine()
          ->getRepository('BlogBundle:Article');

      $article = $repository->getById($id);

      return $this->render('BlogBundle:Article:view.html.twig', array(
        'article' => $article
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
}
