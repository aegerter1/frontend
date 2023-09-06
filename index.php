<?php
$url = $_SERVER['REQUEST_URI'];
$parameter = isset($_GET['page']) ? $_GET['page'] : '';
if ($parameter == "product") {
    include('View/product.php');
    //$explode = explode('/', $url);
    //$explode = array_slice($explode, 2);
    //var_dump($explode);
    //die();
} elseif ($parameter == "category") {
    include('View/category.php');
} else {

    include('View/login.php');
}
