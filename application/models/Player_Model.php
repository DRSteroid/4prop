<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Player_Model extends CI_Model {

	/**
	 * We must start all array and object of all game
	 */
	public $user, $banuser, $player, $cuntry, $prem;
	
	/**
	 * Construct function
	 */
	public function __construct()
	{
	    parent::__construct();
		
	}
	
	/**
	 * Loading all item of player..
	 */
	
	public function Load_UserData($id = 0)
	{
	    if($id > 0)
		{
			// select tacc, tref, 
			$query= $this->db->query( "	
				SELECT *, TACCOUNT.dwUserID
					FROM 
						(SELECT count(TREFERALTABLE.dwUserID) as ref_count
							FROM TREFERALTABLE WHERE TREFERALTABLE.dwUserID = $id
						) t1 , TACCOUNT 
					WHERE  TACCOUNT.dwUserID = $id
				");		
				
			$this->user = $query->row();

			// cuntry info
			$query2 = $this->db->query( "	
				SELECT  *
					FROM TGLOBAL_GSP.dbo.TALLCHARTABLE
					WHERE dwUserID = $id and bCountry < 2
				");	
			$this->cuntry = $query2->row();
			
			
			

		    // bann info
		//	$this->Data_Model->Load_UserBAN($id);
		//	$this->banuser =& $this->Data_Model->temp_ban_db[$id];
			
		}
    }	
	
	public function Load_Player($id = 0)
	{
	    if($id > 0)
		{
		    // Player data
			$this->Data_Model->Load_Player($id);
			$this->player = $this->Data_Model->temp_player_db[$id];
		}
    }
	
	function Load_Shop()
    {
		
        $this->shop = array();
			$query = $this->db->query("SELECT * FROM TShopCategory where bActive = 1  ORDER BY sorrend ASC;");
		/*	$query = $this->db->query("
					SELECT *, (t1.szName) as catname
					FROM  TShopCategory t1
					INNER JOIN TShopItem t2 on t1.bID = t2.bCategory
					where t1.bActive = 1  ORDER BY t1.sorrend ASC
			");
		*/	
            if ($query->num_rows() > 0)
                foreach ($query->result_array() as $row)
                    $this->shop[] = $row;
					
    }	
	
	// Login function
	public function User_Login()
    {
        if (isset($_POST['name']) && isset($_POST['password']))
        {
            if($this->config->item('password_hash') == 'sha1') {
                $password = sha1($_POST['password']);
            } else {
                $password = md5($_POST['password']);
            }


           $query = $this->db->get_where('TACCOUNT', array('szUserID' => $_POST['name'], 'szPasswd' => $password));
            if ($query->num_rows() > 0)
            {
                $user = $query->row();
				
				/* Belépés előtti email státusz ellenörzés
					
				if ($user->dwStatus == 1 )
				{
					$this->session->set_userdata(array('dwUserID' => $user->dwUserID, 'szUserID' => $_POST['name'], 'szPasswd' => md5($_POST['password'])));
					
					
					
					redirect($this->config->item('base_url').'user/administration', 'refresh');
				//	$this->load->view('main_index', array('page' => 'main', 'param1' => 0, 'param2' => 0, 'param3' => 0, 'msg' => 'login', 'error' => 'succes' ));
					
				}else  if ($this->config->item('reg_mail') == FALSE ){
					$this->session->set_userdata(array('dwUserID' => $user->dwUserID, 'szUserID' => $_POST['name'], 'szPasswd' => md5($_POST['password'])));
					redirect($this->config->item('base_url').'user/administration', 'refresh');
				} else {
					
					
			//		$this->load->view('main_index', array('page' => 'login', 'param1' => 0, 'param2' => 0, 'param3' => 0, 'error' => 1000 ));
					
					$this->load->view('main_index', array('page' => 'main', 'param1' => 0, 'param2' => 0, 'param3' => 0, 'msg' => 'login', 'error' => 'login' ));

				}
				*/

                if($this->config->item('password_hash') == 'sha1') {
                    $password = sha1($_POST['password']);
                } else {
                    $password = md5($_POST['password']);
                }
				
				$this->session->set_userdata(array('dwUserID' => $user->dwUserID, 'szUserID' => $_POST['name'], 'szPasswd' => $password));
				redirect($this->config->item('base_url').'user/administration', 'refresh');
            }
            else
            {
				//$this->load->view('main_index', array('page' => 'login', 'param1' => 0, 'param2' => 0, 'param3' => 0, 'error' => 1 ));
					$this->load->view('main_index', array('page' => 'main', 'param1' => 0, 'param2' => 0, 'param3' => 0, 'msg' => 'login', 'error' => 1 ));
            }
        }else {
			$this->load->view('main_index', array('page' => 'main', 'param1' => 0, 'param2' => 0, 'param3' => 0, 'msg' => 'login', 'error' => null ));
		}
    }

	function Load_Guild()
    {
        $this->guild = array();

		$query = $this->db->query("SELECT * FROM CLASSIC_GAME.dbo.TGUILDTABLE ORDER BY dwPvPTotalPoint DESC");
							
            if ($query->num_rows() > 0)
                foreach ($query->result() as $row)
                    $this->guild[] = $row;
    }
	
	function Load_EP()
    {
        $this->ep = array();
	
		$query = $this->db->query("SELECT * FROM CLASSIC_GAME.dbo.TPVPOINTTABLE ORDER BY dwUseablePoint DESC");
							
            if ($query->num_rows() > 0)
                foreach ($query->result() as $row)
                    $this->ep[] = $row;
    }
	
	function Load_IMG()
    {
        $this->img = array();
		$db = $this->load->database('admindb', TRUE);
		$server = $this->config->item('page_prefix');
		
		$query = $db->query("SELECT * FROM game_galerys where game_server = '$server'");
							
            if ($query->num_rows() > 0)
                foreach ($query->result() as $row)
                    $this->img[] = $row;
    }
	
	function Load_Char()
    {
        $this->ep = array();

		$query = $this->db->query("SELECT * FROM CLASSIC_GAME.dbo.TPVPOINTTABLE ORDER BY dwUseablePoint DESC");
							
            if ($query->num_rows() > 0)
                foreach ($query->result() as $row)
                    $this->ep[] = $row;
    }	
	
	// Price / Coins (mysql)
	function Load_Premium()
    {
		$db = $this->load->database('admindb', TRUE);
		$prefix = $this->config->item('page_prefix2');
		$query = $db->query("SELECT * FROM premium2 WHERE server = '$prefix' ")->row();
		$this->prem = $query;
    }
	
	function Error($error = '')
    {
        $this->session->set_flashdata(array('error' => $error));
        redirect($this->config->item('base_url').'main/error/', 'refresh');
    }
}
