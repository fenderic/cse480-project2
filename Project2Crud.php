<?php
include_once "./CrudSettings.php";
include_once "./Project2User.php";
include_once "./Project2Course.php";
//Define database

// QUERIES
define("user_read_all_qry", "select * from Project2;");
define("user_read_one_qry", "select * from Project2;");
define("user_password_update_qry","update Project2 set password=%d where password=%d and userID='%s'");
define("user_update_qry","update Project2 set userID='%s', password=%d, isAdmin=%d WHERE userID='%s'");
define("user_delete_qry","delete from Project2 where userID='%s'");
define("user_reset_qry","update Project2 set password=555 WHERE userID='%s'");
define("user_insert_qry","insert into Project2 values(NULL, '%s', %d, %d, 0,0,0,0,0)");
define("course_read_all_qry", "select * from course;");
define("course_seat_update_qry", "update course set currentSeats= (currentSeats+1) where courseNo=%d");
define("taken_bool_update_qry", "update Project2 set %s = 1 where userID = '%s'");


function user_read_all(){
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die(mysql_error());
	$query = user_read_all_qry;
	$result = mysqli_query($connection, $query);
	if(!$result) { 
		die("Could not read all Users" . mysqli_error($connection));
	}
	$retVal = Array();
	$i = 0;
	while($row = $result->fetch_row()) {
		$id = $row[0]; 
		$userID = $row[1];
		$password = $row[2];
		$isAdmin = $row[3];
		$took100 = $row[4];
		$took231 = $row[5];
		$took232 = $row[6];
		$took331 = $row[7];
		$took335 = $row[8];
		$user = new User($userID, $password, $isAdmin, $took100, $took231, $took232, $took331, $took335);
		$retVal[$i] = $user;
		$i++;
	}
	mysqli_close($connection);
	return $retVal;
}

function user_read_one(){
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die(mysql_error());
	$query = sprintf(user_read_one_qry, $activeUser);
	$result = mysqli_query($connection, $query);
	if(!$result) { 
		die("Could not read all Users" . mysqli_error($connection));
	}
	$retVal = Array();
	$i = 0;
	while($row = $result->fetch_row()) {
		$id = $row[0]; 
		$userID = $row[1];
		$password = $row[2]; 
		$isAdmin = $row[3];
		$user = new User($userID, $password, $isAdmin);
		$retVal[$i] = $user;
		$i++;
	}
	mysqli_close($connection);
	return $retVal;
}

function user_password_update($old, $new, $current_user) {

	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die(mysql_error());
	$query = sprintf(user_password_update_qry, $new, $old, $current_user);
	mysqli_query($connection, "START TRANSACTION");
	$result = mysqli_query($connection, $query);
	if(!$result) { 
		mysqli_query($connection, "ROLLBACK");
		die("Could not update the password" . mysqli_error($connection));
	}
	mysqli_query($connection, "COMMIT");
	mysqli_close($connection);
	return $retVal;

}

function user_update($userID, $password, $isAdmin, $oldUserID) {

	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die(mysql_error());
	$query = sprintf(user_update_qry, $userID, $password, $isAdmin, $oldUserID);
	mysqli_query($connection, "START TRANSACTION");
	$result = mysqli_query($connection, $query);
	if(!$result) { 
		mysqli_query($connection, "ROLLBACK");
		die("Could not update an user" . mysqli_error($connection));
	}
	mysqli_query($connection, "COMMIT");
	mysqli_close($connection);
	return $retVal;

}

function user_delete($userID) {

	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die(mysql_error());
	$query = sprintf(user_delete_qry, $userID);
	mysqli_query($connection, "START TRANSACTION");
	$result = mysqli_query($connection, $query);
	if(!$result) { 
		mysqli_query($connection, "ROLLBACK");
		die("Could not delete the user" . mysqli_error($connection));
	}
	mysqli_query($connection, "COMMIT");
	mysqli_close($connection);
	return $retVal;

}

function user_reset($userID) {

	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die(mysql_error());
	$query = sprintf(user_reset_qry, $userID);
	mysqli_query($connection, "START TRANSACTION");
	$result = mysqli_query($connection, $query);
	if(!$result) { 
		mysqli_query($connection, "ROLLBACK");
		die("Could not reset the user" . mysqli_error($connection));
	}
	mysqli_query($connection, "COMMIT");
	mysqli_close($connection);
	return $retVal;

}

function user_insert($newUserID, $newPassword, $newIsAdmin) {

	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die(mysql_error());
	$query = sprintf(user_insert_qry, $newUserID, $newPassword, $newIsAdmin);
	mysqli_query($connection, "START TRANSACTION");
	$result = mysqli_query($connection, $query);
	if(!$result) { 
		mysqli_query($connection, "ROLLBACK");
		die("Could not add new user" . mysqli_error($connection));
	}
	mysqli_query($connection, "COMMIT");
	mysqli_close($connection);
	return $retVal;

}

function course_read_all(){
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die(mysql_error());
	$query = course_read_all_qry;
	$result = mysqli_query($connection, $query);
	if(!$result) { 
		die("Could not read all Courses" . mysqli_error($connection));
	}
	$retVal = Array();
	$i = 0;
	while($row = $result->fetch_row()) {
		$courseNo = $row[0]; 
		$courseName = $row[1];
		$seq = $row[2];
		$maxSeats = $row[3];
		$currentSeats = $row[4];
		$course = new Course($courseNo, $courseName, $maxSeats, $currentSeats, $seq);
		$retVal[$i] = $course;
		$i++;
	}
	mysqli_close($connection);
	return $retVal;
}

function course_seat_update($courseNo, $currentSeats, $maxSeats, $deadline) {
	
	// if there is no room in class, don't enroll!
	if ($currentSeats >= $maxSeats)
	{
	  echo "<b>There is no room in the class!</b>";
	  return;
	}
	
	// if the deadline has passed, don't enroll!
	if (time() > $deadline)
	{
	  echo "<b>Enrollment Deadline has been passed.  Cannot enroll you in classes.</b>";
	  return;
	 }

	//check if user has already enrolled in class
	

	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die(mysql_error());
	$query = sprintf(course_seat_update_qry, $courseNo);
	mysqli_query($connection, "START TRANSACTION");
	$result = mysqli_query($connection, $query);

	if(!$result) { 
		mysqli_query($connection, "ROLLBACK");
		die("Could not update" . mysqli_error($connection));
	}
	mysqli_query($connection, "COMMIT");
	mysqli_close($connection);
	taken_bool_update($courseNo);
	return $retVal;

}


function taken_bool_update($courseNo) {
	$coursestr;

	if($courseNo == 100){$coursestr = "took100"; $_SESSION["took100"] = 1;}
	else if($courseNo == 231){$coursestr = "took231"; $_SESSION["took231"] = 1;}
	else if($courseNo == 232){$coursestr = "took232"; $_SESSION["took232"] = 1;}
	else if($courseNo == 331){$coursestr = "took331"; $_SESSION["took331"] = 1;}
	else if($courseNo == 335){$coursestr = "took335"; $_SESSION["took335"] = 1;}

	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME) or die(mysql_error());
	$query = sprintf(taken_bool_update_qry, $coursestr, $_SESSION["myuserID"]);
	mysqli_query($connection, "START TRANSACTION");
	$result = mysqli_query($connection, $query);

	if(!$result) { 
		mysqli_query($connection, "ROLLBACK");
		die("Could not update" . mysqli_error($connection));
	}
	mysqli_query($connection, "COMMIT");
	mysqli_close($connection);
	return $retVal;

}
?>


