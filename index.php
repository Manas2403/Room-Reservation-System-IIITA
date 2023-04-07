<?php
require_once("./model/connect.php");
@error_reporting(0);
session_start();
if (isset($_SESSION['username'])) {
    if ($_SESSION['userType'] == 1) {
        header('Location: adminhome.php');
    } else if ($_SESSION['userType'] == 2) {
        header('Location: facultyhome.php');
    } else if ($_SESSION['userType'] == 3) {
        header('Location: ');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Room Reservation System IIITA</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

        <link
            rel="stylesheet"
            type="text/css"
            href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"
        />

        <link
            rel="stylesheet"
            type="text/css"
            href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/util.css" />
        <link rel="stylesheet" type="text/css" href="css/main.css" />
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 p-t-30 p-b-50">
                    <span class="login100-form-title p-b-41"> <span style="color:#FAD02C">LDAP</span> Login </span>
                    <form
                        class="login100-form validate-form p-b-33 p-t-5"
                        action="controller/login.php"
                        method="POST"
                        onsubmit="return checkLogin()"
                    >
                        <div class="wrap-input100 validate-input">
                            <input
                                id="email"
                                class="input100"
                                type="text"
                                name="email"
                                placeholder="Username"
                            />
                            <span
                                class="focus-input100"
                                data-placeholder="&#xe82a;"
                            ></span>
                            <span class="stop" id="idSpan"></span>
                        </div>

                        <div class="wrap-input100 validate-input">
                            <input
                                id="password"
                                class="input100"
                                type="password"
                                name="password"
                                placeholder="Password"
                                autocomplete="new-password"
                            />
                            <span
                                class="focus-input100"
                                data-placeholder="&#xe80f;"
                            ></span>
                            <span class="stop" id="passwordSpan"></span>
                        </div>

                        <div class="container-login100-form-btn m-t-32">
                            <button
                                class="login100-form-btn"
                                type="submit"
                                value="submit"
                            >
                                Sign In
                            </button>
                        </div>
                        <br />
                    </form>
                </div>
            </div>
        </div>
        <script src="js/main.js"></script>
        <script src="js/validateLogin.js"></script>
    </body>
</html>
