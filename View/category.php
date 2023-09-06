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

                <h2>Category list
                </h2>
                <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</a>
                <table class="table table-borderd">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="categoryData">

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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addCategory">
                        <input type="text" class="form-control" name="name" id="name">
                        <input type="submit" class="btn btn-sm btn-info" value="save" onclick="userAction()">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo $site_url; ?>assets/js/bootstrap.min.js"></script>
    <script>
        const userAction = async () => {
            var name = $('#name').val();
            const response = await fetch('https://campus.csbe.ch/sollberger-manuel/uek307/Category', {
                mode: 'no-cors',
                method: 'post',
                body: JSON.stringify({
                    "active": 1,
                    "name": name

                }),
                headers: {
                    'Content-Type': 'application/json',
                    "access-control-allow-origin": "*",
                    'Access-Control-Allow-Headers': 'Content-Type, Authorization',
                    'Access-Control-Allow-Methods': '*',
                }
            });
            const myJson = await response.statusText; //extract JSON from the http response
            console.log(myJson);
            alert('success');
            // do something with myJson
        }
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
                    $("#categoryData").append("<tr><td>" + value.category_id + "</td><td>" + value.name + "</td><td><a href='' class='btn btn-info btn-sm categoryEdit' data-id=" + value.category_id + ">Edit</a><a href='' class='btn btn-danger btn-sm'>Delete</a><td></tr>")
                })
                console.log(data);
            }
        });

        $(document).on('submit', '#addCategory', function(e) {
            e.preventDefault();
            var name = $('#name').val();
            /*$.ajax({
                mode: 'no-cors',
                method: "post",
                url: "https://campus.csbe.ch/sollberger-manuel/uek307/Category",
                headers: {
                    'Content-Type': 'application/json',
                    "access-control-allow-origin": "*",
                },
                dataType: 'json',
                contentType: 'application/json',
                body: JSON.stringify({
                    "active": 1,
                    "name": "Cool Products1"

                }),
                success: function(data) {
                    alert('success');
                    console.log(data);
                }
            });*/

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