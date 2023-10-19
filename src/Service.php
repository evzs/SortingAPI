<?php

namespace SortingAPI;

abstract class Service
{
    protected $algorithm_name;

    public function __construct()
    {
        $this->algorithm_name = static::class;
        $this->triggerExecution();
    }

    // TODO: redistribuer la repartition des responsabilites de la methode trigger dans les autres classes pour rendre trig + condense et renforcer SoC + SRP
    // TODO: ajouter une vraie gestion d'erreurs (+ avec codes HTTP)
    public function triggerExecution()
    {
        // cree une instance de Router pour gerer la demande entrante
        $router = new Router(
            $_SERVER["REQUEST_URI"],
            $_SERVER["REQUEST_METHOD"]
        );
        $router->mapAction();

        // cree une instance de Request pour traiter les donnees de la demande
        $request = new Request(
            $_SERVER["REQUEST_METHOD"],
            $_GET["data"] ?? null
        );
        $data = $request->getRequestData();

        // trie les donnees en utilisant la methode de tri specifique de la sous-classe
        $sorted_data = static::sort($data);

        Response::sendJson([/*'original' => $data,*/ "sorted" => $sorted_data]);
    }

    abstract public static function sort(array $data): array;
}