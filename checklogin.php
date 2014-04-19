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

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myuserID and $mypassword, table row must be 1 row
if($count==1){

// Register $myuserID, $mypassword and redirect to file "login_success.php"
$_SESSION["myuserID"] = $myuserID;
$_SESSION["mypassword"] = $mypassword;
$_SESSION["isAdmin"] = $isAdmin;

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