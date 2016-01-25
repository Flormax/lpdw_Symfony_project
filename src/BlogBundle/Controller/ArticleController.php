<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    public function indexAction(Request $request)
    {
      return $this->render('BlogBundle:Article:index.html.twig');
    }

    public function viewAction(Request $request, $id)
    {
      $tag = $request->query->get('tag');
      return new Response ("Affichage de l'article: ".$id." avec le tag: ".$tag);
    }

    public function addAction(Request $request)
    {

    }
}
