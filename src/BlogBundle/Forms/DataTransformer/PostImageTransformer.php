<?php

namespace BlogBundle\Forms\DataTransformer;

use BlogBundle\Entity\Post;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class PostImageTransformer implements DataTransformerInterface
{
    private $om;

    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }


    public function transform($om)
    {
        if ($om === null) {
            return $om;
        }

        return new Post($om);
    }

    public function reverseTransform($om)
    {
        // no post number? It's optional, so that's ok
        if (!$om) {
            return;
        }

        $post = $this->om
            ->getRepository('BlogBundle:Post')
            ->find($om);

        if (null === $post) {
            throw new TransformationFailedException(
                sprintf(
                    'An post with number "%s" does not exist!',
                    $om
                )
            );
        }

        return $om;
    }
}