<?php
define('SSL_P_URL', 'https://www.paypal.com/cgi-bin/webscr');
define('SSL_SAND_URL','https://www.sandbox.paypal.com/cgi-bin/webscr');

class Paypal {
	private $ipn_status;                // holds the last status
	public $admin_mail; 				// receive the ipn status report pre transaction
	public $paypal_mail;				// paypal account, if set, class need to verify receiver
	public $txn_id;						// array: if the txn_id array existed, class need to verified the txn_id duplicate
	public $ipn_log;                    // bool: log IPN results to text file?
	private $ipn_response;              // holds the IPN response from paypal   
	public $ipn_data = array();         // array contains the POST values for IPN
	private $fields = array();          // array holds the fields to submit to paypal
	private $ipn_debug; 				// ipn_debug
	
	// initialization constructor.  Called when class is created.
	function __construct() {

		$this->ipn_status = '';
		$this->admin_mail = null;
		$this->paypal_mail = null;
		$this->txn_id = null;
		$this->tax = null;
		$this->ipn_log = true;
		$this->ipn_response = '';
		$this->ipn_debug = false;
	}
	
	public function add_field($field, $value) {
		$this->fields["$field"] = $value;
	}

	public function submit_paypal_post() {

		//$paypal_url = ($_GET['sandbox'] == 1) ? SSL_SAND_URL : SSL_P_URL;
		$paypal_url =  SSL_P_URL;
		echo "<html>\n";
		echo "<head><meta charset='utf-8'/><title>Redirecting to paypal</title></head>\n";
		echo "<body onLoad=\"document.forms['paypal_form'].submit();\">\n";
		
		
		echo "<form target='_parent' method=\"post\" name=\"paypal_form\" ";
		echo "action=\"".$paypal_url."\">\n";
		if (isset($this->paypal_mail))echo "<input type=\"hidden\" name=\"business\" value=\"$this->paypal_mail\"/>\n";
		foreach ($this->fields as $name => $value) {
			echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";
		}
		
		echo "</form>\n";
		echo "</body></html>\n";
	}
}         


 
