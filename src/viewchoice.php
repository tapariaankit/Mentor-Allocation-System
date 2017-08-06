<?php
require_once 'connect.php';
session_start();
$q3="select * from studchoice where sid='{$_SESSION['ids']}' order by cno";
$q3r=mysql_query($q3) or die(mysql_error());?>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="inside.css"/>
		<style>
		nav {
			color:red;
		}
		</style>
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
			function fun()
			{
				return confirm('U have to reenter all choice ');
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
				<li><a href="shome.php">Home</a></li>
				<li><a href="sdetail.php">Details</a></li>
				<li><a href="schangepass.php">Change Password</a></li>
				<li><a href="aboutprof.php">About Professors</a></li>
				<li><a href="choice1.php">Choice Filling</a></li>
				<li><a href="viewchoice.php">View Choice</a></li>
				<li><a href="delupdate.php" onClick="return fun()">Update Choice</a></li>
				<li><a href="sview.php">See Allotment</a></li>
				<li><a href="ssgpa.php">Fill SGPA</a></li>
			</ul>
		</div>
		
		<div id="main">
	<?php
		$q3="select * from studchoice where sid='{$_SESSION['ids']}' order by cno";
		$q3r=mysql_query($q3) or die(mysql_error());
	?>
	<table cellspacing="10px">
		<tr>
		<th>Choice No</th>
		<th>Professor Name</th>
		<th>AREA</th>
		</tr>
			<?php
			while($row=mysql_fetch_array($q3r))
			{
				$qq=mysql_query("select * from professor where pid='{$row[1]}'") or die(mysql_error());
				$qq_r=mysql_fetch_array($qq)  or die(mysql_error());
				$x=$qq_r[1].' '.$qq_r[2].' '.$qq_r[3];
				echo '<tr><td>';
				echo $row[3].'</td><td>'.$x.'</td><td> '.$row[2].'</td><br/>';
				echo '</tr>';
			}
			?>
		</table>
	</div>
</html>

