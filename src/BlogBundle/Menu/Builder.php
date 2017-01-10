<?php

namespace BlogBundle\Menu;


use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;


class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {

        $menu = $factory->createItem('root');

        //Home page
        $menu->addChild('Home', array('route' => 'blog'));

        //Category's
        $em = $this->container->get('doctrine.orm.entity_manager');
        $categoryRepository = $em->getRepository("BlogBundle:Category");
        $allCategory = $categoryRepository->findAll();

        $menu->addChild('Categorys', array('route' => ''));
        foreach ($allCategory as $category) {
            $menu['Categorys']->addChild($category->getName(), array('route' => ''));
        }

        //Tags
        $tagsRepository = $em->getRepository("BlogBundle:Tag");
        $allTags = $tagsRepository->findAll();

        $menu->addChild('Tags', array('route' => ''));
        foreach ($allTags as $tags) {
            $menu['Tags']->addChild($tags->getName(), array('route' => ''));
        }

        //Search page
        $menu->addChild('Search', array('route' => 'search'));

        return $menu;
    }
}