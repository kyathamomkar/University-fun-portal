<?php
$connection = new mysqli('hackathon.cbwqiuux8uje.us-east-1.rds.amazonaws.com', 'hackathon', 'hackathon', 'UBS');
error_reporting(0);


// Check user login or not
session_start();
if($_SESSION['loggedinuser']==""){
    header("location: /LoginPage.php");
}
if(isset($_POST['firstname'])){

$firstname=$_POST['firstname'];
$lastname= $_POST['lastname'];
$email = $_POST['email'];
$city=$_POST['city'];
$states=$_POST['states'];
$zipcode=$_POST['zipcode'];
$filename = $_FILES['image']['name'];
$tempname = $_FILES['image']['tmp_name'];
$folder = "images/".$filename;

if ($filename ==''){ 
    $sql = "UPDATE users SET firstname = '$firstname',lastname = '$lastname', email='$email', city= '$city', states = '$states', zipcode = '$zipcode' WHERE email = '$email'";
}
else{
    $sql = "UPDATE users SET firstname = '$firstname',lastname = '$lastname', email='$email', city= '$city', states = '$states', zipcode = '$zipcode', image= '$folder' WHERE email = '$email'";
}
 
mysqli_query($connection, $sql);
move_uploaded_file($tempname, $folder);

}
 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Settings</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/profileStyle.css">
</head>

<body>

<style>
    body{
        background: url(https://placeimg.com/img/bg-2.svg) repeat;
    }
	ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333333;
}

li {
  float: left;
}
a:hover{
	 text-decoration: none;
}
li a {
  display: block;
  color: white;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}

li .active {
  background-color: #111111;
}
</style> 
<section class="py-5">
    <div class="container">
	
<ul>
  <li><a href="/UserHomePage.php">HOME</a></li>
  <li><a class="active" href="#">Account Settings</a></li>
   
</ul>
       <div class="bg-white shadow rounded-lg d-block d-sm-flex">

            <div class="profile-tab-nav border-right">

                <?php
                    $email = $_SESSION['loggedinuser'];

                    $result = mysqli_query($connection,"SELECT * FROM users where email='$email'");
                while($row = mysqli_fetch_array($result)) {

				?>

                <form enctype="multipart/form-data" action="/profile.php" method="POST">
                <!-- Div Image & Name -->
                <div class="p-4">
                    <div class="img-circle text-center mb-3">
                        <img src="<?php echo $row['image'] ?>" alt="Image" class="shadow">
                    </div>
                    <h4 class="text-center"><?php echo $row['firstname']." ".$row['lastname'] ?></h4>
                </div>

                <!-- Left Nav Start -->
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <a class="nav-link active" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="true">
                        <i class="fa fa-user text-center mr-1"></i>
                        Profile
                    </a>

                    <a class="nav-link " id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="false">
                        <i class="fa fa-home text-center mr-1"></i>
                        Account
                    </a>

                    <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                        <i class="fa fa-key text-center mr-1"></i>
                        Password
                    </a>


                   

                </div>
            </div>
            <!-- Nav END -->


            <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                <!-- Account Page Start -->
                <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                    <h3 class="mb-4">Account Settings</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" value="<?php echo $row['firstname'] ?>" name="firstname">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" value="<?php echo $row['lastname'] ?>" name="lastname">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="<?php echo $row['email'] ?>" name="email" readonly >
                                <input type="hidden">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" value="<?php echo $row['city'] ?>" name="city">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>States</label>
                                <input type="text" class="form-control" value="<?php echo $row['states'] ?>" name="states">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Zip Code</label>
                                <input type="text" class="form-control" value="<?php echo $row['zipcode'] ?>" name="zipcode">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Profile Image</label>

                                <input type="file" class="form-control"  value="<?php echo $row['image'] ?>" name="image">
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
                       <!-- <button class="btn btn-light">Cancel</button> -->
                    </div>
                    </form>
                </div>
 
                <!-- Password Page Start -->
                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">


                    <form action="/checkProfilePassword.php" method="POST">
                    <h3 class="mb-4">Password Settings</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>New password</label>
                                <input type="password" class="form-control" name="newPassword" required id="p">
                                <span>Show Password:<input type="checkbox" class="showpassword" onclick="show_pasword()"></span>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                         
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm new password</label>
                               <input type="password" class="form-control" name="confirmPassword" required  id="p1">
                                <span>Show Password:<input type="checkbox" class="showpassword" onclick="show_pasword2()"></span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Update</button>
                        
                    </div>

                    </form>

                </div>

                <!-- Password Page End -->

                <!-- Profile main Section -->
                <div class="tab-pane fade show active" id="security" role="tabpanel" aria-labelledby="security-tab">
                    <h3 class="mb-4">Information</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <h5 class="text-muted f-w-400"><?php echo $row['firstname'] ?></h5>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <h5 class="text-muted f-w-400"><?php echo $row['lastname'] ?></h5>
                            </div>
                        </div>

                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <h5 class="text-muted f-w-400"><?php echo $row['email'] ?></h5>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>City</label>
                                <h5 class="text-muted f-w-400"><?php echo $row['city'] ?></h5>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label>State</label>
                                <h5 class="text-muted f-w-400"><?php echo $row['states'] ?></h5>
                            </div>
                        </div>


                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Zip Code</label>
                                <h5 class="text-muted f-w-400"><?php echo $row['zipcode'] ?></h5>
                            </div>
                        </div>

                    </div>



                </div>
                <?php
                }
                ?>

 

            </div>
 
        </div>
    </div>
</section>

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

    function show_pasword2(){
        var y = document.getElementById('p1');
        if (y .type === "password") {
            y .type = "text";
        }
        else {
            y .type = "password";
        }
    }



</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
