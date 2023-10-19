<?php

namespace SortingAPI;

class Router
{
    private $path;
    private $method;
    private $base_namespace = "SortingAPI\\";

    public function __construct($path, $method)
    {
        $this->path = trim($path, "/");
        $this->method = $method;
    }

    public function mapAction()
    {
        // extrait le nom de l'action base sur le chemin donne
        $action = ucfirst(basename($this->path));

        // verifie si la classe Service correspondante existe dans le namespace
        if (class_exists($this->base_namespace . $action . "Service")) {
            return $action;
        }

        return "NotFound";
    }
}