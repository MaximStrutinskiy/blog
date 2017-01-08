<?php

namespace BlogBundle\Forms\DataTransformer;

use BlogBundle\Entity\Post;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class PostImageTransformer implements DataTransformerInterface
{

    public function transform($img)
    {
        return 'shalam/balam';
    }

    public function reverseTransform($img)
    {
        return 'balam/shalam';
    }
}