<html>
<head>

<?php
include_once "./Project2Crud.php";
	$users = user_read_all();

	$userID = $_POST["userID"];
	$password = $_POST["password"];
	$isAdmin = $_POST["isAdmin"];
	$oldUserID = $_POST["oldUserID"];
	$index = $_POST["index"];

	$newUserID = $_POST["newUserID"];
	$newPassword = $_POST["newPassword"];
	$newIsAdmin = $_POST["newIsAdmin"];

	if(sizeof($_POST["update"]) > 0) {
		echo "<h2 style='color:red;'>Change saved!</h2></br>";
		user_update($userID, $password, $isAdmin, $oldUserID);

	} else if(sizeof($_POST["delete"]) > 0) {
		echo "<h2 style='color:red;'>Change saved!</h2></br>";
		user_delete($oldUserID);

	} else if(sizeof($_POST["reset"]) > 0) {
		echo "<h2 style='color:red;'>Change saved!</h2></br>";
		user_reset($oldUserID);

	} else if(sizeof($_POST["insert"])>0) {
		echo "<h2 style='color:red;'>Change saved!</h2></br>";
		user_insert($newUserID, $newPassword, $newIsAdmin);

	}

	$users = user_read_all();

?>
</head>
<html>


<p><b>Below you can update, delete and reset user's information</b></p>
<b>Update</b> - Will apply all changes made in the text boxes.</br>
<b>Delete</b> - Will remove the user from the table.</br>
<b>Reset</b> - Will set the user's password to '555'.</br>
</br>

	<table border=1>
		<thead>
			<tr>
				<th>UserID</th>
				<th>Password</th>
				<th>isAdmin</th>
				<th>Update</th>
				<th>Delete</th>
				<th>Reset</th>
			</tr>
		</thead>
<?php	
	$i=0;
	foreach($users as $user){
		echo "<form action=\"admin_success.php\" method=\"post\">";
		echo "<input type=\"hidden\" name=\"index\" value=\"$i\">";
	
		// OLD HIDDEN USERID
		echo "<input type=\"hidden\" name=\"oldUserID\" value=\"";
		echo $user->get_userID();
		echo "\">";

		echo "<tr>";
		
		echo "<td>";
		echo "<input type=\"text\" name=\"userID\" value=\"";
		echo $user->get_userID();
		echo "\"/>";
		echo "</td>";

		echo "<td>";
		echo "<input type=\"text\" name=\"password\" value=\"";
		echo $user->get_password();
		echo "\"/>";
		echo "</td>";

		echo "<td>";
		echo "<input type=\"text\" name=\"isAdmin\" value=\"";
		echo $user->get_isAdmin();
		echo "\"/>";
		echo "</td>";

		echo "<td>";
		echo "<input type=\"submit\" name=\"update\" value=\"Update\"/>";
		echo "</td>";

		echo "<td>";
		echo "<input type=\"submit\" name=\"delete\" value=\"Delete\"/>";
		echo "</td>";

		echo "<td>";
		echo "<input type=\"submit\" name=\"reset\" value=\"Reset\"/>";
		echo "</td>";

		echo "</tr>";
		echo "</form>";
		$i++;
	}
?>
	</table>


</br>
</br>
</br>


<p><b>Below you can add a new user to do table.</b></p>

	<table border=1>
		<thead>
			<tr>
				<th>UserID</th>
				<th>Password</th>
				<th>isAdmin</th>
				<th>Insert</th>
			</tr>
		</thead>

<?php	

		echo "<form action=\"admin_success.php\" method=\"post\">";
		echo "<input type=\"hidden\" name=\"index\" value=\"$i\">";
	
		echo "<tr>";
		
		echo "<td>";
		echo "<input type=\"text\" name=\"newUserID\" value=\"";
		echo "username";
		echo "\"/>";
		echo "</td>";

		echo "<td>";
		echo "<input type=\"text\" name=\"newPassword\" value=\"";
		echo "555";
		echo "\"/>";
		echo "</td>";

		echo "<td>";
		echo "<input type=\"text\" name=\"newIsAdmin\" value=\"";
		echo "0";
		echo "\"/>";
		echo "</td>";

		echo "<td>";
		echo "<input type=\"submit\" name=\"insert\" value=\"Insert\"/>";
		echo "</td>";

		echo "</tr>";
		echo "</form>";

?>

	</table>



</html>
