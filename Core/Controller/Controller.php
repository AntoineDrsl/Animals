<?php

namespace Core\Controller;

class Controller
{
    /**
     * Appeler une vue
     * 
     * @param string $view
     * @param array $params
     * 
     * @return void
     */
    public function render($view, $params = [])
    {
        ob_start();
        extract($params);
        require ROOT . '/App/View/' . $view . '.php';
        $content = ob_get_clean();

        require ROOT . '/App/View/default.php';
    }

    /**
     * Appeler un fichier du dossier assets
     * 
     * @param string $link
     * 
     * @return string
     */
    public function asset($link)
    {
        return '/public/assets/' . $link;
    }
}