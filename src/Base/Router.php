<?php

namespace Sandbox\Base;

class Router
{
    public function route(): callable
    {
        $controller = new \Sandbox\Base\Controller\PageController();
        if($_SERVER['REQUEST_URI'] == '/index'){
            return [$controller, 'index'];
        }
        throw new \Error('Not found');
    }

}