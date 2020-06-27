<?php
# Autor: Sebastian Łyszkowski

namespace App\Form;

use App\Entity\Game;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AddGameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'TYTUŁ'
            ])
            ->add('genre', ChoiceType::class, [
                'label' => 'GATUNEK',
                'choices'  => [
                    'Bijatyka' => 'Bijatyka',
                    'FPS' => 'FPS',
                    'Platformówka' => 'Platformowka',
                    'Przygodowa' => 'Przygodowa',
                    'Akcji' => 'Akcji',
                    'Skradanka' => 'Skradanka',
                    'Muzyczna' => 'Muzyczna',
                    'MMORPG' => 'MMORPG',
                    'RPG' => 'RPG',
                    'Hack and slash' => 'Hack and slash',
                    'jRPG' => 'jRPG',
                    'Roguelike' => 'Roguelike',
                    'Symulator' => 'Symulator',
                    'Wyścigowa' => 'Wyścigowa',
                    'Sportowa' => 'Sportowa',
                    'TBS' => 'TBS',
                    'RTS' => 'RTS',
                    'Logiczna' => 'Logiczna',
                    'Ekonomiczna' => 'Ekonomiczna',
                    'Survival' => 'Survival',
                    'Battle Royal' => 'Battle Royal',
                    'Sandbox' => 'Sandbox',
                    'Horror' => 'Horror',
                    'Fabularna gra akcji' => 'Fabularna gra akcji',
                    'MOBA' => 'MOBA'
                ],
            ])
            ->add('platform', ChoiceType::class, [
                'label'  => 'PLATFORMA',
                'empty_data' => 'Windows',
                'choices'  => [
                    'Windows' => 'Windows',
                    'Mac' => 'Mac',
                    'Playstation' => 'Playstation',
                    'Xbox' => 'Xbox',
                    'Switch' => 'Switch',
                    'Linux' => 'Linux'
                ],
                'expanded' => true,
                'multiple' => true
            ])
            ->add('sumOfVotes', ChoiceType::class, [
                'label' => 'OCENA',
                'choices'  => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                ],
            ])
            ->add('review', TextareaType::class, [
                'label'  => 'RECENZJA',
                'attr' => ['style' => 'width: 75%; height:150px; font-size:20px'],
                'required'   => false
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
