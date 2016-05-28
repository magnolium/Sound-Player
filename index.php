<html>
<head>
<meta name="viewport" content="width=device-width" />
<title>Sound Controller</title>
</head>
	<body bgcolor="#E6E6FA">
	<h1>Sound Controller</h1>
	
	<h4>Random Sound Looper/Kill All Sound</h4>
	<form method="get">
		<input type="submit" value="ON" name="on">
		<input type="submit" value="OFF" name="off">
	</form>
	<hr>
	<?php

	$files = glob("/home/pi/Desktop/soundplayer/sounds/*.mp3");
	foreach($files as $file)
	{
		$filename = basename(substr($file, 36), '.mp3'); ?>

		<br>
		<form method="get">
			<input type="submit" value="<?php echo $filename; ?>" name="<?php echo $filename; ?>">
		</form>
		<hr>
		<?php
	}

	if(isset($_GET['on']))
	{
		exec("sudo python /home/pi/Desktop/soundplayer/soundplayer.py");
	}
	else if(isset($_GET['off']))
	{
		exec("sudo killall -e python");
	}

	foreach($files as $file)
	{
		$filename = substr($file, 36);
		if(isset($_GET[basename($filename, '.mp3')]))
		{
			exec("sudo python /home/pi/Desktop/soundplayer/soundplayer.py " . $filename);
		}
	}

	?>
	</body>
</html>