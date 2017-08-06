<?php

session_start();
require 'connect.php';
if(isset($_SESSION['id']))
{
	header("Location:head.php");
}
else if(isset($_SESSION['idp']))
{
	header("Location:phome.php");
}
else if(isset($_SESSION['ids']))
{
	header("Location:shome.php");
}


$q1;
$a=0;
$err=null;

if(isset($_POST['id']) && isset($_POST['password']))
  {
	  $who=$_POST['who'];
	  $id=$_POST['id'];
	  $password=$_POST['password'];
	   if(!empty($_POST['id']) && !empty($_POST['password']))
	   {
		if($who=='hod')
				{
					$q1="select id from auth_hod where id='".mysql_real_escape_string($id)."' and
														password='".mysql_real_escape_string($password)."'";
					if($q1_run=mysql_query($q1))
						{
							$q1_num_row=mysql_num_rows($q1_run);
							if($q1_num_row==1)
							{
								$_SESSION['name']=$id;
								$_SESSION['id']=$id;
								header('location:head.php');
							}
							else
								$err="invalid username or password";
						}
				}
		else if($who=='student')
				{
					$q1="select id from auth_stud where id='".mysql_real_escape_string($id)."' and
														password='".mysql_real_escape_string($password)."' 
														and auth!=0";
					if($q1_run=mysql_query($q1))
					{
						$q1_num_row=mysql_num_rows($q1_run);
						if($q1_num_row==1)
						{
							
							$q2="select firstname,lastname from student where rollno='{$id}'";
							$q2_run=mysql_query($q2) or die(mysql_error());
							$user=mysql_fetch_assoc($q2_run);
							$name=$user[firstname].' '.$user[lastname];
							$_SESSION['name']=$name;
							$_SESSION['ids']=$id;
							header('location:shome.php');
						}
						else
							$err="invalid username or password";
					}
				}
		else if($who=='professor')
				{
					$q1="select id from auth_prof where id='".mysql_real_escape_string($id)."' and
														password='".mysql_real_escape_string($password)."' 
														and auth!=0";
					if($q1_run=mysql_query($q1))
					{
						$q1_num_row=mysql_num_rows($q1_run);
						if($q1_num_row==1)
						{
							$q2="select firstname,lastname from professor where pid='{$id}'";
							$q2_run=mysql_query($q2) or die(mysql_error());
							$user=mysql_fetch_assoc($q2_run);
							$name=$user[firstname].' '.$user[lastname];
							$_SESSION['name']=$name;	
							$_SESSION['idp']=$id;
							header('location:prhome.php');
						}
						else
							$err="invalid username or password";
					}	
				}
	    }
	    
  }
?>

<html>
	<head>
		<title>Welcome to NITRKL</title>
		<link rel="stylesheet" type="text/css" href="login.css"/>
		<script>
			function fun()
			{
				if(document.getElementById('userid').value==null || document.getElementById('userid').value=="")
				 {
					 alert('Fill the userid');
					 return false;
				 }
				 if(document.getElementById('passwrd').value==null || document.getElementById('passwrd').value=="")
				 {
					 alert('Fill the password');
					 return false;
				 }
			}
		</script>
	</head>
	
	<body>
		<div id="outer">
			
			<div id="inner">
				<form action="login.php" method="POST" onsubmit="return fun()">
					<table>
						<tr>
							<th colspan="2" style="height:75px;">
								<h1>NIT Rourkela</h1>
							</th>
						</tr>
						<tr>
							<td id="username">
								<strong>Username</strong></td>
							<td ><input type="text" name="id" placeholder=" Username"  id="userid"/>
							</td>
						</tr>
						<tr>
							<td id="password">
								<strong>Password</strong></td>
							<td><input type="password" name="password" placeholder=" Password" id="passwrd"/>			
							</td>
						</tr>
						<tr>
							<th colspan="2">
							<select name="who" style="font-family:courier;">
								<option value="student">Student</option>
								<option value="professor">Professor</option>
								<option value="hod">Hod</option>
							</select>
							</th>
						</tr>
						<tr>
							<td id="submit">
								<a href="index.php" style="color:white;">Register</a>
							</td>
							<th>
								<input type="submit" value="Sign in" 
											id="submit"/>
							</th>
						</tr>
						<tr>
							<th colspan="2">
								<h3><a href=""style="color:black;">forgot password ?</a></h3>
								<h3><?php echo $err; ?></h3>
							</th>
						</tr>
					</table>
				</form>
			</div>
			
		</div>
		
	</body>
<?php if($a==1)echo '<script>alert("please fill both USERNAME and PASSWORD !!")</script>'; ?>

</html>
