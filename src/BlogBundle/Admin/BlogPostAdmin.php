<?php

namespace BlogBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin as Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use BlogBundle\Entity\Post as Post;


class BlogPostAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Internal Blog data', array('class' => 'col-md-9'))
            ->add('longTitle', TextType::class)
            ->add('longDescriptions', TextareaType::class)
            ->add('postDate', DateTimeType::class)// <--- add real time date !!!
            ->end()
            ->with('Landing Blog data', array('class' => 'col-md-3'))
            ->add('shortTitle', TextType::class)
            ->add('shortDescriptions', TextType::class)
            ->add('tag', EntityType::class, array(
                'class' => 'BlogBundle\Entity\Tag',
                'multiple' => true,
                'choice_label' => 'name',
            ))
            ->add(
                'category',
                'sonata_type_model',
                array(
                    'class' => 'BlogBundle\Entity\Category',
                    'property' => 'name',
                )
            )
            ->add(
                'postImg',
                FileType::class,
                array(
                    'label' => 'Upload Post img (PNG file)',
                    'required' => false,
                )
            )
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('id');
        $datagridMapper->add('shortTitle');
        $datagridMapper->add('shortDescriptions');
        $datagridMapper->add('postDate');
        $datagridMapper->add('tag');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id');
        $listMapper->addIdentifier('shortTitle');
        $listMapper->addIdentifier('shortDescriptions');
        $listMapper->addIdentifier('postDate');
        $listMapper->addIdentifier('tag');
    }

    public function toString($object)
    {
        return $object instanceof Post
            ? $object->getShortTitle()
            : 'Blog Post'; // shown in the breadcrumb on the create view
    }
}