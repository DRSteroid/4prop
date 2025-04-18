<?php
class dbCheck
{
	public function check()
	{
		$CI =& get_instance();
		$CI->load->dbutil();
		if(!$CI->dbutil->database_exists('YiroGames_4S_Users')) $CI->load->view('maintenance_index.php');
	}
}
?>