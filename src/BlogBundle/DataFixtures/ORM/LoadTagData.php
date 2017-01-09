<?php
namespace BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use BlogBundle\Entity\Tag as Tag;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadTagData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        //add you custom Tag in $tags array
        $tags = [
            'BackEnd',
            'FrontEnd',
            'WebDesign',
            'CMS',
            'JS',
            'Html',
            'Angular',
            'Css',
            'Scss',
            'Gulp',
            'Grunt',
            'Linux',
        ];


        foreach ($tags as &$name) {
            $tag = new Tag();
            $tag->setName($name);

            $manager->persist($tag);
            $manager->flush();

//            $this->addReference($name, $tag);
        }
    }

    public function getOrder()
    {
        return 2;
    }
}