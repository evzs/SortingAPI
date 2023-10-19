<?php

$path_segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
$directory_name = end($path_segments);

$class_name = 'SortingAPI\\services\\' . ucfirst($directory_name) . 'Service';

if (class_exists($class_name)) {
    $service = new $class_name();
} else {
    die("Class $class_name not found.");
}

//require __DIR__ . '/../src/BubbleSortService.php';
//require __DIR__ . '/../vendor/autoload.php';
//$path_segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
//$directoryName = end($path_segments);
////$className =  'SortingAPI\\'.ucfirst($directoryName). 'Service';
////require __DIR__. '/src/'.$className;
//$service = new \SortingAPI\BubbleSortService();
////$theServiceName = $_SERVER['PHP_SELF'];
////$theServiceName = explode('/', $theServiceName);
////$theServiceName = $theServiceName[count($theServiceName)-2];
////$service = new $theServiceName;
////
//////$data = $_GET['data'] ?? null;
//////$result = $service->trigger($data);
//////
//////echo json_encode($result);