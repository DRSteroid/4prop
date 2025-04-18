<?php
class View_Model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function show_main($location = 'main', $param1, $param2, $param3)
    {
       	switch($location) {
            case 'main':
            case 'howto':
            case 'about':
            case 'realms':
            case 'characters':
			case 'rankchar':
			case 'rankguild':
			case 'login':
			case 'lostpw':
			case 'screenshots':
			case 'screenview':
			case 'download':
				$this->load->view('main/'.$location);
			break;
			
			default: $this->load->view('main/null'); break;
		}
    } 

    function show_user($location = 'administration', $param1, $param2, $param3)
    {
       	switch($location) {
			case 'administration':
			case 'emailchange':
			case 'emailchangeaccept':
			case 'emailchangecancel':
			case 'passwordchange':
			case 'payment':
			case 'friend':
			case 'galery':
			    $this->load->view('user/'.$location);
			break;	
			
			default: $this->load->view('main/null'); break;
		}
    } 

    function show_main_box($box)
    {
       	switch($box) {
            case 'header':
                $this->load->view('main_box/'.$box);
		}
    } 

    function show_mmo($location = 'main')
    {
       	switch($location) {
            case 'main':
            case 'moregames':
                $this->load->view('mmobar/'.$location);
		}
    } 
	
    function show_popup($location)
    {
       	switch($location) {
            case 'authenticated':
			case 'passwordlost':
			case 'login':
			case 'register':
			case 'system_msg':
			case 'friend':
			case 'passwordchange':
			case 'emailchange':
			case 'emailchangeaccept':
			case 'emailchangecancel':
                $this->load->view('popup/'.$location);
		}
    } 
	
    function show_shop($location, $param1, $param2, $param3)
    {
       	switch($location) {
            case 'items':
            case 'buy':
			case 'category':
			case 'ajax':
			case 'itemselect':
			case 'wheel':
            case 'main':
			case 'sms':
			case 'bank':
			case 'paypal':
			case 'cupon':
			    $this->load->view('shop/'.$location);
		}
    } 
	
    function show_payment($location, $param1, $param2, $param3)
    {
       	switch($location) {
            case 'main':
			case 'sms':
			case 'bank':
			case 'paypal':
			case 'cupon':
			case 'process':
			case 'paysafecard':
			case 'bitcoin':
			    $this->load->view('payment/'.$location);
		}
    } 

}

/* End of file view_model.php */
/* Location: ./system/application/models/view_model.php */
