<?php


namespace App;


class Layout
{
    private $path;

    function  __construct(string $name)
    {
        $this->path = 'Views/' . $name .'.view.php';
    }

    function render(string $view, array $params = [])
    {
        $view = 'Views/' . $view .'.view.php';
        ob_start();
        extract($params);
        require_once $view;
        $content =  ob_get_clean() . PHP_EOL;
        ob_start();
        require $this->path;
        return ob_get_clean();
    }

}
/*class Layout {
    private $path;

    function __construct(string $name) {
        $this->path = 'views/'. $name . '.view.php';
    }

    function render(string $view, array $params = []):string {
        // Création de la Vue
        $view = 'views/'. $view . '.view.php';
        ob_start();
        extract($params);
        require_once $view;
        $content = ob_get_clean() . PHP_EOL;
        // Création du Layout
        ob_start();
        require $this->path;
        return ob_get_clean();
    }
}*/
