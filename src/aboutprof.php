<?php
	session_start();
	require_once 'function.php';
	require_once 'connect.php';
	checks();
	
?>
<html>
	<head>
		<title>About the professors</title>
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
			function fun()
			{
				return confirm('U have to reenter all choice ');
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
				<li><a href="schangepass.php">change password</a></li>
				<li><a href="aboutprof.php">about professors</a></li>
				<li><a href="choice1.php">choice filling</a></li>
				<li><a href="viewchoice.php">view choice</a></li>
				<li><a href="delupdate.php" onClick="return fun()">Update choice</a></li>
				<li><a href="sview.php">see allotment</a></li>
				<li><a href="ssgpa.php">fill SGPA</a></li>
			</ul>
		</div>
		
	<div id="main">
		<article>
		<?php
			$q2="select * from professor";
			$q2_run=mysql_query($q2) or die(mysql_error());
			while($row2=mysql_fetch_array($q2_run))
			{
				echo '<nav id="div1">';
				echo 'NAME: ';
				$x=$row2['1'].' '.$row2['2'].' '.$row2['3']."<br/>";
				echo strtoupper($x);
				echo 'PROF. ID.:';
				echo strtoupper($row2[0]);
				echo '<br/><u>Subjects OFFERED</u><br/>';
				$q3_run=mysql_query("select * from profaoi where pid='{$row2['pid']}'") or die(mysql_error());
				if(mysql_num_rows($q3_run)==0)
				echo 'No Subject Is Being Offered Yet';
				else
				{
				while($row3=mysql_fetch_array($q3_run))
				{
					echo $row3['area'].' '.'<br/>';
				}
			}
				echo '</nav>';
				echo '<br><br>';
				
			}
		?>
		</article>
	</div>
		
	</body>

</html>
