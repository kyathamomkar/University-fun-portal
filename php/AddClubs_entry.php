<?php
// Check user login or not
session_start();
if($_SESSION['loggedinuser']==""){
    header("location: /LoginPage.php");
}

?>


<html lang="en">

<head>  <meta charset="utf-8" http-equiv="refresh">
    <title>
        Add Clubs Page
    </title>

    <!-- This line will give the instruction on how the browser control the page how suppose to show the content in Tablet, Phone-->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta charset="utf-8">



    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="css/mijares.css" type="text/css" rel="stylesheet">
    <link href="css/responsive_setting.css" type="text/css" rel="stylesheet">
    <script src="js/javascriptcode.js"></script>

    <!-- JS and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="sweetalert/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<style>
	body{
	background: url(https://placeimg.com/img/bg-2.svg) repeat;
     
	}
	</style>
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
                    <a class="nav-link active" href="UserHomePage.php" style="color: lightblue;">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item p-4">
                    <a class="nav-link" href="Clubs.php" style="color: lightblue;">BACK <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <canvas id="canvas" width="100" height="100">
            </canvas>

        </div>


    </nav>
</header>
 

<!-- This code for SweetAlert -->
<script type="text/javascript">
    $(function (){
        $('#sub').click(function (e){

            var x = this.form.checkValidity();
            if(x) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Checking...',
                    showConfirmButton: false,
                    timer: 3500,
                })

            }
            else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    text: 'Make Sure you Filled all fields!',
                    footer: 'Click OK, please.'
                })
            }

        });
    });



</script>




<div class="container-fluid">
    <div class="container-fluid register">
        <p class="h3 utaregister"> Add Club Info </p>
    </div>




</div>


<div class="container-fluid bg-light">

    <!-- action="<?=$_SERVER['PHP_SELF'];?>"   To reach the server from Same page file -->

    <form class="needs-validation " method="POST" action="addclubs.php" novalidate autocomplete="on" id="form">
        <div class="form-row">
          <div class="col-md-4 mb-3">
              <label for="validationCustom01"><b>Club name</b></label>
              <input type="text" class="form-control firstname" id="validationCustom01" placeholder="chess club, Dance club etc" required name="clubname" spellcheck="true" pattern="[A-Za-z0-9 _.,!'/$]*" maxlength="50">
              <div class="valid-feedback">
                  Looks good!
              </div>
              <div class="invalid-feedback">
                  Please, Provide Only letters
              </div>
         </div>
       </div>

       <form class="needs-validation " method="POST" action="addclubs.php" novalidate autocomplete="on" id="form">
           <div class="form-row">
             <div class="col-md-4 mb-4">
                 <label for="validationCustom01"><b>Club Description</b></label>
                 <input type="text" class="form-control firstname" id="validationCustom01" placeholder="what is this about?" required name="clubdescription" spellcheck="true" pattern="[A-Za-z0-9 _.,!'/$]*" maxlength="300">
                 <div class="valid-feedback">
                     Looks good!
                 </div>
                 <div class="invalid-feedback">
                     Please, Provide Only letters
                 </div>
            </div>
          </div>

          <div>
          <input type="text" hidden name="loggedinuser" value='<?php echo $_SESSION['loggedinuser'] ?>'>
        </div>


        <div class="col-md-3 mb-2">
            <button class="btn btn-primary submitbutton" type="submit " name="submit" id="sub">Add club!</button>

        </div>
    </form>











</div>



<footer class="container-fluid foot ">


   <div class="container-fluid foot_div">
        <p class="h6 foot_text">Copyright &copy;2021 All rights reserved | This project is developed by <span id="name">Team 11 AdvSE 2021</span> </p>
 </div>



</footer>
  <script src="js/clock.js"> </script>
</body>

</html>
