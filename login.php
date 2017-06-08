<?php
require_once 'header.php';
$error = $user = $pass = "";
if (isset($_POST['user']))
{
	$user = sanitizeString($_POST['user']);
	$pass = sanitizeString($_POST['pass']);
	if ($user == "" || $pass == "")
		$error = "Not all fields were entered";
	else
	{
		$result = queryMySQL("SELECT user, pass FROM members WHERE user = '$user' AND pass = '$pass'");
		if ($result->num_rows == 0)
		{
			$error = "<span class='error'> Username/Pass are wrong.</span>";
		}
		else 
		{
			$_SESSION['user'] = $user;
			$_SESSION['pass'] = $pass;
			die("You are now logged in. Please <a href='index.php'>" .
            "click here</a> to continue.<br><br>");
		}
	}
}
?>
<div class="col-xs-6 col-sm-3">Please enter your details to Login</div>
<div class="ccontainer">
	
      <form class="form-signin" method="post" action="login.php">
        <h2 class="form-signup-heading">Login</h2>
        <input name="user" type="text" class="form-control" placeholder="Username" required="">
        <input name="pass" type="password" class="form-control" placeholder="Password" required="">
        <button name="Submit"   id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      </form>
</div>
<?php
require_once 'footer.php';
?>