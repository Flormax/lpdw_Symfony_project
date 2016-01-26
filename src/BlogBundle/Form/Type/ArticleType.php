<?php

namespace BlogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class ArticleType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $option)
  {
    $builder
      ->add('category', TextType::class) //Rajoute category_id dans la DB
      ->add('title', TextType::class)
      ->add('content', TextType::class)
      ->add('tags', TextType::class)
      ->add('tags', ButtonType::class, array( //A VOIR
        'label' => 'Envoyer'
      ));
  }
}
