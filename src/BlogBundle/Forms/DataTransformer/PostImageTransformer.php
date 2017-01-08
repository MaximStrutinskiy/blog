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
        if ($img !== null) {
            $img = md5(uniqid()).'.'.$img->getExtension();
        }

        return $img;
    }

    public function reverseTransform($img)
    {
        if ($img !== null) {
            $img = md5(uniqid()).'.'.$img->getExtension();
        }

        return $img;
    }
}