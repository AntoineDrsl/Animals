<?php

namespace Core\Controller;

class Controller
{
    public function render($view, $params = [])
    {
        require ROOT . '/App/View/' . $view . '.php';
    }
}