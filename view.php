<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="noindex, nofollow" />
<title>Athletes Task</title>
<style type="text/css">
/* Begins the internal style sheet which will be used to style the entire document */

body {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	background-color: #f5f5f5;
	/* Sets the background color to be light grey and specifies the different fonts the document can use*/
}
.center {
	text-align:center;
	/* Aligns the title text to be in the middle of the screen*/
}
body,td,th {
	color: black; 
	/* Sets all text to be the colour black */
}
.larger {
	font-size:larger;
	text-align:left;
	/* Sets all elements in the section where the user selects their preferences to have a larger font and be aligned to the left*/
}
table {
	margin-left:auto;
	margin-right:auto;
	background-color: #e6e6e6;
	/* Sets the background colour of the table to be a darker shade of grey */
}

#div1 {
  position: absolute;
  left: 100px;
  top: 550px;
  /* Sets the position of the first table */
}
#div2 {
  position: absolute;
  left: 400px;
  top: 550px;
  /* Sets the position of the second table */
}
#div3 {
  position: absolute;
  left: 700px;
  top: 550px;
  /* Sets the position of the third table */
}
#div4 {
  position: absolute;
  left: 1000px;
  top: 550px;
  /* Sets the position of the fourth table */
}
#imgOne {
  position: absolute;
  left: 100px;
  top: 100px;
  max-width: 420px;
  max-height: 336px;
  border: 2px solid #555;
  /* Sets the position of the first image along with its size and border */
}	
#imgTwo {
  position: absolute;
  left: 1750px;
  top: 100px;
  max-width: 420px;
  max-height: 336px;
  border: 2px solid #555;
  /* Sets the position of the second image along with its size and border */
}	
</style>
</head>
<body>
<h3 class="center">COA123 - Web Programming</h3>
<h2 class="center">Individual Coursework - Olympic Medals per country</h2>
<h1 class="center">Task 4 - Medals (view.php)</h1>
<!-- Outputs the title of the webpage so the user can identify what they are looking at --> 

<img src="http://codj6.sci-project.lboro.ac.uk/f026987olympics/image_one.jpg" id="imgOne">
<!-- Retrieves the image contained in the specified file path and stores it with the id "imgOne" -->
<img src="http://codj6.sci-project.lboro.ac.uk/f026987olympics/image_two.jpg" id="imgTwo">
<!-- Retrieves the image contained in the specified file path and stores it with the id "imgTwo" -->

  <br />
  <form>
  <!-- Declares a form which the user can use to send information to the webpage-->
    <table border="1">
	<!-- Declares a table -->
      <tr>
        <th scope="col">Key</th>
        <th scope="col">Value</th>
		<!-- Ouputs the column headers for the table the user will interact with -->
      </tr>
      <tr>
        <td><label for="country_id">ISO_id one (first country)</label></td>
		<!-- Specifies the text which is shown in the corresponding cell -->
        <td>
          <input name="country_id" type="text" class="larger" id="country_id1" value="GBR" size="12" />
		  <!-- Specifies the textbox where the user will enter the ISO_id of the first country -->
		</td>
      </tr>
      <tr>
        <td><label for="part_name">ISO_id two (second country)</label></td>
		<!-- Specifies the text which is shown in the corresponding cell -->
        <td><input name="part_name" type="text" class="larger" id="country_id2" value="RUS" size="12" /></td>
		<!-- Specifies the textbox where the user will enter the ISO_id of the second country -->
	  </tr>
      <tr>
        <td>Total medals gained per country</td>
		<!-- Specifies the text which is shown in the corresponding cell -->
        <td><input type="checkbox" id="totalM" name="totalM" class="larger" onclick="totalM(this) size="12"></button> </td>
		<!-- Specifies the checkbox which the user will press when they want to see the corresponding information -->
	  </tr>
      <tr>
        <td>Number of gold medals gained per country</td>
		<!-- Specifies the text which is shown in the corresponding cell -->
        <td><input type="checkbox" id="goldM" name="goldM" class="larger" onclick="goldM(this) size="12"></button> </td>
		<!-- Specifies the checkbox which the user will press when they want to see the corresponding information -->
	  </tr>
      <tr>
        <td>Number of cyclists per country</td>
		<!-- Specifies the text which is shown in the corresponding cell -->
        <td><input type="checkbox" id="cycNum" name="cycNum" class="larger" onclick="cycNum(this) size="12"></button> </td>
		<!-- Specifies the checkbox which the user will press when they want to see the corresponding information -->
	  </tr>
      <tr>
        <td>Average age of cyclists per country</td>
		<!-- Specifies the text which is shown in the corresponding cell -->
        <td><input type="checkbox" id="cycAge" name="cycAge" class="larger" onclick="cycAge(this) size="12"></button> </td>
		<!-- Specifies the checkbox which the user will press when they want to see the corresponding information -->
	  </tr>	  
      <tr>
        <td>Compare the medals of both countries</td>
		<!-- Specifies the text which is shown in the corresponding cell -->
        <td><button type="button" id="Search" class="larger" size="12">Search</button></td>
		<!-- Specifies the button which the user will press to finalize their choices and for the webpage to display the results-->
	  </tr>	  
    </table>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
	<!-- Imports jquery so it can be used by the program-->
<script> 

var choice = "";
// Declares the variable which will hold the value corresponding to which checkbox is currently ticked
var title = "";
// Declares the variable which will hold the table title corresponding to which checkbox is currently ticked

$(document).ready(function(){ 

	$("#Search").click(function(){

	if ((!$('#country_id1').val()) || (!$('#country_id2').val()) || choice.length == 0) {
	// Checks if any of the fields the user should have entered is empty, if so the following code block is executed
	alert("PLEASE COMPLETE ALL FIELDS BEFORE SEARCHING (All ISO_id's must be correct)");
	return;
}

else {
	//When the button with the id 'Search' is pressed: the following code block will be executed
		var country1 =$("#country_id1").val();
		// Stores the value of the first textbox in this variable to be used in a querystring
		var country2 =$("#country_id2").val();
		// Stores the value of the first textbox in this variable to be used in a querystring
		
		var queryStr1 = "http://codj6.sci-project.lboro.ac.uk/f026987olympics/test.php?country="+country1;
		// Creates the querystring which will be used to contact another file, this will contain information specific to what the user has entered into a textbox
		$("#div1").load(queryStr1); 
		// Updates the value of the div with id 'div1' to hold a table, this table is returned by the file corresponding to the previous querystring
		
		var queryStr2 = "http://codj6.sci-project.lboro.ac.uk/f026987olympics/test.php?country="+country2;
		// Creates the querystring which will be used to contact another file, this will contain information specific to what the user has entered into a textbox
		$("#div2").load(queryStr2);	
		// Updates the value of the div with id 'div2' to hold a table, this table is returned by the file corresponding to the previous querystring
		
		var queryStr3 = "http://codj6.sci-project.lboro.ac.uk/f026987olympics/comparisonTab.php?country_1="+country1+"&country_2="+country2;
		// Creates the querystring which will be used to contact another file, this will contain information specific to what the user has entered into each textbox
		$("#div3").load(queryStr3);
		// Updates the value of the div with id 'div3' to hold a table, this table is returned by the file corresponding to the previous querystring
		
		$("#titleP").text(title);
		// Updates the title text above this new table to contain the relevant heading
		GetJSSONData('#testTab','http://codj6.sci-project.lboro.ac.uk/f026987olympics/additionalTab.php?measurement='+choice);  
		// Calls the function which will be used to generate the new table containg all the required information (with the choice appended so the program can correctly do this)
	 }
	}); 
}); 

$('#totalM').click(function() {
// The progrm executes this function if the checkbox with id 'totalM' is clicked

    if ($(this).is(':checked') == true) {
	// If the current checkbox is set to 'true' then the program will execute the following code block
		
        $('#goldM').prop('checked', false);
		$('#cycNum').prop('checked', false);
		$('#cycAge').prop('checked', false);
		// Sets the state of all other checkboxes to 'false' since only one can be selected at any time
		
		choice = "totalM";
		// Sets the value of the variable 'choice' to be equal to the value related to this checkbox
		title = "Medals Earned per Country";
		// Sets the value of the variable 'title' to be equal to the value related to this checkbox
    }
});

$('#goldM').click(function() {
// The progrm executes this function if the checkbox with id 'goldM' is clicked

    if ($(this).is(':checked') == true) {
	// If the current checkbox is set to 'true' then the program will execute the following code block
	
        $('#totalM').prop('checked', false);
		$('#cycNum').prop('checked', false);
		$('#cycAge').prop('checked', false);
		// Sets the state of all other checkboxes to 'false' since only one can be selected at any time
		
		choice = "goldM";
		// Sets the value of the variable 'choice' to be equal to the value related to this checkbox
		title = "Gold Medals Earned per Country";
		// Sets the value of the variable 'title' to be equal to the value related to this checkbox
    }
});

$('#cycNum').click(function() {
// The progrm executes this function if the checkbox with id 'cycNum' is clicked

    if ($(this).is(':checked') == true) {
	// If the current checkbox is set to 'true' then the program will execute the following code block	
		
        $('#goldM').prop('checked', false);
		$('#totalM').prop('checked', false);
		$('#cycAge').prop('checked', false);
		// Sets the state of all other checkboxes to 'false' since only one can be selected at any time
		
		choice = "cycNum";
		// Sets the value of the variable 'choice' to be equal to the value related to this checkbox
		title = "Number of Cyclists per Country";
		// Sets the value of the variable 'title' to be equal to the value related to this checkbox
    }
});

$('#cycAge').click(function() {
// The progrm executes this function if the checkbox with id 'cycAge' is clicked

    if ($(this).is(':checked') == true) {
	// If the current checkbox is set to 'true' then the program will execute the following code block	
		
        $('#goldM').prop('checked', false);
		$('#cycNum').prop('checked', false);
		$('#totalM').prop('checked', false);
		// Sets the state of all other checkboxes to 'false' since only one can be selected at any time
		
		choice = "cycAge";
		// Sets the value of the variable 'choice' to be equal to the value related to this checkbox
		title = "Average Age of Cyclists per Country";
		// Sets the value of the variable 'title' to be equal to the value related to this checkbox
    }	
});


function GetJSSONData(tablename, URLstring) 
{ 
$.ajax({ 
url: URLstring, 
dataType: 'json', 
success: function(data) { 

$(tablename).find("tr").remove(); 
//Remove all rows from the JSON object returned by additonalTab.php

var rank = 1;
var cellheaders; 
var cellvalues; 
var rowvalues; 
/* Declares the variables which store the values of each cell value, head and its row. 
This is alonside the rank which will be different for every country */

cellheaders = Object.keys(data[0]); 
// Retrieves column headers from the JSON object so they can become the headers of the new table being generated

for (var j=0; j<cellheaders.length; j++) { 
// Loops through every header 

rowvalues += "<th>" + cellheaders[j] + "</th>";
// Appends each cell header to the concatenation of the previous ones to initialise every column in the table 
} 

var row = $("<tr>" + rowvalues + "<td class = 'test'>Rank</td></tr>"); 
// Stores the headers alonside the rank header together as one row

$(tablename).append(row); 
// Appends the header row to the table so the user can see them

for (var i=0; i<data.length; i++) { 
// Loop through each record/row 
rowvalues = ""; 
cellvalues = Object.values(data[i]); 
// Stores the value of all cells in that row

for (var ii=0; ii<cellvalues.length; ii++) { 
// Loop through value/cell 
rowvalues += "<td>" + cellvalues[ii] + "</td>"; 
// Appends the values of each cell to the current row
} 

var row = $("<tr>" + rowvalues + "<td class = 'test'>" + rank + "</td></tr>"); 
// Appends the value of the current row to the rank assigned to that country for the final row value
rank++;
// Increments the rank variable so it displays the correct value on the next row


$(tablename).append(row); 
//Append the new row to the table and program will loop back to the start until every row has been appended to the table
} 
}, 
error: function(jqXHR, textStatus, errorThrown){ 
// This function is called when there is an error in completting the previous task in some way
alert('Error: ' + textStatus + ' - ' + errorThrown); 
// Creates an alert box speciying the type of error the user has encountered
} 
}); 
} 
</script>

  </form>
  
  <div id="div1"></div> 
  <!-- Declares a div which will be used to diplay all the athletes of the country with ISO_id one -->
  <div id="div2"></div> 
  <!-- Declares a div which will be used to diplay all the athletes of the country with ISO_id two -->
  <div id="div3"></div>  
  <!-- Declares a div which will be used to diplay every medal won by each country and their types -->
  <div id="div4"> 
  <!-- Declares a div which will be used to diplay the data which has been specified by the user -->
  <p id="titleP"></p>
  
  <!-- Declares the text element which will display the title of the additional table which the user has selected-->
  <table id="testTab" border="1"> </table>
  <!-- Declares the table which will be updated with the data which has been specified by the user -->
  </div>   	
  
</body>
</html>