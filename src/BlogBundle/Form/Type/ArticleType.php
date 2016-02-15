<?php

namespace BlogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ArticleType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $option)
  {
    $builder
      ->add('category', EntityType::class, array(
        'class' => 'BlogBundle:Category',
        'choice_label' => 'name',
      ))
      ->add('title', TextType::class)
      ->add('content', 'Ivory\CKEditorBundle\Form\Type\CKEditorType', array(
        'required' => true,
        'config' => array(
          'toolbar' => array(
            array(
                'name'  => 'basicstyles',
                'items' => array('Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'),
            ),
        ),
        'uiColor' => '#ffffff'
      )))
      ->add('tags', EntityType::class, array(
        'class' => 'BlogBundle:Tag',
        'choice_label' => 'name',
        'multiple' => true,
      ))
      ->add('postDate',DateType::class,array(
        'widget' => 'single_text',
        'format' => 'yyyy-MM-dd ',
        'attr' => array('class' => 'date'),
        'required' => true
      ))
      ->add('submit', SubmitType::class, array(
        'label' => 'Create'
      ));
  }
}
