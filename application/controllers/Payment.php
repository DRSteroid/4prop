<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {
	
	/**
	 * Construct function
	 */
	public function __construct()
	{
	    parent::__construct();

		$this->load->model('Player_Model');
        if (!$this->session->userdata('dwUserID'))
        {
			if($this->router->fetch_method()!='ipn'&&$this->router->fetch_method()!='ipn2')
				$this->Player_Model->Error('');
        }
        else
        {
			$this->Player_Model->Load_UserData($this->session->userdata('dwUserID'));
			$this->Player_Model->Load_Premium($this->config->item('page_prefix2'));
			
			$this->load->model('View_Model');
        }	
		
		// Load language
		$this->lang->load('site', $this->config->item('page_lang'));
	}

    public function index()
    {
		$this->show('main'/*, $data->login*/);
    }
	
	function bank()
    {
		$this->show('bank');
    }
	
	function paypal()
    {
		/*$ranKey = rand(100,500);
			$year = date('Y')-2000 + $ranKey;
			$month = date('m') + $ranKey;
			$day = date('d')+ $ranKey;
			$hour = date('h')+ $ranKey;
			$min = date('m')+ $ranKey;
			$ranID = $this->session->userdata('dwUserID') + $ranKey;
			$invoiceIDs[$i] = "YIRO-$ranHash$year$month$day$hour$min$ranID$ranKey";
			*/
		/*
		//Generate 5 individual invoice identification numbers
		$invoiceIDs = array();
		for($i = 1; $i < 5; ++$i)
		{
			$invoiceIDs[$i] = date("His").rand(1234, 9632);
		}
		*/
		$this->show('paypal'/*,$invoiceIDs*/);
    }
	
	function process()
	{
        die();

		// Check request
		if(!isset($_POST['action']) || !isset($_POST['id'])) 
		{
			//$this->Player_Model->Error('');
			show_error('There was a problem while processing your request.<br>Reference no.: '.__LINE__);
			exit();
		}
		// Init base variables 
		$Payment_Id 		= intval($_POST['id']);
		$Payment_Gateway 	= $_POST['gway']; 
		$GameServer			= $_POST['server'];
		$dbParams = array();
		// Load master paypal library
		$this->load->library('paypal/paypal');
		// Look up the database for the requested payment method (MySQL)
		$db 	= $this->load->database('admindb', true);
		$Cmd 	= $db->get_where('premium2', 
								array(
								'server' 	=> $GameServer, 
								'type' 		=> $Payment_Gateway,
								'id' 		=> $Payment_Id
								));
		$Payment_Details = $Cmd->row();
		// Cancel the request in case of an unknown request
		if($Cmd->num_rows() != 1)
		{
			//$this->Player_Model->Error('');
			show_error('There was a problem while processing your request.<br>Reference no.: '.__LINE__);
			exit();
		}
		// Init payment gateway specific variables
		// Load additional payment gateway libraries if required
		switch($Payment_Gateway)
		{
			case 'paypal':	// PayPal API
			{
				$this->paypal->admin_mail = $this->config->item('paypal_email');
			}
			break;
			case 'paysafecard':
			case 'bitcoin':
			{
				$this->load->library('payssion/PayssionClient',
									array(
											$this->config->item('payssion_api_public'), 
											$this->config->item('payssion_api_secret')
										));
			}
			break;
		}
		$Coins = $Payment_Details->coins;
		if( $Payment_Details->event_date > date('Y-m-d H:i:s') )
			if( $Payment_Details->event_type == 1)
				$Coins = $Payment_Details->coins * (1 + $Payment_Details->event_rate / 100);	// 1: x + y%
			else
				$Coins = $Payment_Details->coins * $Payment_Details->event_rate;				// 2: x * y
		
		/*$day = date('d');
		if($day >= 10 && $day <= 17)
			$Coins = $Payment_Details->coins * (1 + $Payment_Details->event_rate / 100);	// 1: x + y%*/
			
		// Generate an invoice ID
		$invoice = date("His").rand(1234, 9632);
		// Log the payment request
		// Send out payment API requests
		switch($Payment_Gateway)
		{
			case 'paypal':
			{
				$this->show('process', $this->paypal, true);
				$this->paypal->add_field('business',  		$this->config->item('paypal_email'));
				$this->paypal->add_field('cmd', 			'_cart');
				$this->paypal->add_field('upload', 			1);
				$this->paypal->add_field('return',			base_url());
				$this->paypal->add_field('cancel_return', 	base_url());
				$this->paypal->add_field('notify_url', 		base_url().'payment/ipn');
				$this->paypal->add_field('currency_code', 	$Payment_Details->currency);
				$this->paypal->add_field('invoice', 		$invoice);
				$this->paypal->add_field('item_name_1', 	$Coins.' '.$this->config->item('cash_valuta'));
				$this->paypal->add_field('item_name_2', 	$Coins);
				$this->paypal->add_field('quantity_1', 		1);
				$this->paypal->add_field('amount_1', 		$Payment_Details->price);
				$this->paypal->submit_paypal_post();
				$db->insert(
							'paypal_log',
							array(
								'szInvoice'			=> $invoice,
								'szTxnID'			=> '?',
								'dwUserID'			=> $this->Player_Model->user->dwUserID,
								'szUserID'			=> $this->Player_Model->user->szUserName,
								'szUserMail'		=> $this->Player_Model->user->szUserID,
								'dwPrice'			=> $Payment_Details->price,
								'dwCurrency'		=> $Payment_Details->currency,
								'dwCoins'			=> $Coins,
								'bStatus'			=> 0,
								'dBeginTransaction'	=> date('Y-m-d H:i:s'),
								'dEndTransaction'	=> 0,
								'server'	=> $this->config->item('page_prefix2')
							)
					);
			}
			break;
			case 'paysafecard':
			case 'bitcoin':
			{
				$this->payssionclient->setSSLverify(false);
				if($this->config->item('payssion_debug')==true)
				{
					$this->payssionclient->setUrl('http://sandbox.payssion.com/api/v1/payment');
					$this->payssionclient->setSSLverify(false);
				}
				try
				{
					$response = $this->payssionclient->create( 
															array(
																'amount'	 	=> $Payment_Details->price,
																'currency'	 	=> $Payment_Details->currency,
																'pm_id'		 	=> $Payment_Gateway,
																'description'	=> $Coins.' '.$this->config->item('cash_valuta'),
																'track_id'	 	=> $invoice,
																'payer_ref'	 	=> $this->Player_Model->user->dwUserID,
																'payer_name' 	=> $this->Player_Model->user->szUserName,
																'payer_email'	=> $this->Player_Model->user->szUserID,
																'redirect_url'	=> base_url().'payment/',
																'notify_url' 	=> base_url().'payment/ipn2'
															)
														);
				} catch (Exception $e)
				{
					show_error($e->getMessage());
				}

				if($this->payssionclient->isSuccess())
				{
						$db->insert(
								'classic4s_hu_payssion_log',
								array(
									'szInvoice'			=> $invoice,
									'dwUserID'			=> $this->Player_Model->user->dwUserID,
									'szUserID'			=> $this->Player_Model->user->szUserName,
									'szUserMail'		=> $this->Player_Model->user->szUserID,
									'szPMID'			=> $Payment_Gateway,
									'dwPrice'			=> $Payment_Details->price,
									'dwCurrency'		=> $Payment_Details->currency,
									'dwCoins'			=> $Coins,
									'bStatus'			=> 0,
									'dBeginTransaction'	=> date('Y-m-d H:i:s'),
									'dEndTransaction'	=> 0
								));
						$todo = $response['todo'];
						if ($todo) {
							$todo_list = explode('|', $todo);
							if (in_array("instruct", $todo_list)) {
								$bankaccount = $response['bankaccount'];
								echo print_r($bankaccount, true);
							} else if (in_array("redirect", $todo_list)) {
								$paylink = $response['redirect_url'];
								header('location: '.$paylink);
							}
					}
				}
				else
				{
					show_error('There was a problem while processing your request.<br>Reference no.: '.__LINE__ .'<br>');
				}
			}
			break;
		}
	}
	function ipn()
	{
        die;

		log_message('error', "LIN IPN TRIGGERED");
		
		// Load database
		$db = $this->load->database('admindb', TRUE);
		// Process post data
		$raw_post_data = file_get_contents('php://input');
		$raw_post_array = explode('&', $raw_post_data);
		$myPost = array();
		foreach ($raw_post_array as $keyval) {
			$keyval = explode ('=', $keyval);
			if (count($keyval) == 2)
				$myPost[$keyval[0]] = urldecode($keyval[1]);
		}
		$hostname = gethostbyaddr ( $_SERVER ['REMOTE_ADDR'] );
		if (! preg_match ( '/paypal\.com$/', $hostname )) {
			log_message('error', $hostname);
			//$this->Player_Model->Error('');
			//exit;
		}
		$req = 'cmd=_notify-validate';
		if(function_exists('get_magic_quotes_gpc')) {
			$get_magic_quotes_exists = true;
		}
		foreach ($myPost as $key => $value) {
			if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
				$value = urlencode(stripslashes($value));
			} else {
				$value = urlencode($value);
			}
			$req .= "&$key=$value";
		}
		//if(USE_SANDBOX == true) {
		//	$paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
		//} else {
			$paypal_url = "https://www.paypal.com/cgi-bin/webscr";
		//}
		$ch = curl_init($paypal_url);
		if ($ch == FALSE) {
			return FALSE;
		}
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
		// CONFIG: Optional proxy configuration
		//curl_setopt($ch, CURLOPT_PROXY, $proxy);
		//curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
		// Set TCP timeout to 30 seconds
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
		// CONFIG: Please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path
		// of the certificate as shown below. Ensure the file is readable by the webserver.
		// This is mandatory for some environments.
		//$cert = __DIR__ . "./cacert.pem";
		//curl_setopt($ch, CURLOPT_CAINFO, $cert);
		//curl_setopt($ch, CURLOPT_CAINFO, 'cacert.pem' );
		$res = curl_exec($ch);
		if (curl_errno($ch) != 0) // cURL error
			{
				log_message('error', "Can't connect to PayPal to validate IPN message: " . curl_error($ch) . PHP_EOL);
			curl_close($ch);
			exit;
		} else {
				// Log the entire HTTP response if debug is switched on.
				//	log_message('error', "HTTP request of validation request:". curl_getinfo($ch, CURLINFO_HEADER_OUT) ." for IPN payload: $req" . PHP_EOL);
				//	log_message('error', "HTTP response of validation request: $res" . PHP_EOL);
				//curl_close($ch);
		}
		
		$tokens = explode("\r\n\r\n", trim($res));
		$res = trim(end($tokens));
		if (strcmp ($res, "VERIFIED") == 0) {
			
			$txnID 				= $_POST['txn_id'];
			$invoice 			= $_POST['invoice'];
			$sqlCmd = $db->get_where('paypal_log', array('szInvoice' => $invoice));
			$data = $sqlCmd->row();	
			$sqlGameDBCmd = $this->db->get_where('TACCOUNT', array('dwUserID' => $data->dwUserID));
			$dataGameDB = $sqlGameDBCmd->row();
			
			if($data->bStatus == 0)
			{
				$db->set('bStatus', 1);
				$db->set('dEndTransaction', date('Y-m-d H:i:s'));
				$db->set('szTxnID',	$txnID);
				$db->where(array('szInvoice'=>$invoice));
				$db->update('paypal_log');
				$this->db->set('dwCash', $dataGameDB->dwCash + $data->dwCoins);
				$this->db->where(array('dwUserID' => $data->dwUserID));
				$this->db->update('TACCOUNT');
			}
		}
		else
		{
			log_message('error', 'IPN not verified.');
		}
		
	}
	
	function cupon() {
        die;

		$msg = '';
		$db = $this->load->database('admindb', TRUE);
		if(isset($_POST['submit'])){
			
			$kartya_kod = mysql_real_escape_string($_POST['kartyaszam']) ;
			$sqlCmd = $db->get_where('sms_log', array('kartyaszam' => $kartya_kod));
			$data = $sqlCmd->row();	
			if ($sqlCmd->num_rows() > 0) {
				
				if ($sqlCmd->num_rows() > 0 && $data->status == 'folyamatban') {
					
						$db->set('status', 'feldolgozva');
						$db->set('user_name', $this->Player_Model->user->szUserName);
						$db->set('user_email', $this->Player_Model->user->szUserID);
						$db->set('felhasznalva', date('Y/m/d H:i:s'));
						$db->set('server', $this->config->item('page_prefix2'));
						$db->where(array('kartyaszam' => $kartya_kod));
						$db->update('sms_log');
						
						$this->db->set('dwCash', $this->Player_Model->user->dwCash + $data->coins);
						$this->db->where(array('dwUserID' => $this->Player_Model->user->dwUserID));
						$this->db->update('TACCOUNT');
						$msg = "Sikeresen feltöltöttél ".$data->coins." Holdkövet!";
				} else 
					{
						$msg = 'Ezt a kódot már felhasználtad ekkor:<br/>'.$data->felhasznalva;
					}
			}else {
				$msg = 'A megadott kupon kód nem érvényes';
			}
			
		}
		$this->show('cupon', $msg );
    }


	
	function sms()
    {
        die;


		$msg = null;
		$db = $this->load->database('admindb', TRUE);
		if(isset($_POST['submit'])){		
			$kartya_kod = mysql_real_escape_string($_POST['kartyaszam']) ;
			$sqlCmd = $db->get_where('sms_log', array('kartyaszam' => $kartya_kod));
			$data = $sqlCmd->row();	
			
			$premium = $this->config->item('payment_sms_coins');
			if ($sqlCmd->num_rows() > 0)
			{			
		
		//	$coins = $data->coins;
			
			$query = $db->get_where('premium2', array('server' => $this->config->item('page_prefix2'), 'type' => 'sms'));
			$event = $query->row();
			
			$query = $db->get_where('premium2', array('server' => $this->config->item('page_prefix2'), 'type' => 'sms', 'price' => $data->ar * 1.27));
			$coins = $query->row()->coins;
			
			
			
			if( $event->event_date > date('Y-m-d H:i:s') ){
				
				if($event->event_type == 1)
					$coins = $query->row()->coins * (1 + $event->event_rate / 100);
				else
					$coins = $query->row()->coins * $event->event_rate;
				
			} 
			// auto event
			if(date("d") >= date("7") && date("d") < date("14") && date('Y-m-d H:i:s') > $event->event_date){
				$coins = $query->row()->coins * (1 + 50 / 100);
			}
			
			//$coins = $coins * (1 + 50 / 100); // event rate

				if ($data->status == 'folyamatban') {
						$db->set('status', 'feldolgozva');
						$db->set('coins', $coins);
						$db->set('user_name', $this->Player_Model->user->szUserName);
						$db->set('user_email', $this->Player_Model->user->szUserID);
						$db->set('felhasznalva', date('Y/m/d H:i:s'));
						$db->set('server', $this->config->item('page_prefix2'));
						$db->where(array('kartyaszam' => $kartya_kod));
						$db->update('sms_log');
						$this->db->set('dwCash', $this->Player_Model->user->dwCash + $coins);
						$this->db->where(array('dwUserID' => $this->Player_Model->user->dwUserID));
						$this->db->update('TACCOUNT');
						$msg = "Sikeresen feltöltöttél ".$coins." Höldkövet! ";
				} else {
						$msg = 'Ezt a kódot már felhasználtad ekkor:<br/>'.$data->felhasznalva;
				}
			} else{
				$msg = 'Hibás aktiváló kód.';
				}
		}
	
		$this->show('sms', $msg);
    }	

	function paysafecard()
	{
		$this->show('paysafecard');
	}
	function bitcoin()
	{
		$this->show('bitcoin');
	}
	
	function show($location, $param1 = 0, $param2 = 0, $param3 = 0)
    {
        $this->load->view('payment_index', array('page' => $location, 'param1' => $param1, 'param2' => $param2, 'param3' => $param3));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */