<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial+scale=1.0">
	<title>ShmidtLB1</title>
<head>

<body>
	<table border='1'>
	<tr>
		<th>WardName</th>
		<th>Date</th>
		<th>Department</th>
		<th>Shift</th>
	</tr>
	<h4>Інформація про дежурства обраної медсестри:</h4>
	<?php
		include("connect.php");
		if(isset($_GET["nursename"]))
		{
			
			$nursename=$_GET["nursename"];
			try
			{
				$sql="SELECT ward.name, date, department, shift FROM nurse, ward, nurse_ward
				WHERE nurse.name=:nursename AND id_nurse=fid_nurse AND id_ward=fid_ward";
				$sth=$dbh->prepare($sql);
				$sth->execute(array(":nursename"=>$nursename));
				$ttable=$sth->fetchAll();
				foreach($ttable as $row)
				{
					$WardName = $row[0];
					$Date = $row[1];
					$Department = $row[2];
					$Shift = $row[3];
					print"<tr> <td>$WardName</td> <td>$Date</td> <td>$Department</td> <td>$Shift</td> </tr>";
				}
			}
			catch(PDOException $e)
			{
				print "Error: ".$e->getMessage()."<br>";
				reset();
			}
		}
	?>
</body>
</html>