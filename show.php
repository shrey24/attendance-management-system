<?php
session_start();
if(!isset($_SESSION["usr"])){
	echo '<script type="text/javascript"> window.location = "http://localhost/phpfiles/signin.php";</script>';
}
?>
<html>
<head>
<title>Attendance fill Form</title>
<style type="text/css">
h3{font-family: Calibri; 
	font-size: 22pt;
	 font-style: normal;
	  font-weight: bold;
	   color:SlateBlue;
		text-align: center;
		 
	}
table{
	font-family: Calibri;
	 color:black;
	  font-size: 11pt;
	   font-style: normal;
	 background-color: #e6e6e6;
	  border-collapse: collapse;
	   border: 2px solid navy;
	   height: 400px;
	   width: 400px;
	   font-size: 20px;
	}
table.inner{
	border: 0px;
}

.result{
	font-family: Calibri;
	border:2px solid black; 
	border-collapse:collapse;
    width: 400px;
    text-align: center; /*maybe in <td>*/
    padding: 5px;
}


/*--horizontal nav----------------------*/
	

	ul.h_nav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

	li.h_nav {
	    float: left;
	    border-right:1px solid #bbb;
	}

	li.h_nav:last-child {
	    border-right: none;
	}

	li a.h_nav {
	    display: block;
	    color: white;
	    text-align: center;
	    padding: 14px 16px;
	    text-decoration: none;
	    font-family:  Arial;
	}

	li a.h_nav:hover:not(.active) {
	    background-color: #111;
	}

	.active {
	    background-color: #4CAF50;
	}
/*----------------------------------*/
</style>
</head>
 
<body>
<div class="h_nav">
<ul class="h_nav">
  <li class="h_nav"><a class="h_nav" href="http://localhost/phpfiles/form.php">New</a></li>
  <li class="h_nav"><a class="active h_nav" href="http://localhost/phpfiles/show.php">show</a></li>
  <li class="h_nav"><a class="h_nav" href="http://localhost/phpfiles/update.php">update</a></li>
  
  <li class="h_nav" style="float:right"><a class="h_nav" 
		  	href="http://localhost/phpfiles/signin.php?logout=true">Sign out</a></li>
</ul>

</div>



<h3>Enter details to see record</h3>
<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<fieldset>
<table align="center" cellpadding = "10">
 
<tr>
<td>Class</td>
<td>
<select name="sem">
<option value="-1">SEM</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>
<select name="Class">
<option value="1">CE-A</option>
<option value="2">CE-B</option>
<option value="3">CE-C</option>
<option value="4">IT</option>
</select>
</td>
</tr>
 

 
<tr>
<td>DATE</td>
 
<td>
<select name="date_day" id="date_day">
<option value="-1">Day:</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option> 
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
 
<select id="date_month" name="date_month">
<option value="-1">Month:</option>
<option value="January">Jan</option>
<option value="February">Feb</option>
<option value="March">Mar</option>
<option value="April">Apr</option>
<option value="May">May</option>
<option value="June">Jun</option>
<option value="July">Jul</option>
<option value="August">Aug</option>
<option value="September">Sep</option>
<option value="October">Oct</option>
<option value="November">Nov</option>
<option value="December">Dec</option>
</select>
 
<select name="date_year" id="date_year">
 
<option value="-1">Year:</option>
<option value="2016">2016</option>

</select>
</td>
</tr>
 

<tr>
<td>LECTURE NO.</td>
<td>
<select name="lecture_no">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
</select>
</td>
</tr> 

<tr>
<td></td>
</tr>
 
<tr>
<td colspan="2" align="center">
<input type="submit" value="Show" name="submit">
<input type="reset" value="Reset">
</td>
</tr>
</table>
 </fieldset>
</form>
<br>


<div>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$conn=mysqli_connect("localhost","root","");
		if($check=mysqli_select_db($conn,"AttendanceSystem")){
			echo"<br><h3 align=\"center\">class 6CE-B </h3><br><br>";
		}else{
			//create new database
			echo"table doesnot exist";
		}

		// Get input parameters from client

		$class="6CE-B";  // test with static case
		$date=$_POST["date_day"]."/".$_POST["date_month"]."/".$_POST["date_year"];
		
		$lecture=$_POST["lecture_no"];
		$newColumn=$lecture."@".$date;

		$statement="SELECT `rollNo`,`name`,`".$newColumn."` FROM `".$class."`";
		if($result=mysqli_query($conn,$statement))
		{

			echo "<table style=\"result\" align=\"center\" cellpadding = \"3\">";
			echo "<tr> <td>Roll no.</td> <td>NAME</td> <td>Lec:$lecture Date:$date</td></tr>";
			while($row=mysqli_fetch_assoc($result)) 
			{
			  echo "<tr class=\"result\"> <td class=\"result\">$row[rollNo]</td><td class=\"result\">$row[name]</td><td class=\"result\">$row[$newColumn]</td></tr>";
			
			}
		}else
		{
			echo "<br> Cannot find $newColumn";
		}
}	






?>



</div>







 
</body>
</html>