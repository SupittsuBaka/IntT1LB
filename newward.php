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
	</tr>
	<h4>Інформація про нову палату:</h4>
	<?php
		include("connect.php");
		if(isset($_GET["nward"]))
		{
			
			$nward=$_GET["nward"];
			try
			{
				$sql="INSERT INTO ward (name) VALUES (:nward)";
				$sth=$dbh->prepare($sql);
				$sth->execute(array(":nward"=>$nward));
				
				$sql="SELECT name FROM ward
				WHERE name=:nward";
				$sth=$dbh->prepare($sql);
				$sth->execute(array(":nward"=>$nward));
				$ttable=$sth->fetchAll();
				foreach($ttable as $row)
				{
					$WardName = $row[0];
					print"<tr> <td>$WardName</td> </tr>";
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