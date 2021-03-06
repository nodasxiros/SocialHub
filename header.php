<?php
session_start();

echo "<!DOCTYPE html>\n
      <html>
      <head>";
require_once 'functions.php';
$userstr = ' (Guest)';
if (isset($_SESSION['user']))
{
  $user = $_SESSION['user'];
  $loggedin = TRUE;
  $userstr = "($user)";
}
else $loggedin = FALSE;

echo "<title>$appname$userstr</title><link rel='stylesheet'" .
     "href='css/bootstrap-theme.min.css'>" .
      "<link rel='stylesheet' href='css/bootstrap.min.css'>" . 
      "</head><body>" .
      "<div class='appname'>$appname$userstr</div>" .
      "<script> src='js/bootstrap.min.js'></script>";
if  ($loggedin)
	{
    echo "<nav class='navbar navbar-default navbar-fixed-top' role='navigation'>".
         "<ul class='nav navbar-nav'>".
         "<li><a href='members.php?view=$user'>Home</a></li>" .
         "<li><a href='members.php'>Members</a></li>"         .
         "<li><a href='friends.php'>Friends</a></li>"         .
         "<li><a href='messages.php'>Messages</a></li>"       .
         "<li><a href='profile.php'>Edit Profile</a></li>"    .
         "<li><a href='logout.php'>Log out</a></li></ul></nav>";
  }
  else
  {
    echo ("<nav class='navbar navbar-default navbar-fixed-top' role='navigation'>".
    	  "<div class='collapse navbar-collapse' id='navbarCollapse'>" .
    	  "<ul class='nav navbar-nav'>" .
          "<li><a href='index.php'>Home</a></li>"                .
          "<li><a href='signup.php'>Sign up</a></li>"            .
          "<li><a href='login.php'>Log in</a></li></ul></div></nav>"     .
          "<span class='info'>&#8658; You must be logged in to " .
          "view this page.</span><br><br>");
  }
?>
