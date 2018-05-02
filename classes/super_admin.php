<?php

class Super_admin {

    private $db_connect;

    public function __construct() {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = 'raspberry';
        $db_name = 'cloud_bridge';
        $this->db_connect = mysqli_connect($host_name, $user_name, $password, $db_name);
        if (!$this->db_connect) {
            die('Connection Fail' . mysqli_error($this->db_connect));
        }
    }

    public function logout() {
        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_id']);

        header('Location: index.php');
    }

   


    public function add_room_a_info($data) {
        $sql = "INSERT INTO tbl_room_a (switch_description,gpio,switch_status) VALUES ('$data[switch_description]','$data[gpio]','$data[switch_status]')";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "Educational Info Added Successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function switch_off_room_a_by_id($switch_id,$gpio) {
        $sql = "UPDATE tbl_room_a SET switch_status=0 WHERE switch_id='$switch_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            header('Location: room_a.php');
            
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function switch_on_room_a_by_id($switch_id,$gpio) {
        $sql = "UPDATE tbl_room_a SET switch_status=1 WHERE switch_id='$switch_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            header('Location: room_a.php');
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function delete_room_a_info($switch_id) {
        $sql = "DELETE FROM tbl_room_a WHERE switch_id='$switch_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = 'Selected Educational Info Has been Deleted Successfully.';
            return $message;
        } else {
            die('Query Problem') . mysqli_error($this->db_connect, $sql);
        }
    }

    public function select_all_room_a_info_by_id($switch_id) {
        $sql = "SELECT * From tbl_room_a WHERE switch_id=$switch_id";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function update_all_room_a_info_by_id($switch_id) {
        $sql = "UPDATE tbl_room_a SET switch_description='$_POST[switch_description]',gpio='$_POST[gpio]' WHERE switch_id='$switch_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            header('Location: room_a.php');
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    //room_b starts
    public function add_room_b_info($data) {
        $sql = "INSERT INTO tbl_room_b (switch_description,gpio,switch_status) VALUES ('$data[switch_description]','$data[gpio]','$data[switch_status]')";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = "room_b Info Added Successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function switch_off_room_b_by_id($switch_id,$gpio) {
        $sql = "UPDATE tbl_room_b SET switch_status=0 WHERE switch_id='$switch_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            header('Location: room_b.php');
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function switch_on_room_b_by_id($switch_id,$gpio) {
        $sql = "UPDATE tbl_room_b SET switch_status=1 WHERE switch_id='$switch_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            header('Location: room_b.php');
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function delete_room_b_info($switch_id) {
        $sql = "DELETE FROM tbl_room_b WHERE switch_id='$switch_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = 'Selected room_b Info Has been Deleted Successfully.';
            return $message;
        } else {
            die('Query Problem') . mysqli_error($this->db_connect, $sql);
        }
    }

    public function select_all_room_b_info_by_id($switch_id) {
        $sql = "SELECT * From tbl_room_b WHERE switch_id=$switch_id";
        if (mysqli_query($this->db_connect, $sql)) {
            $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function update_all_room_b_info_by_id($switch_id) {
        $sql = "UPDATE tbl_room_b SET switch_description='$_POST[switch_description]',gpio='$_POST[gpio]'WHERE switch_id='$switch_id'";
        if (mysqli_query($this->db_connect, $sql)) {
            header('Location: room_b.php');
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function update_contact_info_by_id() {
        $sql = "UPDATE tbl_contact SET father_name='$_POST[father_name]',mother_name='$_POST[mother_name]',present_address='$_POST[present_address]',permanent_address='$_POST[permanent_address]',email_address='$_POST[email_address]',phone_number='$_POST[phone_number]',website='$_POST[website]',skype='$_POST[skype]',facebook='$_POST[facebook]' WHERE contact_id='1'";
        if (mysqli_query($this->db_connect, $sql)) {
            $message = 'Contact Info Updated Successfully.';
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    
    public function gpio_room_a_switch_input_status($gpio){
        $sql="SELECT * From tbl_room_a WHERE gpio='$gpio'";
        if (mysqli_query($this->db_connect, $sql)){
        $query_result = mysqli_query($this->db_connect, $sql);
        return $query_result;
        }else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function update_room_a_switch_on_status($gpio) {
        $sqlup = "UPDATE tbl_room_a SET switch_status=1 WHERE gpio='$gpio'";
        if(mysqli_query($this->db_connect, $sqlup)){
            return 0;
        }  else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function update_room_a_switch_off_status($gpio) {
        $sqlup = "UPDATE tbl_room_a SET switch_status=0 WHERE gpio='$gpio'";
        if(mysqli_query($this->db_connect, $sqlup)){
            return 0;
        }  else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

public function gpio_room_b_switch_input_status($gpio){
        $sql="SELECT * From tbl_room_b WHERE gpio='$gpio'";
        if (mysqli_query($this->db_connect, $sql)){
        $query_result = mysqli_query($this->db_connect, $sql);
        return $query_result;
        }else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }

    public function update_room_b_switch_on_status($gpio) {
        $sqlup = "UPDATE tbl_room_b SET switch_status=1 WHERE gpio='$gpio'";
        if(mysqli_query($this->db_connect, $sqlup)){
            return 0;
        }  else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
    public function update_room_b_switch_off_status($gpio) {
        $sqlup = "UPDATE tbl_room_b SET switch_status=0 WHERE gpio='$gpio'";
        if(mysqli_query($this->db_connect, $sqlup)){
            return 0;
        }  else {
            die('Query problem' . mysqli_error($this->db_connect));
        }
    }
}

?>
