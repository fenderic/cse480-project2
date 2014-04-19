<html>
<head>
	<title>Print Users</title>
<?PHP
include_once "./Project2User.php";
include_once "./Project2Crud.php";
	$users = user_read_all();

?>
</head>
<html>


	<table border=1>
		<thead>
			<tr>
				<th>userID</th>
				<th>password</th>
				<th>isAdmin</th>
			</tr>
		</thead>
<?PHP
	foreach($users as $user){
		echo "<tr>";
		
		echo "<td>";
		echo $user->get_userID();
		echo "</td>";

		echo "<td>";
		echo $user->get_password();
		echo "</td>";

		echo "<td>";
		echo $user->get_isAdmin();
		echo "</td>";

		echo "</tr>";
	}


?>

	</table>
</html>
