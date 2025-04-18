<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {
	
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
		$this->Player_Model->Load_Player($this->session->userdata('dwUserID'));
		
		// Load language
		$this->lang->load('site', $this->config->item('page_lang'));
	}

    function lostpw($hash)
    {
        $query = $this->db->query("
            SELECT *
            FROM TCHANGEUSERDATA
            INNER JOIN TACCOUNT ON (TCHANGEUSERDATA.dwUserID = TACCOUNT.dwUserID)
            WHERE dwKey = ?
        ", array($hash));
		
		if(!empty($query)){
			$data = array(
						'name' => $query->szUserName,
						'email' => $query->szUserID,
						'hash' => $hash
						);
									
			$this->load->view('mail/lostpw',  $data);
		}else{redirect('', 'refresh');}
	}

    function newpw($hash)
    {
        $query = $this->db->query("
            SELECT *
            FROM TCHANGEUSERDATA
            INNER JOIN TACCOUNT ON (TCHANGEUSERDATA.dwUserID = TACCOUNT.dwUserID)
            WHERE dwKey = ?
        ", array($hash));
		
		if(!empty($query)){
			$data = array(
						'name' => $query->szUserName,
						'email' => $query->szUserID,
						'hash' => $hash
						);
									
			$this->load->view('mail/passwordchange',  $data);
		}else{redirect('', 'refresh');}
	}

    function register($hash)
    {	
		$query = $this->db->query( "
			SELECT * FROM TACCOUNT WHERE dwStatus = ?
		", array($hash))->row();
		
		if(!empty($query)){
				$data = array(
							'name' => $query->szUserName,
							'password' => '******',
							'email' => $query->szUserID,
							'hash' => $hash
							);
									
			$this->load->view('mail/register',  $data);
		}else{redirect('', 'refresh');}
	}
	
    function resendactiv($hash)
    {
        $query = $this->db->query( "
			SELECT * FROM TACCOUNT WHERE dwStatus = ?
		", array($hash))->row();
		
		if(!empty($query)){
				$data = array(
							'name' => $query->szUserName,
							'password' => '******',
							'email' => $query->szUserID,
							'hash' => $hash
							);
									
			$this->load->view('mail/register',  $data);
		}else{redirect('', 'refresh');}
	}
	
	function show($location, $param1 = 0, $param2 = 0, $param3 = 0)
    {
        $this->load->view('mail/'.$location, array('param1' => $param1, 'param2' => $param2, 'param3' => $param3));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */