<?php

namespace App\Form;

use App\Classe\Search;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

Class SearchType extends AbstractType{

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
    ->add('string', TextType::class, [
      'label' => false,
      'required' => false,
      'row_attr' => [
        'class' => 'input-group',
      ],
      'attr' => [
        'placeholder' => 'Votre recherche ...',
      ]

    ])
    ->add('categorie', EntityType::class, [
      'label' => false,
      'required' => false,
      'class' => Categorie::class,
      'multiple' => true,
      'expanded' => true,
      'label_attr' => [
        'class' => 'checkbox-inline',
      ],
    ])
    ;
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => Search::class,
      'method' => 'GET',
      'csrf_protection' => false,
    ]);
  }

  public function getBlockPrefix()
  {
    return '';
  }

}
