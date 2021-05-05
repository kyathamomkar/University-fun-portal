<?php
$connection = new mysqli('hackathon.cbwqiuux8uje.us-east-1.rds.amazonaws.com', 'hackathon', 'hackathon', 'UBS');
error_reporting(0);
session_start();
if($_SESSION['loggedinuser']==""){
    header("location: /LoginPage.php");
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Checkout</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="form-validation.css" rel="stylesheet">



        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="css/mijares.css" type="text/css" rel="stylesheet">
        <link href="css/responsive_setting.css" type="text/css" rel="stylesheet">
        <link href="css/userhomepage.css" rel="stylesheet" type="text/css">
        <link href="css/eventshape.css" type="text/css" rel="stylesheet" >
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


        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="sweetalert/jquery-3.5.1.min.js"></script>
 </head>
</html>
<?php

if(isset($_POST['payment'])){
    $ids =$_POST['sale'];
    $user =$_SESSION['loggedinuser'];
    $switch=0;
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    $credit_card = $_POST['credit'];
    $debit_card = $_POST['debit'];

    $cardholder = $_POST['cardholder'];
    $cardnumber = $_POST['cardnumber'];
    $expire = $_POST['expire'];
    $cvv = $_POST['cvv'];

    if ($credit_card =='on') {
        $sql = "INSERT INTO `checkout`( `firstname`, `lastname`, `email`, `adress`, `country`,`state`,`zipcode`,`payment_type`,`payment_name`,`card_number`,`expiration`,`cvv`,`item_selected_id`,`user`,`flag`) 
                    VALUES('$firstname', '$lastname', '$email', '$address', '$country', '$state', '$zipcode', 'Credit', '$cardholder', '$cardnumber', '$expire', '$cvv', '$ids','$user','true')";
        mysqli_query($connection, $sql);
        $switch=1;

    }

    if ($debit_card =='on'){
        $sql = "INSERT INTO `checkout`( `firstname`, `lastname`, `email`, `adress`, `country`,`state`,`zipcode`,`payment_type`,`payment_name`,`card_number`,`expiration`,`cvv`,`item_selected_id`,`user`,`flag`) 
                VALUES('$firstname', '$lastname', '$email', '$address', '$country', '$state', '$zipcode', 'Debit', '$cardholder', '$cardnumber', '$expire', '$cvv', '$ids','$user','true')";
        mysqli_query($connection, $sql);
        $switch=1;

    }

    # Check if data inserted to DB. If yes, then redirect user to Login page. Otherwise stay on Register page.
    if($switch==1){
         
        alert();
        
    }

}
function alert() {
    echo "<script type='text/javascript'>
let timerInterval
Swal.fire({
  title: 'Purchase Almost Done!',
  html: 'Payment will be done in <b></b> milliseconds.',
  icon: 'success',
  timer: 2000,
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
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    window.location.href='/purchase_history.php';
  }
})
</script>";
}
?>