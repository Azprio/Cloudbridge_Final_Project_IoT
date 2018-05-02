<?php

require './classes/super_admin.php';
$ob_sup_admin = new Super_admin();

$query_result=$ob_sup_admin->gpio_17_status();
$sw_info=mysqli_fetch_assoc($query_result);
$x=23;

if($sw_info['switch_status']==1){
$ob_sup_admin->update_switch_off_status();
system("gpio -g mode $x out");
system("gpio -g write $x 0");
}  else {
    $ob_sup_admin->update_switch_on_status();
    system("gpio -g mode $x out");
    system("gpio -g write $x 1");
}
?>
