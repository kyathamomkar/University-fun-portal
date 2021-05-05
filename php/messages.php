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
        Messages 
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src= "https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="css/mijares.css" type="text/css" rel="stylesheet">
	<link href="css/chat_popup.css" type="text/css" rel="stylesheet">
    <link href="css/responsive_setting.css" type="text/css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Merienda+One&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet">
    <!-- JS and jQuery -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.all.min.js"></script>
   <script src="https://cdn.socket.io/4.0.1/socket.io.js"></script>
   <script src="/js/jquery-3.5.1.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
	 

 <link href="css/userhomepage.css" rel="stylesheet" type="text/css">
	
	<style>
	html{
		margin:0px !important;   
	}
	
	body{
	background: url(https://placeimg.com/img/bg-2.svg) repeat;
	margin:0px !important;     
	}
	[class*=btn-outline-]
	{
		padding: .5rem 0.375rem .375rem;
	}
	
	.select2-container--open {
    z-index: 9999;
    }
	
	[class^=swal2-]
	{
		margin:15px;
	}
	 .select2-selection--multiple
	 {
		height:100%;
	 }
	 
	 .swal2-actions{
		 z-index: 0;
	 }
	 .select2-search__field{
		 height:100% !important;;
	 }
	 ul{
		 text-align:left;
	 }
	 
#livechatmessages > .tooltip > .tooltip-inner{
	font-size: .7500rem;
	color: #8a8f92;
	background:transparent;
}
#livechatmessages > .tooltip > .arrow{
	display:none;
}
  
	</style>
	
</head>





<body>
    <span id="loggedinusername" hidden><?php echo $_SESSION["loggedinusername"];?></span>
<span id="loggedinuseremail" hidden><?php echo $_SESSION["loggedinuser"];?></span>
 <script>
$(document).ready(function(){
  $('body').tooltip({selector:'[data-toggle="tooltip"]',animation: true,delay: {show: 300, hide: 30}});
});
</script>
<audio id="fbnewmessage"> 
  <source src="/music/newmessagetone.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
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
                    <a class="nav-link " href="/messages.php"  style="color: lightblue;text-decoration: underline;text-decoration-style:wavy;text-decoration-color:#00a6ff;">MESSAGES</a>
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
	<div class="container cbg">     
        <div class="row content">
            <div class="clubdivs col-lg-12 col-md-12 col-sm-12 col-xs-12">
			
			<div class="container">
					<div class="row content">
			<div class="col-lg-8 col-md-6 col-sm-6 col-xs-6 mhead">
						 <span class="textheading" style="margin-left: 20vw;font-size: 3vw;">All Messages</span>
			</div>
			
			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mhead">
			<div class="container">
					<div class="row content">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mhead">
				<div class="newmessage" style="float:right;"><button type="button" onclick="openForm()" class="btn btn-outline-primary">
<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-record-btn" viewBox="0 0 16 16">
  <path d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"></path>
</svg>
						Live Chat</button>
			</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mhead">
				<div class="newmessage" style="float:left;"><button onclick="openalert()" type="button" class="btn btn-outline-primary">
					<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
  <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
  <path d="M2.165 15.803l.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
</svg>
						New Message</button>
			</div>
			</div>	  
			</div>
			</div>	  
			</div>
			
			
			</div>
			</div>

			<hr>
				
<?php
include "./config.php";
$user = $_SESSION['loggedinuser'];
$sql = "select * from messages where recipient = '".$user."' or senderemail = '".$user."' or clubname in (select clubname from clubmemberships where useremail ='".$user."') order by messagetime desc";  
$result = $con->query($sql);
while($row = $result->fetch_assoc())
{ ?>
<a href="" class="linknodecoration"> 

<div class="container">     
        <div class="row content">
            <div class="messagepic col-lg-2 col-md-3 col-sm-3 col-xs-3"><span class="textheading">
			<div class="circular_image">
			<img src="
			<?php 
			$size = (rand(3,9)%10)*100;
			$size = $size."/".$size."/";
			$category = array("animals","people");
			$site = array_rand($category,1);
			$link = "http://placeimg.com/".$size.$category[$site];
			echo $link;
			?>"/>
			
</div></span>
			</div>
			<div class="messagedivs messagebody col-lg-8 col-md-7 col-sm-7 col-xs-7"><span class="textheading">
			<span class="mtitle"><?php echo $row["messagetitle"] ?></span> <br>
			<span class="mbody sender">
			<?php 
			if ($row["senderemail"]!=$_SESSION['loggedinuser'])
			{
				echo "From: ".$row["sender"];
			}
			else{
				echo "To: ".explode("@",$row["recipient"])[0];
			}
			?></span><br> 
			<span class="mbody"><?php echo $row["messagedescription"] ?></span></span>
			</div>
			<div class="messagepic col-lg-2 col-md-2 col-sm-2 col-xs-2"><span class="textheading"><h5>Text on:<br></h5></span>
			<h6><?php
			$fulldate = $row["messagetime"];
			$datearray = explode(" ",$fulldate);
			$date = $datearray[0];
			$time = $datearray[1];
			$datearray =  explode("-",$date);
			$day = $datearray[2];
			$year =$datearray[0];
			
			
				echo date("M", strtotime($fulldate))." ".$day.", ".$year."<br>";  
				echo date('h:i A', strtotime($fulldate));
			?>
			</h6>
			</div>
		</div>	
</div>	
 
</a> <hr>
<?php 
  
} ?>				
			</div>
			   
           
        </div>
    </div>
	</div>		
	</center>


<div class="chat-popup" id="myForm">
  <div class="d-flex flex-column livechatbox">
  <div class="p-2 vdiv vdiv1">
		  <span class="livechattext" onclick="minimise()"> <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="red" class="bi bi-record-btn" viewBox="0 0 16 16">
		   <path class="blink" d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
		  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"></path>
		</svg>  Live Chat <svg class="updownarrow" width="15px" height="15px" viewBox="0 0 18 10"><path fill="currentColor"  d="M1 2.414A1 1 0 012.414 1L8.293 6.88a1 1 0 001.414 0L15.586 1A1 1 0 0117 2.414L9.707 9.707a1 1 0 01-1.414 0L1 2.414z"></path></svg>
		</span> <svg onclick="closeForm()" data-toggle="tooltip" data-placement="top" title="Exit Chat"  class="fbico"  width="26px" height="26px" viewBox="-4 -4 24 24"><line x1="2" x2="14" y1="2" y2="14" stroke-linecap="round" stroke-width="2" stroke="rgb(0,132,255)"></line><line x1="2" x2="14" y1="14" y2="2" stroke-linecap="round" stroke-width="2" stroke="rgb(0,132,255)"></line></svg>
		<svg onclick="minimise()" data-toggle="tooltip" data-placement="top" title="Minimise" class="fbico" width="26px" height="26px" viewBox="-4 -4 24 24"><line x1="2" x2="14" y1="8" y2="8" stroke-linecap="round" stroke-width="2" stroke="rgb(0,132,255)"></line></svg>
</div>
  <div class="p-2 vdiv livechatdiv v2">
  <ul id="livechatmessages">
  </ul></div>
  <div class="p-2 vdiv v3">
  <div class="container">   
<form action="/" method="POST" id="chatForm">  
        <div class="row content">
		 
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" style="padding:0px !important">
				<input required id="txt" class="text form-control mbody" autocomplete="off" autofocus="on" placeholder="Aa" />
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="display: contents;padding:0px !important">
				<button class="btn"  data-toggle="tooltip" data-placement="top" title="Send" style="margin:auto;">
				<svg width="20px" height="20px" viewBox="0 0 24 24"><path fill="rgb(0,132,255)" d="M16.6915026,12.4744748 L3.50612381,13.2599618 C3.19218622,13.2599618 3.03521743,13.4170592 3.03521743,13.5741566 L1.15159189,20.0151496 C0.8376543,20.8006365 0.99,21.89 1.77946707,22.52 C2.41,22.99 3.50612381,23.1 4.13399899,22.8429026 L21.714504,14.0454487 C22.6563168,13.5741566 23.1272231,12.6315722 22.9702544,11.6889879 C22.8132856,11.0605983 22.3423792,10.4322088 21.714504,10.118014 L4.13399899,1.16346272 C3.34915502,0.9 2.40734225,1.00636533 1.77946707,1.4776575 C0.994623095,2.10604706 0.8376543,3.0486314 1.15159189,3.99121575 L3.03521743,10.4322088 C3.03521743,10.5893061 3.34915502,10.7464035 3.50612381,10.7464035 L16.6915026,11.5318905 C16.6915026,11.5318905 17.1624089,11.5318905 17.1624089,12.0031827 C17.1624089,12.4744748 16.6915026,12.4744748 16.6915026,12.4744748 Z" fill-rule="evenodd" stroke="none"></path>
				</svg>
				</button>
			</div>
		</form>
		</div>
	</div>
</div>
  
 
  </div>
</div>
</div>
 
<footer class="container-fluid foot">
<div class="container-fluid foot_div">
        <p class="h6 foot_text">Copyright &copy;2021 All rights reserved | This project is developed by <span id="name">Team 11 AdvSE 2021</span> </p>
 </div>
 
</footer>
  <script src="js/clock.js"> </script>
  <script>
  var chatJoined = false; 
  var socket = null;
  
  function getTime(){
	  var dt = new Date();
	  var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
	  return time;
  }
  
function openForm() {
  
  
  $('#myForm').css('display', 'block');
  
  if(!chatJoined){
	  
  socket = io.connect('http://ubschat-env-1.eba-mhbkwqpq.us-east-1.elasticbeanstalk.com',{'forceNew':true });

    // ask username
	 socket.emit('username', $('#loggedinusername').text());
	 chatJoined = true;
// append the incoming chat text message
	socket.on('chat_message', function(data){
		
		if (($('#livechatmessages li:last-child').hasClass('rightmessage')) || ($('#livechatmessages li:last-child').attr("sender")!==data.sender)) {
					$('#livechatmessages').append($('<li class="sendertitle animate__animated animate__fadeIn">').html(data.sender));
					$('#livechatmessages').append($('<li class="leftmessage message animate__animated animate__bounceInLeft" data-container="#livechatmessages" data-toggle="tooltip" data-placement="left" title="'+getTime()+'" sender="'+data.sender+'" style="margin-top:10px;">').html(data.text));
				}
		else{
			// if the last message title is same user's then do below 2 lines
			$('#livechatmessages li:last-child').css({"border-bottom-left-radius":"3px"});	
			$('#livechatmessages').append($('<li class="leftmessage message animate__animated animate__bounceInLeft" data-container="#livechatmessages" data-toggle="tooltip" data-placement="left" title="'+getTime()+'"  sender="'+data.sender+'" style="border-top-left-radius:3px;">').html(data.text));
		}
		$('.livechatdiv').animate({scrollTop: $('.livechatdiv').get(0).scrollHeight}, 800);
		 $('#fbnewmessage').trigger("play");
	});

	// append text if someone is online
	socket.on('is_online', function(username) {
		$('#livechatmessages').append($('<li class="notices">').html(username));
		$('.livechatdiv').animate({scrollTop: $('.livechatdiv').get(0).scrollHeight}, 800);
	});
     
 	
}
}


// submit text message without reload/refresh the page
	$('#chatForm').submit(function(e){
		e.preventDefault(); // prevents page reloading
		if(socket!==null && $('#txt').val()){
		socket.emit('chat_message', $('#txt').val());
		
		if ($('#livechatmessages li:last-child').hasClass('leftmessage'))
			{
					$('#livechatmessages').append($('<li class="rightmessage message animate__animated animate__bounceInRight" data-container="#livechatmessages" data-toggle="tooltip" data-placement="right" title="'+getTime()+'" style="margin-top:10px;">').html($('#txt').val()));
			}
		else
			{
			$('#livechatmessages li:last-child').css({"border-bottom-right-radius":"3px"});	
			$('#livechatmessages').append($('<li class="rightmessage message animate__animated animate__bounceInRight" data-container="#livechatmessages" data-toggle="tooltip" data-placement="right" title="'+getTime()+'" style="border-top-right-radius:3px;">').html($('#txt').val()));
			}
		$('.livechatdiv').animate({scrollTop: $('.livechatdiv').get(0).scrollHeight}, 800);
		$('#txt').val('');
	 
		return false;
		}
	});


function minimise() {
   $('.v2,.v3').toggleClass('lowerbody');
   $('.livechatbox').toggleClass('slidedown');
   $('.updownarrow').toggleClass('rotation');
}
 

function closeForm() {
  socket.disconnect();
  socket = null;
  chatJoined = false;
  $('#livechatmessages').empty();
  document.getElementById("myForm").style.display = "none";
}
</script>
	<script src="js/newmessage.js"></script> 
 
</body>

</html>