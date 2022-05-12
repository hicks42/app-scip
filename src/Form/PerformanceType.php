<?php

namespace App\Form;

use App\Entity\Performance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class PerformanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('year', ChoiceType::class, [
                'choices'  => $this->getYears(),
                'label' => 'Année',
                'row_attr' => [
                    'class' => 'inline'
                ],
                'attr' => [
                    'class' => 'form-control mx-0'
                ]
            ])
            ->add('rate', NumberType::class, [
                'label' => 'Perf.',
                'row_attr' => [
                    'class' => 'inline'
                ],
                'attr' => [
                    'class' => 'form-control mx-0'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Performance::class,
        ]);
    }

    private function getYears($max = 'current')
    {
        // $years = range($min, ($max === 'current' ? date('Y') : $max));
        $years =  range(date('Y') - 5, date('Y'));

        return array_combine($years, $years);
    }
}
