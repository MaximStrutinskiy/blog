<?php

namespace BlogBundle\Admin;

use BlogBundle\Forms\DataTransformer\PostToNumberTransformer as Transform;
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
            ->add(
                'tag',
                EntityType::class,
                array(
                    'class' => 'BlogBundle\Entity\Tag',
                    'multiple' => true,
                    'choice_label' => 'name',
                )
            )
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

        $formMapper
            ->get('postImg')
            ->addModelTransformer(
                new Transform()
            );
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('shortTitle')
            ->add('shortDescriptions')
            ->add('postDate')//            ->add('tag') -<
        ;

//  example don't work, why?
//  $datagridMapper->add('id');
//  $datagridMapper->add('shortTitle');
//  $datagridMapper->add('shortDescriptions');
//  $datagridMapper->add('postDate');
//  $datagridMapper->add('tag', EntityType::class, array('class' => 'BlogBundle\Entity\Tag','multiple' => true,'choice_label' => 'name',));
//   error: Catchable Fatal Error: Argument 1 passed to Symfony\Bridge\Doctrine\Form\Type\DoctrineType::__construct() must implement interface Doctrine\Common\Persistence\ManagerRegistry, none given, called in /home/maximstrutinskiy/Sites/blog-symfony/blog/var/cache/dev/classes.php on line 15686 and defined
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('shortTitle')
            ->addIdentifier('shortDescriptions')
            ->addIdentifier('postDate')//            ->addIdentifier('id') -<
        ;
    }

    public function toString($object)
    {
        return $object instanceof Post
            ? $object->getShortTitle()
            : 'Blog Post'; // shown in the breadcrumb on the create view
    }
}