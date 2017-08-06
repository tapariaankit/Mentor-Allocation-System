<?php
session_start();
	require_once 'connect.php';
	require_once 'function.php';
	check();
	$q4="delete from studconfirm";
	$q6="drop view if exists hello";
	mysql_query($q4) or die(mysql_error());
	mysql_query($q6) or die(mysql_error());
	$q="create view hello as select sid,cno,pid,area,cgpa from studchoice inner join cgpa on cgpa.rollno=studchoice.sid 
				order by cgpa desc,cno asc";
	mysql_query($q) or die(mysql_error());
	$q1="select * from hello";
	$qr=mysql_query($q1) or die(mysql_error());
	while($row=mysql_fetch_array($qr))
	{
		//echo $row[0].' '.$row[1].' '.$row[2]. '<br/>';
		$q11="select * from studconfirm";
		$q12="select sum(nos) from profaoi";
		$q11r=mysql_query($q11) or die(mysql_error());
		$q12r=mysql_query($q12) or die(mysql_error());
		$r12=mysql_fetch_array($q12r);
		if(mysql_num_rows($q11r)==$r12[0])
		{
			echo $r12[0];
			break;
		}
		else 
		{
			//echo 'fuck<br/>';
		}
		if(find($row['pid'],$row['area']))
		{
			$q4="select * from studconfirm where sid='{$row['sid']}'";
			$q4r=mysql_query($q4);
			if(mysql_num_rows($q4r)==0)
			{
				$q3="insert into studconfirm values('{$row['sid']}','{$row['area']}','{$row['pid']}')";
				mysql_query($q3) or die(mysql_error());
			}
			//else { echo 'acadadadasa<br/>'; }
		}
		//else { echo 'abcdeadafadad<br/>'; }
	}
?>
<html>
	<head>
		<title></title>
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
				if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = day_name[day]+':'+mm+'/'+dd+'/'+yyyy;
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
		<?php
		$q5="select * from studconfirm order by pid,area";
		$q5r=mysql_query($q5) or die(mysql_error());
		echo '<table>';
		while($row5=mysql_fetch_array($q5r))
		{
			echo '<tr>';
			echo "<td style='padding-left:10px;padding-right:10px; color:red;font-size:30px; background-color:#19FF19'>{$row5['pid']}</td>";
			echo "<td style='padding-left:10px;padding-right:10px; color:green;font-size:30px;background-color:white'>{$row5['area']}</td>";
			echo "<td  style='padding-left:10px;padding-right:10px; color:blue; background-color:yellow; font-weight:bold;font-size:30px;'>{$row5['sid']}</td>";
			echo '</tr>';
		}
		echo '</table>';
		$q2="drop view hello";
		mysql_query($q2) or die(mysql_error());
		?>
		</div>
		
	</body>

</html>
