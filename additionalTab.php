<?php 

$tableType = $_GET['measurement'];
// Stores the value of the measurement parameter in the querystring in a variable

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



switch($tableType) {
/* Based on the value of the measurement parameter, the program will select which block of code to execute next,
this way it can used different database queries based on the requirements of the user*/
	
	case "totalM":
	
	$sql = "SELECT country_name AS Country, total AS `Total Medals Earned` FROM Country ORDER BY total DESC";
	// Holds the query which will be used to retrieve data from the database by the program

	break;

	case "goldM":
	
	$sql = "SELECT country_name AS Country, gold AS `Total Gold Medals Earned` FROM Country ORDER BY gold DESC";
	// Holds the query which will be used to retrieve data from the database by the program
	
	break;


	case "cycNum":
	
	$sql = "SELECT Country.country_name AS Country, COUNT(Cyclist.name) AS `Number of Cyclists` FROM Cyclist
	RIGHT JOIN Country ON Cyclist.ISO_id = Country.ISO_id 
	GROUP BY Country.country_name 
	ORDER BY `Number of Cyclists` DESC";
	// Holds the query which will be used to retrieve data from the database by the program

	
	break;

	case "cycAge":
	
	$sql = "SELECT Country.country_name AS Country, 
	AVG((YEAR('2012-08-12')-YEAR(dob)) - (RIGHT('2012-08-12',5)<RIGHT(dob,5))) AS `Average Age` FROM Cyclist
	INNER JOIN Country on Cyclist.ISO_id = Country.ISO_id GROUP BY Country.country_name ORDER BY `Average Age` ASC";
	// Holds the query which will be used to retrieve data from the database by the program
	

	
	break;

}

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

?>
