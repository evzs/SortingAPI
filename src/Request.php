<?php

namespace SortingAPI;

class Request
{
    private $data;

    public function __construct($method, $input_data = null)
    {
        // verifie si la requete HTTP est un GET et si les donnees d'input sont fournies
        if ($method === "GET" && isset($input_data)) {
            // analyse les donnees d'input json et les stocke en tableau associatif
            $this->data = json_decode($input_data, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \InvalidArgumentException("Invalid JSON provided!");
            }
        } else {
            throw new \InvalidArgumentException(
                "Invalid request method or missing data!"
            );
        }
    }

    public function getRequestData()
    {
        return $this->data;
    }
}