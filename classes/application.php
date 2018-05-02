<?php

class Application {

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

    
   
    
    public function select_all_room_a_info(){
      $sql="SELECT * From tbl_room_a";
        if (mysqli_query($this->db_connect, $sql)){
        $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }  
    }
    
   public function select_all_room_b_info(){
      $sql="SELECT * From tbl_room_b";
        if (mysqli_query($this->db_connect, $sql)){
        $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }  
    }
    
    public function select_all_contact_info(){
      $sql="SELECT * From tbl_contact";
        if (mysqli_query($this->db_connect, $sql)){
        $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }  
    }
    
    public function select_all_switch_on_room_a_info(){
      $sql="SELECT * From tbl_room_a WHERE switch_status='1'";
        if (mysqli_query($this->db_connect, $sql)){
        $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }  
    }
    
    public function select_all_switch_on_room_b_info(){
      $sql="SELECT * From tbl_room_b WHERE switch_status='1'";
        if (mysqli_query($this->db_connect, $sql)){
        $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }  
    }
    
    
    public function select_all_sensor(){
      $sql="SELECT * From tbl_temp_hum WHERE id='1'";
        if (mysqli_query($this->db_connect, $sql)){
        $query_result = mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->db_connect));
        }  
    }
    
    
    
    
        }
