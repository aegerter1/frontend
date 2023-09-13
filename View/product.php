<?php
include('config/app.php');
include('header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

    </div>
    <!--Product list table -->
    <div class="row">

        <div class="col-12">

            <h2>Product list</h2>
            <!-- Add new product -->
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

    <!-- Content Row -->


</div>
<!-- /.container-fluid -->


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="<?php echo $site_url; ?>assets/js/bootstrap.min.js"></script>
<script>
    /*
    Ajax call all products
    */
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

    });
    //ajax delete product
    $('body').on('click', '.deleteProduct', function() {
        var sku = $(this).attr('data-sku');
        // delete confirm alert show
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
        // reload
        location.reload();
    });
</script>
<script>
    window.onload = function() {
        // browser cookies check
        checkCookie();
    }
    // get cookies function
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

    //check cookies function
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
<?php include('footer.php'); ?>