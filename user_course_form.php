<html>
<head>

<?php
include_once "./Project2Crud.php";
	$courses = course_read_all();

	$seq = $_POST["seq"];
	$value = $_POST["value"];
	$index = $_POST["index"];
	$n = 0;
	/*while($n < count(courses))
	{
		$Courses[$n] = $courses[$n]->get_courseNo();
		echo $Courses[$n];
		$n++;
	}*/

	if(sizeof($_POST["update"]) > 0) {
		echo "</br><b>Change saved</b></br>";
		course_seat_update($courses[$seq]->get_courseNo());

	}
	
	
?>
</head>
<html>


	<table border=1>
		<thead>
			<tr>
				<th>Course No.</th>
				<th>Course Name</th>
				<th>Current Seats</th>
				<th>Maximum Seats</th>
				<th>Enroll</th>
			</tr>
		</thead>
<?php	
	$i = 0;
	foreach($courses as $course){
		echo "<form action=\"\" method=\"post\">";

		echo "<input type=\"hidden\" name=\"seq\" value=\"";
		echo $course->get_seq();
		echo "\">";
		echo $seq;

		echo "<tr>";
		
		echo "<td>";
		echo $course->get_courseNo();
		echo "</td>";

		echo "<td>";
		echo $course->get_courseName();
		echo "</td>";
		
		echo "<td>";
		echo $course->get_currentSeats();
		echo "</td>";
		
		echo "<td>";
		echo $course->get_maxSeats();
		echo "</td>";
		
		
		
		echo "<td>";
		echo "<input type=\"submit\" name=\"update\" value=\"Enroll\"/>";
		echo "</td>";

		echo "</tr>";
		echo "</form>";
		$i++;
		}





?>
	</table>

</html>