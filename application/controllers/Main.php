<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	/**
	 * Construct function
	 */
	public function __construct()
	{
	    parent::__construct();
		
		if($this->config->item('installed') == 'no')
		   redirect('/install/', 'refresh');
		
		$this->load->model('Player_Model');
		$this->load->model('View_Model');
			$this->Player_Model->Load_UserData($this->session->userdata('dwUserID'));
			$this->Player_Model->Load_Player($this->session->userdata('dwUserID'));
		
		// Load language
		$this->lang->load('site', $this->config->item('page_lang'));
		
		// Karbantartás
		$this->load->library('maintenance');
		$this->Player_Model->Load_Premium();

	}

	function error()
    {
        $this->session->keep_flashdata('error');
		redirect('', 'refresh');
    }
	
	
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    public function index()
    {
		$this->show('main');
    }
	
	/**
	 * Login function
	 */
	public function login()
	{
        $this->Player_Model->User_Login();
	}

	/**
	 * Register function
	 */	 
	function register($param1 = 0)
    {
		
		if ($this->session->userdata('dwUserID'))
		{
			redirect($this->config->item('base_url').'user/administration', 'refresh');
		}
		
        $error = array();
		$this->load->helper('email');	

        if (isset($_POST['submit']))
		{		

			if (!isset($_POST['name']) or (isset($_POST['name']) and (strip_tags($_POST['name']) == '' or strlen(strip_tags($_POST['name'])) < 5 or strlen(strip_tags($_POST['name'])) > 16 ))){ $error[] = $this->lang->line('reg_user_fail_input') ; }
			
			if (!isset($_POST['password']) or (isset($_POST['password']) and (strip_tags($_POST['password']) == '' or strlen(strip_tags($_POST['password'])) < 5 or strlen(strip_tags($_POST['password'])) > 16 ))){ $error[] = $this->lang->line('reg_pw_fail_input') ; }
			if (!isset($_POST['email']) or !valid_email($_POST['email'])){ $error[] = $this->lang->line('reg_wrong_mail')  ; }
			if (valid_email($_POST['email']) && block_email($_POST['email'])  )
			{ 
			list(, $host) = explode('@',$_POST['email']);
			$error[] = $this->lang->line('reg_block_mail') . ' <b>('.$host.')</b>' ; 
			}
			if (!isset($_POST['tac']) or (isset($_POST['tac']) and !$_POST['tac'])){ $error[] = $this->lang->line('reg_fail_tac') ; }
			
			if (count($error) == 0) {
				$name = strip_tags($_POST['name']);
				$email = strip_tags($_POST['email']);
				$password = strip_tags($_POST['password']);
				$hash = md5(rand(99999,999999999)); 
				
				$user_query = $this->db->get_where('TACCOUNT', array('szUserName' => $name));
				$email_query = $this->db->get_where('TACCOUNT', array('szUserID' => $email));
			  
				
				if ($user_query->num_rows() > 0 && $name != '') { $error[] = $this->lang->line('reg_fail_username') ;}
				if ($email_query->num_rows() > 0) { $error[] = $this->lang->line('reg_fail_mailuser') ;}
				if ($email_query->num_rows() == 0 and $user_query->num_rows() == 0 && empty($error) ) { 

                    if($this->config->item('password_hash') == 'sha1') {
                        $password = sha1($password);
                    } else {
                        $password = md5($password);
                    }

					$this->db->insert('TACCOUNT', array('szUserName' => $name, 'szUserID' => $email, 'szPasswd' => $password, 'dRegDate' => date('Y/m/d H:i:s'), 'dwStatus' => $hash, 'szRefCode' => substr(md5($email), 0, 4) ));
					
					if ($this->config->item('reg_mail') == TRUE)	
					{	
				
					$data = array(
								'name' => $name,
								'password' => $password,
								'email' => $email,
								'hash' => $hash
								);
		   
					$this->load->library('email');
					$this->email->from('noreply@legends4ever.hu',$this->config->item('page_name'));
					$this->email->to($email);
					$this->email->subject($this->lang->line('reg_mail_subject'));
					$this->email->message($this->load->view('mail/register',  $data, true));
					$this->email->send();	
					}
					
				//	$param1 = 'dfe0';
			/*		
				$refCode = '';
				if(isset($_POST['refCode']) && $_POST['refCode'] != '')
					$refCode = $_POST['refCode'];
				elseif(!empty($param1))
					$refCode = $param1;

				log_message('error', "refcode $refCode | param1 $param1");
			*/
				if(!empty($param1))
				{

					$dwUserID_query = $this->db->get_where('TACCOUNT', array('szRefCode' => $param1));
					if($dwUserID_query->num_rows() > 0)
					{
						$dwUserID_data = $dwUserID_query->row();
						$dwUserID = $dwUserID_data->dwUserID;
						
						$dwReferID_query = $this->db->get_where('TACCOUNT', array('szUserID' => $email));
						$dwReferID_data = $dwReferID_query->row();
						$dwReferID = $dwReferID_data->dwUserID;
						
						$this->db->insert('TREFERALTABLE', array(	'dwUserID' 	=> $dwUserID, 
																	'dwReferID' => $dwReferID,
																	'bRewarded'	=> 0,
																	'bInvalid'	=> 0,
																	'dInvalidate' => 1900,
																	'szReferID' => $name,
																	'dRefDate'	=> date("Y-m-d H:i:s")
																));
					}
				}
				
					$error = 'success';
				}
			}
		}
		
		//popup miatt
		if(!empty($param1)) {
			$this->load->view('main_index', array('page' => 'main', 'param1' => $param1, 'param2' => 0, 'param3' => 0, 'msg' => 'register', 'errors' => $error ));

		}else{
			$this->load->view('popup/register', array('param1' => $param1, 'param2' => 0, 'param3' => 0, 'errors' => $error ));
		}
	}
	
    function download()
    {
		$this->load->view('popup/download');
	}
	
    function screenshots($view = 0)
    {
		$db = $this->load->database('admindb', TRUE);
		$server = $this->config->item('page_prefix');
		$this->Player_Model->Load_IMG();
        $this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('image_lib');
		
		
		if(empty($view)) {
			$query = $db->query("SELECT * , ( SELECT Count(*) FROM game_galery_forum WHERE game_galery_forum.prc_id = game_galerys.id and 		delet = 0) as post_count 
			FROM game_galerys where game_server = '$server' ORDER BY date DESC ");
		}else{
			$query = $db->query("SELECT * , ( SELECT Count(*) FROM game_galery_forum WHERE game_galery_forum.prc_id = game_galerys.id and 		delet = 0) as post_count 
			FROM game_galerys where game_server = '$server' ORDER BY date DESC");
		}

		
        $this->show('screenshots', null, $query, $view);
	}	
	
    function screenview($view)
    {
		$db = $this->load->database('admindb', TRUE);
		$server = $this->config->item('page_prefix');
	//	$this->Player_Model->Load_IMG();
	//	$this->load->library('pagination');

		$forum = $db->query("SELECT * FROM game_galery_forum where prc_id = '$view' and delet = 0");


			$query = $db->query("SELECT *,( SELECT Count(*) FROM game_galery_forum WHERE game_galery_forum.prc_id = game_galerys.id and  game_galery_forum.delet = 0
				) as post_count FROM game_galerys 
				where game_server = '$server' and id = $view ");
				
			//oldal megtekintlsek
			$db->set('views', $query->row()->views +1);
			$db->where('id', $view);
			$db->update('game_galerys');
		

			if (isset($_POST['submit']) )
			{	
				if ($this->session->userdata('dwUserID'))
				{
					if (!empty($_POST['textReplyContents']))
					{		
							$db->insert('game_galery_forum', array('prc_id' => $view, 'user_id' => $this->Player_Model->user->dwUserID, 'username' => $this->Player_Model->user->szUserName, 'date' => date('Y/m/d H:i:s'), 'post' => $_POST['textReplyContents'], 'game_server' => $server, 'delet' => 0));
							redirect($this->uri->uri_string());
							
					}
				}else {$this->load->view('main_index', array('page' => 'screenview', 'param1' => $query, 'param2' => $view, 'param3' => $forum, 'msg' => 'login', 'error' => null ));} 
			}		

			if (isset($_POST['deletReply']) )
			{	
				/*
					$db->where('id', $_POST['deletReply']);
					$db->delete('game_galery_forum'); 
				*/
					$db->set('delet', 1);
					$db->where('id', $_POST['deletReply']);
					$db->update('game_galery_forum');
					
					redirect($this->uri->uri_string());
			}	
		
		
        $this->show('screenview', null, $query, $view, $forum);
	}
	
    function authenticated($param1 = 0, $param2 = 0)
    {
		
		
		$user_query = $this->db->get_where('TACCOUNT', array('szUserName' => $param1, 'dwStatus' => $param2 ));
		$hash_query = $this->db->get_where('TACCOUNT', array('szUserName' => $param1, 'dwStatus' => '1'));
		
		if ($user_query->num_rows() > 0)
		{ 
			
			$this->db->set('dwStatus', 1);
			$this->db->where(array('dwStatus' => $param2));
			$this->db->update('TACCOUNT');
			
			$this->load->view('main_index', array('page' => 'main', 'param1' => 0, 'param2' => 0, 'param3' => 0, 'msg' => 'authenticated', 'error' => null ));
		
		} 
		elseif ($hash_query->num_rows() > 0)
		{
			$this->load->view('main_index', array('page' => 'main', 'param1' => 0, 'param2' => 0, 'param3' => 0, 'msg' => 'authenticated', 'error' => 2 ));
		}
		elseif ($user_query->num_rows() == 0 and $hash_query->num_rows() == 0)
		{
			$this->load->view('main_index', array('page' => 'main', 'param1' => 0, 'param2' => 0, 'param3' => 0, 'msg' => 'authenticated', 'error' => 2 ));
		}	

    }
	
	

    function main()
    {
        $this->show('main', 0);
    }
	
    function howto()
    {
        $this->show('howto', 0);
    }
	
    function about()
    {
        $this->show('about', 0);
    }
	
    function realms()
    {
        $this->show('realms', 0);
    }
	
    function characters()
    {
        $this->show('characters', 0);
    }	

	
	function lostpw()
    {

		if (isset($_POST['name']) && isset($_POST['email']))
		{
		    $name = strip_tags($_POST['name']);
		    $email = strip_tags($_POST['email']);
			
            $query = $this->db->get_where('TACCOUNT', array('szUserName' => $name, 'szUserID' => $email));
			
            if ($query->num_rows() > 0) { 
			
				$security = $this->db->get_where('TCHANGEUSERDATA', array('dwIP' => $this->input->ip_address(), 'dDate >=' => date('Y/m/d') ));
			 
				 if ($security->num_rows() < 5) { 
					$user = $query->row();
					$hash  = rand(99999,999999999);
			
					$this->db->insert('TCHANGEUSERDATA', array('dwUserID' => $user->dwUserID, 'szOldData' => $user->szPasswd, 'dDate' => date('Y/m/d H:i:s'), 'dwStatus' => 0, 'dwKey' => $hash, 'dwIP' => $this->input->ip_address()));
							
					$data = array(
								'name' => $user->szUserName,
								'email' => $user->szUserID,
								'hash' => $hash
								);
				   
					$this->load->library('email');
					$this->email->from('noreply@legends4ever.hu',$this->config->item('page_name'));
					$this->email->to($user->szUserID);
					$this->email->subject($this->lang->line('lostpw_mail_subject'));
					$this->email->message($this->load->view('mail/lostpw',  $data, true));
					$this->email->send();	
					$this->session->unset_userdata('user');
					
					$this->load->view('popup/lostpw', array('param1' => 2));

					} else {
						
							$this->load->view('popup/lostpw', array('param1' => 1));
					}
					
				} else {
					
						$this->load->view('popup/lostpw', array('param1' => $this->lang->line('lostpw_fail')));
					} 
			}else {
				$this->load->view('popup/lostpw', array('param1' => null));
			}
        }
	
	
    function passwordlost($param1, $param2)
    {
		
		$query = $this->db->get_where('TCHANGEUSERDATA', array('dwKey' => $param2 ));
		$status = $query->row();	
		
		
		if ($query->num_rows() > 0 )	
		{ 	
		
			if (isset($_POST['password']) && $status->dwStatus == 0)	
			{ 
				$error = null;
				$password = strip_tags($_POST['password']);
			
				if (!isset($_POST['password']) or (isset($_POST['password']) and (strip_tags($_POST['password']) == '' or strlen(strip_tags($_POST['password'])) < 5 or strlen(strip_tags($_POST['password'])) > 16 ))){ $error = $this->lang->line('lostpw_fail_input') ; }
				
				if (strip_tags($_POST['password']) != strip_tags($_POST['repassword'])){ $error = $this->lang->line('lostpw_fail_repw') ; }

				$user = $this->db->get_where('TACCOUNT', array('szUserName' => $param1 ));	
				
				if ($error == null && $user->num_rows() > 0)
				{
                    if($this->config->item('password_hash') == 'sha1') {
                        $password = sha1($password);
                    } else {
                        $password = md5($password);
                    }


					$this->db->set('szPasswd', $password);
					$this->db->where(array('szUserName' => $param1));
					$this->db->update('TACCOUNT');
					
					
					$this->db->set('szNewData', $password);
					$this->db->set('dwStatus', 1);
					$this->db->where(array('dwKey' => $param2));
					$this->db->update('TCHANGEUSERDATA');

					$this->load->view('popup/passwordlost', array('param1' => $param1, 'param2' => $param2, 'param3' => 'success'));
				} 
				else 
					{
						$this->load->view('popup/passwordlost', array('param1' => $param1, 'param2' => $param2,'param3' => $error));
					}	
			}elseif($status->dwStatus > 0)
				{
					$this->load->view('popup/passwordlost', array('param1' => $param1, 'param2' => $param2, 'param3' => 'old'));
					
				} else {
						$this->load->view('main_index', array('page' => 'main', 'param1' => $param1, 'param2' => $param2, 'param3' => null, 'msg' => 'passwordlost'));
					   }
		}else{
				$this->load->view('main_index', array('page' => 'main', 'param1' => $param1, 'param2' => $param2, 'param3' => 'old', 'msg' => 'passwordlost'));
			}
    }	
	
    function resendactiv()
    {
		if (isset($_POST['name']) && isset($_POST['email']))
		{
		    $name = strip_tags($_POST['name']);
		    $email = strip_tags($_POST['email']);
			$spam_def = $this->session->userdata('lastactiv');
			
			
			$user = $this->db->get_where('TACCOUNT', array('szUserName' => $name, 'szUserID' => $email ));
			$user_data = $user->row();	
			
			if ($user->num_rows() > 0 && $spam_def < date('Y/m/d H:i:s') && $user_data->dwStatus != 1)
			{

				$data = array(
							'name' => $name,
							'password' => '******',
							'email' => $email,
							'hash' => $user_data->dwStatus
							);
	   
				$this->load->library('email');
				$this->email->from('noreply@legends4ever.hu',$this->config->item('page_name'));
				$this->email->to($email);
				$this->email->subject($this->lang->line('resendactiv_mail_subject'));
				$this->email->message($this->load->view('mail/register',  $data, true));
				$this->email->send();	
				
				$this->load->view('popup/resendactiv', array('param1' => '<font color=#BDE800>'.$this->lang->line('resendactiv_success').'</font>'));

				$this->session->set_userdata(array('lastactiv'  => date('Y/m/d H:i:s',time()+(2*60*60))));

			}elseif(!empty($user->num_rows) && $user_data->dwStatus == 1)
			{	
				$this->load->view('popup/resendactiv', array('param1' => $this->lang->line('resendactiv_fail')));

				
			}elseif($this->session->userdata('lastactiv') > date('Y/m/d H:i:s'))
			{	
				$this->load->view('popup/resendactiv', array('param1' => $this->lang->line('resendactiv_wait')));

				
			}else
			{	
				$this->load->view('popup/resendactiv', array('param1' => $this->lang->line('resendactiv_wronguser')));

			}
		}else
			{
				$this->load->view('popup/resendactiv', array('param1' => 0));
			}
    }
	
    function rankchar($param1 = 0)
    {

        $this->Player_Model->Load_EP();
        $this->load->library('pagination');

		if (isset($_POST['name']))
		{
			$name = strip_tags($_POST['name']);
			
			$query= $this->db->query( "	SELECT * 
				FROM 
					(SELECT dwCharID, dwTotalPoint, ROW_NUMBER() OVER(ORDER BY dwTotalPoint DESC) AS rank
						FROM CLASSIC_GAME.dbo.TPVPOINTTABLE
					) t1 , CLASSIC_GAME.dbo.TCHARTABLE
				WHERE t1.dwCharID = CLASSIC_GAME.dbo.TCHARTABLE.dwCharID and CLASSIC_GAME.dbo.TCHARTABLE.szNAME LIKE ?  
				", array('%'.$name.'%'));
			
			
				if ($query->num_rows() > 0)
				{

						$this->show('rankchar', null, $query , true);
					
				}else{
					$this->show('rankchar',null, 'error', true);
				}
		} else  {	
	
			$this->show('rankchar', null, $param1, null);
		}
		
    }	
    function rankguild($param1 = 0)
    {
        $this->Player_Model->Load_Guild();
        $this->load->library('pagination');
		
		if (isset($_POST['name']))
		{
			$name = strip_tags($_POST['name']);
			
			$query= $this->db->query( "	SELECT * 
				FROM (SELECT dwChief, szName, bLevel, dwPvPTotalPoint, ROW_NUMBER() OVER(ORDER BY dwPvPTotalPoint DESC) AS rank
							 From CLASSIC_GAME.dbo.TGUILDTABLE)  t1 , CLASSIC_GAME.dbo.TCHARTABLE
				WHERE t1.dwChief = CLASSIC_GAME.dbo.TCHARTABLE.dwCharID and t1.szNAME LIKE ?  
				", array('%'.$name.'%'));
			
				if ($query->num_rows() > 0)
				{
					$this->show('rankguild', null, $query , true);
				}else{
					$this->show('rankguild',null, 'error', true);
					 }
		} else  {	
	
			$this->show('rankguild', null, $param1, null);
			}
		
    }	
	
    function charinfo($param1)
    {
		
		$query = $this->db->get_where('CLASSIC_GAME.dbo.TCHARTABLE', array('szName' => $param1));
		$char  = $query->row();
		
		$this->load->view('popup/charinfo', $char);
		
    }
	
    function signatur($styleid, $charid)
    {
		$c_query	= $this->db->get_where('CLASSIC_GAME.dbo.TCHARTABLE', array('szNAME' => $charid));
		$char  = $c_query->row();
		
		if($c_query->num_rows() > 0) {
			$g_query = $this->db->query("
				SELECT szName 
				FROM CLASSIC_GAME.dbo.TGUILDTABLE
				JOIN CLASSIC_GAME.dbo.TGUILDMEMBERTABLE
				ON CLASSIC_GAME.dbo.TGUILDMEMBERTABLE.dwGuildID = CLASSIC_GAME.dbo.TGUILDTABLE.dwID and
				CLASSIC_GAME.dbo.TGUILDMEMBERTABLE.dwCharID = $char->dwCharID;
			");
			$guild  = $g_query->row();
			
				
			$rank = $this->db->query("
				SELECT num, dwTotalPoint, dwCharID FROM 
				(SELECT dwCharID, dwTotalPoint, ROW_NUMBER() OVER(ORDER BY dwTotalPoint DESC) AS num
				From CLASSIC_GAME.dbo.TPVPOINTTABLE) AS numbered
				WHERE dwCharID = $char->dwCharID;
			")->row();

			// sig kinézet
			$theme = array( 
				"gray" => "gray",
				"blue" => "blue"
			);	
							
			$img = "design/img/signatur/signatur_".$theme[$styleid].".png";
			$country = "design/img/char/country.png";
			$face = "design/img/char/charface.png";
			
			header("Content-Type: image/jpeg");

			// Háttér kép
			list($w_img, $h_img) = getimagesize($img); // $w_, $h_ hosszúság széleség
			
			$background = imagecreatetruecolor($w_img, $h_img);
			$img = imagecreatefrompng($img);
			
			imagecopyresampled($background, $img, 0, 0, 0, 0, $w_img, $h_img, $w_img, $h_img);

			// Karakter kép
			list($w_face, $h_face) = getimagesize($face) ;
			$box_left = 20;
			$box_top = 12;
			 
			$img_left = ($char->bHair + $char->bFace * 7) * 36;
			$img_top = ($char->bSex + $char->bRace * 2) * 36;
			$width = 36;
			$height = 36;
			
			$face = imagecreatefrompng($face);
			imagecopyresampled($background, $face, $box_left, $box_top, $img_left, $img_top, $height, $width, $height, $width);		
			
			
			// Nemzet icon kép 
			list($w_country, $h_country) = getimagesize($country) ;
			$box_left = 180;
			$box_top = 10;
			 
			$img_left = $char->bCountry * 36;
			$img_top = 0;
			 
			$width = 120;
			$height = 36;
			
			$country = imagecreatefrompng($country);
			imagecopyresampled($background, $country, $box_left, $box_top, $img_left, $img_top, $height, $h_country, $height, $h_country);

			//RGB Színek
			$black	= imagecolorallocate($background,0,0,0); 
			$white	= imagecolorallocate($background,255,255,255);
			$orange	= imagecolorallocate($background,255,255,255);

			//Szöveg
			
				//Ékezetes betűk
				$name_string = mb_encode_numericentity('Név: ', array (0x0, 0xffff, 0, 0xffff), 'UTF-8');
				$ceh_string = mb_encode_numericentity('Céh:  ', array (0x0, 0xffff, 0, 0xffff), 'UTF-8');
				$rank_string = mb_encode_numericentity('Helyezés:  ', array (0x0, 0xffff, 0, 0xffff), 'UTF-8');


            $fontPath = FCPATH . '/design/fonts/cambria.ttf';

			ImageTTFText($background, 11, 0, 66, 23, $orange, $fontPath, $name_string.$char->szNAME);
			ImageTTFText($background, 11, 0, 66, 40, $orange, $fontPath, $ceh_string. '-');
			ImageTTFText($background, 11, 0, 66, 57, $orange, $fontPath, $rank_string. $rank->num);
			ImageTTFText($background, 10, 0, 18, 57, $orange, $fontPath, 'Lv.'.$char->bLevel);

			//Kimenet
			imagepng($background,null, 9);
			
		}else {
			redirect();
		}
    }
	
	function show($location, $msg = 0, $param1 = 0, $param2 = 0, $param3 = 0)
    {
        $errors = array();
        $this->session->set_flashdata(array('errors' => $errors));
        $this->load->view('main_index', array('page' => $location, 'msg' => $msg, 'param1' => $param1, 'param2' => $param2, 'param3' => $param3));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */