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
            <div class="col-6">
                <form id="loginForm">
                    <h2>Fresh Shop Login
                    </h2>
                    <div class="form-group py-2">
                        <label>Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group py-2">
                        <label>Password</label>
                        <input type="password" name="password" name="password" class="form-control">
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
            const response = await fetch('https://campus.csbe.ch/sollberger-manuel/uek307/Categories', {
                mode: 'no-cors',
                method: 'get',

                headers: {

                    'Cookie': 'name=value; name2=value2',

                }
            });
            const myJson = await response.json(); //extract JSON from the http response
            console.log(myJson);
            // do something with myJson
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