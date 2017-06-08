<?php
require_once 'header.php';
$error = $user = $pass = "";
if (isset($_SESSION['user'])) destroySession();

if (isset($_POST['user']))
{
	$user = sanitizeString($_POST['user']);
	$pass = sanitizeString($_POST['pass']);

	if ($user == "" || $pass == "")
		$error = "Not all fields were entered";
	else
	{
		$result = queryMysql("SELECT * FROM members WHERE user='$user'");
		if ($result->num_rows)
			$error = "THere is something wrong with the username";
		else
		{
			queryMysql("INSERT INTO members VALUES ('$user' , '$pass')");
			die ("<p>Account created</p>");
		}
	}
}
?>
<div class="col-xs-6 col-sm-3">Please enter your details to sign up</div>
<div class="ccontainer">
	<!-- Sign up form for users with required filed for validation -->
      <form class="form-signin" method="post" action="signup.php">
        <h2 class="form-signup-heading">Sign Up</h2>
        <input name="user" type="text" class="form-control" placeholder="Username" required="">
        <input name="pass" type="password" class="form-control" placeholder="Password" required="">
        <button name="Submit"   id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
      </form>
</div>