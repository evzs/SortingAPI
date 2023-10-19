<?php
// TODO: peut-etre l'ajouter a une lib (style STDLib? - flou)

// divise l'URL en segments
$path_segments = explode(
    "/",
    trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/")
);
// recupere le nom du dossier a partir du dernier segment de l'URL
$directory_name = end($path_segments);

// construit le nom de classe en utilisant le repertoire comme base
$class_name = "SortingAPI\\services\\" . ucfirst($directory_name) . "Service";

if (class_exists($class_name)) {
    $service = new $class_name();
} else {
    die("Class $class_name not found.");
}