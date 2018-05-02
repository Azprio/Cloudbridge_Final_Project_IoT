<?php
require './classes/application.php';
$obj_app = new Application();

require './classes/super_admin.php';
$ob_sup_admin = new Super_admin();

require './classes/external.php';
$ob_ext = new External();



for ($gpio=24;$gpio<=25;$gpio++){
    
    if($gpio==24|25){
            
            $gp=$ob_sup_admin->gpio_room_a_switch_input_status($gpio);
            $a_sw_info=mysqli_fetch_assoc($gp);

            $gp_t=$ob_ext->gpio_temp_status($gpio);
            $a_t=mysqli_fetch_assoc($gp_t);
            
           if($a_sw_info['switch_status']!=$a_t['gpio_status']){  
            if($a_t['gpio_status']==1){
            $ob_sup_admin->update_room_a_switch_on_status($gpio);
            system("gpio -g mode $gpio out");
            system("gpio -g write $gpio 0");
            
        }  else {
            $ob_sup_admin->update_room_a_switch_off_status($gpio);
            system("gpio -g mode $gpio out");
            system("gpio -g write $gpio 1");
}
        } 
} }  


for ($gpio=22;$gpio<=23;$gpio++){
    
    if($gpio==22|23){
            
            $gp=$ob_sup_admin->gpio_room_b_switch_input_status($gpio);
            $a_sw_info=mysqli_fetch_assoc($gp);

            $gp_t=$ob_ext->gpio_temp_status($gpio);
            $a_t=mysqli_fetch_assoc($gp_t);
            
           if($a_sw_info['switch_status']!=$a_t['gpio_status']){  
            if($a_t['gpio_status']==1){
            $ob_sup_admin->update_room_b_switch_on_status($gpio);
            system("gpio -g mode $gpio out");
            system("gpio -g write $gpio 0");
            
        }  else {
            $ob_sup_admin->update_room_b_switch_off_status($gpio);
            system("gpio -g mode $gpio out");
            system("gpio -g write $gpio 1");
}
        } 
    }
     
}


$gpio1=24;
$gpio2=25;
$gpio3=22;
$gpio4=23;

$rooma1=$ob_sup_admin->gpio_room_a_switch_input_status($gpio1);
$rooma1_info=  mysqli_fetch_assoc($rooma1);
$switch_description_a1=$rooma1_info['switch_description'];
$switch_status_a1=$rooma1_info['switch_status'];

$rooma2=$ob_sup_admin->gpio_room_a_switch_input_status($gpio2);
$rooma2_info=  mysqli_fetch_assoc($rooma2);
$switch_description_a2=$rooma2_info['switch_description'];
$switch_status_a2=$rooma2_info['switch_status'];


$roomb3=$ob_sup_admin->gpio_room_b_switch_input_status($gpio3);
$roomb3_info=  mysqli_fetch_assoc($roomb3);
$switch_description_b3=$roomb3_info['switch_description'];
$switch_status_b3=$roomb3_info['switch_status'];

$roomb4=$ob_sup_admin->gpio_room_b_switch_input_status($gpio4);
$roomb4_info=  mysqli_fetch_assoc($roomb4);
$switch_description_b4=$roomb4_info['switch_description'];
$switch_status_b4=$roomb4_info['switch_status'];

$sense=$obj_app->select_all_sensor();
$sensor=mysqli_fetch_assoc($sense);
$hum=$sensor['hum'];
$temp=$sensor['temp'];
$fern=$sensor['fern'];
$lpg=$sensor['lpg'];
$smk=$sensor['smk'];

$ob_ext->update_room_a1($gpio1,$switch_description_a1,$switch_status_a1);
$ob_ext->update_room_a2($gpio2,$switch_description_a2,$switch_status_a2);
$ob_ext->update_room_b3($gpio3,$switch_description_b3,$switch_status_b3);
$ob_ext->update_room_b4($gpio4,$switch_description_b4,$switch_status_b4);
$ob_ext->update_sensors($hum,$temp,$fern,$lpg,$smk);