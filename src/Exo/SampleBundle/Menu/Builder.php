<?php

namespace Exo\SampleBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Accueil', array(
            'route' => 'livre'
        ));

        $menu->addChild('Author', array(
            'route' => 'author'
        ));

        return $menu;
    }
}