<?php
session_start();
echo ("Login Successful </br>");
echo ("<h1 style='color:blue;'>WELCOME USER</h1>");
//echo ("Logged in as user '". $_SESSION['myuserID'] ."' with password '". $_SESSION['mypassword'] ."'.</br>");
echo ("Click <a href='./user_logout.php'>here</a> to Logout.");
echo ("</br></br></br>");
//}
?>

If you would like to change your password, you can do so with the following form.

<?php include "user_password_form.php" ?>