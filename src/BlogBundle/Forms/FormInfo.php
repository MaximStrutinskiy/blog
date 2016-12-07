<?php

namespace BlogBundle\Forms;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class FormInfo
 * Use BlogBundle\Entity\Info
 * @package BlogBundle\Forms
 */
class FormInfo extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                TextType::class,
                array(
                    'attr' => array('placeholder' => 'Enter your name'),
                )
            )
            ->add(
                'phone',
                TextType::class,
                array(
                    'attr' => array('placeholder' => 'Enter your phone'),
                )
            )
            ->add(
                'message',
                TextareaType::class,
                array(
                    'attr' => array('placeholder' => 'Enter your message'),
                )
            )
            ->add(
                'send',
                SubmitType::class,
                array(
                    'attr' => array('class' => 'active'),
                )
            )
            ->add('clean', ResetType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'BlogBundle\Entity\Info',
            ]
        );
    }

}