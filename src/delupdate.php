<?php
	session_start();
	require_once 'function.php';
	require_once 'connect.php';
	checks();	
	if(!ver($_SESSION['ids']))
			{
				echo '<p>You Are Already Alloted a Subject.<br/><a href="sview.php">Click HERE</a> to see your allotement</p>';
				exit;
			}	
	$q1="delete from studchoice where sid='{$_SESSION['ids']}'";
	mysql_query($q1) or die(mysql_error());
	header("location:choice1.php");
?>
