<?php
namespace Simplimmo\Core\Controller;

class Controller {
    protected $model;
    protected $view;

    public function __construct($model = null, $view = null) {
        $this->model = $model;
        $this->view = $view;
    }

    public function load() {
        $data = $this->model->get_data();
        $this->view->output($data);
    }
}
