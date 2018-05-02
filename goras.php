<!DOCTYPE HTML>
<HTML>
<HEAD>
<meta charset="UTF-8">
<title>Project Cloud Bridge</title>
</HEAD>

<?php
if(isset($_POST['lighton']))
{
//escapeshellcmd('/home/pi/python_files/light41.py');
//exec('/usr/bin/python light41.py /home/pi/python_files');

system("gpio -g mode 4 out");
system("gpio -g write 4 1"); 
}
if(isset($_POST['lightoff']))
{
system("gpio -g mode 4 out");
system("gpio -g write 4 0");

}

?>

<body>

<div align="center">

<form method="post">
<h3>LED in GPIO 4 ON:</h3>
 <button type="submit" class="btn" name="lighton">Light On</button></br>

<h3>LED in GPIO 4 OFF:</h3>

<button type="submit" class="btn" name="lightoff">Light Off</button> 
</form>
</div>
</body>
</html>

