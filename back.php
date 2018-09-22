<html>
<head>
	<title>back.php</title>
</head>
<body>
<?php

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

      $addColumn="ALTER TABLE `".$class."` ADD `".$newColumn."` VARCHAR(3);";
      //$addColumn="ALTER TABLE `6CE-B` ADD `1@2/February/2016` VARCHAR(3) NULL AFTER `name`;";
          //ALTER TABLE `studentInfo` ADD `1@01/9/2016` VARCHAR(3) NULL AFTER `xyz`;


		if(mysqli_query($conn,$addColumn))
		{
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
					//echo "<br>row updated"; 
				}else{
					echo "<br>Unsuccessful in updating row";
				}

			    }
			    //UPDATE `6CE-B` SET `3@2/March/2016`='A' WHERE `3@2/March/2016` IS null
			    //set other entries as converse
			    $insertData="UPDATE `".$class."` SET `".$newColumn."`='A' WHERE `".$newColumn."` IS null";
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
					//echo "<br>row updated"; 
				}else{
					echo "<br>Unsuccessful in updating row";
				}

				}
				$insertData="UPDATE `".$class."` SET `".$newColumn."`='P' WHERE `".$newColumn."` IS null";
				mysqli_query($conn,$insertData);
				echo "operation success, <a href=\"http://localhost/phpfiles/form.php\">Clich here to go back</a>";
			}

		}
		
		else
			{echo "<br><br>new Column NOT created. Unsuccessful:". mysqli_error($conn);}
		
		






        

		//  $statement="select * from studentinfo;";
		//  $result=mysqli_query($conn,$statement);
		// echo "<br> <table border="1" > ";
		// while($row=mysqli_fetch_assoc($result)) 
		//   {

		// 	echo "$row[id]  $row[name] $row[sem] $row[result] <br>";
		//   }


		mysqli_close($conn);	 


?>
</body>
</html>

