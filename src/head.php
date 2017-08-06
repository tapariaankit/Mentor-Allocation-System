<?php
	session_start();
	require_once 'function.php';
	require_once 'connect.php';
	check();
	$qr="select * from student inner join auth_stud on id=rollno where auth=0";
	$qr_run=mysql_query($qr);
	$qr1="select * from professor inner join auth_prof on pid=id where auth=0";
	$qr1_run=mysql_query($qr1);
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
				<li><a href="hhome.php">Home</a></li>
				<li><a href="hchangepass.php">Change password</a></li>
				<li><a href="head.php">Verification</a></li>
				<li><a href="generate.php">Generate OE LIST</a></li>
				<li><a href="aoiupdate1.php">Check Number Of Student</a></li>
				<li><a href="confirmsgpa.php">Verifysgpa</a></li>
			</ul>
		</div>
		
	<div id="main">
	<form action="verify.php" method="post">
	<table>
		<tr><th>PROFESSOR</th><th></th></tr><tr>
		<?php
		if(mysql_num_rows($qr1_run)!=0)
		{
			while($row=mysql_fetch_array($qr1_run))
			{
				echo "<tr><td>{$row['pid']}</td>";
				$x=$row['firstname'].' '.$row['midname'].' '.$row['lastname'];
				echo "<td>{$x}</td>";
				echo "<td><input type=\"checkbox\" name=\"profs[]\" value='{$row['id']}' /></td></tr>";
			}
		} else echo '<tr><td>No Recent Entries</td></tr>';
		?>
		<th>STUDENT</th><th></th></tr>
		<?php
		if(mysql_num_rows($qr_run)!=0)
		{
			while($row=mysql_fetch_array($qr_run))
			{
				echo "<tr><td>{$row['rollno']}</td>";
				$x=$row['firstname'].' '.$row['midname'].' '.$row['lastname'];
				echo "<td>{$x}</td>";
				echo "<td><input type=\"checkbox\" name=\"studs[]\" value='{$row['rollno']}' /></td></tr>";
			}
		} else echo '<tr><td>No Recent Entries</td></tr>';
		?>
		<tr>
			<th><input type="submit" value="Okay" id="logout" name="okay"/><input type="submit" value="delete" id="logout" name="delete"/></th>
			<th></th>
			
		</tr>
	</table>
	</form>
		</div>
		
	</body>

</html>
