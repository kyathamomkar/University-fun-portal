<?php 
ob_start();
include "./config.php";
?>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php
  if ($con) {
        $email =$_POST['email'];
        $password = $_POST['psw'];

        $sql = "SELECT email,password,firstname FROM users where email= '$email'";
       // echo $sql;
        $query = mysqli_query($con, $sql);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            
            $password33 = md5($password);
            while ($row = mysqli_fetch_assoc($query)) {

                if (($row['email'] == $email)&&($row['password'] == $password33)) {

                    
                    if ((strpos($row['email'], '@gmail')  == true) || (strpos($row['email'], '@yahoo')  == true)) {
                        session_start();
                        $_SESSION["loggedinuser"] = $email ;
						$_SESSION["loggedinusername"] = $row['firstname'];
                        header('Location: UserHomePage.php');
                        exit();
                    }

 
                }
                 
                //if the user enters right email but wrong password
                elseif (($row['email'] == $email) &&($row['password'] !== $password33)){
                    checkpassword();
                    header("refresh: 5;url= ./LoginPage.php");
                    exit();
                }


            }

        }

        else {
            # There is no information and user need to redirect to Register Page
            alert();
            header("refresh: 5;url= ./Register.html");
            exit();
        }

    }

    else {
        # Here If connection to DB Down
        echo 'No Connection!';
    }
 

# Redirect User to Register page after alerting him/her
function alert() {
    echo "<script type='text/javascript'>
let timerInterval
Swal.fire({
  title: 'You are not Registered yet.!',
  html: 'You will redirect in <b></b> milliseconds to Register Page.',
  timer: 4000,
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
    console.log('Email Already Exist. Replace it with different Email')
  }
})

</script>";
}


# Pop up alert to let user check his/her email
function checkemail(){
    echo "<script type='text/javascript'>
Swal.fire('Email Not Correct. Check your Email');

</script>";
}


# Pop up alert to user to check his/her password
function checkpassword(){
    echo "<script type='text/javascript'>
Swal.fire('Password Not Correct. Check your password');

</script>";
} ?>
</body>
</html>