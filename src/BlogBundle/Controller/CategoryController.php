<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BlogBundle\Entity\category;
use BlogBundle\Form\Type\FilterType;

class CategoryController extends Controller
{
  public function indexAction(Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $repository_category = $em->getRepository('BlogBundle:Category');
    $categories = $repository_category->findall();

    return $this->render('BlogBundle:Category:index.html.twig', array(
      'categories' => $categories
    ));
  }

  public function addAction(Request $request)
  {
    $category = new category();
      $form = $this->createForm(FilterType::class, $category);
    $form->handleRequest($request);
      if ($form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($category);
      $em->flush($category);
      return $this->redirectToRoute('blog_add_category');
    }
      return $this->render('BlogBundle:Filter:add.html.twig', array(
      'form' => $form->createView()
    ));
  }
}
