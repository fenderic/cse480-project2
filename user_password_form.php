<html>
<head>

<?php
include_once "./Project2Crud.php";
	user_read_all();
	//user_read_one();
	$value = $_POST["value"];
	$index = $_POST["index"];

	if(sizeof($_POST["update"]) > 0) {
		echo "</br><b>Change saved</b></br>";

		user_password_update($_SESSION['mypassword'], $value, $_SESSION['myuserID']);
		$_SESSION['mypassword'] = $value;

	}

	//$numbers = number_read_all();

?>
</head>
<html>


	<table border=1>
		<thead>
			<tr>
				<th>Password</th>
				<th>Update</th>
			</tr>
		</thead>
<?php	
//		echo "<form action=\"user_password_form.php\" method=\"post\">";
		echo "<form action=\"\" method=\"post\">";
		//echo "<input type=\"hidden\" name=\"index\" value=\"$i\">";
	

		echo "<tr>";
		
		echo "<td>";
$old = $_SESSION['mypassword'];
		echo "<input type=\"text\" name=\"value\" value=\"$old\"/>";
		echo "</td>";

		echo "<td>";
		echo "<input type=\"submit\" name=\"update\" value=\"Update\"/>";
		echo "</td>";

		echo "</tr>";
		echo "</form>";





?>
	</table>

</html>
