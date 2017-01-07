<?php

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BlogBundle\Entity\Post as Post;


class LoadPostData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        //add you custom Post in $post array
        //add tags + category"s <----------------------------------------
        $postContent = [
            ['1Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?'],
            ['2Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?'],
            ['3Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?'],
            ['4Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?'],
            ['5Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?'],
            ['6Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?'],
            ['7Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?'],
            ['8Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?'],
            ['9Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?'],
            ['10Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?'],
            ['11Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?'],
        ];

        foreach ($postContent as list($shortTitle, $longTitle, $shortDescription, $longDescription)) {
            $post = new Post();
            $post->setShortTitle($shortTitle);
            $post->setLongTitle($longTitle);
            $post->setShortDescriptions($shortDescription);
            $post->setLongDescriptions($longDescription);
            $post->setPostDate(new \DateTime);

            $manager->persist($post);
            $manager->flush();
        }

    }
}