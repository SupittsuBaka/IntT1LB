<?php
	include("connect.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial+scale=1.0">
	<title>ShmidtLB1</title>
<head>

<body>
	<h4>Оберіть відділ, чиїх медсестер ви хочете побачити</h4>
	<form action="handlerdepart.php" method="GET">
		<select name="departnum">
			<?php
				try
				{
					$sql="SELECT department FROM nurse";
					foreach($dbh->query($sql) as $row)
					{
						$department = $row[0];
						print "<option value='$department'>$department</option>";
					}
				}
				catch(PDOException $e)
				{
					print "Error: ".$e->getMessage()."<br>";
					reset();
				}
			?>
		</select>
		<br>
		<input type="submit" value="Get">
	</form>

	 <h4>Оберіть медсестру, чиї зміни ви хочете побачити</h4>
	<form action="handlernname.php" method="GET">
		<select name="nursename">
			<?php
				try
				{
					$sql="SELECT name FROM nurse";
					foreach($dbh->query($sql) as $row)
					{
						$name = $row[0];
						print "<option value='$name'>$name</option>";
					}
				}
				catch(PDOException $e)
				{
					print "Error: ".$e->getMessage()."<br>";
					reset();
				}
			?>
		</select>
		<br>
		<input type="submit" value="Get">
	</form>
	
	
	
	<h4>Оберіть зміни, чиїх медсестер ви хочете побачити</h4>
	<form action="handlershift.php" method="GET">
		<select name="shiftname">
			<?php
				try
				{
					$sql="SELECT DISTINCT shift FROM nurse";
					foreach($dbh->query($sql) as $row)
					{
						$shift = $row[0];
						print "<option value='$shift'>$shift</option>";
					}
				}
				catch(PDOException $e)
				{
					print "Error: ".$e->getMessage()."<br>";
					reset();
				}
			?>
		</select>
		<br>
		<input type="submit" value="Get">
	</form>
	
	<h4>Додати нову медсестру:</h4>
	<form action="newnurse.php" method="GET">
		Імя<input type="text" name="nname">
		Дата<input type="text" name="ndate">
		Відділ<input type="text" name="ndepartment">
		Зміна<select name="nshift">
			<?php
				try
				{
					$sql="SELECT DISTINCT shift FROM nurse";
					foreach($dbh->query($sql) as $row)
					{
						$shift = $row[0];
						print "<option value='$shift'>$shift</option>";
					}
				}
				catch(PDOException $e)
				{
					print "Error: ".$e->getMessage()."<br>";
					reset();
				}
			?>
		</select>
		<br>
		<input type="submit" value="Create">
	</form>
	
	<h4>Додати нову палату:</h4>
	<form action="newward.php" method="GET">
		Імя<input type="text" name="nward">
		<br>
		<input type="submit" value="Create">
	</form>
	
	<h4>Додати нове чергування:</h4>
	<form action="newnurseward.php" method="GET">
		Медсестра<select name="nfid">
			<?php
				try
				{
					$sql="SELECT id_nurse FROM nurse";
					foreach($dbh->query($sql) as $row)
					{
						$id_nurse = $row[0];
						print "<option value='$id_nurse'>$id_nurse</option>";
					}
				}
				catch(PDOException $e)
				{
					print "Error: ".$e->getMessage()."<br>";
					reset();
				}
			?>
		</select>
		Палата<select name="wfid">
			<?php
				try
				{
					$sql="SELECT id_ward FROM ward";
					foreach($dbh->query($sql) as $row)
					{
						$id_ward = $row[0];
						print "<option value='$id_ward'>$id_ward</option>";
					}
				}
				catch(PDOException $e)
				{
					print "Error: ".$e->getMessage()."<br>";
					reset();
				}
			?>
		</select>
		<br>
		<input type="submit" value="Create">
	</form>
	
</body>
</html>

