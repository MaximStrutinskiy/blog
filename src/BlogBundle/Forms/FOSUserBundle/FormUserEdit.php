<?php

namespace BlogBundle\Forms\FOSUserBundle;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FormUserEdit extends AbstractType
{
    protected function buildUserForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                TextType::class,
                array(
                    'required' => false,
                )
            )
            ->add(
                'soname',
                TextType::class,
                array(
                    'required' => false,
                )
            )
            ->add(
                'age',
                TextType::class,
                array(
                    'required' => false,
                )
            )
            ->add(
                'city',
                TextType::class,
                array(
                    'required' => false,
                )
            )
            ->add(
                'img',
                FileType::class,
                array(
                    'label' => 'Upload you img (PNG file)',
                    'required' => false,
                )
            )
        ;
    }

    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }
}