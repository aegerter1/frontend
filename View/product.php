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
                    $("#productData").append("<tr><td>" + value.product_id + "</td><td>" + value.name + "</td><td>" + value.sku + "</td><td>" + value.description + "</td><td>" + value.price + "</td><td><a href='' class='btn btn-info btn-sm'>Edit</a><a href='' class='btn btn-danger btn-sm'>Delete</a><td></tr>")
                })
                console.log(data);
            }
        });
        $(document).on('submit', '#loginForm', function(e) {
            e.preventDefault();
            console.log("Login");


            //setcookies();

        });

        /*function setcookies() {
            const currentDate = new Date();
            currentDate.setTime(currentDate.getTime() + (24 * 60 * 60 * 100));
            document.cookie = "token=test";
        }*/
    </script>
</body>

</html>