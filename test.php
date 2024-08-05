<!DOCTYPE html>
<html>
<head>
<title>PHP script in PHP file</title>
</head>

<body>

  <div>
<p> 
<?php 

$country = $_GET['country'];
// Retrieves the ISO_id of the specified country so the program can access all related rows in the database

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
$sql = "SELECT name, ISO_id FROM Cyclist WHERE ISO_id = '$country'";
// Holds the query which will be used to retrieve data from the database by the program
$sql2 = "SELECT country_name FROM Country WHERE ISO_id = '$country'";
// Holds the query which will be used to retrieve data from the database by the program
$result = mysqli_query($conn, $sql);
// Makes a query through the database connection esatblished by $conn and using the query established by $sql, the program can now retrieve all the relevant data row by row
$result2 = mysqli_query($conn, $sql2);
// Makes a query through the database connection esatblished by $conn and using the query established by $sql, the program can now retrieve all the relevant data row by row

if (mysqli_num_rows($result2) > 0){
	// output data of each row, as long as the data is not NULL

	while ($row2 = mysqli_fetch_array($result2)){
	// Iterates through every row in the query results until every row has been exhausted
	
	echo $row2[0]."<br>";
	// Outputs the name of the country in question above the table
	break;
	// Once found, the program breaks from the loop to generate the table

	}
}

echo "<table border='1'>"; 
// Creates a new table which will hold all the values which the user will see		
		
if (mysqli_num_rows($result) > 0){
	// output data of each row, as long as the data is not NULL
	
	echo "<td align='center'>Name</td>";
	
	echo "<td align='center'>Country</td>";
	
	while ($row = mysqli_fetch_array($result)){
	// Iterates through every row in the query results until every row has been exhausted
	
	echo "<tr>";
	// Starts a new row
	echo "<td align='center'>".$row[0]."</td>";
	// Prints the name of the athlete in question, in the specific cell
	echo "<td align='center'>".$row[1]."</td>";
	// Prints the country of the athlete in question, in the specific cell
	echo "</tr>";
	// Ends the current row

	}
}


?>
</p>
</div>

</body>
</html>