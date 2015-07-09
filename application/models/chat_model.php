<?php
	class Chat_model extends CI_Model 
	{	
		function __construct()
		{
			parent::__construct();
		}

		function get_customer_id($uid)
		{
			$qry_str = "SELECT billing_customer_id FROM users WHERE user_id = ? ";
			$result = $this->db->query($qry_str, array($uid));

			if ($result->num_rows()==1)
			{
				$billing_customer_id = $result->row()->billing_customer_id;
				return $billing_customer_id;
			}
		}

		function set_customer_id($uid, $customer_id)
		{
			$qry_str = "UPDATE users SET billing_customer_id = ?  WHERE user_id = ? ";
			$result = $this->db->query($qry_str, array($customer_id, $uid));
		}

		function set_card_details($details)
		{
			$qry_str = "INSERT INTO card_details VALUES (NULL, ?)";
			$result = $this->db->query($qry_str, array($details));
		}

		function is_first_billing_method($uid)
		{
			$qry_str = "SELECT billing_customer_id FROM users WHERE user_id = ? ";
			$result = $this->db->query($qry_str, array($uid));

			if ($result->num_rows()==1)
			{
				$billing_customer_id = $result->row()->billing_customer_id;
				if (strlen($billing_customer_id) > 0 )
					return false;
				else
					return true;
			}
			else
				return true;				
		}
	}
?>