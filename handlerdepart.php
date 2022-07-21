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
		<th>Shift</th>
	</tr>
	<h4>Інформація про медсестр обраного відділення: </h4>
	<?php
		include("connect.php");
		if(isset($_GET["departnum"]))
		{
			
			$departnum=$_GET["departnum"];
			try
			{
				$sql="SELECT nurse.name, date, shift FROM nurse WHERE department=:departnum";
				$sth=$dbh->prepare($sql);
				$sth->execute(array(":departnum"=>$departnum));
				$dtable=$sth->fetchAll();
				foreach($dtable as $row)
				{
					$Name = $row[0];
					$Date = $row[1];
					$Shift = $row[2];
					print"<tr> <td>$Name</td> <td>$Date</td> <td>$Shift</td> </tr>";
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