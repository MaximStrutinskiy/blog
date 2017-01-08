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

        $menu->addChild('Home', array('route' => 'blog'));

        $menu->addChild('Category', array('route' => ''));

        $menu->addChild('Tag', array('route' => ''));

        $menu->addChild('Search', array('route' => ''));

        return $menu;
    }
}