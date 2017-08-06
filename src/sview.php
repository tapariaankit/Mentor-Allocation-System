<style>
	#myp {
		color:blue;
		font-size:20px;
	}
</style>
<?php
session_start();
	require_once 'connect.php';
	require_once 'function.php';
	$q3="select * from studconfirm where sid='{$_SESSION['ids']}'";
	$q3r=mysql_query($q3) or die(mysql_error());
	$r=mysql_fetch_array($q3r);
?>
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
			<?php 
			if(check_gen())
			{
			echo "<p id=\"myp\">You are alloted &nbsp;<b>{$r['area']}</b> &nbsp; under PID. {$r['pid']}</p>"; 
			$q="select * from professor where pid='{$r['pid']}'";
			$qr=mysql_query($q) or die(mysql_error());
			$r=mysql_fetch_array($qr) or die(mysql_error());
			echo "Pid:{$r[0]}<br/>";
			$x=$r[1].' '.$r[2].' '.$r[3];
			echo "Name:{$x}<br/>";
			echo "Email:{$r[4]}";
			}
			else
			{
				echo '<p>You are not alloted any subject yet</p>';
			}
			?>
			</div>
		
	</body>

</html>
