<?php
namespace BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use BlogBundle\Entity\Category as Category;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        //add you custom Category in $category array
        $categories = [
            ['WebDesign', 'Some description'],
            ['FrontEnd', 'Some description'],
            ['BackEnd', 'Some description'],
        ];

        //generate addReference($name) $name - name tag
        foreach ($categories as list($name, $description)) {
            $category = new Category();
            $category->setName($name);
            $category->setDescription($description);

            $manager->persist($category);
            $manager->flush();

            $this->addReference($name, $category);
        }
    }

    public function getOrder()
    {
        return 1;
    }
}