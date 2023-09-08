<?php
include('config/app.php')
?>
<!DOCTYPE html>
<html>

<head>
    <link href="<?php echo $site_url; ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $site_url; ?>assets/css/style.css" rel="stylesheet">

</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-4">
                <?php include('menu.php'); ?>
            </div>
            <div class="col-8">

                <h2>Product list
                </h2>
                <a href="index.php?page=addproduct" class="btn btn-success btn-sm">Add Product</a>
                <table class="table table-borderd">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="productData">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addCategory">
                        <input type="text" class="form-control" name="name" id="name">
                        <input type="submit" class="btn btn-sm btn-info" value="save" onclick="userAction()">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo $site_url; ?>assets/js/bootstrap.min.js"></script>
    <script>
        /*const userAction = async () => {
            const response = await fetch('https://campus.csbe.ch/sollberger-manuel/uek307/Categories', {
                mode: 'no-cors',
                method: 'get',

                headers: {
                    'Content-Type': 'application/json',
                    "access-control-allow-origin": "*",
                }
            });
            const myJson = await response.json(); //extract JSON from the http response
            console.log(myJson);
            // do something with myJson
        }*/
        $.ajax({
            mode: 'no-cors',
            method: "get",
            url: "https://campus.csbe.ch/sollberger-manuel/uek307/Products",
            headers: {
                'Content-Type': 'application/json',
                "access-control-allow-origin": "*",
            },
            success: function(data) {
                $.each(data, function(index, value) {
                    $("#productData").append("<tr><td>" + value.product_id + "</td><td>" + value.name + "</td><td>" + value.sku + "</td><td>" + value.description + "</td><td>" + value.price + "</td><td><a href='index.php?page=editproduct&sku=" + value.sku + "' class='btn btn-info btn-sm' data-sku=" + value.sku + ">Edit</a><a href='#' class='btn btn-danger btn-sm deleteProduct' data-sku=" + value.sku + ">Delete</a><td></tr>")
                })
                console.log(data);
            }
        });
        $(document).on('submit', '#loginForm', function(e) {
            e.preventDefault();
            console.log("Login");


            //setcookies();

        });
        $('body').on('click', '.deleteProduct', function() {
            var sku = $(this).attr('data-sku');
            if (confirm('are you sure want to delete?')) {
                $.ajax({
                    mode: 'no-cors',
                    method: "delete",
                    url: "https://campus.csbe.ch/sollberger-manuel/uek307/Product/" + sku,
                    headers: {
                        'Content-Type': 'application/json',
                        "access-control-allow-origin": "*",
                    },
                    dataType: 'json',
                    contentType: 'application/json',

                    success: function(data) {
                        alert('success');
                        console.log(data);
                    }


                })
            } else {
                return false;
            }
            location.reload();
        });

        /*function setcookies() {
            const currentDate = new Date();
            currentDate.setTime(currentDate.getTime() + (24 * 60 * 60 * 100));
            document.cookie = "token=test";
        }*/
    </script>
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
                window.location.href = 'index.php';
                // user = prompt("Please enter your name:","");
                //  if (user != "" && user != null) {
                // setCookie("username", user, 30);
                //  }
            }
        }
    </script>
</body>

</html>