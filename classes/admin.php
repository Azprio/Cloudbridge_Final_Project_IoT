<?php
class Admin {
    private $db_connect;
    public function __construct() {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = 'raspberry';
        $db_name = 'cloud_bridge';
        $this->db_connect=  mysqli_connect($host_name, $user_name, $password, $db_name);
        if(!$this->db_connect){
            die('Connection Failed'.mysqli_error($this->db_connect));
        }
    }
    
    public function admin_login_check($data){
        $email_address=$data['email_address'];
        $password= md5($data['password']);
        $sql="SELECT*FROM tbl_admin WHERE email_address='$email_address' AND password='$password'";
        if(mysqli_query($this->db_connect, $sql)){
            $query_result=  mysqli_query($this->db_connect, $sql);
            $admin_info=  mysqli_fetch_assoc($query_result);
//            echo '<pre>';
//            print_r($admin_info);
//            exit();
            if($admin_info){
                session_start();
                $_SESSION['admin_name']=$admin_info['admin_name'];
                $_SESSION['admin_id']=$admin_info['admin_id'];
                
                header("Location:admin_master.php");
            }  else {
            $message="Your Email or Password is Wrong";
            return $message;
            }
    }  else {
       die('Query Problem'.mysqli_error($this->db_connect));
    }
    
    }
    
    public function change_admin_password($data){
        if($data['new_password']!=null && $data['old_password']!=null){
        $old_password=md5($data['old_password']);
        $new_password=md5($data['new_password']);
        $admin_id=$_SESSION['admin_id'];
        $sql="UPDATE tbl_admin SET password='$new_password' WHERE admin_id='$admin_id' AND password='$old_password'";
        if(mysqli_query($this->db_connect, $sql)){
            $message="Your Password Updated Successfully";
            return $message;
        }  else {
            $message="Provide Correct old Password";
            return $message;
        }
        }  else {
         $message="New Password And Old Password Field Can not be Empty.";
            return $message;   
        }
    }
}
