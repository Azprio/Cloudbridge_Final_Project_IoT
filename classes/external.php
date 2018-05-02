<?php

class External {

    private $db_connect;

    public function __construct() {
        $host_name = 'sql3.freesqldatabase.com';
        $user_name = 'sql3169238';
        $password = 'Fjw2kYQDf9';
        $db_name = 'sql3169238';
        $this->db_connect = mysqli_connect($host_name, $user_name, $password, $db_name);
        if (!$this->db_connect) {
            die('Connection Fail' . mysqli_error($this->db_connect));
        }
    }
    
    
    
    public function gpio_temp_status($gpio){
        $sql="SELECT * From tbl_temporary WHERE gpio='$gpio'";
        if (mysqli_query($this->db_connect, $sql)){
        $query_result = mysqli_query($this->db_connect, $sql);
        return $query_result;
        }else {
            
        }
    }
    
    
    public function update_room_a1($gpio1,$switch_description_a1,$switch_status_a1) {
        $sql = "UPDATE 	tbl_room_a SET switch_description='$switch_description_a1',switch_status='$switch_status_a1' WHERE gpio='$gpio1'";
        if (mysqli_query($this->db_connect, $sql)) {
            return 0;
        } else {
        }
    }
    
    public function update_room_a2($gpio2,$switch_description_a2,$switch_status_a2) {
        $sql = "UPDATE 	tbl_room_a SET switch_description='$switch_description_a2',switch_status='$switch_status_a2' WHERE gpio='$gpio2'";
        if (mysqli_query($this->db_connect, $sql)) {
            return 0;
        } else {
        }
    }
    
    
    
    public function update_room_b3($gpio3,$switch_description_b3,$switch_status_b3) {
        $sql = "UPDATE 	tbl_room_b SET switch_description='$switch_description_b3',switch_status='$switch_status_b3' WHERE gpio='$gpio3'";
        if (mysqli_query($this->db_connect, $sql)) {
            return 0;
        } else {
        }
    }
    
    public function update_room_b4($gpio4,$switch_description_b4,$switch_status_b4) {
        $sql = "UPDATE 	tbl_room_b SET switch_description='$switch_description_b4',switch_status='$switch_status_b4' WHERE gpio='$gpio4'";
        if (mysqli_query($this->db_connect, $sql)) {
            return 0;
        } else {
        }
    }
    
    public function update_sensors($hum,$temp,$fern,$lpg,$smk) {
        $sql = "UPDATE 	tbl_temp_hum SET hum='$hum',temp='$temp',fern='$fern',lpg='$lpg',smk='$smk' WHERE id='1'";
        if (mysqli_query($this->db_connect, $sql)) {
            return 0;
        } else {
        }
    }
    
    
    public function temporary_gpio_on($gpio) {
        $sql = "UPDATE tbl_temporary SET gpio_status=1 WHERE gpio='$gpio'";
        if (mysqli_query($this->db_connect, $sql)) {
            return 0;
        } else {
        }
    }

    public function temporary_gpio_off($gpio) {
        $sql = "UPDATE tbl_temporary SET gpio_status=0 WHERE gpio='$gpio'";
        if (mysqli_query($this->db_connect, $sql)) {
            return 0;
        } else {
        }
    }
    
    
}
