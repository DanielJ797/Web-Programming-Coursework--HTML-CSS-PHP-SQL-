<!DOCTYPE html>
<html>
<head>
<title>PHP script in PHP file</title>
</head>

<body>

  <div>
<p> 
<?php 

$min_weight = $_GET['min_weight'];
// Stores the value in the min_weigth box in a new variable that can be used in PHP
$max_weight = $_GET['max_weight'];
// Stores the value in the max_weigth box in a new variable that can be used in PHP
$min_height = $_GET['min_height'];
// Stores the value in the min_height box in a new variable that can be used in PHP
$max_height = $_GET['max_height'];
// Stores the value in the max_height box in a new variable that can be used in PHP

if (empty($min_weight) || empty($max_weight) || empty($min_height) || empty($max_height)) {
// Checks if any of the fields the user should have entered is empty, if so the following code block is executed

	echo "Data incomplete (Please fill in all of the fields correctly)";
	// Prints an error message alerting the user that they have made a mistake in the previous page
}

else {


echo "<table border='1'>"; 
// Creates a new table which will hold all the values which the user will see

echo "<td align='center'></td>";
// Creates a blank corner element which is the first cell in the table

for($title_height=$min_height;$title_height<=$max_height;$title_height+=5) { echo "<td align='center'>". $title_height."</td>"; }
// Loops through every possible value of height that will be measured and prints it so the suer can see the height corresponding to a BMI

for($weight=$min_weight;$weight<=$max_weight;$weight+=5){ 
// Iterates through every possible value of weight that will be used to generate a BMI

    echo "<tr>"; 
	// Starts a new row
	echo "<td align='center'>".$weight."</td>";
	// Prints the current weight being used as the first cell in the row
		
        for($height=$min_height;$height<=$max_height;$height+=5){ 
		// Iterates through every possible height using the current weight
               echo "<td align='center'>".round(($weight/($height/100)),3)."</td>"; 
			   // Prints the BMI corresponding to the height and weight for that cell
        } 

    echo "</tr>"; 
	// Finishes the row
} 

echo "</table>";
// The table has been built

}
?>
</p>
</div>

</body>
</html>
