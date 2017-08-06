<?php
function check()
{
	if(!isset($_SESSION['id']))
	{
		if(isset($_SERVER['HTTP_REFERER']))
		{
			echo "<script>alert(\"You are not authorised\")</script>";
			$x="Location:{$_SERVER['HTTP_REFERER']}";
			header($x);
		}
		echo "<script>alert('Please Login First')</script>";
		header("Location:login.php");
	}
}
function checkp()
{
	if(!isset($_SESSION['idp']))
	{
		if(isset($_SERVER['HTTP_REFERER']))
		{
			echo "<script>alert(\"You are not authorised\")</script>";
			header("location:{$_SERVER['HTTP_REFERER']}");
		}
		echo "<script>alert('Please Login First')</script>";
		header("Location:login.php");
	}
}
function checks()
{
	if(!isset($_SESSION['ids']))
	{
		if(isset($_SERVER['HTTP_REFERER']))
		{
			echo "<script>alert(\"You are not authorised\")</script>";
			header("location:{$_SERVER['HTTP_REFERER']}");
		}
		echo "<script>alert('Please Login First')</script>";
		header("Location:login.php");
	}
}
function count1()
{
	$qr1="select count(*) from auth_stud where auth=0";
	$qr2="select count(*) from auth_prof where auth=0";
	$qr1_res=mysql_fetch_array(mysql_query($qr1));
	$qr2_res=mysql_fetch_array(mysql_query($qr2));
	return $qr1_res[0]+$qr2_res[0];
}
function check_gen()
{
	$q="select * from studconfirm";
	$qr=mysql_query($q);
	if(mysql_num_rows($qr)==0)
	{
		return false;
	}
	else
	return true;
}
function find($a,$b)
{
	$q="select nos from profaoi where pid='{$a}' and area='{$b}'";
	$qr=mysql_query($q) or die(mysql_error());
	$row=mysql_fetch_array($qr);
	$count1=$row['nos'];
	$q1="select * from studconfirm where area='{$b}' and pid='{$a}'";
	$q1r=mysql_query($q1) or die(mysql_error());
	$count2=0;
	if(mysql_num_rows($q1r)!=0)
	{
		$count2=mysql_num_rows($q1r) or die(mysql_error());
	}
	else
	{ $count2=0; }
	if($count1-$count2>0)
	return true;
	else
	return false;
}
function ver($a)
{
	$q="select * from studconfirm where sid='{$a}'";
	$qr=mysql_query($q) or die(mysql_error());
	if(mysql_num_rows($qr)>0)
	{
		return false;
	}
	return true;
}
?>
