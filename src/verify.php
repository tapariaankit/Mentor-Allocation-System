<?php
if(isset($_POST['okay']))
{
	require_once 'connect.php';
	if(isset($_POST['profs']))
	{
		$arr=$_POST['profs'];
		foreach ($arr as $x)
		{
			$qr="update auth_prof set auth=1 where id='{$x}'";
			$qr1="select email from professor where pid='{$x}'";
			if($qr_run=mysql_query($qr) or die(mysql_error()))
			{
				if($qr1_run=mysql_query($qr1) or die(mysql_error()))
				{
				$row=mysql_fetch_array($qr1_run);
				mail($row[0],'NIT,Rourkela','Congratulations,Your account have been verified by head of department.You can now login and acess features of eGuideAllocation System.');
				echo 'Verified';
				header("Location:head.php");
				}
			}
		}
	}
	if(isset($_POST['studs']))
	{
		$arr=$_POST['studs'];
		foreach ($arr as $x)
		{
			$qr="update auth_stud set auth=1 where id='{$x}'";
			$qr1="select email from student where rollno='{$x}'";
			if($qr_run=mysql_query($qr) or die(mysql_error()))
			{
				if($qr1_run=mysql_query($qr1) or die(mysql_error()))
				{
				$row=mysql_fetch_array($qr1_run);
				mail($row[0],'NIT,Rourkela','Congratulations,Your account have been verified by head of department.You can now login and acess features of eGuideAllocation System.');
				echo 'Verified pila';
				header("Location:head.php");
			}
			}
		}
	}
}
else
{
	require_once 'connect.php';
	if(isset($_POST['profs']))
	{
		$arr=$_POST['profs'];
		foreach ($arr as $x)
		{
			$qr="delete from auth_prof where id='{$x}'";
			$qr1="delete from from professor where pid='{$x}'";
			mysql_query($qr) or die (mysql_error());
			mysql_query($qr1) or die (mysql_error());
		}
		//header("location:head.php");
	}
	if(isset($_POST['studs']))
	{
		$arr=$_POST['studs'];
		foreach ($arr as $x)
		{
			$qr="delete from auth_stud where id='{$x}'";
			$qr1="delete  from student where rollno='{$x}' ";
			mysql_query($qr) or die (mysql_error());
			mysql_query($qr1) or die (mysql_error());
		}
		//header("location:head.php");
	}
}
?>
