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
	</tr>
	<h4>Інформація про медсестер обраної зміни:</h4>
	<?php
		include("connect.php");
		if(isset($_GET["shiftname"]))
		{
			
			$shiftname=$_GET["shiftname"];
			try
			{
				$sql="SELECT nurse.name, date, department FROM nurse
				WHERE shift=:shiftname";
				$sth=$dbh->prepare($sql);
				$sth->execute(array(":shiftname"=>$shiftname));
				$stable=$sth->fetchAll();
				foreach($stable as $row)
				{
					$Name = $row[0];
					$Date = $row[1];
					$Department = $row[2];
					print"<tr> <td>$Name</td> <td>$Date</td> <td>$Department</td> </tr>";
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