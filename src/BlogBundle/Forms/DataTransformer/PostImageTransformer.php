<?php

namespace BlogBundle\Forms\DataTransformer;

use BlogBundle\Entity\Post;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class PostImageTransformer implements DataTransformerInterface
{
    private $value;

    public function __construct(ObjectManager $value)
    {
        $this->value = $value;
    }


    public function transform($value)
    {
        if ($value === null) {
            return $value;
        }

        return new Post($value);
    }

    public function reverseTransform($value)
    {
        // no post number? It's optional, so that's ok
        if (!$value) {
            return;
        }

        $post = $this->value
            ->getRepository('BlogBundle:Post')
            ->find($value);

        if (null === $post) {
            throw new TransformationFailedException(
                sprintf(
                    'An post with number "%s" does not exist!',
                    $value
                )
            );
        }

        return $value;
    }
}