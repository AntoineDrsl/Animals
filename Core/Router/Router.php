<?php

namespace Core\Router;

class Router
{
    /**
     * Vérifier la page passée en URL
     * 
     * @return boolean
     */
    public function onPage($page)
    {
        if((isset($_GET['page']) && $_GET['page'] == $page)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Vérifier si la page est définie
     * 
     * @return boolean
     */
    public function pageNotDefined()
    {
        if(!isset($_GET['page'])) {
            return true;
        } else {
            return false;
        }
    }
}