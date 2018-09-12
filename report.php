<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Marathon Roster</title>
    <link rel="stylesheet" href="report.css">
 
</head>
<body>
<div class = "main">
<h1>Marathon Roster Report</h1>
 <hr/>
<?php

function get_Age($m,$d,$y){
     	$dob = date("Y-m-d",strtotime($y."-".$m."-".$d));
        $dobObject = new DateTime($dob);
        $nowObject = new DateTime();
        $diff = $dobObject->diff($nowObject);

        return $diff->y;

}
$server = 'opatija.sdsu.edu:3306';
$user = 'jadrn021';
$password = 'chair';
$database = 'jadrn021';

if(!($db = mysqli_connect($server, $user,$password, $database)))
	echo "ERROR in connection ".mysqli_error($db);
else{
	$sql = "select * from person where category = 'teen' ORDER BY lname;"; 
	$sql2 = "select * from person where category = 'adult' ORDER BY lname;"; 
	$sql3 = "select * from person where category = 'senior' ORDER BY lname;";

	
	
$result = mysqli_query($db,$sql);
	if(!result)
		echo "ERROR in query".mysqli_error($db);
	echo "<h1>Teen</h1>";
	echo "<table>\n<tr><th>Image</th><th>Last Name</th><th>First Name</th><th>Age</th><th>Experience</th></tr>";
	while($row = mysqli_fetch_row($result)){
		$age = get_Age($row[5],$row[6],$row[7]);
		echo "<tr><td><img src='/~jadrn021/proj3/_profile_pix_/" . $row[19] . "' width=100</img></td><td>" . $row[3] . "</td><td>" . $row[1]."</td><td>" . $age."</td><td>" . $row[18]."</td></tr>";  
	}
	echo "</table>\n";



	
	$result2 = mysqli_query($db,$sql2);

	if(!result2)
		echo "ERROR in query".mysqli_error($db);
	echo "<h1>Adult</h1>";
		echo "<table>\n<tr><th>Image</th><th>Last Name</th><th>First Name</th><th>Age</th><th>Experience</th></tr>";
	while($row = mysqli_fetch_row($result2)){
		$age = get_Age($row[5],$row[6],$row[7]);
		echo "<tr><td><img src='/~jadrn021/proj3/_profile_pix_/" . $row[19] . "' width=100</img></td><td>" . $row[3] . "</td><td>" . $row[1]."</td><td>" . $age."</td><td>" . $row[18]."</td></tr>"; 
	}
	echo "</table>\n";


	$result3 = mysqli_query($db,$sql3);
	if(!result3)
		echo "ERROR in query".mysqli_error($db);
	echo "<h1>Senior</h1>";
		echo "<table>\n<tr><th>Image</th><th>Last Name</th><th>First Name</th><th>Age</th><th>Experience</th></tr>";
	while($row = mysqli_fetch_row($result3)){
		$age = get_Age($row[5],$row[6],$row[7]);
		echo "<tr><td><img src='/~jadrn021/proj3/_profile_pix_/" . $row[19] . "' width=100</img></td><td>" . $row[3] . "</td><td>" . $row[1]."</td><td>" . $age."</td><td>" . $row[18]."</td></tr>";  
	}
	echo "</table>\n";

	mysqli_close($db);
}


?>
</div>
</body>
</html>