<?php

namespace SortingAPI;

abstract class Service {

    protected $algorithm_name;

    public function __construct($algorithm_name) {
        $this->algorithm_name = $algorithm_name;
        $this->trigger();
    }

    public function trigger() {
        $router = new Router($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
        $router->mapAction();

        try {
            $request = new Request($_SERVER['REQUEST_METHOD'], $_GET['data'] ?? null);
            $data = $request->getRequestData();
        } catch (\InvalidArgumentException $e) {
            Response::sendJson(['error' => $e->getMessage()]);
            return;
        }

        $sorted_data = static::sort($data);

        Response::sendJson(['original' => $data, 'sorted' => $sorted_data]);
    }

    abstract public static function sort(array $data): array;
}
