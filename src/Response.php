<?php

namespace SortingAPI;

class Response {
    public static function sendJson($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
