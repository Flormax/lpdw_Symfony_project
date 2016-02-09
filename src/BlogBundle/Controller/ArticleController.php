<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BlogBundle\Entity\Article;
use BlogBundle\Entity\User;
use BlogBundle\Form\Type\ArticleType;

class ArticleController extends Controller
{
    public function indexAction(Request $request, $page)
    {
      $em = $this->getDoctrine()->getManager();
      $repository = $em->getRepository('BlogBundle:Article');

      $articles = $repository->getList($page, 2);
      $articles_count = $repository->getTotal();

      $pagination = array(
        'page' => $page,
        'route' => 'blog_homepage',
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
