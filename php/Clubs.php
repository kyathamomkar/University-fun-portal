<?php
// Check user login or not
session_start();
if($_SESSION['loggedinuser']==""){
    header("location: /LoginPage.php");
}
?>
<html lang="en">

<head> <meta charset="utf-8" http-equiv="refresh">
    <title>
        Clubs
    </title>

    <!-- This line will give the instruction on how the browser control the page how suppose to show the content in Tablet, Phone-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="css/mijares.css" type="text/css" rel="stylesheet">
    <link href="css/responsive_setting.css" type="text/css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Merienda+One&display=swap" rel="stylesheet">
    <!-- JS and jQuery -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <!-- <link href="css/login_form.css" rel="stylesheet" type="text/css"> -->
	<link href="css/userhomepage.css" rel="stylesheet" type="text/css">
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
             <li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/UserHomePage.php"  style="color: lightblue;">HOME</a>
                </li>
    <li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/sales.php"  style="color: lightblue;">SALES</a>
                </li>
				<li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/Clubs.php"  style="color: lightblue;text-decoration: underline;text-decoration-style:wavy;text-decoration-color:#00a6ff;">CLUBS</a>
                </li>
				<li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/exchange.php"  style="color: lightblue;">EXCHANGE</a>
                </li>
				<li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/messages.php"  style="color: lightblue;">MESSAGES</a>
                </li>
 				<li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/advs.php" style="color: lightblue;">ADVS</a>
                </li>
            </ul>
			<ul class="navbar-nav">


			<li class="nav-item p-1">
                    <a class="nav-link " href="/Logout.php"  style="color: lightblue;">LOGOUT</a>
                </li></ul>
            <canvas id="canvas" width="100" height="100">
            </canvas>

        </div>


    </nav>
</header>

	<center>
		<div class="middlebody">
	<div class="container">
        <div class="row content">
            <div class="clubdivs col-lg-5 col-md-5 col-sm-12 col-xs-6">
            <div class="container">
					<div class="row content">
			<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 mhead">
						 <span class="textheading mttle">All Clubs</span>
			</div>

			<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mhead">
				<a href="AddClubs_entry.php"> <div class="newmessage"><button type="button" class="btn btn-outline-primary">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg>
						Add Club</button>
			</div> </a>
			</div>
			</div>
			</div>
             
				<hr>


<?php
include "./config.php";
$sql = "SELECT * FROM clubs";
$result = $con->query($sql);

//fetching the joined clubs of the loggedin user and saving them to an array. 
$joinedclubsQuery = "SELECT clubname FROM clubmemberships where useremail='".$_SESSION['loggedinuser']."'";
$joinedclubsresults = $con->query($joinedclubsQuery);
$joinedclubs = array();

while($row = $joinedclubsresults->fetch_assoc()){
    $joinedclubs[] = $row['clubname'];
}

// above code ends here, and we have an array of clubs the user is joined. while printing all Clubs, 
//we will check if the clubs is in this array we created, if yes then print check mark, otherwise we will print the join button. 


while($row = $result->fetch_assoc())
{ ?>
<!-- adding a new div here, notice why I am adding inside the while loop and not outside.  (Ans: because we want this to be printed for every club from db) -->
<div class="container">
    <div class="row content">
   
   <!-- this div is for printing club name on the left side -->
    <div class="clubdivs allclubs col-lg-9 col-md-9 col-sm-8 col-xs-8 bg-primary" style="display:flex;
align-items:center; justify-content:center; ">
    <?php echo $row["clubname"] ?>
    </div>

   <!--this div is for printing join / right mark on the right side -->
<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
    
    <?php 
    // if the clubname is in joinedclubs array, 
    if (in_array($row["clubname"], $joinedclubs)) {
        
 ?>
      <!--then print right mark -->
    <span style='font-size:20px;'><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</svg></span>
    <?php
    }
    else{
        ?>
         <!--else join button, PS I liked how you used a form with hidden fields here. Nice approach -->
   <form class="needs-validation " method="POST" action="club_join.php" novalidate autocomplete="on" id="form">
 
      <input type="text" hidden name="loggedinuser" value='<?php echo $_SESSION['loggedinuser'] ?>'>
   
    <input type="text" hidden name="clubname" value='<?php echo $row["clubname"] ?>'>
 
  <button class="btn btn-primary submitbutton" type="submit " name="submit" id="sub">Join!</button>
</form>
<?php 
}
?>
    </div>


</div>
</div>   <!-- closing all divs here -->

<?php

} ?>
			</div>
			  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-6"> <hr></div>
            <div class="clubdivs joinedclubs col-lg-5 col-md-5 col-sm-12 col-xs-6"><span class="textheading">Joined Clubs</span>
			 <hr>

<?php
$sql = "SELECT * FROM clubmemberships where useremail='".$_SESSION['loggedinuser']."'";
$result = $con->query($sql);
while($row = $result->fetch_assoc())
{ ?>
				 <div class="clubdivs allclubs col-lg-6 col-md-6 col-sm-10 col-xs-6 bg-success"  style="display:flex;
align-items:center; justify-content:center; ">
				<?php echo $row["clubname"] ?>
</div> 

				<?php

} ?>
			</div>

        </div>
    </div>
	</div>
	</center>



<footer class="container-fluid foot">
<div class="container-fluid foot_div">
        <p class="h6 foot_text">Copyright &copy;2021 All rights reserved | This project is developed by <span id="name">Team 11 AdvSE 2021</span> </p>
 </div>

</footer>
  <script src="js/clock.js"> </script>
</body>

</html>
