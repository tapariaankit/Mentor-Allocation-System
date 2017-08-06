<?php
session_start();
include_once 'connect.php';
include_once 'function.php';
check();
if(isset($_POST['aoi']))
{
	$aoi=$_POST['aoi'];
	$size=$_POST['size'];
	$i=0;
	foreach($aoi as $a)
	{
		if($size[$i]!=0)
		{
			$q1="update profaoi set nos='{$size[$i]}' where pid='{$_GET['id']}' and area='{$a}'";
			mysql_query($q1);
		}
		$i+=1;
	}
}
$id=$_GET['id'];
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
				var x=document.getElementById("form");
				//document.getElementById("pa").innerHTML=x[5].value;
				var i=0;
				for(i=1;i<=x.length;i+=2)
				{
					if(x[i].value==0)
					{
						x[i].setAttribute('style',"background-color:yellow; width:50px;");
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
				<li><a href="hhome.php">Home</a></li>
				<li><a href="hchangepass.php">Change password</a></li>
				<li><a href="head.php">Verification</a></li>
				<li><a href="generate.php">Generate OE LIST</a></li>
				<li><a href="aoiupdate1.php">Check Number Of Student</a></li>
				<li><a href="confirmsgpa.php">Verifysgpa</a></li>
			</ul>
		</div>
		
		<div id="main">
	<form action="#" method="post" onsubmit="return okay()" id="form">
<table style="border-spacing:10px 4px;">
	<?php
if($qr)
{?>
	<tr><th style="text-align:right;">Subject</th><th>No Of Student</th></tr><?php
	while($row=mysql_fetch_array($qr))
	{
		echo "<tr><td><input type=\"text\" value='{$row['area']}' name=\"aoi[]\" style=\"border:0px; text-align:right;background-color:#f0f0f0;\"readonly/></td>";
		echo "<td><input type=\"text\" value='{$row['nos']}' name=\"size[]\" style=\"width:50px;\"/></td></tr>";
	}
}
?>
<tr><td colspan="2" ><input type="submit" value="Update" style="margin-left:100px;" id="logout" /></td></tr>
</table>
</form>
		</div>
		
	</body>

</html>
