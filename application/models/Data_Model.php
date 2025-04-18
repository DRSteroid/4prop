<?php
class Data_Model extends CI_Model
{

    public $temp_user_db, $temp_ban_db, $temp_login_db, $temp_player_db, $temp_premium_db;
	
	function __construct()
    {

    }

    function Load_Player($id = 0)
    {
		if (!isset($temp_player_db[$id]))
		{
                $query = $this->db->get_where('CLASSIC_GAME.dbo.TCHARTABLE', array('dwUserID' => $id, 'bDelete' => 0))->result_array();
                $this->temp_player_db[$id] = $query;
        }
    }

	
	function Load_UserBAN($id = 0)
    {
        if ($id > 0)
		{
		    if (!isset($temp_ban_db[$id]))
			{

				$query = $this->db->get_where('TUSERPROTECTED', array('dwUserID' => $id));
                $return = $query->row();
                $this->temp_ban_db[$id] = $return;
				
            }
		}
    }
	
	function Load_UserLogin($id = 0)
    {
        if ($id > 0)
		{
		    if (!isset($temp_login_db[$id]))
			{
                 $query = $this->db->get_where('USERIPLOG', array('dwUserID' => $id));
				 
				 
                $return = $query->row();
                $this->temp_login_db[$id] = $return;
            }
		}
    }

	// Price / Coins (mysql)
	function Load_Premium($id)
    {
				$db = $this->load->database('admindb', TRUE);
				$query = $db->get_where('premium2', array('server' => $id));
				$return = $query->result_array();
				$this->temp_premium_db[$id] = $return;    
    }
	
    /**
	*Payment category name
     */
    function payment_category($page)
    {
        switch($page)
        {
            case 'sms': return $this->lang->line('payment_sms'); break;
            case 'bank': return $this->lang->line('payment_bank'); break;
            case 'paypal': return $this->lang->line('payment_paypal'); break;
            case 'cupon': return $this->lang->line('payment_cupon'); break;
			case 'process': return $this->lang->line('payment_process'); break;
			case 'paysafecard': return $this->lang->line('payment_psc'); break;
            default: return $this->lang->line('payment_main'); break;
        }
    }
	
    /**
	*Rank list
     */
    function rank_chartype($type)
    {
        switch($type)
        {
            case 0: return "Warrior";
            case 1: return "Night Walker";
            case 2: return "Archer";
            case 3: return "Magician";
            case 4: return "Priest";
            case 5: return "Evocator";
        }
    } 	
	
    /**
	*Char country
     */
    function char_country($type)
    {
        switch($type)
        {
            case 0: return "Valorian";
            case 1: return "Derion";
            case 2: return "Gor";
            case 3: return "Gor";
        }
    } 	
	
    /**
	*Item effect
     */
    function item_effect($type)
    {
        switch($type)
        {
            case 0: return "Nincs";
            case 1: return "Óceán";
            case 2: return "Tűz";
            case 3: return "Villám";
            case 4: return "Jég";
            case 5: return "Méreg";
            case 6: return "Ametiszt";
            case 7: return "Égkék";
            case 8: return "Erdő zöld";
            case 9: return "Láva";
        }
    } 	
	
    /**
	*Item Bonus name
     */
    function item_bonusname($type)
    {
        switch($type)
        {
            case 0: return "Nincs";			
            case 1: return "Erő";
            case 2: return "Ügyesség";
            case 3: return "Kitartás";
            case 4: return "Intelligencia";
            case 5: return "Bölcsesség";
            case 6: return "Akarat";
            case 11: return "Találati esély";
            case 12: return "Kitérés";
            case 13: return "Kritikus ütés";
			case 20: return "Varázserő";
            case 21: return "Kritikus mágikus ütés";
            case 34: return "Pajzsvédelmi érték";
            case 50: return "HP";
            case 51: return "HP";
			case 54: return "Támadási sebesség";
            case 55: return "Távharc támadási sebesség";
            case 56: return "Mágikus sebesség";
            case 86: return "Mágikus támadás";
            case 87: return "Mágikus védekezés";
        }
    }   
	
	
	
}

/* End of file data_model.php */
/* Location: ./system/application/models/data_model.php */