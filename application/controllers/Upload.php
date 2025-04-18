<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->load->helper(array('form', 'url'));
		
		$this->load->model('Player_Model');
		$this->load->model('View_Model');
		$this->Player_Model->Load_UserData($this->session->userdata('dwUserID'));
		$this->Player_Model->Load_Player($this->session->userdata('dwUserID'));
	}

	function index()
	{
		//$this->load->view('upload_form', array('error' => ' ' ));
		redirect('/main/screenshots', 'refresh');
	}

	function galery()
	{
		$config['upload_path'] = 'design/img/screenshots/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
	//	$config['max_width']  = '1024';
	//	$config['max_height']  = '768';
		$db = $this->load->database('admindb', TRUE);
		$server = $this->config->item('page_prefix');
		
		$this->load->library('upload', $config);
		
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('popup/galery', $error);
			}
			else
			{
				$note = strip_tags($_POST['note']);	
				$tag = strip_tags($_POST['tag']);	
				
				$data = array('upload_data' => $this->upload->data());

				$this->load->view('popup/galery', $data);
				
				$db->insert('game_galerys', array('user_id' => $this->Player_Model->user->dwUserID, 'user' => $this->Player_Model->user->szUserName, 'img' => $data['upload_data']['file_name'], 'note' => $note, 'tag' => $tag, 'date' => date('Y/m/d H:i:s'),  'game_server' => $server));
				
				$query = $db->get_where('game_galerys', array('user_id' => $this->Player_Model->user->dwUserID, 'img' => $data['upload_data']['file_name'], 'game_server' => $server, 'user' => $this->Player_Model->user->szUserName, 'note' => $note))->row();

				 redirect('/main/screenview/'.$query->id, 'refresh');
			}

		
		
	}
	
	
	
}
?>