<?php

namespace Core\Controller;

class Controller
{
    /**
     * Appeller une vue
     * 
     * @return void
     */
    public function render($view, $params = [])
    {
        require ROOT . '/App/View/' . $view . '.php';
    }
}