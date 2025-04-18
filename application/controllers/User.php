<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	/**
	 * Construct function
	 */
	public function __construct()
	{
	    parent::__construct();

		$this->load->model('Player_Model');
        if (!$this->session->userdata('dwUserID'))
        {
            $this->Player_Model->Error('asd');
        }
        else
        {
			$this->Player_Model->Load_UserData($this->session->userdata('dwUserID'));
			$this->Player_Model->Load_Player($this->session->userdata('dwUserID'));
			
			$this->load->model('View_Model');
        }	
		
		// Load language
		$this->lang->load('site', $this->config->item('page_lang'));
	}

	/*
	function error()
    {
        $this->session->keep_flashdata('error');
        $this->load->view('main_index', array('page' => 'error'));
    }
*/

    function sendnewpw($user = 0 , $hash = 0)
    {
		$msg = null;	
		$key  = rand(99999,999999999);		
		
		// jelszó kikérés emailbe
		if(empty($user) && empty($hash) && $this->config->item('reg_mail') == TRUE)
		{
			if(isset($_POST['submit']))
			{	
				$this->db->insert('TCHANGEUSERDATA', array('dwUserID' => $this->Player_Model->user->dwUserID, 'szOldData' => $this->Player_Model->user->szPasswd, 'dDate' => date('Y/m/d H:i:s'), 'dwStatus' => 0, 'dwKey' => $key ));
						
				$data = array(
						'name' => $this->Player_Model->user->szUserName,
						'email' => $this->Player_Model->user->szUserID,
						'hash' => $key
					);
					   
				$this->load->library('email');
				$this->email->from('noreply@legends4ever.hu',$this->config->item('page_name'));
				$this->email->to($this->Player_Model->user->szUserID);
				$this->email->subject($this->config->item('page_name').' - Jelszócsere');
				$this->email->message($this->load->view('mail/passwordchange',  $data, true));
				$this->email->send();	
						
				$msg =  'success';
			}
			
		}else{
			// jelszó kikérés megerősítő link nélkül
			if (isset($_POST['old_pw']) && isset($_POST['new_pw']) && isset($_POST['confirm_pw']))
			{	
				$old = md5(strip_tags($_POST['old_pw']));
				$new = md5(strip_tags($_POST['new_pw']));
				$new2 = md5(strip_tags($_POST['confirm_pw']));	

					
				if (!isset($_POST['new_pw']) or (isset($_POST['new_pw']) and (strip_tags($_POST['new_pw']) == '' or strlen(strip_tags($_POST['new_pw'])) < 5 or strlen(strip_tags($_POST['new_pw'])) > 16 ))){ $msg = $this->lang->line('pwchange_fail_input'); }
				if (!isset($_POST['confirm_pw']) or (isset($_POST['confirm_pw']) and (strip_tags($_POST['confirm_pw']) == '' or strlen(strip_tags($_POST['confirm_pw'])) < 5 or strlen(strip_tags($_POST['confirm_pw'])) > 16 ))){ $msg = $this->lang->line('pwchange_fail_input') ; }
			
				// megadott jelszavak ellenörzése
				if ($new != $new2){$msg =  $this->lang->line('pwchange_fail_pw');}
				
				// mező ellenörzése
			//	if  (empty($old) || empty($new) ||  empty($new2)){ $msg =  " * Minden mező kitöltése kötelező" ;}
				
				//régi jelszó ellenörzése
				if ($this->Player_Model->user->szPasswd != $old ){ $msg =  $this->lang->line('pwchange_wrong_pw') ;}

				if(empty($msg)){
					$this->db->set('dwStatus', 1);
					$this->db->set('dwKey', 0);
					$this->db->set('szNewData', $new);
					$this->db->where(array('dwKey' => $hash));
					$this->db->update('TCHANGEUSERDATA');
						
				//	$msg =  $this->lang->line('pwchange_success') ;
					$msg =  'pwchange_success' ;
				}
				//sima popup
				$this->load->view('popup/passwordchange', array('param1' => $user, 'param2' => $hash, 'param3' => $msg));
			}
		
		}	
			$this->load->view('popup/passwordchange', array('param1' => $user, 'param2' => $hash, 'param3' => $msg));
	}
	
	// új jelszó megadás
	function newpw($user = 0 , $hash = 0)
	{ 
		$msg = null;
		$data = $this->db->get_where('TCHANGEUSERDATA', array('dwKey' => $hash ));
					
		if ($data->num_rows() == 0){$msg =  'fail';}
			
		if (isset($_POST['old_pw']) && isset($_POST['new_pw']) && isset($_POST['confirm_pw']))
		{	
			$old = md5(strip_tags($_POST['old_pw']));
			$new = md5(strip_tags($_POST['new_pw']));
			$new2 = md5(strip_tags($_POST['confirm_pw']));	

				
			if (!isset($_POST['new_pw']) or (isset($_POST['new_pw']) and (strip_tags($_POST['new_pw']) == '' or strlen(strip_tags($_POST['new_pw'])) < 5 or strlen(strip_tags($_POST['new_pw'])) > 16 ))){ $msg = $this->lang->line('pwchange_fail_input'); }
			if (!isset($_POST['confirm_pw']) or (isset($_POST['confirm_pw']) and (strip_tags($_POST['confirm_pw']) == '' or strlen(strip_tags($_POST['confirm_pw'])) < 5 or strlen(strip_tags($_POST['confirm_pw'])) > 16 ))){ $msg = $this->lang->line('pwchange_fail_input') ; }
		
			// megadott jelszavak ellenörzése
			if ($new != $new2){$msg =  $this->lang->line('pwchange_fail_pw');}
			
			// mező ellenörzése
		//	if  (empty($old) || empty($new) ||  empty($new2)){ $msg =  " * Minden mező kitöltése kötelező" ;}
			
			//régi jelszó ellenörzése
			if ($this->Player_Model->user->szPasswd != $old ){ $msg =  $this->lang->line('pwchange_wrong_pw') ;}

			if(empty($msg)){
				$this->db->set('dwStatus', 1);
				$this->db->set('dwKey', 0);
				$this->db->set('szNewData', $new);
				$this->db->where(array('dwKey' => $hash));
				$this->db->update('TCHANGEUSERDATA');
					
			//	$msg =  $this->lang->line('pwchange_success') ;
				$msg =  'pwchange_success' ;
			}
			
			//sima popup
			$this->load->view('popup/passwordchange', array('param1' => $user, 'param2' => $hash, 'param3' => $msg));

		} else {
			//indexelt popup
			$this->load->view('main_index', array('page' => 'main', 'param1' => $user, 'param2' => $hash, 'param3' => $msg, 'msg' => 'passwordchange'));
		}
	}
	
	//email csere
    function emailchange($param1 = 0 , $param2 = 0)
    {
		$msg = array();
		$mail_host = null;
		
		$this->load->helper('email');
		
		if(isset($_POST['submit']))
		{
			$old_email = strip_tags($_POST['old_email']);
			$new_email = strip_tags($_POST['new_email']);
			$hash = md5(rand(99999,999999999)); 
			list(, $mail_host) = explode('@',$_POST['old_email']);

			$query = $this->db->get_where('TACCOUNT', array('szUserID' => $old_email))->row();
		
			//mezők ellenörzése
			if (!isset($_POST['old_email']) or !valid_email($_POST['old_email']) or !isset($_POST['new_email']) or !valid_email($_POST['new_email'])) { $msg[] = $this->lang->line('emailchange_fail_input'); }	
			//régi címe ellenörzése	
			if (empty($query)){ $msg[] = $this->lang->line('emailchange_wrong_email'); }
			//cím típusának ellenörzése	
			if (valid_email($_POST['new_email']) && block_email($_POST['new_email']) ){ 
				list(, $mail) = explode('@',$_POST['new_email']);
				$msg[] = $this->lang->line('reg_block_mail') . ' <b>('.$mail.')</b>' ;
			}

			//email csere - email ki küldéssel
			if(count($msg) == 0 && $this->config->item('reg_mail') == TRUE )
			{
				$this->db->insert('TCHANGEUSERDATA', array('dwUserID' => $this->Player_Model->user->dwUserID, 'szOldData' => $this->Player_Model->user->szUserID, 'szNewData' => $new_email, 'dDate' => date('Y/m/d H:i:s'), 'dwStatus' => 0, 'dwKey' => $hash ));
				
				if($this->Player_Model->user->dwStatus == 1){
					$data = array(
								'name' => $this->Player_Model->user->szUserName,
								'email' => $old_email,
								'file' => 'emailchangeaccept',
								'hash' => $hash
								);
					$email = $old_email	;
				}else {
					// státusz emelés
					$this->db->set('dwStatus', 1);
					$this->db->where(array('dwKey' => $hash));
					$this->db->update('TCHANGEUSERDATA');
					
					//email küldés
					$data = array(
							'name' => $this->Player_Model->user->szUserName,
							'email' => $new_email,
							'file' => 'emailchangecancel',
							'hash' => $hash
					);
					$email = $new_email	;
				} 
				
				$this->load->library('email');
				$this->email->from('noreply@legends4ever.hu',$this->config->item('page_name'));
				$this->email->to($email);
				$this->email->subject($this->lang->line('emailchange_mail_subject'));
				$this->email->message($this->load->view('mail/emailchange',  $data, true));
				$this->email->send();	
						
				$msg = 'success';
			} 

			//email csere email kiküldés nélkül
			if(count($msg) == 0 && $this->config->item('reg_mail') == FALSE )
			{
				$this->db->insert('TCHANGEUSERDATA', array('dwUserID' => $this->Player_Model->user->dwUserID, 'szOldData' => $this->Player_Model->user->szUserID, 'szNewData' => $new_email, 'dDate' => date('Y/m/d H:i:s'), 'dwStatus' => 2, 'dwKey' => $hash ));
						
				$this->db->set('szUserID', $new_email);
				$this->db->where(array('dwUserID' => $this->Player_Model->user->dwUserID));
				$this->db->update('TACCOUNT');
						
				$msg = 'nomail_success';
			} 
		} 
		//indexelt popup
		$this->load->view('popup/emailchange', array('param1' => $msg, 'mailaddres' => $mail_host));
	} 
	
	
    function emailchangeaccept($user, $hash)
    {
		$msg = null;
		$query = $this->db->get_where('TCHANGEUSERDATA', array('dwKey' => $hash, 'dwStatus' => 0 ));
		$data = $query->row();	
		
		$link_limit = date('Y/m/d H:i:s',time() - 3 * (24*60*60)); // 3 napos korlát
		
		if($query->num_rows() > 0)
		{	
			if($link_limit > sql_date($data->dDate) ) { $msg = 'activated' ;}
			
			if(empty($msg))
			{
				$this->db->set('dwStatus', 1);
				$this->db->where(array('dwKey' => $hash));
				$this->db->update('TCHANGEUSERDATA');
			
				$mail_data = array(
						'name' => $this->Player_Model->user->szUserName,
						'email' => $data->szNewData,
						'file' => 'emailchangecancel',
						'hash' => $hash
				);
				
				$this->load->library('email');
				$this->email->from('noreply@legends4ever.hu',$this->config->item('page_name'));
				$this->email->to($data->szNewData);
				$this->email->subject($this->lang->line('emailchange_mail_subject'));
				$this->email->message($this->load->view('mail/emailchange',  $mail_data, true));
				$this->email->send();
				
				$msg = 'success';
			} 
		} 
		
		$this->load->view('main_index', array('page' => 'main', 'param1' => $user, 'param2' => $hash, 'param3' => $msg, 'msg' => 'emailchangeaccept'));
		 

    }
	
	
    function emailchangecancel($user, $hash)
    {
		$msg = null;
		$query = $this->db->get_where('TCHANGEUSERDATA', array('dwKey' => $hash, 'dwStatus' => 1 ));
		$data = $query->row();	
		
		if($query->num_rows() > 0)
		{
			//change status end
			$this->db->set('dwStatus', 2);
			$this->db->where(array('dwKey' => $hash));
			$this->db->update('TCHANGEUSERDATA');
			
			//update user data
			$this->db->set('szUserID', $data->szNewData);
			if($this->Player_Model->user->dwStatus != 1){
			$this->db->set('dwStatus', 1);
			}
			$this->db->where(array('dwUserID' => $data->dwUserID));
			$this->db->update('TACCOUNT');

			$msg = 'success';
		}
		
		$this->load->view('main_index', array('page' => 'main', 'param1' => $user, 'param2' => $hash, 'param3' => $msg, 'msg' => 'emailchangecancel'));

    }	
	
    function payment()
    {
        $this->load->view('user/payment');
    }	
	
    function shop()
    {
        $this->load->view('user/shop');
    }	
	
    function whell()
    {
        $this->load->view('user/whell');
    }
	
    function administration()
    {
		if($this->Player_Model->user->dwStatus == 1){
						$this->show('administration', 0);

		}else{
					$this->load->view('user_index', array('page' => 'administration', 'param1' => 0, 'param2' => 0, 'param3' => 0, 'msg' => 'system_msg', 'type' => 'confirm_mail' ));

		}
    }

    function country()
    {
	//	$query = $this->db->get_where('CLASSIC_GAME.dbo.TCHARTABLE', array('dwUserID' => $this->Player_Model->user->dwUserID));
	//	$char = $query->row();

		$guild_query = $this->db->query("
			SELECT *
				FROM CLASSIC_GAME.dbo.TGUILDMEMBERTABLE 
				INNER JOIN CLASSIC_GAME.dbo.TCHARTABLE ON ( CLASSIC_GAME.dbo.TGUILDMEMBERTABLE.dwCharID  = CLASSIC_GAME.dbo.TCHARTABLE.dwCharID)
				INNER JOIN CLASSIC_GAME.dbo.TGUILDTABLE ON ( CLASSIC_GAME.dbo.TGUILDTABLE.dwID  = CLASSIC_GAME.dbo.TGUILDMEMBERTABLE.dwGuildID)
			WHERE dwUserID =  ".$this->Player_Model->user->dwUserID 
		);
				  
		$status_query = $this->db->get_where('TCURRENTUSER', array('dwUserID' => $this->Player_Model->user->dwUserID));
		
		
	//	$status = $this->db->get_where('TCOUNTRYCHANGETABLE', array('dwUserID' => $this->Player_Model->user->dwUserID));
		$status = $this->db->query("
			SELECT TOP 1 *
				FROM TCOUNTRYCHANGETABLE 
			WHERE dwUserID =  ".$this->Player_Model->user->dwUserID ."  and bDate > DATEADD(DAY, -".$this->config->item('country_day_limit').", getdate()) order by bDate desc
		");
		$msg = null;
		
		if ($status->num_rows() > 0) { $msg = 'time_limit'; }  
		
        if (isset($_POST['submit']) )
		{
			if ($guild_query->num_rows() > 0) { $msg = $guild_query; }
			if ($status_query->num_rows() > 0) { $msg = 'A folytatás előtt kikell lépned a játékból'; }
			
			if (empty($msg)) {
			
					$country = ($this->Player_Model->cuntry->bCountry == 0) ? 1 : 0 ;
					
					$this->db->insert('TCOUNTRYCHANGETABLE', array('dwUserID' => $this->Player_Model->user->dwUserID, 'bFrom' => $this->Player_Model->cuntry->bCountry, 'bWhere' => $country, 'bDate' => date('Y/m/d H:i:s')));

					// game db
					$this->db->set('bCountry', $country);
					$this->db->set('bOriCountry', $country);
					$this->db->where('dwUserID',  $this->Player_Model->user->dwUserID);
					$this->db->where('bCountry <', 2); 
					$this->db->update('CLASSIC_GAME.dbo.TCHARTABLE');
					// user db
					$this->db->set('bCountry', $country);
					$this->db->where('dwUserID',  $this->Player_Model->user->dwUserID);
					$this->db->where('bCountry <', 2); 
					$this->db->update('TALLCHARTABLE');
					
					
					$msg = 'success'; 
			}	
			
			if (isset($_POST['buy']) && $this->Player_Model->user->dwCash >= $this->config->item('country_buy_premium') ) {
			
					$country = ($this->Player_Model->cuntry->bCountry == 0) ? 1 : 0 ;
					
					$this->db->insert('TCOUNTRYCHANGETABLE', array('dwUserID' => $this->Player_Model->user->dwUserID, 'bFrom' => $this->Player_Model->cuntry->bCountry, 'bWhere' => $country, 'bDate' => date('Y/m/d H:i:s')));

					// game db
					$this->db->set('bCountry', $country);
					$this->db->set('bOriCountry', $country);
					$this->db->where('dwUserID',  $this->Player_Model->user->dwUserID);
					$this->db->where('bCountry <', 2); 
					$this->db->update('CLASSIC_GAME.dbo.TCHARTABLE');
					// user db
					$this->db->set('bCountry', $country);
					$this->db->where('dwUserID',  $this->Player_Model->user->dwUserID);
					$this->db->where('bCountry <', 2); 
					$this->db->update('TALLCHARTABLE');
					
					// update cash
					$this->db->set('dwCash', $this->Player_Model->user->dwCash - $this->config->item('country_buy_premium'));
					$this->db->where(array('dwUserID' => $this->Player_Model->user->dwUserID));
					$this->db->update('TACCOUNT');
				
					$msg = 'success'; 
			}/*else{
				$msg = 'NIncs elég hk ád'; 
			}*/
			
		}  
		$this->load->view('popup/country_change', array('msg' => $msg, 'query' => $guild_query));

	}  
	
	function friend()
	{
		$referals = array(array(),array(),array());
		$referalCount = 0;
		
		$referal_query = $this->db->get_where('TREFERALTABLE', array('dwUserID' => $this->Player_Model->user->dwUserID));
		if($referal_query->num_rows() > 0)
		{
			foreach($referal_query->result() as $referal)
			{
				$referals[$referalCount][0][0] = $referal->szReferID;
				
				if($referal->bInvalid == 1)
					$referals[$referalCount][0][1] = 2;
				elseif( $referal->bRewarded == 1 )
					$referals[$referalCount][0][1] = 1;
				else
					$referals[$referalCount][0][1] = 0;
				
				$referalCount++;
			}
		}
		
		$this->load->view('popup/friend', array( 'param1' => $this->Player_Model->user->szRefCode, 
								'param2' => array($this->config->item('base_url').'main/register/'.$this->Player_Model->user->szRefCode, $referal_query->num_rows),
								'param3' => $referals));
	}
	
    public function accinfo()
    {
		$db = $this->load->database('admindb', TRUE);
		$server = $this->config->item('page_prefix2');
		$user_id = $this->Player_Model->user->dwUserID;
		$query = $db->query("SELECT * FROM rank_char_info WHERE user_id = $user_id and game_server = '$server' ")->row();
		$msg = null;
		
        if (!empty($_POST['submit']))
		{		
			if (!empty($_POST['test']) && empty($query))
			{		
					$db->insert('rank_char_info', array('user_id' => $user_id, 'text' => $_POST['test'], 'game_server' => $server));
					redirect($this->uri->uri_string());
					
			}			
			if (empty($_POST['test']))
			{		
					$db->where('user_id', $user_id);
					$db->where('game_server', $server);
					$db->delete('rank_char_info'); 
					redirect($this->uri->uri_string());
			}				
			if (!empty($query))
			{		
					$db->set('text', $_POST['test']);
					$db->where('user_id', $user_id);
					$db->where('game_server', $server);
					$db->update('rank_char_info');
					redirect($this->uri->uri_string());
			}	
		}	
		
		$this->load->view('popup/accinfo', array('param1' => $query /*, 'param2' => $msg*/));

    }	
	
    function galery()
    {
		$this->load->view('popup/galery', array('error' => ''));
    }	
	
    function charport($name)
    {
		//$name = 'Nazulorasdsada';
		$query = $this->db->get_where('CLASSIC_GAME.dbo.TCHARTABLE', array('szNAME' => $name));
		$char  = $query->row();
		$msg = null;
		
		if ($query->num_rows() > 0)
		{
			$status_query = $this->db->get_where('TCURRENTUSER', array('dwCharID' => $char->dwCharID));
			if ($status_query->num_rows() > 0) {	$msg = 'status'; }
		}	
		
        if (!empty($_POST['submit']) && empty($msg))
		{			
			if ($query->num_rows() > 0)
			{	
				$msg = 'success';
				//gorba visz
				$this->db->set('fPosX', '3774.854');
				$this->db->set('fPosY', '86.21');
				$this->db->set('fPosZ', '406.45');
				$this->db->set('wDIR', '1354');
				$this->db->where('szName', $name);
				$this->db->update('CLASSIC_GAME.dbo.TCHARTABLE');
			} else{
				$msg = 'warning';
			}
		}
		
		
		$this->load->view('popup/charport', array('param1' => $name, 'msg' => $msg));
    }
	
    public function logout()
    {
        $this->session->unset_userdata('dwUserID');
        redirect($this->config->item('base_url'), 'refresh');
    }
	
	function show($location, $param1 = 0, $param2 = 0, $param3 = 0)
    {
        $this->load->view('user_index', array('page' => $location, 'param1' => $param1, 'param2' => $param2, 'param3' => $param3));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */