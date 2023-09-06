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
        <div class="row justify-content-md-center">
            <div class="col-4">
                <form id="loginForm">
                    <h2 class="text-center">Fresh Shop Login
                    </h2>
                    <div id="msg" class="text-danger"></div>
                    <div class="form-group py-2">
                        <label>Username</label>
                        <input type="text" name="username" id="username" placeholder="Enter Username" class="form-control">
                    </div>
                    <div class="form-group py-2">
                        <label>Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control">
                    </div>
                    <div class="form-group py-2">
                        <input type="submit" value="Login" class="btn btn-primary" onclick="userAction()">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo $site_url; ?>assets/js/bootstrap.min.js"></script>
    <script>
        const userAction = async () => {
            var username = $('#username').val();
            var password = $('#password').val();
            var msg = "";
            if (username == "" || password == "") {
                $('#msg').text('Please enter username and password!')
                return false;
            }
            const response = await fetch('https://campus.csbe.ch/sollberger-manuel/uek307/Authenticate', {
                mode: 'no-cors',
                method: 'POST',
                body: JSON.stringify({
                    username: username, //'root',
                    password: password //'sUP3R53CR3T#',
                }), // string oder object
                headers: {
                    'Content-Type': 'application/json',
                    "access-control-allow-origin": "*",
                    'Access-Control-Allow-Headers': 'Content-Type, Authorization',
                    'Access-Control-Allow-Methods': '*',
                },
                //credentials: false,
                exposedHeaders: ["set-cookie"],

            });
            //console.log(response.data);
            const myJson = await response.statusText; //extract JSON from the http response

            console.log(myJson);
            if (myJson != "Success.") {
                window.location.href = "index.php?page=product";
            }
            // myJson
        }
        $(document).on('submit', '#loginForm', function(e) {
            e.preventDefault();
            console.log("Login");


            //setcookies();
            /*$.ajax({
                method: "POST",
                url: "Controller/LoginController.php",
                data: $(this).serialize(),
                success: function(data) {
                    //console.log(data);
                }
            })*/
        });

        /*function setcookies() {
            const currentDate = new Date();
            currentDate.setTime(currentDate.getTime() + (24 * 60 * 60 * 100));
            document.cookie = "token=test";
        }*/
    </script>
</body>

</html>