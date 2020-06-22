<?php

namespace App\Form;

use App\Entity\Game;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AddGameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'NAZWA'
            ])
            ->add('genre', TextType::class, [
                'label' => 'GATUNEK'
            ])
            ->add('platform', TextType::class, [
                'label'  => ['label' => 'PLATFORMA'],
            ])
            ->add('averageRating', TextType::class, [
                'label'  => ['label' => 'OCENA'],
            ])
            ->add('review1', TextType::class, [
                'label'  => ['label' => 'RECENZJA'],
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary',
                    'style' => 'border-color:white'],
                'label' => 'DODAJ'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
        ]);
    }
}
