<?php
namespace BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use BlogBundle\Entity\Post as Post;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadPostData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        //all category in LoadCategoryData.php
        //all tags in LoadTagData.php
        $postContent = [
            [
                '1Lorem ipsum dolor sit amet.',
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?',
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?',
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, quis?',
                'BackEnd',
                ['Scss', 'Css'],
            ],
        ];

        foreach ($postContent as list($shortTitle, $longTitle, $shortDescription, $longDescription, $category, $setTags)) {
            $post = new Post();
            $post->setShortTitle($shortTitle);
            $post->setLongTitle($longTitle);
            $post->setShortDescriptions($shortDescription);
            $post->setLongDescriptions($longDescription);
            $post->setCategory($this->getReference($category));


            foreach ($setTags as $tagArray) {
                $post->addTag($this->getReference($tagArray));
            }

            $post->setPostDate(new \DateTime);

            $manager->persist($post);
            $manager->flush();
        }
    }

    public function getOrder()
    {
        return 3;
    }
}