<?php

namespace BlogBundle\Forms\DataTransformer;

use BlogBundle\Entity\Post;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class PostToNumberTransformer implements DataTransformerInterface
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
            // query for the post with this id
            ->find($value);

        if (null === $post) {
            // causes a validation error
            // this message is not shown to the user
            // see the invalid_message option
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