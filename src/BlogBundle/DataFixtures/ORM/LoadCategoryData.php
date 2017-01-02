<?php

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BlogBundle\Entity\Category as Category;


class LoadCategoryData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        //add you custom Category in $category array
        $categories = [
            ['WebDesign', 'Some description'],
            ['FrontEnd', 'Some description'],
            ['BackEnd', 'Some description'],
        ];

        foreach ($categories as list($name, $description)) {
            $category = new Category();
            $category->setName($name);
            $category->setDescription($description);

            $manager->persist($category);
            $manager->flush();
        }

    }
}