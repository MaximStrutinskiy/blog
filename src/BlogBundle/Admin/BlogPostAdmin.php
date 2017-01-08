<?php

namespace BlogBundle\Admin;

use BlogBundle\Forms\DataTransformer\PostDateTransformer;
use BlogBundle\Forms\DataTransformer\PostImageTransformer;
use Sonata\AdminBundle\Admin\AbstractAdmin as Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use BlogBundle\Entity\Post as Post;

class BlogPostAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with(
                'Internal Blog data',
                array('class' => 'col-md-9')
            )
            ->add('longTitle', TextType::class)
            ->add('longDescriptions', TextareaType::class)
            ->add(
                'postDate',
                NumberType::class
            )
            ->end()
            ->with(
                'Landing Blog data',
                array('class' => 'col-md-3')
            )
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
                    'data_class' => null,
                    'required' => false,
                )
            )
            ->end()
        ;

        $formMapper
            ->get('postImg')
            ->addModelTransformer(
                new PostImageTransformer(
                    $this->getConfigurationPool()->getContainer()->get('doctrine.orm.entity_manager')
                )//fix this sheet!? can't upload image
            )
        ;

        $formMapper
            ->get('postDate')
            ->addModelTransformer(
                new PostDateTransformer()
            )
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('shortTitle')
            ->add('shortDescriptions')
            ->add('postDate')
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
            ->addIdentifier('postDate')
        ;
    }

    public function toString($object)
    {
        return $object instanceof Post
            ? $object->getShortTitle()
            : 'Blog Post';
    }
}