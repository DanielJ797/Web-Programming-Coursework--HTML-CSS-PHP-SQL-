<!DOCTYPE html>
<html>
<head>
<title>PHP script in PHP file</title>
</head>

<body>

  <div>
<p> 
<?php 

$country_one = $_GET['country_1'];
$country_two = $_GET['country_2'];
$printCon = array($country_one,$country_two);

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
$sql = "SELECT gold, silver, bronze, total FROM Country WHERE ISO_id = '$country_one'";
// Holds the query which will be used to retrieve data from the database by the program
$sql2 = "SELECT gold, silver, bronze, total FROM Country WHERE ISO_id = '$country_two'";
// Holds the query which will be used to retrieve data from the database by the program
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
// Makes a query through the database connection esatblished by $conn and using the query established by $sql, the program can now retrieve all the relevant data row by row

echo "Medals Comparison<br>";
// Outputs the title of the table and what it shows

echo "<table border='1'>"; 
// Creates a new table which will hold all the values which the user will see		
		
	
	echo "<td align='center'>Country</td>";
	// Outputs the column header for the field showing each country
	
	echo "<td align='center'>Gold</td>";
	// Outputs the column header for the field showing each country's gold medals
	
	echo "<td align='center'>Silver</td>";
	// Outputs the column header for the field showing each country's silver medals
	
	echo "<td align='center'>Bronze</td>";
	// Outputs the column header for the field showing each country's bronze medals
	
	echo "<td align='center'>Total</td>";
	// Outputs the column header for the field showing each country's total medals
	
if (mysqli_num_rows($result) > 0){
	// output data of each row, as long as the data is not NULL
	
	while ($row = mysqli_fetch_array($result)){
	// Iterates through every row in the query results until every row has been exhausted
	
	echo "<tr>";
	// Starts a new row
	echo "<td align='center'>".$printCon[0]."</td>";
	// Prints the name of the country in question, in the specific cell
	echo "<td align='center'>".$row[0]."</td>";
	// Prints the amount of gold medals won by the country in question, in the specific cell
	echo "<td align='center'>".$row[1]."</td>";
	// Prints the amount of silver medals won by the country in question, in the specific cell
	echo "<td align='center'>".$row[2]."</td>";
	// Prints the amount of bronze medals won by the country in question, in the specific cell
	echo "<td align='center'>".$row[3]."</td>";
	// Prints the total number of medals won by the country in question, in the specific cell
	echo "</tr>";
	// Ends the current row
	}
}

if (mysqli_num_rows($result2) > 0){
	// output data of each row, as long as the data is not NULL
	
	while ($row2 = mysqli_fetch_array($result2)){
	// Iterates through every row in the query results until every row has been exhausted
	
	echo "<tr>";
	// Starts a new row
	echo "<td align='center'>".$printCon[1]."</td>";
	// Prints the name of the athlete in question, in the specific cell
	echo "<td align='center'>".$row2[0]."</td>";
	// Prints the name of the athlete in question, in the specific cell
	echo "<td align='center'>".$row2[1]."</td>";
	// Prints the weight of the athlete in question, in the specific cell
	echo "<td align='center'>".$row2[2]."</td>";
	// Prints the weight of the athlete in question, in the specific cell
	echo "<td align='center'>".$row2[3]."</td>";
	// Prints the weight of the athlete in question, in the specific cell
	echo "</tr>";
	// Ends the current row

	}
}

?>
</p>
</div>

</body>
</html>