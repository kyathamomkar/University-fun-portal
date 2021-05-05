<?php
// Check user login or not
session_start();
error_reporting(0);
if($_SESSION['loggedinuser']!=""){
    header("location: /UserHomePage.php");
} ?>
<html lang="en">

<head>
    <title>
        Login Page
    </title>
    <meta charset="utf-8" http-equiv="refresh">
    <!-- This line will give the instruction on how the browser control the page how suppose to show the content in Tablet, Phone-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="css/mijares.css" type="text/css" rel="stylesheet">
    <link href="css/responsive_setting.css" type="text/css" rel="stylesheet">


    <!-- JS and jQuery -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link href="css/login_form.css" rel="stylesheet" type="text/css">
</head>





<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-light badge-dark " style="background-color:#04091e;">

        <div class="conatainer-fluid">
            <img id="logo" src="images/ubslogo.png" alt="Logo" class="navbar-brand">
        </div>

        <div class=" conatainer-fluid" style="background-color:seagreen;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" ></span>
            </button>
        </div>



        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item p-4">
                    <a class="nav-link " href="default.html" style="color: lightblue;">HOME <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item p-4">
                    <a class="nav-link active" href="LoginPage.php" style="color: lightblue;text-decoration: underline;text-decoration-style:wavy;text-decoration-color:#00a6ff;">LOGIN</a>
                </li>
                <li class="nav-item p-4">
                    <a class="nav-link" href="Register.html" style="color: lightblue;">REGISTER</a>
                </li>
            </ul>
            <canvas id="canvas" width="100" height="100">
            </canvas>

        </div>


    </nav>
</header>

<script>
    var canvas = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");
    var radius = canvas.height / 2;
    ctx.translate(radius, radius);
    radius = radius * 0.90
    setInterval(drawClock, 1000);

    function drawClock() {
        drawFace(ctx, radius);
        drawNumbers(ctx, radius);
        drawTime(ctx, radius);
    }

    function drawFace(ctx, radius) {
        var grad;
        ctx.beginPath();
        ctx.arc(0, 0, radius, 0, 2 * Math.PI);
        ctx.fillStyle = 'lightblue';
        ctx.fill();
        grad = ctx.createRadialGradient(0, 0, radius * 0.95, 0, 0, radius * 1.05);
        grad.addColorStop(0, '#333');
        grad.addColorStop(0.5, 'white');
        grad.addColorStop(1, '#333');
        ctx.strokeStyle = grad;
        ctx.lineWidth = radius * 0.1;
        ctx.stroke();
        ctx.beginPath();
        ctx.arc(0, 0, radius * 0.1, 0, 2 * Math.PI);
        ctx.fillStyle = '#333';
        ctx.fill();
    }

    function drawNumbers(ctx, radius) {
        var ang;
        var num;
        ctx.font = radius * 0.15 + "px arial";
        ctx.textBaseline = "middle";
        ctx.textAlign = "center";
        for (num = 1; num < 13; num++) {
            ang = num * Math.PI / 6;
            ctx.rotate(ang);
            ctx.translate(0, -radius * 0.85);
            ctx.rotate(-ang);
            ctx.fillText(num.toString(), 0, 0);
            ctx.rotate(ang);
            ctx.translate(0, radius * 0.85);
            ctx.rotate(-ang);
        }
    }

    function drawTime(ctx, radius) {
        var now = new Date();
        var hour = now.getHours();
        var minute = now.getMinutes();
        var second = now.getSeconds();
        //hour
        hour = hour % 12;
        hour = (hour * Math.PI / 6) +
            (minute * Math.PI / (6 * 60)) +
            (second * Math.PI / (360 * 60));
        drawHand(ctx, hour, radius * 0.5, radius * 0.07);
        //minute
        minute = (minute * Math.PI / 30) + (second * Math.PI / (30 * 60));
        drawHand(ctx, minute, radius * 0.8, radius * 0.07);
        // second
        second = (second * Math.PI / 30);
        drawHand(ctx, second, radius * 0.9, radius * 0.02);
    }

    function drawHand(ctx, pos, length, width) {
        ctx.beginPath();
        ctx.lineWidth = width;
        ctx.lineCap = "round";
        ctx.moveTo(0, 0);
        ctx.rotate(pos);
        ctx.lineTo(0, -length);
        ctx.stroke();
        ctx.rotate(-pos);
    }
</script>

<script>

    function show_pasword(){
        var x = document.getElementById('p');

        if (x.type === "password") {
            x.type = "text";
        }
        else {
            x.type = "password";
        }
    }





</script>








<div class="container-fluid login_div" >

    <form action="Login.php" method="post" class="form formbg">
        <div class="imgcontainer">
            <img src="images/parent-directory-avatar-2png-39-864856-png-images-pngio-avatar-2-png-256_256.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label ><b>Email:</b></label>
            <input type="email" placeholder="ubs@gmail.com" pattern=".+@[a-z]+[.]{1}[a-z]+" name="email" required  class="username">

            <label><b>Password:</b></label>
            <input type="password" placeholder="Ubs@12345" name="psw" required id="p">
            <span><b>Show Password:</b><input type="checkbox" class="showpassword" onclick="show_pasword()"></span>

        </div>

        <div class="container">
            <button type="submit" class="btn btn-primary btn-lg buttonlogin" name="login">Sign in</button>
            <span class="psw"><a class="basetextcolor"  href="Register.html">Not Registered yet?</a></span>
        </div>


    </form>

</div>


<footer class="container-fluid foot">


  <div class="container-fluid foot_div">
        <p class="h6 foot_text">Copyright &copy;2021 All rights reserved | This project is developed by <span id="name">Team 11 AdvSE 2021</span> </p>
 </div>
 
</footer>

</body>

</html>