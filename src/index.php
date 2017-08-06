<?php
	$str='';
	$a=0;
	if(isset($_GET['val']))
	{
		if($_GET['val']==1)
		$str='ID Already Exist';
		else if($_GET['val']==2)
		echo '<script>alert("Data Will be verifed by the HOD and a confirmation mail will be sent to you")</script>';
	}
?>
<!DOCTYPE HTML>
<HTML>
	<HEAD>
		<TITLE>REGISTER</TITLE>
		<link href="index.css" rel="stylesheet" type="text/css" />
		<script>
			function fan()
			{
				var x=1;
				if(document.getElementById('id').value==null || document.getElementById('id').value=="")
				{
					alert('Please fill the id');
					return false;
				}
				if(document.getElementById('first').value==null || document.getElementById('first').value=="")
				{
					alert('Please fill the firstname');
					return false;
				}
				if(document.getElementById('email').value==null || document.getElementById('email').value=="")
				{
					alert('Please fill the email');
					return false;
				}
				if(document.getElementById('pass').value==null || document.getElementById('pass').value=="")
				{
					alert('Please fill the password');
					return false;
				}
				if(document.getElementById('cpass').value==null || document.getElementById('cpass').value=="")
				{
					alert('Please fill the confirm');
					return false;
				}
				if(document.getElementById('pass').value!=document.getElementById('cpass').value)
				{
					alert("Password doesn\'t match !!");
					return false;
				}
				if(document.getElementById('prof').checked || document.getElementById('stud').checked)
				{
					x+=1;
				}
				else
				{
					alert('Please check a status');
					return false;
				}
			}
		</script>
	</HEAD>
	<BODY bgcolor=green>
		<h1 style="font-family: 'Franklin Gothic Medium', 'Franklin Gothic', 'ITC Franklin Gothic', Arial, sans-serif;">NATIONAL INSTITUTE OF TECHNOLOGY, ROURKELA</h1>
		<DIV ID="center">
			<div id="top">REGISTER<hr></div>
			<div id="down">
			<div id="left">
				<form action="regmein.php" method="post" name="frm" onsubmit=" return fan(); ">
				<table>
					<tr>
						<td style="text-align:right;">ID/ROLL NO</td>
						<td><input type="text" placeholder="id or roll" name="id" id="id"  /><?php echo $str; ?></td>
					</tr>
					<tr>
						<td style="text-align:right;">FIRST NAME</td>
						<td><input type="text" placeholder="FIRST NAME" name="first" id="first"  /></td>
					</tr>
					<tr>
						<td style="text-align:right;">MIDDLE NAME</td>
						<td><input type="text" placeholder="MID NAME" name="middle" /></td>
					</tr>
					<tr>
						<td style="text-align:right;">LAST NAME</td>
						<td><input type="text" placeholder="LAST NAME" name="last" /></td>
					</tr>
					<tr>
						<td style="text-align:right;">EMAIL</td>
						<td><input type="email" placeholder="EMAIL" name="email" id="email"/></td>
					</tr>
					<tr>
						<td style="text-align:right;">PASSWORD</td>
						<td><input type="password" placeholder="PASSWORD" name="pass" id="pass" /></td>
					</tr>
					<tr>
						<td style="text-align:right;">CONFIRM</td>
						<td><input type="passwOrd" placeholder="CONFIRM" name="cpass" id="cpass" /></td>
					</tr>
					<tr>
						<td style="text-align:right;">TYPE</td>
						<td>
							<input type="radio" value="prof" name="stat" id="prof"/>Professor
						</td>
					</tr>
					<tr>
						<td style="text-align:right;"></td>
						<td>
							<input type="radio" value="stud" name="stat" id="stud" />Student
						</td>
					</tr>
					<tr>
						<td style="text-align:right;"><input id="def" type="reset" value="RESET" id="submit"></td>
						<td><input id="abc" type="submit" value="REGISTER" id="submit"/> </td>
					</tr>
					<tr>
						<th colspan="2" ><a href="login.php">Already registered?</a></th>
					</tr>
				</table>
				</form>
			</div>
			<div id="right"></div>
			</div>
		</DIV>
	</BODY>
	<?php if($a==1) echo '<script>alert("please fill the Id,First Name,email,Password")</script>';?>
</HTML>
