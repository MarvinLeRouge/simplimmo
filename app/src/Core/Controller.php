<?php
namespace Simplimmo\Core;

class Controller {
    private $twig;

    public function __construct() {
        zlog(get_class($this) . " instantiation");

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views/templates');
        $this->twig = new \Twig\Environment($loader);
    }

    public function render($name, $data = []) {
        echo $this->twig->render($name, $data);
    }
}
