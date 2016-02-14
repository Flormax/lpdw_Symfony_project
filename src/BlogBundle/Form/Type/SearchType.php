<?php

namespace BlogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $option)
  {
    $builder
      ->add('name', TextType::class, array(
        'required' => false
      ))
      ->add('tag', TextType::class, array(
        'required' => false
      ))
      ->add('submit', SubmitType::class, array(
        'label' => 'Go'
      ));
  }
}
