<!DOCTYPE html>
<html>
<head>
<title>PHP script in PHP file</title>
</head>

<body>

  <div>
<p> 
<?php 

$part_one = $_GET['date_1'];
// Stores the value in the date_1 box in a new variable that can be used in PHP
$part_two = $_GET['date_2'];
// Stores the value in the date_2 box in a new variable that can be used in PHP

if (empty($part_one) || empty($part_two)) {
// Checks if any of the fields the user should have entered is empty, if so the following code block is executed

	echo "Data incomplete (Please fill in both fields correctly)";
	// Prints an error message alerting the user that they have made a mistake in the previous page
}

else {

$newDate1 = DateTime::createFromFormat('d/m/Y', $part_one)->format('Y-m-d');
// Converts the contents of $part_one into a usable date format when querying the database for potential results
$newDate2 = DateTime::createFromFormat('d/m/Y', $part_two)->format('Y-m-d');
// Converts the contents of $part_two into a usable date format when querying the database for potential results

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
$sql = "SELECT Cyclist.name, Country.country_name, Country.gdp, Country.population FROM Country INNER JOIN Cyclist ON Country.ISO_id = Cyclist.ISO_id WHERE Cyclist.dob >= '$newDate1' AND Cyclist.dob <= '$newDate2'";
// Holds the query which will be used to retrieve data from the database by the program
$result = mysqli_query($conn, $sql);
// Makes a query through the database connection esatblished by $conn and using the query established by $sql, the program can now retrieve all the relevant data row by row
	
	
	
if (mysqli_num_rows($result) > 0){
	// output data of each row, as long as the data is not NULL
	
	while ($row = mysqli_fetch_assoc($result)){
	// Iterates through every row in the query results until every row has been exhausted
	
	 $array[] = $row;
	 // Stores the row which will be converted into an element of a JSON oject

	}
}


echo json_encode($array);
// Converts the array containing all results from the database query into a JSON object holding each one and outputs it

}
?>

</p>
</div>

</body>
</html>
