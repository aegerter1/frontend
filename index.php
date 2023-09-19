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
} elseif ($parameter == "addproduct") {
    include('View/add_product.php');
} elseif ($parameter == "editproduct") {
    include('View/edit_product.php');
} elseif ($parameter == "logout") {
    include('View/logout.php');
} else {
    include('View/login.php');
}
