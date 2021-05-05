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
        Advertise Here !! 
    </title>
   
    <!-- This line will give the instruction on how the browser control the page how suppose to show the content in Tablet, Phone-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="css/mijares.css" type="text/css" rel="stylesheet">
    <link href="css/responsive_setting.css" type="text/css" rel="stylesheet">
	<link href="css/userhomepage.css" rel="stylesheet" type="text/css">
	<link href="/css/eventshape.css" type="text/css" rel="stylesheet" >
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Merienda+One&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet">
    <!-- JS and jQuery -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/ajax2.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <!-- <link href="css/login_form.css" rel="stylesheet" type="text/css"> -->
	
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
             <li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/UserHomePage.php"  style="color: lightblue;">HOME</a>
                </li>
    <li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/sales.php"  style="color: lightblue;">SALES</a>
                </li> 
				<li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/Clubs.php"  style="color: lightblue;">CLUBS</a>
                </li>
				<li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/exchange.php"  style="color: lightblue;">EXCHANGE</a>
                </li> 
				<li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/messages.php"  style="color: lightblue;">MESSAGES</a>
                </li>
 				<li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/advs.php" style="color: lightblue;text-decoration: underline;text-decoration-style:wavy;text-decoration-color:#00a6ff;">ADVS</a>
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
	<div class="container cbg">     
        <div class="row content">
            <div class="clubdivs col-lg-12 col-md-12 col-sm-12 col-xs-12">
			
			<div class="container">
					<div class="row content">
			<div class="col-lg-10 col-md-8 col-sm-10 col-xs-10 mhead">
						 <span class="textheading mttle">Available Advertisements</span>
			</div>
			
			<div class="col-lg-2 col-md-4 col-sm-2 col-xs-2 mhead">
				<a href="#addEmployeeModal"  data-toggle="modal" ><div class="newmessage"><button type="button" class="btn btn-outline-primary">
					<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-badge-ad-fill" viewBox="0 0 16 16">
  <path d="M11.35 8.337c0-.699-.42-1.138-1.001-1.138-.584 0-.954.444-.954 1.239v.453c0 .8.374 1.248.972 1.248.588 0 .984-.44.984-1.2v-.602zm-5.413.237l-.734-2.426H5.15l-.734 2.426h1.52z"/>
  <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm6.209 6.32c0-1.28.694-2.044 1.753-2.044.655 0 1.156.294 1.336.769h.053v-2.36h1.16V11h-1.138v-.747h-.057c-.145.474-.69.804-1.367.804-1.055 0-1.74-.764-1.74-2.043v-.695zm-4.04 1.138L3.7 11H2.5l2.013-5.999H5.9L7.905 11H6.644l-.47-1.542H4.17z"/>
</svg>
						Post New Ad</button> 
			</div> </a>
			</div>
			</div>
			</div>

			<hr>
 
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <form enctype="multipart/form-data" action="/save2.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Post an Ad</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label><b style="color: #1c8cd7">Ad Title:</b></label>
                            <input type="text" id="name" name="name1" required class="form-control"  placeholder="Add a title" style="color: #04091e">
                        </div>

                        <div class="form-group">
                            <label><b style="color: #1c8cd7">Location:</b></label>
                            <input type="text" id="department" name="department1" required class="form-control"  placeholder="Enter the location">
                        </div>

                        <div class="form-group">
                            <label><b style="color: #1c8cd7">Description:</b></label>
                            <input type="text" id="date" name="date1" required class="form-control"   placeholder="Please describe">
                        </div>

                        <div class="form-group">
                            <label><b style="color: #1c8cd7">Contact Email:</b></label>
                            <input type="email" id="time" name="time1" required class="form-control">
                        </div>
 
						<div class="form-group">
                            <label><b style="color: #1c8cd7" >Image:</b></label>
                            <input type="file" id="ticket" name="ticket" class="form-control" alt="Image Not Available">
                        </div>



                    </div>
                    <div class="modal-footer">

                        <input type="button" class="btn btn-default " data-dismiss="modal" value="Cancel">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>






<?php
include "./config.php";
$user = $_SESSION['loggedinuser'];
$sql = "select * from advertisement";
$result = $con->query($sql); 
while($row = $result->fetch_assoc())
{ ?>


<a href="/viewlisting.php?page=advs&category=advs&id=<?php echo $row['id']; ?>" class="linknodecoration">

<div class="container">     
        <div class="row content">
            <div class="messagepic col-lg-2 col-md-3 col-sm-3 col-xs-3"><span class="textheading"> 
			<div class="advimage">
			<img src="<?php echo $row["image"] ?>"/>
			
</div></span>
			</div>
			<div class="messagedivs messagebody col-lg-8 col-md-7 col-sm-7 col-xs-7"><span class="textheading">
			<span class="mtitle"><?php echo $row["title"] ?></span> <br>
			<span class="mbody sender">
			<?php 
				 
			 	echo "From: ".explode("@",$row["email"])[0];
				echo "<br>Location: ".$row["location"];
			?></span>
            <br>
			<span class="mbody"><?php echo $row["description"] ?></span>
                </span>
			</div>

            <div class="messagepic col-lg-2 col-md-2 col-sm-2 col-xs-2" ><span class="textheading"><h6>View More</h6></span> </div>
		</div>	
</div>	
 
</a>
<hr>
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