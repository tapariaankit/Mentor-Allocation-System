
<?php
session_start();
require_once 'connect.php';
require_once 'function.php';
$a=0;
if(isset($_GET['val']))
	{
		if($_GET['val']==3)
		$a=1;
	}
checks();
?>

<html>
	<head>
		<title>Student Home</title>
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
			<table cellspacing="10px">
				<?php
					$qu="select * from student where rollno='{$_SESSION['ids']}'";
					if($qu_run=mysql_query($qu) or die(mysql_error()))
					{
						#echo mysql_num_rows($qu_run);
						$qu_array=mysql_fetch_array($qu_run);
				?>
				<tr>
					<td style="text-align:right;">ID: </td>
					<td style="border:1px ;background-color:white;"><?php echo $qu_array[0];?></td>
				</tr>
				<tr>
					<td style="text-align:right;">First Name: </td>
					<td style="border:1px ;background-color:white;"><?php echo $qu_array[1];?></td>
				</tr>
				<tr>
					<td style="text-align:right;">Middle Name: </td>
					<td style="border:1px ;background-color:white;"><?php echo $qu_array[2];?></td>
				</tr>
				<tr>
					<td style="text-align:right;">Last Name: </td>
					<td style="border:1px ;background-color:white;"><?php echo $qu_array[3];?></td>
				</tr>
				<tr>
					<td style="text-align:right;">em@il: </td>
					<td style="border:1px ;background-color:white;"><?php echo $qu_array[4];?></td>
				</tr>
				<?php }?>
			</table>
			<table cellspacing="30px" id="twotab">
				<tr>
					<th>sem<hr></th>
					<th>sgpa<hr></th>
					<th>cgpa<hr></th>
				</tr>
				<?php
					$i=0;
					$qu_cg="select sem,sgpa from sgpa where rollno='{$_SESSION['ids']}' and auth=1";
					$qu_cg_run=mysql_query($qu_cg) or die(mysql_error());
					while($qu_cg_ar=mysql_fetch_array($qu_cg_run))
					{
						$i++;
						echo '<tr><td>';
						echo $qu_cg_ar[0].'</td><td>'.$qu_cg_ar[1].'</td>';
						$qw="select round(sum(round(sgpa*credit))/sum(credit),2) from credit,sgpa 
											where credit.sem=sgpa.sem and sgpa.sem<='{$i}' and rollno='{$_SESSION['ids']}' and auth=1";
						$qw_run=mysql_query($qw) or die(mysql_error());
						$qw_return=mysql_fetch_array($qw_run);
						echo '<td>'.$qw_return[0].'</td>';
						echo '</tr>';
					}
				?>
			</table>
				
		</div>
		
	</body>
	<?php if($a==1) echo '<script>alert("Password change successfully ")</script>';?>
</html>
