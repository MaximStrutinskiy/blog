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
            ->add('longDescriptions', 'textarea', array('attr' => array('class' => 'ckeditor')))
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
            ->end();

        $formMapper
            ->get('postDate')
            ->addModelTransformer(
                new PostDateTransformer()
            );
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('shortTitle')
            ->add('shortDescriptions')
            ->add('postDate');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('shortTitle')
            ->addIdentifier('shortDescriptions')
            ->addIdentifier('postDate');
    }

    /**
     * @post Post $object
     */
    public function preUpdate($object)
    {
        $this->processImage($object);
    }

    public function prePersist($object)
    {
        $this->processImage($object);
    }

    private function processImage($object)
    {
        $img = $object->getPostImg();
        if ($img !== null) {
            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$img->getExtension();

            // Move the file to the directory where brochures are stored
            $img->move(
                $this->getConfigurationPool()->getContainer()->getParameter('file_directory'),
                $fileName
            );
            // Update the 'img' property to store the img file name
            // instead of its contents
            $object->setPostImg($fileName);
        }
    }

    public function toString($object)
    {
        return $object instanceof Post
            ? $object->getShortTitle()
            : 'Blog Post';
    }
}