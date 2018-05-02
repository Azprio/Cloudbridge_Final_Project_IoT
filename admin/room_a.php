<?php
$url1=$_SERVER['REQUEST_URL'];
header("Refresh: 5; URL=$url1");
?>
<?php

$pages='room_a';
include './admin_master.php';

