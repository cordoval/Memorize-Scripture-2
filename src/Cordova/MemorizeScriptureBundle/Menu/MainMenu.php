<?php

namespace Cordova\MemorizeScriptureBundle\Menu;

use Knplabs\Bundle\MenuBundle\Menu;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;

class MainMenu extends Knplabs\Bundle\MenuBundle\Menu
{
    /**
     * @param Request $request
     * @param Router $router
     */
    public function __construct (Request $request, Router $router)
    {
        parent::__construct();

        $this->setCurrentUri($request->getRequestUri());

        $this->addChild('Home', $router->generate('homepage'));
        $this->addChild('About');
    }

}