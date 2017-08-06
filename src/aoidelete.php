<?php
session_start();
include_once 'connect.php';
include_once 'function.php';
if(isset($_POST['aoi']))
{
	$aoi=$_POST['aoi'];
	$cbox=$_POST['cbox'];
	$i=0;
	foreach ($aoi as $x)
	{
		if($cbox[$i]=='on')
		{
			$q1="delete from profaoi where pid='{$_SESSION['idp']}' and area='{$x}'";
			mysql_query($q1) or die(mysql_error());
		}
		$i+=1;
		if(!isset($cbox[$i]))
		break;
	}
}
checkp();
$id=$_SESSION['idp'];
$q="select * from profaoi where pid='{$id}'";
$qr=mysql_query($q);
?>

<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="inside.css"/>
		<script>
						window.onload=a;
			window.onunload=clearInterval(f);
	function okay()
	{
		var x=document.forms[0];
		//document.getElementById("pa").innerHTML=x[5].value;
		var i=0;
		for(i=1;i<=x.length;i+=2)
		{
			if(x[i].value==0)
			{
				alert("Size can't be zero.Please use delete option");
				return false;
			}
		}
		return true;
	}
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
				<li><a href="pchangepass.php">change password</a></li>
				<li><a href="phome.php">AOI filling</a></li>
				<li><a href="aoidelete.php">AOI delete</a></li>
				<li><a href="pview.php">see allotment</a></li>
			</ul>
		</div>
		
		<div id="main">
<form action="#" method="post" onsubmit="okay()" id="form">
<table style="border-spacing:10px 4px;">
	<?php
if($qr)
{?>
	<tr><th style=" padding-left:10px;padding-right:40px;text-align:right; text-decoration:underline; font-size:25px;">Subject</th><th style="text-decoration:underline;font-size:25px;"  >Select</th></tr><?php
	while($row=mysql_fetch_array($qr))
	{
		echo "<tr><td><input type=\"label\" value='{$row['area']}' name=\"aoi[]\" style=\"border:0px;font-size:20px; text-align:right;background-color:#f0f0f0;\" readonly/></td>";
		echo "<td ><input type=\"checkbox\"  name=\"cbox[]\" style=\"border:0px;padding-left:10px;font-size:20px;;background-color:#f0f0f0;\" /></td></tr>";
	}
}
?>
<tr><td colspan="2"><input type="submit" value="Delete" style="margin-left:100px;" id="logout"/></td></tr>
</table>
</form>
		</div>
		
	</body>

</html>
