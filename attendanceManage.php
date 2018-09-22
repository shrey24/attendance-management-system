<html>
<head>
	<title>test attendance</title>
</head>
<body>
<form method="POST" action="back.php">
	
<textarea id="in" name="inp" rows="4" cols="30"></textarea>
<input type="submit" value="send" name="submit">
</form>

	<?php
	$s1="shrey";
	$s2="gmail";
	$s3=$s1."@".$s2."com";
	echo "<br> $s3";

	$mode="present";
	if($mode=="present"){
		echo "<br>$mode";

	}else{
		echo "<br>$mode";
	}

	    // echo"php exec";
   		// $string=$_POST["inp"];
   		// if(isset($string))
   		// {echo"<br><br> $string";}


		$conn=mysqli_connect("localhost","root","");
		if($check=mysqli_select_db($conn,"test")){
			echo"database test exist";
		}else{
			//create new database
			echo"database doesnot exist";
		}
		$statement="select * from studentinfo;";
		$result=mysqli_query($conn,$statement);
		
		while($row=mysqli_fetch_assoc($result)) {
			echo "$row[id]  $row[name] $row[sem] $row[result] <br>";
		}


		// mysqli_close($conn);	
	?>

</body>
</html>