<?php
session_start();
unset($_SESSION['loggedinuser']);
unset($_SESSION['loggedinusername']);
session_destroy();

header("Location: /default.html");
exit;
?>