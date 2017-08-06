<?php
	session_start();
	require_once 'function.php';
	require_once 'connect.php';
	check();
	if(isset($_POST["submit"]))
	{
		$q4="insert into sgpa values('{$SESSION['sid']}','{$_POST['sem']}','{$_POST['sgpa']}')";
		$q5="select * from sgpa where rollno='{$_SESSION['sid']}' and sem='{$_POST['sem']}'";
		$q5r=mysql_query($q5);
		if(mysql_num_rows($q5r)==0)
		{
			mysql_query($q4) or die(mysql_error());
		}
		else
	{
		echo '<script>alert("Semester sgpa is already inserted");</script>';
	}
	}
?>
<html>
	<head>
		<title>HOD Home</title>
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
				if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = day_name[day]+'.'+mm+'/'+dd+'/'+yyyy;
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
				<span><?php echo strtoupper($_SESSION['name']); ?></span>
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
				<li><a href="schangepass.php">change password</a></li>
				<li><a href="aboutprof.php">about professors</a></li>
				<li><a href="choice1.php">choice filling</a></li>
				<li><a href="viewchoice.php">view choice</a></li>
				<li><a href="delupdate.php" onClick="return fun()">Update choice</a></li>
				<li><a href="sview.php">see allotment</a></li>
			</ul>
		</div>
		
	<div id="main">
	<form action="#" method="post">
					<table>
						<tr>
					<td>SID</td><td> <input type="text" name="sid" /></td></tr><tr>
					<td>Semester</td><td> <input type="text" name="sem" /></td></tr><tr>
					<td>sgpa</td><td> <input type="text" name="sgpa" /></td>
					</tr>
					<tr><td colspan="2"><input type="submit" value="insert" name="submit" style="margin-left:50px;" id="logout" ></td></tr>
					</table>
				</form>
		</div>
		
	</body>

</html>
