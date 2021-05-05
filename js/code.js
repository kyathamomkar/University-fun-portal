/* 
 *  Login Form
 */

function check_name() {

    var username = document.getElementById("user");
    var password = document.getElementById("password1");



    if (username.value == "director" || username.value == "DIRECTOR") {

        if ((password.value.length <= 8) && (password.value.length !== 0)) {
            window.open("DirectorPage.html");
        } else {
            window.alert("Password Must include At Most 8 charactors");

        }



    } else if (username.value == "user" || username.value == "USER") {

        if ((password.value.length <= 8) && (password.value.length !== 0)) {
            window.open("UserPage.html");
        } else {
            window.alert("Password Must include At Most 8 charactors");
        }

    } else if ((username.value == "") && (password.value == "")) {
        window.alert("You Must Fill Out Fields");
    } else {
        window.alert("User Name should (director Or user) to Login");

    }

}


