<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BlogBundle\Entity\Tag;
use BlogBundle\Form\Type\FilterType;

class TagController extends Controller
{
    public function addAction(Request $request)
    {
      $tag = new Tag();

      $form = $this->createForm(FilterType::class, $tag);
      $form->handleRequest($request);

      if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($tag);
        $em->flush($tag);
        return $this->redirectToRoute('blog_add_tag');
      }

      return $this->render('BlogBundle:Filter:add.html.twig', array(
        'form' => $form->createView()
      ));
    }
}
