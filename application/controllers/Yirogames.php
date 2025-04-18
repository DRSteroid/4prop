<?php
class Yirogames extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
		

		$this->load->model('View_Model');
		

	}
	
   public function index()
    {
		
		$db = $this->load->database('admindb', TRUE);
	
		$news = $db->query("SELECT news FROM mmonetbar_news where country = 'HU' ");
		
		$category = $db->query("SELECT distinct category FROM mmonetbar_games where country = 'HU' order by weight ");
		$game = $db->get_where('mmonetbar_games', array('country' => 'HU'));

        $this->load->view('mmobar/moregames',array('game' => $game, 'category' => $category, 'news' => $news->row() ));
    }
	

}