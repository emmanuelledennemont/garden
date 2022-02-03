<?php

namespace App\Form;

use App\Entity\Culture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CultureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('text')
            ->add('poster')
            ->add('family')
            ->add('cycle')
            ->add('exposition')
            ->add('ground')
            ->add('slug')
            ->add('culture_category')
            ->add('calendar')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Culture::class,
        ]);
    }
}
