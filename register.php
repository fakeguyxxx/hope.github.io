<?php
$username	= @$_POST[username];
$pwd		= @$_POST[pwd];
$repeat_pwd	= @$_POST[repeat_pwd];
$name		= @$_POST[name];
$email		= @$_POST['email'];

if(!empty($username)) {
	$db = new mysqli("localhost","root","","test");
	if(mysqli_connect_errno()){
		echo "No kidding, is fail";
		echo mysqli_connect_error();
		exit;
	}
$sql = "INSERT INTO t_user (f_username,f_password,f_name,f_email) VALUES";
$sql .= "('$username','$pwd','$name','$email')";
$query = $db->query($sql);

if(!$query) {
	$db->close();
	echo "can't insert";
	exit;
}
echo "<font size='6' color='red'>insert successful</font><br>\n";
$db->close();
}
?>
<html>
<head>
<title>Register</title>
<meta http-equiv="Content-Type" content="text/html; charset='utf-8'">
</head>
<body>
<?php
if(!empty($username)) {
	echo "You input is:<br>\n";
	echo "Username: 	 <font color='red'>$username<br>\n</font>";
	echo "Password:		 <font color='red'>$pwd<br>\n</font>";
	echo "Repeat_Password:   <font color='red'>$repeat_pwd<br>\n</font>";
	echo "Name:		 <font color='red'>$name<br>\n</font>";
	echo "E-mail:		 <font color='red'>$email<br>\n</font>";
}
?>
<form name="forRegister" action="register.php" method="post">
<table width="330" align="center" border="0" bgcolor="#eeeeee" cellpadding="5">
<tr>
	<td width="40%">Username:</td>
	<td><input name="username" id="username" type="text" /></td>
</tr>
<tr>
	<td>Password:</td>
	<td><input name="pwd" id="pwd" type="password" /></td>
</tr>
<tr>
	<td>Repeat_Password:</td>
	<td><input name="repeat_pwd" id="repeat_pwd" type="password" /></td>
</tr>
<tr>
	<td>Name:</td>
	<td><input name="name" id="name" type="text" /></td>
</tr>
<tr>
	<td>Email</td>
	<td><input name="email" id="email" type="text" /></td>
</tr>
<tr>
	<td align="center" colspan="2">
	<input type="submit" value="submit" />
	<input type="reset" value="Reset" /></td>
</tr>
</table>
</form>
</body>
</html>
