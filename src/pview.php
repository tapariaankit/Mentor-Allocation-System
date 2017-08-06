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
	$q3="select * from studconfirm where pid='{$_SESSION['idp']}' order by area";
	$q3r=mysql_query($q3) or die(mysql_error());
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
		
		<div id="main">
			<?php
			if(check_gen())
			{
			 echo "<p id=\"myp\">";
			 $ar='';
			 $i=1;
			while($r=mysql_fetch_array($q3r))
			{
				if($r['area']!=$ar)
				{ 
					echo '<b><u>'.$r['area'].'</u></b><br>';
					$i=1;
					$ar=$r['area'];
				}
				else { $i++;  }
				$q4="select * from student where rollno='{$r['sid']}'";
				$q4r=mysql_query($q4) or die (mysql_error());
				while($r1=mysql_fetch_array($q4r))
				{
					echo $i.')';
					echo $r1['rollno'].'    '.$r1['firstname'].' '.$r1['midname'].' '.$r1['lastname'].'   '.$r1['email'];
					echo '<br/>';
				}
			}
			echo "</p>";
			}
			else
			{
				echo '<p>Allocation is not complete yet</p>';
			}
			 ?>
			</div>
	</body>
</html>
