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

    /**
     * Générer une route dans les vues
     * 
     * @param string $route
     * @param int|string|false $id
     * 
     * @return string
     */
    public function goto($route, $id = false)
    {
        $route = 'index.php?page=' . $route;
        if($id) {
            $route .= '&id=' . $id;
        }
        return $route;
    }

    /**
     * Retourner la classe 'active' ou false en fonction de la page
     * 
     * @param string $page
     * @param string $onPage
     * 
     * @return string|false
     */
    public function onPage($page, $onPage)
    {
        if($onPage === $page) {
            return 'active';
        } else {
            return false;
        }
    }
}