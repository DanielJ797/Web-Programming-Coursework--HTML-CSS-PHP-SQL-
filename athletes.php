<!DOCTYPE html>
<html>
<head>
<title>PHP script in PHP file</title>
</head>

<body>

  <div>
<p> 
<?php 

$country_id = $_GET['country_id'];
// Stores the value in the country_id box in a new variable that can be used in PHP
$part_name = $_GET['part_name'];
// Stores the value in the part_name box in a new variable that can be used in PHP

if (empty($country_id) || empty($part_name)) {
	echo "Data incomplete (Please fill in both fields correctly)";
}

else {
$servername = "localhost";
// Declares the name of the SQL server the program will try to connect to
$dbname = "coa123cdb";
// Declares the name of the SQL database the program will try to connect to
$username = "coa123cycle";
// Declares the username needed to access the database the program will try to connect to
$password = "bgt87awx";
// Declares the password needed to access the database the program will try to connect to
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Connects to the databse using all the relevant information so the program can access its contents
$sql = "SELECT ISO_id, name, weight, gender, height FROM Cyclist WHERE name LIKE '%$part_name%' AND ISO_id LIKE '$country_id'";
// Holds the query which will be used to retrieve data from the database by the program
$result = mysqli_query($conn, $sql);
// Makes a query through the database connection esatblished by $conn and using the query established by $sql, the program can now retrieve all the relevant data row by row

echo "<table border='1'>"; 
// Creates a new table which will hold all the values which the user will see		
		
if (mysqli_num_rows($result) > 0){
	// output data of each row, as long as the data is not NULL
	while ($row = mysqli_fetch_array($result)){
	// Iterates through every row in the query results until every row has been exhausted

	echo "<td align='center'>".$row[1]."</td>";
	// Prints the name of the athlete in question, in the specific cell
	echo "<td align='center'>".$row[3]."</td>";
	// Prints the weight of the athlete in question, in the specific cell
	echo "<td align='center'>".round(($row[2]/($row[4]/100)),3)."</td>";
	// Prints the BMI of the athlete in question in, the specific cell
	echo "</tr>";
	// Ends the current row
	echo "<tr>";
	// Starts a new row
	}
}


echo "</table>";
// Ends the table
}
?>
</p>
</div>

</body>
</html>
