<?php
include('config/app.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- login title -->
    <title>Login</title>
    <!-- css link -->
    <link href="<?php echo $site_url; ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $site_url; ?>assets/css/style.css" rel="stylesheet">
    <!-- style area -->
    <style>
        .login-bg {
            background-image: url('<?php echo $site_url; ?>assets/img/img-bgr.png');
            background-position: center;
            background-size: cover;
        }

        #loginForm {
            background: #c7bcbc78;
            padding: 10px;
            margin-top: 100px;
            border-radius: 5px;
            box-shadow: 0px 1px 4px 0px;
        }

        .login-btn {
            background: #ffd07b;
            border: none;
            font-weight: bold;
            color: #000;
            padding: 5px 30px;
        }
    </style>
</head>
<!--body start -->

<body class="login-bg">
    <div class="container">
        <div class="row justify-content-md-center">

            <div class="col-4">
                <!-- Login form start -->
                <form id="loginForm">
                    <h2 class="text-center">Welcome to Fresh Shop <br>Login
                    </h2>
                    <div id="msg" class="text-white"></div>
                    <div class="form-group py-2">
                        <label>Username</label>
                        <input type="text" name="username" id="username" placeholder="Enter Username" class="form-control">
                    </div>
                    <div class="form-group py-2">
                        <label>Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control">
                    </div>
                    <div class="form-group py-2 text-center">
                        <input type="submit" value="Login" class="btn btn-primary login-btn" onclick="userAction()">
                    </div>
                </form>
                <!-- Login form end-->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo $site_url; ?>assets/js/bootstrap.min.js"></script>
    <script>
        /* Api login*/
        const userAction = async () => {
            var username = $('#username').val(); // get username
            var password = $('#password').val(); // get password
            var msg = "";
            // check validation
            if (username == "" || password == "") {
                // error message
                $('#msg').text('Please enter username and password!')
                return false;
            }
            //call api
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
                // redirect url  after success
                window.location.href = "index.php?page=product";
            }
            // myJson
        }
        $(document).on('submit', '#loginForm', function(e) {
            e.preventDefault();
            console.log("Login");



        });
    </script>

</body>

</html>