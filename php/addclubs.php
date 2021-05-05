<?php
ob_start();
include "./config.php";
?>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="sweetalert/jquery-3.5.1.min.js"></script>
</head>
</html>
<?php
# isset() this function use to check if any data sent to server by using "form" action
if(isset($_POST['submit'])){
    $switch=0;
    $clubname = $_POST["clubname"];
    $clubdescription = $_POST["clubdescription"];
    $clubowner=$_POST["loggedinuser"];

    // Insert all information to DB
    if ($con == true) {

        $sql = "SELECT * FROM clubs WHERE clubname='$clubname' LIMIT 1"; #check if email already exists
        $query = mysqli_query($con, $sql);
        $result = mysqli_num_rows($query);

        echo $result;
        if ($result > 0) {
            $switch=2;
        }

        if ($result == 0) {
            $insert = "INSERT INTO clubs (description,clubname,clubowner) VALUES ('$clubdescription','$clubname','$clubowner')";
            $switch=1;
            $con->query($insert);
        }

    }
    else {
        failregistered();
        echo "fail";
        header("location: Clubs.html");

    }


    # Check if data inserted to DB. If yes, then redirect user to clubs page. Otherwise stay on Addclubs page.
if($switch==1){
    confirmed();
    header( "refresh:2;url= ./Clubs.php" );

}


if ($switch==2){

    alert();
    header( "refresh:5;url= ./Clubs.php" );

}

}



else{
    echo "Loose Connection to the Data Base. Please, call Support!";
}


function alert() {
    echo "<script type='text/javascript'>
let timerInterval
Swal.fire({
  title: 'A club with this name already exists. Please try a different club name',
  html: 'You will redirect in <b></b> milliseconds to Clubs Page.',
  timer: 5000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 500)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('Club name Already Exist. Replace it with different club name')
  }
})

</script>";
}


function confirmed() {
    echo "<script type='text/javascript'>
let timerInterval
Swal.fire({
  title: 'Club successfully created!',
  html: 'You will redirect in <b></b> milliseconds to Clubs Page.',
  timer: 5000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 500)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('Club name Already Exist. Replace it with different club name')
  }
})

</script>";
}



function failregistered() {
    echo "<script type='text/javascript'>
Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Something went wrong!',
  footer: '<a href='Register.html'>Click here to repeat again</a>'
})
</script>";
} ?>
</body>
</html>
