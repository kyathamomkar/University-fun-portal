<?php
$connection = new mysqli('hackathon.cbwqiuux8uje.us-east-1.rds.amazonaws.com', 'hackathon', 'hackathon', 'UBS');
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

<body class="bg-light">
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
                <a class="nav-link " href="/sales.php"  style="color: lightblue;text-decoration: underline;text-decoration-style:wavy;text-decoration-color:#00a6ff;">SALES</a>
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
<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="/images/checkout.jpg" alt="" width="60%" >
    </div>
<?php
    $ids =$_POST['sale'];
    $collect = mysqli_query($connection,"SELECT * FROM sales where id ='$ids'");
    $row = mysqli_fetch_array($collect);
    ?>
        <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>

            </h4>


            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">

                    <span class="my-0">Product name: </span>
                    <span class="text-muted"><?php echo $row['itemname'] ?></span>
                </li>

                <li class="list-group-item d-flex justify-content-between lh-condensed">

                    <span class="my-0">Seller name: </span>

                    <span class="text-muted"><?php echo explode("@",$row["email"])[0]?></span>
                </li>




                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <span>$<?php echo $row['price'] ?></span>
                </li>


            </ul>
        </div>


        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>

            <!-- Submit Form -->
            <form class="needs-validation" novalidate action="payment_done.php" method="POST">
                <input type="hidden" name="sale" value="<?php echo $ids?>">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required name="firstname">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required name="lastname">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                </div>



                <div class="mb-3">
                    <label for="email">Email <span class="text-muted"></span></label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com" required name="email">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required name="address">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Country</label>
                        <select class="custom-select d-block w-100" id="country" required name="country">
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">State</label>
                        <select class="custom-select d-block w-100" id="state" required name="state">
                            <option value="">Choose...</option>

                            <option>Texas</option>
                            <option>Alabama</option>
                            <option>Alaska</option>
                            <option>Arizona</option>
                            <option>Arkansas</option>
                            <option>California</option>
                            <option>Colorado</option>
                            <option>Connecticut</option>
                            <option>Delaware</option>
                            <option>Florida</option>
                            <option>Georgia</option>
                            <option>Hawaii</option>
                            <option>Idaho</option>

                            <option>Illinois</option>
                            <option>Iowa</option>

                            <option>Kansas</option>
                            <option>Louisiana</option>

                            <option> Kentucky</option>
                            <option>Maine</option>

                            <option>Maryland</option>
                            <option>Massachusetts</option>
                            <option>Michigan</option>
                            <option>Minnesota</option>
                            <option>Mississippi</option>
                            <option>Missouri</option>

                            <option> Montana</option>
                            <option>Nebraska</option>
                            <option> Nevada</option>
                            <option>New Hampshire</option>



                            <option> New Jersey</option>
                            <option>New Mexico</option>
                            <option> New York</option>
                            <option>North Carolina</option>



                            <option> North Dakota</option>
                            <option>Ohio</option>
                            <option> Oklahoma</option>
                            <option>Oregon</option>



                            <option>Pennsylvania</option>
                            <option> Rhode Island</option>
                            <option> South Carolina</option>
                            <option>South Dakota</option>

                            <option>Tennessee</option>
                            <option>Utah</option>
                            <option> Vermont</option>
                            <option> Virginia</option>
                            <option>Washington</option>
                            <option> West Virginia</option>
                            <option>  Wisconsin</option>
                            <option>Wyoming</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required name="zipcode" maxlength="5" minlength="5">
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                </div>
                <hr class="mb-4">

                <h4 class="mb-3">Payment</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit"  type="radio" class="custom-control-input"  name="credit">
                        <label class="custom-control-label" for="credit">Credit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" type="radio" class="custom-control-input"  name="debit">
                        <label class="custom-control-label" for="debit">Debit card</label>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Name on card</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="" required name="cardholder">
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback">
                            Name on card is required
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Credit card number</label>
                        <input type="text" class="form-control" id="cc-number"  required maxlength="16" minlength="16" name="cardnumber">
                        <div class="invalid-feedback">
                            Credit card number is required
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Expiration</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="MM / YY" maxlength='5' minlength="5" required name="expire">
                        <div class="invalid-feedback">
                            Expiration date required
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required name="cvv" maxlength="3" minlength="3">
                        <div class="invalid-feedback">
                            Security code required
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="payment">Continue to checkout</button>
            </form>
        </div>
    </div>
</div>

<footer class="container-fluid foot">
    <div class="container-fluid foot_div">
        <p class="h6 foot_text">Copyright &copy;2021 All rights reserved | This project is developed by <span id="name">Team 11 AdvSE 2021</span> </p>
    </div>

</footer>

<!-- JavaScript
================================================== -->
<script src="js/clock.js"> </script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
<script>

    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();



</script>



</body>
</html>