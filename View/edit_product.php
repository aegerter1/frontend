<?php
include('config/app.php');
$sku = isset($_GET['sku']) ? $_GET['sku'] : '';
include('header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product</h1>
    </div>

    <div class="row">
        <div class="col-8">
            <h2>Product Edit</h2>
            <!-- product edit form-->
            <form id="addprod">
                <div class="form-group">
                    <input type="hidden" name="sku" id="sku" value="<?php echo $sku; ?>">
                    <label>Category</label>
                    <select class="form-control" id="categoryData" name="category">
                        <option>Select Category</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="product_name" id="product_name">
                </div>
                <div class="form-group">
                    <label>Product Image</label>
                    <input type="file" class="form-control" name="product_image" id="product_image">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="description" id="description">
                </div>
                <div class="form-group">
                    <label>price</label>
                    <input type="text" class="form-control" name="price" id="price">
                </div>
                <div class="form-group">
                    <label>available_stock</label>
                    <input type="text" class="form-control" name="available_stock" id="available_stock">
                </div>
                <input type="submit" class="btn btn-sm btn-info" value="save">
            </form>
        </div>
    </div>
</div>
<!-- script area-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="<?php echo $site_url; ?>assets/js/bootstrap.min.js"></script>

<script>
    // ajax call category list
    $.ajax({
        mode: 'no-cors',
        method: "get",
        url: "https://campus.csbe.ch/sollberger-manuel/uek307/Categories",
        headers: {
            'Content-Type': 'application/json',
            "access-control-allow-origin": "*",
        },
        success: function(data) {
            // each loop
            $.each(data, function(index, value) {
                $("#categoryData").append("<option value=" + value.category_id + ">" + value.name + "</option")
            })
            console.log(data);
        }
    });

    // api call get product details
    $.ajax({
        mode: 'no-cors',
        method: "GET",
        url: "https://campus.csbe.ch/sollberger-manuel/uek307/Product/" + <?php echo $sku; ?>,
        headers: {
            'Content-Type': 'application/json',
            "access-control-allow-origin": "*",
        },
        dataType: 'json',
        contentType: 'application/json',

        success: function(data) {
            console.log(data)
            $('#categoryData').val(data.id_category); // put category id
            $('#product_name').val(data.name); // product name
            //$('#product_image').val(data.product_image);
            $('#description').val(data.description); // product description
            $('#price').val(data.price); // product price
            $('#available_stock').val(data.stock); // product stock
        }
    });

    // update product api call
    $(document).on('submit', '#addprod', function(e) {
        e.preventDefault();
        console.log("add product");
        var active = 1;
        var id_category = $('#categoryData').val(); // get category id
        var name = $('#product_name').val(); // get product name
        var product_image = $('#product_image').val(); // get product image
        var description = $('#description').val(); // get product description
        var price = $('#price').val(); // get price
        var stock = $('#available_stock').val(); // get stock
        var sku = $('#sku').val(); // get sku
        var data = JSON.stringify({
            "active": 1,
            "id_category": id_category,
            "name": name,
            "price": price,
            "stock": stock,
            'description': description,
            'product_image': product_image,
        });

        $.ajax({
            mode: 'no-cors',
            method: "PUT",
            url: "https://campus.csbe.ch/sollberger-manuel/uek307/Product/" + sku,
            headers: {
                'Content-Type': 'application/json',
                "access-control-allow-origin": "*",
            },
            dataType: 'json',
            contentType: 'application/json',
            data: data,
            success: function(data) {
                alert('success');
                console.log(data);
            }
        });
        alert('success');
        // redirect url
        window.location.href = 'index.php?page=product';
    });
</script>

<script>
    // windows onload check cookies
    window.onload = function() {
        checkCookie();
    }

    //get cookies function
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

    // check cookies function
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