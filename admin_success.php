<?php

session_start();

echo ("Login Successful </br>");
echo ("<h1 style='color:red;'>WELCOME ADMINISTRATOR</h1>");
echo ("Click <a href='./user_logout.php'>here</a> to Logout.");
echo ("</br></br></br>");

?>
<?php include "admin_user_form.php" ?>