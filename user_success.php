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

<br><br><br>
Prerequisites:
<br>
<b>CSE100</b> - None<br>
<b>CSE231</b> - None<br>
<b>CSE232</b> - CSE231<br>
<b>CSE331</b> - CSE231, CSE232<br>
<b>CSE335</b> - CSE231, CSE232<br>
<br>
If you would like to enroll in courses, you can do so with the following form.

<?php include "user_course_form.php" ?>

<br>

You are currently enrolled in the following classes:
<br>
<?php
if ($_SESSION["took100"] == 1){ echo "CSE100<br>";}
if ($_SESSION["took231"] == 1){ echo "CSE231<br>";}
if ($_SESSION["took232"] == 1){ echo "CSE232<br>";}
if ($_SESSION["took331"] == 1){ echo "CSE331<br>";}
if ($_SESSION["took335"] == 1){ echo "CSE335<br>";}