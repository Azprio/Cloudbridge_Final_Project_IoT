<?php

require './classes/super_admin.php';
$ob_sup_admin = new Super_admin();

require './classes/external.php';
$obj_ext = new External();

$gpio=23;
$query_result=$ob_sup_admin->gpio_room_b_switch_input_status($gpio);
$sw_info=mysqli_fetch_assoc($query_result);


if($sw_info['switch_status']==1){
$ob_sup_admin->update_room_b_switch_off_status($gpio);
$obj_ext->temporary_gpio_off($gpio);
system("gpio -g mode $gpio out");
system("gpio -g write $gpio 1");
}  else {
    $ob_sup_admin->update_room_b_switch_on_status($gpio);
     $obj_ext->temporary_gpio_on($gpio);
    system("gpio -g mode $gpio out");
    system("gpio -g write $gpio 0");
}
?>
