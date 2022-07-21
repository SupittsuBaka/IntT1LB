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
		<th>Name</th>
		<th>Date</th>
		<th>Department</th>
		<th>Shift</th>
	</tr>
	<h4>Інформація про нову медсестру<h4>
	<?php
		include("connect.php");
		if(isset($_GET["nname"]) AND
			isset($_GET["ndate"]) AND
			isset($_GET["ndepartment"]) AND
			isset($_GET["nshift"]))
		{
			
			$nname=$_GET["nname"];
			$ndate=$_GET["ndate"];
			$ndepartment=$_GET["ndepartment"];
			$nshift=$_GET["nshift"];
			try
			{
				$sql="INSERT INTO nurse (name, date, department, shift) VALUES (:nname, :ndate, :ndepartment, :nshift)";
				$sth=$dbh->prepare($sql);
				$sth->execute(array(":nname"=>$nname, ":ndate"=>$ndate, ":ndepartment"=>$ndepartment,":nshift"=>$nshift));
				
				$sql="SELECT name, date, department, shift FROM nurse
				WHERE name=:nname";
				$sth=$dbh->prepare($sql);
				$sth->execute(array(":nname"=>$nname));
				$ttable=$sth->fetchAll();
				foreach($ttable as $row)
				{
					$Name = $row[0];
					$Date = $row[1];
					$Department = $row[2];
					$Shift = $row[3];
					print"<tr> <td>$Name</td> <td>$Date</td> <td>$Department</td> <td>$Shift</td> </tr>";
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