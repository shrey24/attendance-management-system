<html>
<head>
	<title>my first php</title>
</head>
<body>
<?php
echo $_SERVER["HTTP_USER_AGENT"];
$x=23;

ECHO "<h3>hello from php</h3>";
$today=getdate();

	print("today is".$today['weekday']."<br>");
	print("\n\ntoday is ".date("d-m-y"));
	switch (date("d")) {
		case '3':
			print("Appiontment");

			break;
		case '2':
			print("Dentist");
				break;
		default:
		print("No apointment");
			# code...
			break;
	}


?>
</body>
</html>