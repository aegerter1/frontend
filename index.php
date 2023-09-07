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
} elseif ($parameter == "logout") {
    include('View/logout.php');
} else {

    include('View/login.php');
}

?>
<script>
    window.onload = function() {
        checkCookie();
    }

    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        let user = getCookie("token");
        if (user != "") {
            console.log(user);
        } else {
            /// window.location.href = 'index.php';
            // user = prompt("Please enter your name:","");
            //  if (user != "" && user != null) {
            // setCookie("username", user, 30);
            //  }
        }
    }
</script>