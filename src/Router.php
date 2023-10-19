<?php

namespace SortingAPI;

class Router {
    private $path;
    private $method;
    private $base_namespace = 'SortingAPI\\';

    public function __construct($path, $method) {
        $this->path = trim($path, '/');
        $this->method = $method;
    }

    public function mapAction() {
        $action = ucfirst(basename($this->path));

        if (class_exists($this->base_namespace . $action . 'Service')) {
            return $action;
        }

        return 'NotFound';
    }
}
