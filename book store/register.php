<?php
include "includes/Validation/isGuest.php";
include 'includes/app-entry-point.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets\css\style.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: white;height:55px;opacity: 0.9;">
        <div class="container-fluid">
            <a class="navbar-brand me-2" href="">
                <h1 class="logo" style="font-size: 36px;font-weight: 600;font-family: initial;margin-left:20px;margin-top: 5px;color:black;">BookStore</h1>
            </a>
            <!-- ------------------------------- -->
            <button class="navbar-toggler" type="button" onclick="myFunction()" data-mdb-toggle="collapse" data-mdb-target="#mytoggler" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="margin-top: -16px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="31" fill="currentColor" class="bi bi-justify" viewBox="1 1 10 10">
                    <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <div class="collapse navbar-collapse" id="mytoggler">
                <ul class="home-link navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="background" style="width: 100%;height: 100%;position: fixed;top: 0;bottom: 0;background-image: url('siteimg/slider1.jpg');background-size: cover;filter: blur(2px);">
    </div>
    <!-- Section: Design Block -->
        <div class="reg container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <form action="includes/API/NewUser.php" method="POST" id="form" style="padding: inherit;">
                            <h5 class="fw-bold " style="letter-spacing: 2px;font-size:30px;color: rgb(233, 95, 3);">Create your account</h5>

                            <div class="eam input-box">
                                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                                <input type="text" name="name" id="name" placeholder="Enter your Name" />
                                <div class="error" style="color: red;font-size: 14.5px;margin-top: 5px;display: flex;position: absolute;"></div>
                            </div>
                            <div class="eam input-box">
                                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                                <input type="email" name="email" id="email" placeholder="Enter your Email" />
                                <div class="error" style="color: red;font-size: 14.5px;margin-top: 5px;display: flex;position: absolute;"></div>
                            </div>
                            <div class="eam input-box">
                                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                                <input type="text" name="phone" id="phone" placeholder="phone Number" />
                                <div class="error" style="color: red;font-size: 14.5px;margin-top: 5px;display: flex;position: absolute;"></div>
                            </div>
                            <div class="eam input-box">
                                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                                <input type="password" name="password" id="password" placeholder="Enter your password" />
                                <div class="error" style="color: red;font-size: 14.5px;margin-top: 5px;display: flex;position: absolute;"></div>
                            </div>

                            <div class="agree">
                                <input type="checkbox" id="agreement" />
                                <label>agree to the terms and condition</label>
                            </div>

                            <div>
                                <button class="btn" style="width: 100%;">Create</button>
                                <p class="mb-5 pb-lg-2" style="color: #393f81;margin-top: 20px;margin-bottom: 9px !important;">already have an account?
                                    <a href="login.php" class="login-link">login</a>
                                <div class="her">
                                    <a href="#!" class="link small">Terms of use.</a>
                                    <a href="#!" class="link small">Privacy policy</a>
                                </div>
                            </div>
                            <?php
                            if (isset($_GET['error']))
                                echo '</br><small>This email is already exists</small>';
                            ?>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <script>
            // Targetting all classes & id from HTML
            let id = (id) => document.getElementById(id);
            let classes = (classes) => document.getElementsByClassName(classes);
            let name = id("name"),
                email = id("email"),
                phone = id("phone"),
                password = id("password"),
                form = id("form"),
                errorMsg = classes("error");

            // Adding input event listeners for real-time validation
            name.addEventListener("input", () => engine(name, 0, "!!Name cannot be blank", ""));
            email.addEventListener("input", () => engine(email, 1, "!!Email cannot be blank", "Invalid email format write it like : abc@gamil.com"));
            phone.addEventListener("input", () => engine(phone, 2, "!!Phone cannot be blank", ""));
            password.addEventListener("input", () => engine(password, 3, "!!Password cannot be blank", ""));

            // Adding the submit event listener
            form.addEventListener("submit", (e) => {
                e.preventDefault();

                // Validate all fields before submitting
                engine(name, 0, "!!Name cannot be blank", "");
                engine(email, 1, "!!Email cannot be blank", "Invalid email format write it like : abc@gamil.com");
                engine(phone, 2, "!!Phone cannot be blank", "");
                engine(password, 3, "!!Password cannot be blank", "");

                // Check if all fields are valid before submitting
                if (validateForm()) {
                    form.submit();
                }
            });

            // Validation engine function
            let engine = (id, serial, emptyMessage, formatMessage) => {
                let value = id.value.trim();

                if (value === "") {
                    errorMsg[serial].innerHTML = emptyMessage;
                } else {
                    // Check email format using a regular expression
                    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(value)) {
                        errorMsg[serial].innerHTML = formatMessage;
                    } else {
                        errorMsg[serial].innerHTML = "";
                    }
                }
            };

            // Function to validate the entire form
            let validateForm = () => {
                for (let i = 0; i < errorMsg.length; i++) {
                    if (errorMsg[i].innerHTML !== "") {
                        return false; // If any error message is present, the form is not valid
                    }
                }
                return true; // All fields are valid
            };
        </script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>