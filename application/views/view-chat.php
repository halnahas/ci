<?php 
	$jsFile = base_url().'js/messages.js';
	echo $jsFile."<br>";
	//$this->load->js();
?> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js";></script>
<script src="//js.stripe.com/v2/"></script>

<script>
var base_url = "<?php echo base_url(); ?>";

function process(div_id)
{
	$.ajax
	({
         type: "POST",
         url: base_url + "chat/set_default_card", 
         data: {card_id: div_id},
         dataType: "text",  
         cache:false,
         success: 
              function(data)
              {
                alert(data);  //as a debugging message.
              }
    });
}

$(document).ready(function()
{  	
  (function() {
        Stripe.setPublishableKey('pk_fTolAZYla8mx72x0GZi1fpeTKMLwj');
    })();


    $("#send").click(function()
    {  
      $.ajax     
    	({
         type: "POST",
         url: base_url + "chat/post_action", 
         data: {textbox: $("#textbox").val()},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
     return false;
     });
	
	$("#mydiv div").click(function()
    { 
    	var div_id = $(this).attr('id');
    	process(div_id);
    });

  $("#token").click(function()
    {  
      var myvalue = $( "input[name='stripeToken']" ).val();
      alert(myvalue);
     });

  $("#fbilling").click(function()
    {   
      $.ajax   
      ({
         type: "POST",
         url: base_url + "chat/is_first_billing_method", 
         //data: {testVar: "myTestVar"},
         //dataType: "text",  
         cache:false,
         success: 
              function(data){
                alert(data);  //as a debugging message.
              }
          });// you have missed this bracket
     return false;
     });
 });

function charge_card(mytoken)
{
  $.ajax
  ({
         type: "POST",
         url: base_url + "chat/make_payment", 
         data: {stripeToken: mytoken},
         dataType: "text",  
         cache:false,
         success: 
              function(data)
              {
                alert(data);  //as a debugging message.
              }
    });
  //alert(data);
}

jQuery(function($) {
  $('#payment-form').submit(function(event) {
    var $form = $(this);

    // Disable the submit button to prevent repeated clicks
    $form.find('button').prop('disabled', true);

    Stripe.card.createToken($form, stripeResponseHandler);

    // Prevent the form from submitting with the default action
    return false;
  });
});

function stripeResponseHandler(status, response) {
  var $form = $('#payment-form');

  if (response.error) {
    // Show the errors on the form
    $form.find('.payment-errors').text(response.error.message);
    $form.find('button').prop('disabled', false);
  } else {
    // response contains id and card, which contains additional card details
    var token = response.id;
    // Insert the token into the form so it gets submitted to the server
    $form.append($('<input type="hidden" name="stripeToken" />').val(token));
    //alert(token);
    var myvalue = $( "input[name='stripeToken']" ).val();
    //alert(response.card.last4);
    alert(token);
    charge_card(token);
    // and submit
    $form.get(0).submit();
  }
};


</script>

<form method="post">
  <input id="textbox" type="text" name="textbox">
  <input id="send" type="submit" name="send" value="Send">
   <div id="mydiv">myCards
	    <div id="card1">Div1</div>
	    <div id="card2">Div2</div>
	</div>
</form>

<form action="" method="POST" id="payment-form">
  <span class="payment-errors"></span>

  <div class="form-row">
    <label>
      <span>Name</span>
      <input type="text" size="20" data-stripe="name"/>
    </label>
  </div>

  <div class="form-row">
    <label>
      <span>Card Number</span>
      <input type="text" size="20" data-stripe="number"/>
    </label>
  </div>

  <div class="form-row">
    <label>
      <span>CVC</span>
      <input type="text" size="4" data-stripe="cvc"/>
    </label>
  </div>

  <div class="form-row">
    <label>
      <span>Expiration (MM/YYYY)</span>
      <input type="text" size="2" data-stripe="exp-month"/>
    </label>
    <span> / </span>
    <input type="text" size="4" data-stripe="exp-year"/>
  </div>

  <button type="submit">Submit Payment</button>
</form>

<div>
<button id="fbilling" type="submit">First Billing</button>
</div>
<div>
<button id="token" type="submit">Stripe Token</button>
</div>
