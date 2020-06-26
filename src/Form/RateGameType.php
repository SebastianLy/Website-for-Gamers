<?php
# Autor: Sebastian Lyszkowski

namespace App\Form;

use App\Entity\Game;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class RateGameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('averageRating', ChoiceType::class, [
                'label' => 'OCENA',
                'choices'  => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                ],
            ])
            ->add('id', HiddenType::class, [
                'data' => $id,
            ])
            ->add('review', TextareaType::class, [
                'label'  => 'RECENZJA',
                'required'   => false
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary',
                    'style' => 'border-color:white'],
                'label' => 'OCEŃ'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}
