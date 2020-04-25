<?php

namespace Core\Router;

class Router
{
    public function onPage($page)
    {
        if((isset($_GET['page']) && $_GET['page'] == $page)) {
            return true;
        } else {
            return false;
        }
    }

    public function pageNotDefined()
    {
        if(!isset($_GET['page'])) {
            return true;
        } else {
            return false;
        }
    }
}