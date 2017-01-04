<?php

namespace AppBundle\Form\DataTransformer;

use BlogBundle\Entity\Post;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class PostToNumberTransformer implements DataTransformerInterface
{
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Transforms an object (post) to a string (number).
     *
     * @param  Post|null post
     * @return string
     */
    public function transform($post)
    {
        if (null === $post) {
            return '';
        }

        return $post->getId();
    }

    /**
     * Transforms a string (number) to an object (post).
     *
     * @param  string $postNumber
     * @return post|null
     * @throws TransformationFailedException if object (post) is not found.
     */
    public function reverseTransform($postNumber)
    {
        // no post number? It's optional, so that's ok
        if (!$postNumber) {
            return;
        }

        $post = $this->manager
            ->getRepository('BlogBundle:Post')
            // query for the post with this id
            ->find($postNumber);

        if (null === $post) {
            // causes a validation error
            // this message is not shown to the user
            // see the invalid_message option
            throw new TransformationFailedException(
                sprintf(
                    'An post with number "%s" does not exist!',
                    $postNumber
                )
            );
        }

        return $post;
    }
}