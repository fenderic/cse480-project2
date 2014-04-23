<?php
session_start(); // Start the session so we can save variables

$host="mysql-user"; // Host name
$username="austine5"; // Mysql username
$password="A43567692"; // Mysql password
$db_name="austine5"; // Database name
$tbl_name="Project2"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// userID and password sent from form
$myuserID=$_POST['myuserID'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myuserID = stripslashes($myuserID);
$mypassword = stripslashes($mypassword);
$myuserID = mysql_real_escape_string($myuserID);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE userID='$myuserID' and password='$mypassword'";
$result=mysql_query($sql);


$admin_check=mysql_fetch_assoc(mysql_query("SELECT isAdmin FROM $tbl_name WHERE userID='$myuserID' and password='$mypassword'"));
$isAdmin = $admin_check["isAdmin"];

$took_check=mysql_fetch_assoc(mysql_query("SELECT * FROM $tbl_name WHERE userID='$myuserID' and password='$mypassword'"));
$took100 = $took_check["took100"];
$took231 = $took_check["took231"];
$took232 = $took_check["took232"];
$took331 = $took_check["took331"];
$took335 = $took_check["took335"];
//print_r(mysql_fetch_assoc($result));

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myuserID and $mypassword, table row must be 1 row
if($count==1){

// Register $myuserID, $mypassword and redirect to file "login_success.php"
$_SESSION["myuserID"] = $myuserID;
$_SESSION["mypassword"] = $mypassword;
$_SESSION["isAdmin"] = $isAdmin;

// Session variables for enrollment
$_SESSION["took100"] = $took100;
$_SESSION["took231"] = $took231;
$_SESSION["took232"] = $took232;
$_SESSION["took331"] = $took331;
$_SESSION["took335"] = $took335;

if ($isAdmin == 1):
  header("location:admin_success.php");
elseif ($isAdmin == 0):
  header("location:user_success.php");
else:
  echo "something is wrong with the information you tried to login with!";
endif;

}
else {
echo "Wrong Username or Password";
}
?>