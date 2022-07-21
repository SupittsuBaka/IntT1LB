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
		<th>fid_nurse</th>
		<th>fid_ward</th>
	</tr>
	<h4>Інформація про нове чергування:</h4>
	<?php
		include("connect.php");
		if(isset($_GET["nfid"]) AND
			isset($_GET["wfid"]))
		{
			
			$nfid=$_GET["nfid"];
			$wfid=$_GET["wfid"];
			try
			{
				$sql="INSERT INTO nurse_ward (fid_ward, fid_nurse) VALUES (:wfid, :nfid)";
				$sth=$dbh->prepare($sql);
				$sth->execute(array(":nfid"=>$nfid, ":wfid"=>$wfid));
				
				$sql="SELECT DISTINCT fid_ward, fid_nurse FROM nurse_ward
				WHERE fid_ward=:wfid AND fid_nurse=:nfid";
				$sth=$dbh->prepare($sql);
				$sth->execute(array(":nfid"=>$nfid, ":wfid"=>$wfid));
				$ttable=$sth->fetchAll();
				foreach($ttable as $row)
				{
					$Nurseid = $row[1];
					$Wardid = $row[0];
					print"<tr> <td>$Nurseid</td> <td>$Wardid</td> </tr>";
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