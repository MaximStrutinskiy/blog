<?php

//Розширяємо форму реєстрації

namespace BlogBundle\Forms;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FormRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                TextType::class,
                array(
                    'required' => false
                )
            )
            ->add(
                'soname',
                TextType::class,
                array(
                    'required' => false
                )
            )
            ->add(
                'age',
                TextType::class,
                array(
                    'required' => false
                )
            )
            ->add(
                'city',
                TextType::class,
                array(
                    'required' => false
                )
            );
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

}