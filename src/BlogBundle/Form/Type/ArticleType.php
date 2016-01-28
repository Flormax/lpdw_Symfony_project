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
      ->add('category', ChoiceType::class, array(
        'choices' => array(
          'cat1' => 'cat1',
          'cat2' => 'cat3',
          'cat3' => 'cat3'
        )
      ))
      ->add('title', TextType::class)
      ->add('content', TextType::class)
      ->add('articleTags', ChoiceType::class, array(
        'expanded' => true,
        'multiple' => true,
        'choices' => array(
          'cat1' => 'cat1',
          'cat2' => 'cat3',
          'cat3' => 'cat3'
        )
      ))
      ->add('submit', ButtonType::class, array(
        'label' => 'Create'
      ));
  }
}
