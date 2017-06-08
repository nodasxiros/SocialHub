<?php
require_once 'header.php';
echo "<div class = 'wrap'>
<div class = 'container'>
      <div class='jumbotron'>
      <h1>Welcome to $appname</h1>";
if ($loggedin) echo " <p>$user, you are logged in.</p></div>";
else           echo " <p>please sign up or log in to join in.</p></div>";
?>
</span><br><br>
</div>
</div>
</div>
<?php
require_once 'footer.php';
?>