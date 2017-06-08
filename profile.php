<?php
require_once 'header.php';
if (!$loggedin) die();
?>
<div><h3><?php $user ?></h3>
	<?php
	$result = queryMySql("SELECT * FROM profiles WHERE user='$user'");

	if (isset($_POST['text']))
	{
		$text = sanitizeString($_POST['text']);
		$text = preg_replace('/\s\s+/', ' ', $text);
		if ($result->num_rows)
			queryMySql("UPDATE profiles SET text='$text' where user='$user'");
		else queryMySql("INSERT INTO profiles VALUES('$user', '$text')");
	}
	else
	{
		if ($result->num_rows)
		{
			$row  = $result->fetch_array(MYSQLI_ASSOC);
			$text = stripslashes($row['text']);
		}
		else $text = "";
	}

	$text = stripcslashes(preg_replace('/\s\s+/', ' ', $text));

	if (isset($_FILES['image']['name']))
	{
		$saveto = "$user.jpg";
		move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
		$typeok = TRUE;

		switch($_FILES['image']['type'])
		{
			case "image/gif":   $src = imagecreatefromgif($saveto);
			break;
			case "image/jpeg":  $src = imagecreatefromjpeg($saveto);
			break;
			case "image/pjpeg": $src = imagecreatefromjpeg($saveto);
			break;
			default: $typeok = FALSE;
			break;
		}
		
	}
	?>
	<div><?php showProfile($user) ?></div>
	<form method='post' action='profile.php' enctype='multipart/form-data'>
    <h3>Enter or edit your details and/or upload an image</h3>
    <textarea name='text' cols='50' rows='3'><?php echo $text; ?></textarea><br>
    Image: <input type='file' name='image' size='14'>
    <input type='submit' value='Save Profile'>
    </form>
</div>
<?php 
require_once 'footer.php';
?>