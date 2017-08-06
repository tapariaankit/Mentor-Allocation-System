<?php
session_start();
require_once 'connect.php';
require_once 'function.php';
checks();
$a=0;
if(isset($_POST['current']) && isset($_POST['new']) && isset($_POST['cnew']))
	{
		$id=$_SESSION['ids'];
		$current=$_POST['current'];
		$new=$_POST['new'];
		$cnew=$_POST['cnew'];
		if(!empty($current) && !empty($new) && !empty($cnew))
		{
			$qcurr="select password from auth_stud where id='{$id}'";
			if($qcurr_run=mysql_query($qcurr) or die(mysql_error()))
			{
				$qcurr_run_result=mysql_fetch_array($qcurr_run) or die(mysql_error());
				if($qcurr_run_result['password']!=$current)
					$a=2;
				else
				{
					$qupdt="update auth_stud set password='$new' where id='{$id}'";
						$qupdt_run=mysql_query($qupdt);
						header('location:shome.php?val=3');
				}
			}
		}
		else
		$a=1;
	}
	
?>
<html>
	<head>
		<title>Student change password</title>
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
			function fan()
			{
				if(document.getElementById('new').value!=document.getElementById('cnew').value)
				{
					alert("Password doesn\'t match !!");
					return false;
				}
				else
					return true;
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
			<form action="#" method="POST" onsubmit="return fan()">
				<table>
					<tr><td>&nbsp;</td><td></td></tr>
					<tr>
						</td>&nbsp;<td>
						<td style="text-align:right">Current Password</td>
						<td><input type="password" name="current"/></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td style="text-align:right">New Password</td>
						<td><input type="password" name="new" id="new"/></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td style="text-align:right">Confirm New</td>
						<td><input type="password" name="cnew" id="cnew"/></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th><input type="submit" value="change" name="change" id="logout"</th>
					</tr>
				</table>
			</form>
		</div>
		
	</body>
	<?php if($a==1) echo '<script>alert("please fill the fields !!")</script>';
		  else if($a==2) echo '<script>alert("Wrong CURRENT password ")</script>script>';
		  
	?>
</html>
