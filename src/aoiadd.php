<?php
session_start();
include_once 'connect.php';
include_once 'function.php';
checkp();
$id=$_SESSION['idp'];
$aoi=$_POST['aoi'];
$i=0;
foreach($aoi as $a)
{
	if(empty($a))
	break;
	$q1="select * from profaoi where pid='{$id}' and area='{$a}'";
	if(mysql_num_rows(mysql_query($q1))!=0)
	{
		echo '<p style="Color:#123fde;text-align:center; margin-top:50px; font-size:40px;">';
		echo "You can't insert a subject more than once<br/>";
		echo "<b>{$a}</b> is already inserted ";echo "<br/>";
		echo "<script>alert('Subject Already Inserted Use Update Menu')</script>";
		echo "<a href=\"{$_SERVER['HTTP_REFERER']}\" />Click Here To Go Back</a>";
		exit;
		echo '</p>';
	}
	else
	{
	$query="insert into profaoi(pid,area) values('{$id}','{$a}')";
	$run=mysql_query($query) or die(mysql_error());
	}
	$i+=1;
}
header("Location:phome.php");

?>
