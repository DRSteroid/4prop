<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<title><?=$this->config->item('page_name')?> | Classic4Ever</title>
	<link href="/design/css/payment.css" rel="stylesheet">

	<link type="image/x-icon" href="/favicon.ico" rel="shortcut icon">
</head>
	
	<body class="twoColFixLtHdr" scroll="no">
	  <div id="container">
		<div id="header">
		<div class="logo">Prémium Kereskedő</div>
				<div class="boxSigns">
					<span class="heading">BónuszPont (BP):</span>
					<span class="marksValue"><?=$this->Player_Model->user->dwBonus?></span>
				</div>
				<div class="boxCoins">
					<span class="heading">Holdkő (HK):</span>
					<span class="coinsValue"><?=$this->Player_Model->user->dwCash?></span>					
					<a href="/shop" class="purchaseButton" title="">TárgyPiac</a>
				</div>
			</div>

			<ul id="breadcrumb">
				<li class="w"><a href="/payment">Főoldal</a>&nbsp;<span class="wer">&#187;</span></li>
				<li class="d" style="display:none;"><a id="dex" href=""></a>&nbsp;&#187;</li>
				<li class="last"><span id="name_page_cat"><?=$this->Data_Model->payment_category($page)?></span></li>
			</ul>
			<div id="sidebar1">

				<ul id="mainMenu">
					<!--<li><a href="<?=$this->config->item('base_url')?>payment/bank" class="transfer"></a></li>-->
					<!--<li><a href="<?=$this->config->item('base_url')?>payment/sms" class="sms"></a></li>-->
					<li><a href="<?=$this->config->item('base_url')?>payment/paypal" class="paypal"></a></li>
					<!--<li><a href="<?=$this->config->item('base_url')?>payment/paysafecard" class="paysafecard"></a></li>-->
					<!--<li><a href="<?=$this->config->item('base_url')?>payment/bitcoin" class="bitcoin"></a></li>-->
					<!--<li><a href="<?=$this->config->item('base_url')?>payment/cupon" class="cupon"></a></li>-->
				</ul>
			</div>
			<div id="mainContent" class="poi">
				<h1 id="vaio"><?=$this->Data_Model->payment_category($page)?></h1>
				<div style="position:relative" class="dynContent">
						<?=$this->View_Model->show_payment($page, $param1, $param2, $param3)?>
			</div></div>			
			<div class="endContent"></div>
	</div>
</body></html>	
	
	
	
