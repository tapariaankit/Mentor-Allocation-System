<?php
	session_start();
	require_once 'function.php';
	require_once 'connect.php';
	checks();
?>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="inside.css"/>
		<style>
		
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
			<?php if(!ver($_SESSION['ids']))
			{
				echo '<p>You Are Already Alloted a Subject.<br/><a href="sview.php">Click HERE</a> to see your allotement</p>';
				exit;
			}	
			?>
			<article>
			<form action="#" method="post">
				<?php
					$q2=mysql_query("select distinct pid from profaoi") or die(mysql_error());
					echo '<select name="prof" >';
					while($r=mysql_fetch_array($q2))
					{
						$qq=mysql_query("select * from professor where pid='{$r[0]}'") or die(mysql_error());
						$qq_r=mysql_fetch_array($qq)  or die(mysql_error());
						$x=$qq_r[1].' '.$qq_r[2].' '.$qq_r[3];
						echo "<option value=\"{$r['0']}\">{$x}</option>";
					} 
					echo '</select>';
				?>
				<input type="submit" value="okay" />
			</form>
			<?php
				if(isset($_POST["prof"]))
				{
					$_SESSION['prof']=$_POST["prof"];
					$qq=mysql_query("select * from professor where pid='{$_SESSION['prof']}'") or die(mysql_error());
					$qq_r=mysql_fetch_array($qq)  or die(mysql_error());
					$x=$qq_r[1].' '.$qq_r[2].' '.$qq_r[3];
					echo '<form action="fillmychoice.php" method="post">';
					$q="select area from profaoi where pid='{$_POST['prof']}' and 
								area not in ( select area from studchoice where pid='{$_POST['prof']}' and sid='{$_SESSION['ids']}')";
					$qr=mysql_query($q) or die(mysql_error());
					echo "{$x}";
					echo '<select name="stud">';
					while($r1=mysql_fetch_array($qr))
					{
						echo "<option value=\"{$r1['0']}\">{$r1['0']}</option>";
					} 
					echo '</select>';
					echo '<input type="submit" value="myChoice">';
					echo '</form>';
				}
			?>
			</article>
			<?php
$q3="select * from studchoice where sid='{$_SESSION['ids']}' order by cno";
$q3r=mysql_query($q3) or die(mysql_error());?>
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
?>		</div>
		
	</body>

</html>
