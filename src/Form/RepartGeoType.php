<?php

namespace App\Form;

use App\Entity\RepartGeo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class RepartGeoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('geoName', TextType::class, [
                'label' => 'Nom du secteur'
            ])
            ->add('geoValue', NumberType::class, [
                'label' => 'Valeur en %'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RepartGeo::class,
        ]);
    }
}
