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
		 text-decoration: underline ;
	}
table{
	font-family: Calibri;
	 color:white;
	  font-size: 11pt;
	   font-style: normal;
	 background-color: SlateBlue;
	  border-collapse: collapse;
	   border: 2px solid navy;
	   height: 400px;
	   width: 400px;
	   font-size: 20px;
	}
table.inner{
	border: 0px;
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
  <li class="h_nav"><a class="h_nav" href="http://localhost/phpfiles/show.php">show</a></li>
  <li class="h_nav"><a class="active h_nav" href="http://localhost/phpfiles/update.php">update</a></li>
  
  <li class="h_nav" style="float:right"><a class="h_nav" 
		  	href="http://localhost/phpfiles/signin.php?logout=true">Sign out</a></li>
</ul>

</div>



<h3>UPDATE ATTENDANCE</h3>
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
<td>
<input type="radio" name="mode" value="present" checked>Present No.  </input>
<input type="radio" name="mode" value="absent">Absent No. </input>
</td>
</tr>
 

<tr>
<td>Attendence<br /><br /><br /></td>
<td><textarea name="inp" rows="4" cols="30"></textarea></td>
</tr>
 

<tr>
<td colspan="2" align="center">
<input type="submit" value="Update" name="submit">
<input type="reset" value="Reset">
</td>
</tr>
</table>
 </fieldset>
</form>


<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{

	//--------------- database Management

   		$conn=mysqli_connect("localhost","root","");
		if($check=mysqli_select_db($conn,"AttendanceSystem")){
			echo"<br>database 6CE-B exist<br><br>";
		}else{
			//create new database
			echo"database doesnot exist";
		}

		// Get input parameters from client

		$class="6CE-B";  // test with static case
		$date=$_POST["date_day"]."/".$_POST["date_month"]."/".$_POST["date_year"];
		
		$lecture=$_POST["lecture_no"];
		$newColumn=$lecture."@".$date;
		
		$mode=$_POST["mode"];
               echo "<br>$newColumn     mode=$mode <br>" ;

		//--------------fetch data and store it into list[] Array
   		$string=$_POST["inp"];
   		if($string!="")
   		{
   			echo"<br><br>";
   			$s=str_replace(" ","",$string);
   			
   			$j=0; 
   			$p=0;
   			$list[0]=0;  //list array stores the converted int values from textarea input
			for ($i=strlen($s)-1; $i>=0; $i--) 
			{ 			
				$nextChar=$s[$i];

				if(is_numeric($nextChar))
				{
					$num=intval($nextChar);
					$list[$j]=$list[$j] + $num*pow(10,$p); $p++; 
				}

				//echo"$s[$i]";
				else if($nextChar==",")
				{
					$j++; $p=0; $list[$j]=0;
				}
			}
			
			//test sort
			// for($i=0;$i<count($list)-1;$i++)
			// {
			// 	for($j=0;$j<$i;$j++)
			// 	{
 		// 			if()
			// 	}
				

			// }
			// echo" <br> $list[$i]";
		}  		
   		else{echo"Nan";}
   		//---------------- array list[] contains all roll_no inputs		
   		



   		//-------QUERIES----------!

      //$addColumn="ALTER TABLE `".$class."` ADD `".$newColumn."` VARCHAR(3);";
      //$addColumn="ALTER TABLE `6CE-B` ADD `1@2/February/2016` VARCHAR(3) NULL AFTER `name`;";
          //ALTER TABLE `studentInfo` ADD `1@01/9/2016` VARCHAR(3) NULL AFTER `xyz`;


		
		//	echo "<br><br>new column created";
			//insert values in new column
			if($mode=="present")
			{	echo "mode=present";
				for($i=0;$i<=count($list)-1;$i++)
				{
				$insertData="UPDATE `".$class."` SET `".$newColumn."`='P' WHERE rollNo=".$list[$i];
				//  echo "<br>$insertData<br>";
				//UPDATE `studentInfo` SET `1@01/9/2016`="P" WHERE id=7;
				if(mysqli_query($conn,$insertData)){ 
					echo "<br>$list[$i] updated"; 
				}else{
					echo "<br>Unsuccessful in updating row";
				}

			    }
			    //UPDATE `6CE-B` SET `3@2/March/2016`='A' WHERE `3@2/March/2016` IS null
			    //set other entries as converse
			    
			    if(mysqli_query($conn,$insertData)){
			    	//echo "<br>other row(s) updated"; 
			    	echo "operation success, <a href=\"http://localhost/phpfiles/form.php\">Clich here to go back</a>";
			    }else{
			    	echo "<br>other row(s) NOT updated"; 
			    }
			

			}	
				
			
			else  // $mode = A
			{	echo "mode=absent";
				for($i=0;$i<=count($list)-1;$i++)
				{
				$insertData="UPDATE `".$class."` SET `".$newColumn."`='A' WHERE rollNo=".$list[$i];
				
				if(mysqli_query($conn,$insertData)){ 
					echo "<br>$list[$i] updated"; 
				}else{
					echo "<br>Unsuccessful in updating row";
				}

				}
				

		    }
		
		
		
		






        

		//  $statement="select * from studentinfo;";
		//  $result=mysqli_query($conn,$statement);
		// echo "<br> <table border="1" > ";
		// while($row=mysqli_fetch_assoc($result)) 
		//   {

		// 	echo "$row[id]  $row[name] $row[sem] $row[result] <br>";
		//   }


		mysqli_close($conn);	 

}
?>
 
</body>
</html>