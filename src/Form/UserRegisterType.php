<?php
# Autor: Marek Bobrowski
namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserRegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'NAZWA UŻYTKOWNIKA'
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-MAIL'
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Hasła nie zgadzają się.',
                'first_options'  => ['label' => 'HASŁO'],
                'second_options' => ['label' => 'POWTÓRZ HASŁO'],
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary',
                           'style' => 'border-color:white'],
                'label' => 'ZAREJESTRUJ'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
