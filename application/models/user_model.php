<?php


	class User_model extends CI_Model {
		
		function __construct()
		{
			parent::__construct();
		}

		function check_login($username, $password)
		{
			
			$sha1_password=sha1($password);
			$query_str= "SELECT user_id from users where username = ? and password = ?";
			$result = $this->db->query($query_str, array($username,$sha1_password));
			
			if ($result->num_rows()==1)
				return $result->row()->user_id;
			else
				return false;				
		}  

		function register_user($reg_username, $reg_password, $reg_name, $reg_email)
		{
			$sha1_reg_password = sha1($reg_password);
			$query_str= "INSERT INTO users (username, password, name, email) VALUES (?,?,?,?)";
			$result = $this->db->query($query_str, array($reg_username,$sha1_reg_password,$reg_name,$reg_email));	
		}

		function check_exists_username($reg_username)
		{
			$query_str="SELECT username FROM users WHERE username=?";
			$result=$this->db->query($query_str,$reg_username);
			if ($result->num_rows()> 0)
			{
				//username exists
				return true;				
			}
			else 
			{
				//new username
				return false;
			}
		}

		function check_exists_email($reg_email)
		{
			$query_str="SELECT email FROM users WHERE email=?";
			$result=$this->db->query($query_str,$reg_email);
			if ($result->num_rows()> 0)
			{
				//email exists
				return true;				
			}
			else 
			{
				//new email
				return false;
			}
		}
		
	}

?>
