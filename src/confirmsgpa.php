<?php
	session_start();
	require_once 'function.php';
	require_once 'connect.php';
	check();
?>
<?php
if(isset($_POST['tr']))
{
if(isset($_POST['okay']))
{
	$arr=$_POST['tr'];
	$sem=$_POST['sem'];
	$i=0;
	foreach($arr as $x)
	{
		$q="update sgpa set auth=1 where rollno='{$x}' and sem='{$sem[$i]}'";
		$i+=1;
		mysql_query($q) or die(mysql_error());
	}
}
else if(isset($_POST['delete']))
{
	$arr=$_POST['tr'];
	$sem=$_POST['sem'];
	$i=0;
	foreach($arr as $x)
	{
		$q="delete from sgpa where rollno='{$x}' and sem='{$sem[$i]}'";
		$i+=1;
		mysql_query($q) or die(mysql_error());
	}
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
				<li><a href="hhome.php">Home</a></li>
				<li><a href="hchangepass.php">Change password</a></li>
				<li><a href="head.php">Verification</a></li>
				<li><a href="generate.php">Generate OE LIST</a></li>
				<li><a href="aoiupdate1.php">Check Number Of Student</a></li>
				<li><a href="confirmsgpa.php">Verify Sgpa</a></li>
			</ul>
		</div>
		
	<div id="main">
		<form action="#" method="post">
		<table>
			<tr>
				<th style='padding-left:10px;padding-right:10px;'>Roll NO</th>
				<th style='padding-left:10px;padding-right:10px;'>Name</th>
				<th style='padding-left:10px;padding-right:10px;'>Semester</th>
				<th style='padding-left:10px;padding-right:10px;'>SGPA</th>
				<th>True</th>
			</tr>
		<?php 
			$q="select * from sgpa inner join student on student.rollno=sgpa.rollno where auth=0";
			$qr=mysql_query($q) or die(mysql_error());
			while($r=mysql_fetch_array($qr))
			{
				$a=$r[5].' '.$r[6].' '.$r[7];
				echo "<tr><td>{$r[0]}</td><td>$a</td><td><input type=\"text\" value=\"{$r[1]}\" name=\"sem[]\" style=\"background-color:#f0f0f0; width:30px; border:0px;\" readonly /></td><td>{$r[2]}</td>";
				echo "<td><input type=checkbox name=\"tr[]\" value=\"{$r[0]}\" /></td></tr>";
			}
			echo '<tr><td></td><td ><input type="submit" name="okay" value="Okay" /></td><td colspan="2"><input type="submit" name="delete" value="Delete" /></td></tr>';
		?>
		</table>
		</form>
	</div>
