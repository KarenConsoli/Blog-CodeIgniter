<?php

class Login_Model extends CI_Model {

    //put your code here
    public function save_user_info($data) {
        $this->db->insert('tbl_user', $data);
        $user_id=$this->db->insert_id();
        return $user_id;
    }

    public function select_user_by_email_address($email_address) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email_address', $email_address);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
 public function reset_password($user_id, $pass){
     $this->db->set('password', md5($pass));
        $this->db->where('user_id',$user_id);
        $this->db->update('tbl_user');
 }

    public function check_login_info($email_address, $password) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email_address', $email_address);
        $this->db->where('password', md5($password));
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }

   
}

?>