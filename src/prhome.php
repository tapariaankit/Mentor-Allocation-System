<?php
session_start();
require_once 'function.php';

$a=0;
if(isset($_GET['val']))
	{
		if($_GET['val']==3)
		$a=1;
	}
checkp();
?>

<html>
	<head>
		<title>Professor Home</title>
		<link rel="stylesheet" type="text/css" href="inside.css"/>
		<script>
			window.onload=a;
			window.onunload=clearInterval(f);
			function a()
			{
				var today = new Date();
				var dd = today.getDate();
				var mm = today.getMonth()+1; //January is 0!
				var yyyy = today.getFullYear();
				var day=today.getDay();
				var day_name=new Array(7);
				day_name[0]="Sunday"
				day_name[1]="Monday"
				day_name[2]="Tuesday"
				day_name[3]="Wednesday"
				day_name[4]="Thursday"
				day_name[5]="Friday"
				day_name[6]="Saturday"
				if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = day_name[day]+':'+dd+'/'+mm+'/'+yyyy;
				document.getElementById("para").innerHTML=today;
				setInterval("f()",1000);
			}
			function f()
			{
			var currentTime = new Date();
			var hours = currentTime.getHours();
			var minutes = currentTime.getMinutes();
			var seconds = currentTime.getSeconds();
			document.getElementById("cds").innerHTML=hours+':'+minutes+':'+seconds;
			}
		</script>
	</head>
	
	<body>
		
		<div id="logo"></div>
		
		<div id="top">
			<div id="date">
				<p id="para"></p>
				<p id="cds")></p>
			</div>
			<div id="welcome">
				<p>&nbsp;Welcome, &nbsp;</p>
				<span><?php echo ucwords($_SESSION['name']); ?></span>
			</div>	
			
			<div id ="logot">
				<form action="logout.php">
					<input type="submit" value="Logout" id="logout"/>
				</form>
			</div>
		</div>		
		
		<div id="left">
			<ul>
				<li><a href="prhome.php">Home</a></li>
				<li><a href="pchangepass.php">Change Password</a></li>
				<li><a href="phome.php">AOI Filling</a></li>
				<li><a href="aoidelete.php">AOI Delete</a></li>
				<li><a href="pview.php">See Allotment</a></li>
			</ul>
		</div>
		
		<div id="main"></div>
		
	</body>
	<?php if($a==1) echo '<script>alert("Password change successfully ")</script>';?>

</html>

