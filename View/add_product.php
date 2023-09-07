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
                <form id="addCategory">
                    <div class="form-group">
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
                    <input type="submit" class="btn btn-sm btn-info" value="save" onclick="userAction()">
                </form>
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