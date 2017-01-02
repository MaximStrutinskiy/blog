<?php

namespace BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BlogBundle\Entity\Tag as Tag;

class LoadTagData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        //add you custom Tag in $tags array
        $tags = [
            "BackEnd",
            "FrontEnd",
            "WebDesign",
            "CMS",
            "JS",
            "Html",
            "Angular",
            "Css",
            "Scss",
            "Gulp",
            "Grunt",
            "Linux",
        ];

        foreach ($tags as &$value) {
            $tag = new Tag();
            $tag->setName($value);

            $manager->persist($tag);
            $manager->flush();
        }

    }
}