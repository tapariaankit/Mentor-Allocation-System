<?php
	require_once 'connect.php';
	$id=$_POST['id'];
	$first=$_POST['first'];
	$last=$_POST['last'];
	$mid=$_POST['middle'];
	$email=$_POST['email'];
	$pwd=$_POST['pass'];
	$cpwd=$_POST['cpass'];
	$stat=$_POST['stat'];
	#echo $id.$first.$mid.$last.$email.$pwd.$cpwd.$stat;
	if($stat=="stud")
	{
		$qr1="select * from `student` where `rollno`='{$id}'";
		$qr1_r=mysql_query($qr1) or die(mysql_error());
		if(mysql_num_rows($qr1_r)==0)
		{
			$qr2="insert into student values('{$id}','{$first}','{$mid}','{$last}','{$email}')";
			$qr2_r=mysql_query($qr2) or die (mysql_error());
			if($qr2_r)
			{
				$qr3="insert into auth_stud values(0,'{$id}','{$pwd}')";
				$qr3_r=mysql_query($qr3) or die(mysql_error());
				header("Location:index.php?val=2");
			}
		}
		else
		{
			echo 'username exist';
			header("Location:index.php?val=1");
		}
	}
	else if($stat=="prof")
	{
		$qr1="select * from professor where pid='{$id}'";
		$qr1_r=mysql_query($qr1) or die(mysql_error());
		if(mysql_num_rows($qr1_r)==0)
		{
			$qr2="insert into professor values('{$id}','{$first}','{$mid}','{$last}','{$email}')";
			$qr2_r=mysql_query($qr2) or die (mysql_error());
			if($qr2_r)
			{
				$qr3="insert into auth_prof values(0,'{$id}','{$pwd}')";
				$qr3_r=mysql_query($qr3) or die(mysql_error());
				header("Location:index.php?val=2");
			}
		}
		else
		{
			echo 'username exist';
			header("Location:index.php?val=1");
		}
	}
?>
