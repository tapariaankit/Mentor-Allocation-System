<?php
session_start();
include_once 'connect.php';
	if(isset($_POST['stud']))
	{
		if(!empty($_POST['stud']))
		{
			$count=0;
			$q="select max(cno) from studchoice where sid='{$_SESSION['ids']}'";
			$qr=mysql_query($q) or die(mysql_error());
			if(mysql_num_rows($qr)==0)
			{
				$count=0;
				$count++;
			}
			else {
				$row=mysql_fetch_array($qr);
				$count=$row[0];
				$count++;
			}
			$q1="insert into studchoice values('{$_SESSION['ids']}','{$_SESSION['prof']}','{$_POST['stud']}','{$count}')";
			mysql_query($q1) or die(mysql_error());
			header("location:choice1.php");
		}
	}
?>
