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

                <h2>Product Add
                </h2>
                <form id="addprod">
                    <div class="form-group">
                        <input type="hidden" name="sku" id="sku" value="<?php echo rand(100000, 999999); ?>" <label>Category</label>
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo $site_url; ?>assets/js/bootstrap.min.js"></script>
    <script>
        $.ajax({
            mode: 'no-cors',
            method: "get",
            url: "https://campus.csbe.ch/sollberger-manuel/uek307/Categories",
            headers: {
                'Content-Type': 'application/json',
                "access-control-allow-origin": "*",
            },
            success: function(data) {
                $.each(data, function(index, value) {
                    $("#categoryData").append("<option value=" + value.category_id + ">" + value.name + "</option")
                })
                console.log(data);
            }
        });
        $(document).on('submit', '#addprod', function(e) {
            e.preventDefault();
            console.log("add product");

            var active = 1;
            var id_category = $('#categoryData').val();
            var name = $('#product_name').val();
            var product_image = $('#product_name').val();;
            var description = $('#product_name').val();;
            var price = $('#price').val();
            var stock = $('#available_stock').val();
            var sku = $('#sku').val();
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
            window.location.href = 'index.php?page=product';

        });
    </script>
</body>

</html>