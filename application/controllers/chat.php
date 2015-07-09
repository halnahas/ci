<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends CI_Controller {
	public function index()
	{
		$this->load->view('view-chat');
	}

	public function chkbox()
	{
		$this->load->view('chkbox');

	}

	public function show($userId = 0)
	{
		$userId = (int)$userId;
		echo "This is show users!<br>";
		if ($userId > 0) {
			echo "This is show user: $userId!<br>";
		}

		$this->load->model("hello_model");
		$profile = $this->hello_model->getProfile("Huzaifa");
		
		$data = array('name'=>$profile['fullName']);
		$this->load->view('header',$data);
		
	}

	function post_action()
	{   
	    if($_POST['textbox'] == "")
	    {
	        $message = "You can't send empty text";
	    }
	    else
	    {
	        $message = $_POST['textbox'];
	    }
	    echo $message;
	}


	function set_default_card()
	{
		$card_id = $this->input->post('card_id');
		//delete $card_id and refresh page
		echo $card_id;
	}

	function _get_customer_id()
	{
		/*
		$this->load->model("chat_model");
		$customer_id = $this->chat_model->get_customer_id(7);
		return $customer_id;
		*/
		return "cus_id";
	}

	function make_payment()
	{
		require_once('vendor/autoload.php');		
		\Stripe\Stripe::setApiKey("94Cz8NDuCdZtUnATA4vOurQKVlPeMOfC");

		$this->load->model("chat_model");
		$user_id = 10;
		$customer_id = $this->chat_model->get_customer_id($user_id);
		if ($customer_id=="")
		{
			//create a billing_id
			$customer = \Stripe\Customer::create(array(
     		 //'email' => 'customer@example.com',
      		 //'card'  => $token
  			));

  			// save customer_id to database
  			$customer_id = $customer->id;
  			$this->chat_model->set_customer_id($user_id, $customer_id);
		}
		echo $customer_id;
		echo "<br>";
		$cu = \Stripe\Customer::retrieve($customer_id);

		//$card = $cu->sources->retrieve("card_5oqYNz6c0at0KW");
		//$card_array = $card->__toArray(true); 
		//var_dump($card_array['id']);
		$card_array = $cu->sources->create(array("card" => "tok_5ornYY0J8dxIZ2"))->__toArray(true);
		//var_dump($card_array);
		echo "id: ".$card_array['id'].'<br>';
		echo "name: ".$card_array['name'].'<br>';
		echo "last4: ".$card_array['last4'].'<br>';
		//$this->chat_model->set_card_details($cu);
		//print_r($card);
		//$cu->default_source = "card_5oqQtsFPKsRwIs";
		//$cu->save();
		//$cu->sources->retrieve("card_5oqGdSx9zBpbfy")->delete();
		//$cu->sources->create(array("card" => "tok_5oqQ32FigtG0L2"));
		//$cu = \Stripe\Customer::retrieve($customer_id);
		//echo $cu;

		/*
		\Stripe\Customer::create(array(
		  "description" => "Customer for test@example.com",
		  //"source" => "tok_15d0zZ2eZvKYlo2CXe6dVwvb" // obtained with Stripe.js
		));
		
		\Stripe\Charge::create(array (
		        'amount' => 2000, // this is in cents: $20
		        'currency' => 'usd',
		        'card' => "tok_15d0zZ2eZvKYlo2CXe6dVwvb",//$_POST['stripeToken'],
		        'description' => 'Describe your product'
		    ));
		*/
		//try {
			/*	
			\Stripe\Charge::create(array(
			  "amount" => 400,
			  "currency" => "usd",
			  "source" => "tok_5omObY4H8mKuLM", // obtained with Stripe.js
			  "description" => "Charge for test@example.com"
			));
			*/


			/*
		    \Stripe\Charge::create(array (
		        'amount' => 2000, // this is in cents: $20
		        'currency' => 'usd',
		        'card' => $_POST['stripeToken'],
		        'description' => 'Describe your product'
		    ));*
		    //echo "Charge succeeded";
		} /* catch (Stripe_CardError $e) {
		    // Declined. Don't process their purchase.
		    // Go back, and tell the user to try a new card
		    //echo "charge was not successful";
		}
		*/
		
	}

	function is_first_billing_method()
	{
		$this->load->model("chat_model");
		$new_billing = $this->chat_model->is_first_billing_method('7');
		if ($new_billing)
			echo "A new billing";
		else
			echo "Not a new billing";
	}
}
?>