<html>
<head>
	<title>Learning php</title>
</head>
<body>
<?php

$conn=mysql_connect("localhost","root","");
if(!$conn)
{
	die('error in conn'.mysql_error());
}
$statement="INSERT INTO studentinfo(id,name,sem,result) values (3,'parth',6,44)";
mysql_query($conn,$statement);
/*$statement="UPDATE studentinfo SET name='raj' where id=3 ";
mysql_query($conn,$statement);
*/

$statement="select * from studentinfo;";
$result=mysql_query($conn,$statement);

$row=mysql_fetch_array($result,MYSQL_ASSOC);
//$row=mysql_fetch_array($result,MYSQLI_ASSOC);
echo"$row[name]";


mysql_close($conn);

?>


</body>
</html>