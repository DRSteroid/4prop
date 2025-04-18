<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {
	
	/**
	 * Construct function
	 */
	public function __construct()
	{
	    parent::__construct();

		$this->load->model('Player_Model');
        if (!$this->session->userdata('dwUserID'))
        {
			//if($this->router->fetch_method()!='ipn'&&$this->router->fetch_method()!='ipn2')
			//	$this->Player_Model->Error('');
        }
        else
        {
			$this->Player_Model->Load_UserData($this->session->userdata('dwUserID'));
			$this->Player_Model->Load_Shop();
			$this->load->model('View_Model');
        }	
		
		// Load language
		$this->lang->load('site', $this->config->item('page_lang'));
	}

    public function index()
    {
	$query = $this->db->query("select top 1 * from TShopItem where dwAkcio > 0")->row();
	$date=date_create($query->bEventDate);

		if(  date("Y-m-d h:i:sa") > date_format($date,"Y-m-d H:i:s")){
			// delete sale items		
			$query = $this->db->query("UPDATE TShopItem set dwAkcio = 0, bEventDate = '1900-01-01 00:00:00'");
			
			// update sale items
			$query = $this->db->query("UPDATE TShopItem SET dwAkcio = ROUND( 50 *RAND(convert(varbinary, newid())), 0), bEventDate = DATEADD(DAY, 7, getdate())
				WHERE wID IN( SELECT TOP 7 wID FROM TShopItem where bCategory != 6 and bCategory != 11 and wItemID != 6667 and wItemID != 6668 and dwMoney > 0 ORDER BY NEWID() ) ");
				
		}

		$this->show('main');
    }
	
	function category($id)
    {
		$this->show('items',$id);
    }
	
	function ajax($item)
    {
		$query = $this->db->get_where('TShopItem', array('wID' => $item));
		if (!empty($query) && $query->num_rows() > 0) {
			$info = $query->row();
		}else{
			$info = array ('error' => true) ;
		}
		$this->load->view('shop/ajax', $info);
	}
	
	function buy($item, $count_price = null)
    {
		
		$query = $this->db->get_where('TShopItem', array('wID' => $item));
		
		if(!empty($query) && $query->num_rows() > 0){
			
			$item = $query->row();

			$item_count = (!empty($count_price)) ? $count_price / $item->dwMoney * $item->bCount: $item->bCount ;
			
			
			$sale_price = $item->dwMoney * ($item->dwAkcio / 100) ;
			
			if($item->dwAkcio > 0){
				$price = floor($item->dwMoney - $sale_price);
			}else {
				$price = (!empty($count_price)) ? $count_price : $item->dwMoney ;
			}
			
			$bonus = $item->dwBonus ;
			
			if(($this->Player_Model->user->dwCash >= $price && $item->dwBonus == 0) || ($this->Player_Model->user->dwBonus >= $bonus && $item->dwMoney == 0) && $query->num_rows() > 0  ){
				
				//insert buy item
				  $this->db->insert(
							'TCASHITEMCABINETTABLE',
								array(
									'dwUserID'		=> $this->Player_Model->user->dwUserID,
									'wItemID'		=> $item->wItemID,
									'bLevel'		=> 0,
									'bCount'		=> $item_count,
									'bGLevel'		=> 0,
									'dwDuraMax'		=> $item->dwDuraMax,
									'dwDuraCur'		=> $item->dwDuraCur,
									'bRefineCur'	=> 0,
									'dEndTime'		=> '1900-01-01 00:00:00',
									'bGradeEffect'	=> 0,
									'bMagic1'		=> 0,
									'bMagic2'		=> 0,
									'bMagic3'		=> 0,
									'bMagic4'		=> 0,
									'bMagic5'		=> 0,
									'bMagic6'		=> 0,
									'wValue1'		=> 0,
									'wValue2'		=> 0,
									'wValue3'		=> 0,
									'wValue4'		=> 0,
									'wValue5'		=> 0,
									'wValue6'		=> 0,
									'dwTime1'		=> 0,
									'dwTime2'		=> 0,
									'dwTime3'		=> 0,
									'dwTime4'		=> 0,
									'dwTime5'		=> 0,
									'dwTime6'		=> 0,
									'bGem'			=> 0,
									'wMoggItemID'	=> 0
				  ));
				  
				 //log buy item 
				  $this->db->insert(
							'TShopLog',
								array(
									'dwUserID'		=> $this->Player_Model->user->dwUserID,
									'szUserName'	=> $this->Player_Model->user->szUserName,
									'dwCash'		=> $price,
									'dwBonus'		=> $bonus,
									'wItemID'		=> $item->wItemID,
									'bLevel'		=> 0,
									'bCount'		=> $item_count,
									'bGLevel'		=> 0,
									'dwDuraMax'		=> $item->dwDuraMax,
									'dwDuraCur'		=> $item->dwDuraCur,
									'bRefineCur'	=> 0,
									'dEndTime'		=> 0,
									'bGradeEffect'	=> 0,
									'bMagic1'		=> 0,
									'bMagic2'		=> 0,
									'bMagic3'		=> 0,
									'bMagic4'		=> 0,
									'bMagic5'		=> 0,
									'bMagic6'		=> 0,
									'wValue1'		=> 0,
									'wValue2'		=> 0,
									'wValue3'		=> 0,
									'wValue4'		=> 0,
									'wValue5'		=> 0,
									'wValue6'		=> 0,
									'dwTime1'		=> 0,
									'dwTime2'		=> 0,
									'dwTime3'		=> 0,
									'dwTime4'		=> 0,
									'dwTime5'		=> 0,
									'dwTime6'		=> 0,
									'dwDate'			=> date("Y-m-d h:i:sa"),
									'dwServer'			=> 'PVP',
									'Country'			=> 'hu'
				  ));
				
				
				// update cash
				$this->db->set('dwCash', $this->Player_Model->user->dwCash - $price);
				$this->db->set('dwBonus', $this->Player_Model->user->dwBonus - $bonus);
				$this->db->where(array('dwUserID' => $this->Player_Model->user->dwUserID));
				$this->db->update('TACCOUNT');
				
				$this->load->view('shop/buy', array('error' => null, 'data' => $query->row() ));

			}else{
				$this->load->view('shop/buy', array('error' => 'error', 'data' => $query->row() ));
			}
		}else{
			$this->load->view('shop/buy', array('error' => 'error'));
		}
	}
	
	function itemselect()
    {
		$i = $this->db->get('TWELL_ITEMLIST')->result_array();
		
		$price = $this->config->item('wheel_price');

		$cc = count($i);
		$dd = array();

		for($ee=0;$ee<$cc;$ee++)
		{
			$dd[] = array($i[$ee]['iconid'], $i[$ee]['itemid'], $i[$ee]['count'], $i[$ee]['rate'], $i[$ee]['item_name'], $i[$ee]['item_info']);
		}

		$ff = count($i)-1;
		$gg = array();
		$hh = array();
		for($ii=0;$ii<16;$ii++)
		{
		  $jj = 1;
		  $kk = 0;
		  while($jj > $kk)
		  {
			$ll = rand(0,$ff);
			while(in_array($ll,$gg))
			{
			  $ll = rand(0,$ff);
			}
			$kk = 18*$dd[$ll][3];
			$jj = rand(0,100);
		  }
		  $gg[$ii] = $ll;
		  $hh[] = $dd[$gg[$ii]];
		}

		$coins = $this->Player_Model->user->dwCash ;
		if($coins >= $price)
		{

		  $hh[] = rand(0,15);
		  $pp = $hh[$hh[16]];

		// $pp[0] icon id || $pp[1] item id || $pp[2] item count || $pp[3] drop rate || $pp[4] item name
		  $this->db->insert(
					'TCASHITEMCABINETTABLE',
						array(
							'dwUserID'		=> $this->Player_Model->user->dwUserID,
							'wItemID'		=> $pp[0],
							'bLevel'		=> 0,
							'bCount'		=> $pp[2],
							'bGLevel'		=> 0,
							'dwDuraMax'		=> 0,
							'dwDuraCur'		=> 0,
							'bRefineCur'	=> 0,
							'dEndTime'		=> 0,
							'bGradeEffect'	=> 0,
							'bMagic1'		=> 0,
							'bMagic2'		=> 0,
							'bMagic3'		=> 0,
							'bMagic4'		=> 0,
							'bMagic5'		=> 0,
							'bMagic6'		=> 0,
							'wValue1'		=> 0,
							'wValue2'		=> 0,
							'wValue3'		=> 0,
							'wValue4'		=> 0,
							'wValue5'		=> 0,
							'wValue6'		=> 0,
							'dwTime1'		=> 0,
							'dwTime2'		=> 0,
							'dwTime3'		=> 0,
							'dwTime4'		=> 0,
							'dwTime5'		=> 0,
							'dwTime6'		=> 0,
							'bGem'			=> 0,
							'wMoggItemID'	=> 0
		  ));
		  
		  // LOG
		  $this->db->insert(
					'TWELL_LOG',
						array(
							'dwUserID'		=> $this->Player_Model->user->dwUserID,
							'szUserName'	=> $this->Player_Model->user->szUserName,
							'wItemID'		=> $pp[0],
							'bLevel'		=> 0,
							'bCount'		=> $pp[2],
							'bGLevel'		=> 0,
							'dwDuraMax'		=> 0,
							'dwDuraCur'		=> 0,
							'bRefineCur'	=> 0,
							'dEndTime'		=> 0,
							'bGradeEffect'	=> 0,
							'bMagic1'		=> 0,
							'bMagic2'		=> 0,
							'bMagic3'		=> 0,
							'bMagic4'		=> 0,
							'bMagic5'		=> 0,
							'bMagic6'		=> 0,
							'wValue1'		=> 0,
							'wValue2'		=> 0,
							'wValue3'		=> 0,
							'wValue4'		=> 0,
							'wValue5'		=> 0,
							'wValue6'		=> 0,
							'dwTime1'		=> 0,
							'dwTime2'		=> 0,
							'dwTime3'		=> 0,
							'dwTime4'		=> 0,
							'dwTime5'		=> 0,
							'dwTime6'		=> 0,
							'dwDate'			=> date("Y-m-d h:i:sa"),
							'dwServer'			=> 'PVP',
							'Country'			=> 'hu'
		  ));
		  
		  $this->db->set('dwCash', $this->Player_Model->user->dwCash - $price);
		  $this->db->where(array('dwUserID' => $this->Player_Model->user->dwUserID));
		  $this->db->update('TACCOUNT');
		  }
		else
		{
		  $hh[] = -1;
		}
		
		echo json_encode($hh);

    }
	
	function loader($type)
    {
	//	if($type == $this->config->item('cash_prefix')){
			echo $this->Player_Model->user->dwCash;
	//	}
    }	
	
	function wheel()
    {
		$this->show('wheel');
    }

	function ingame($param1)
    {
		$this->session->set_userdata(array('dwUserID' => $param1));
		redirect($this->config->item('base_url').'shop', 'refresh');
    }
	
	function show($location, $param1 = 0, $param2 = 0, $param3 = 0)
    {
        $this->load->view('shop_index', array('page' => $location, 'param1' => $param1, 'param2' => $param2, 'param3' => $param3));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */