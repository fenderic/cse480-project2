<?php
session_start();
echo ("Login Successful </br>");
echo ("isAdmin = ". $_SESSION['isAdmin'] . ".  Is that what it should be?</br>");
echo ("Logged in as user '". $_SESSION['myuserID'] ."' with password '". $_SESSION['mypassword'] ."'.</br>");
echo ("Click <a href='./user_logout.php'>here</a> to Logout.");
?>