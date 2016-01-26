<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BlogBundle\Entity\Article;
use BlogBundle\Form\Type\ArticleType;

class ArticleController extends Controller
{
    public function indexAction(Request $request)
    {
      $repository = $this
          ->getDoctrine()
          ->getRepository('BlogBundle:Article');

      $articles = $repository->findall();

      return $this->render('BlogBundle:Article:index.html.twig', array(
        'articles' => $articles
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
      $form = $this->createForm(ArticleType::class, $article);

      return $this->render('BlogBundle:Article:add.html.twig', array(
        'form' => $form->createView()
      ));
    }
}
