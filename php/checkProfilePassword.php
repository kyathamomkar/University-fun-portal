<?php
$connection = new mysqli('hackathon.cbwqiuux8uje.us-east-1.rds.amazonaws.com', 'hackathon', 'hackathon', 'UBS');
session_start();
?>
<html>
<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
</head>
</html>
<?php
$email = $_SESSION['loggedinuser'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];
 
if ($newPassword == $confirmPassword ){
       
    $newPassword = md5($newPassword);
    $sql = "UPDATE users SET password = '$newPassword' WHERE email = '$email'";
    mysqli_query($connection, $sql);
    alert2();
}
else{
    alert();
}




function alert() {
    echo "<script type='text/javascript'>
let timerInterval
Swal.fire({
  title: 'Passwords do not match',
  html: 'You will redirect in <b></b> milliseconds to Profile Page.',
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
  if (result.dismiss === Swal.DismissReason.timer) {
    window.location.href='/profile.php';
  }
})

</script>";
}

function alert2() {
    echo "<script type='text/javascript'>

Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Password Updated!',
  showConfirmButton: true,
  timer: 2000
}).then((result) => {
   
  if (result) {
    window.location.href='/profile.php';
  }
})
</script>";
}
?>