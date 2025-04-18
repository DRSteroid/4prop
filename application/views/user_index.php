<!DOCTYPE html>
<html lang="hu">
<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<title><?=$this->config->item('page_name')?> | Classic4Ever</title>
<meta content="ingyen 4Story, ingyen goa, ingyen gates of andaron, mmorpg, free mmorpg, ingyen mmorpg, 4story fantasy, 4story4ever,gates of anadrom, 4story4ever, ingyen wow,ingyen world of warkraft,4story privát szerver,4story private, goa, 4s,gates of andaron privát szerver, magyar 4story privát szerver, online játék, ingyenes online játék, online mmorpg" name="Keywords">
<meta content="Üdvözöllek 4Story4Ever ingyenes, magyar nyelvű, játék szerverén! Teljesen ingyen regisztrálhatsz, töltheted le és játszhatod a játékot.Vár rád egy új világ,rengeteg kalandal, akcíóval, kihívással.Szállj szembe mágikus szörnyekkel,ellenséges birodalom dicső hőseivel és Légy a legjobb ebben a fantasy világban." name="description">


<link href="<?php echo base_url();?>design/css/default.css" rel="stylesheet">
<link href="<?php echo base_url();?>design/css/user.css" rel="stylesheet">

<?
//husvét design
/*if(date("m.d") >= date('m.d', strtotime("-7 day", strtotime(date("d.m.y", easter_date(date("Y")))))) && date("m.d") <= date('m.d', strtotime("+1 day", strtotime(date("d.m.y", easter_date(date("Y"))))))){	
	echo '<link href="'.$this->config->item('base_url').'design/css/event/easter.css" rel="stylesheet">';
}*/
// karácsonyi havazás
if(date("Y-m-d") > date("Y-12-01") && date("Y-m-d") < date("Y-02-28",strtotime("+1 years"))){
	echo '<script src="'.$this->config->item('base_url').'design/js/snowstorm.js"></script>';
}
//karácsonyi design
if(date("m.d") > date("12.22") && date("m.d") <= date("12.31")){
	echo '<link href="'.$this->config->item('base_url').'design/css/event/christmas.css" rel="stylesheet">';
}
//halloween design
if(date("m.d") >= date("10.24") && date("m.d") <= date("10.31")){	
		echo '<link href="'.$this->config->item('base_url').'design/css/event/halloween.css" rel="stylesheet">';
}
?>
<script src="<?php echo base_url();?>design/js/countdown.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>design/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('.divItem:first').removeClass('close');
    });

    function switchItem(id) {
        $('#new' + id).toggleClass('close');
    }
</script>
</head>
<body class="hu">
<div class="bg<?=rand(1,3)?>"></div>

<?if ( !empty($msg) ){?>

<div style="display: block;" id="popup-overlay"></div>
<div style="display: block; top: 275px;" id="popup-box">
<div style="display: none;" id="popup-title">
<a style="display: block;" class="popup-close"></a>
<span style="display: none;"></span>
</div>
<div id="popup-contents">
<?=$this->View_Model->show_popup($msg)?>

</div>
<div style="display: none;" id="popup-button-div">
<a href="#" class="popup-close"></a>
</div>
</div>

<?}else{?>
<div id="popup-overlay"></div>
<div id="popup-box">
<div id="popup-title">
<a class="popup-close"></a>
<span></span>
</div>
<div id="popup-contents"></div>
<div id="popup-button-div">
<a href="#" class="popup-close"></a>
</div>
</div>
<?}?>
	<nav style="margin-top: 0px;">
		<div class="middle">
			<ul>
			
				<li><a class="home" href="/">FŐOLDAL</a></li>
				<li>
				<a class="rank" href="/main/rankchar">RANGLISTA</a>
					<ul>
					<li><a href="/main/rankchar">Becsület</a></li>
					<li><a href="/main/rankguild">Céh lista</a></li>
					</ul>
				</li>
				<li><a class="dl popup-open" data-popup-titlebar="false" href="/main/download">LETÖLTÉSEK</a></li>

				
				
				<!-- <div class="download"><a href="/"></a></div> -->
			</ul>
			
			<span class="logo"></span>
		</div>
	
	</nav>

	<div class="main">

		<div class="middle">
			
				<aside>
				
				<? if (!$this->session->userdata('dwUserID'))  {?>
					<div class="playWrap">
						<a href="/main/register" data-popup-titlebar="false" id="play" class="popup-open"></a>
					</div>
				<?}else{?>
					<div class="shopWrap">
						<a href="/user/shop" id="shop" data-popup-titlebar="false" class="popup-open"></a>
					</div>				
				<?}?>	
					

					<div id="endrightBox"></div>
				<?php
				$min=date("Y-m-d 00:00:00",strtotime('-1 day'));
				$max=date("Y-m-d 23:59:59",strtotime('-1 day'));
					
				$this->db->select_sum('dwPoint');
				$this->db->select('dwCharID');		
				$this->db->group_by("dwCharID");
                $this->db->where('dlDate >=', $min);
                $this->db->where('dlDate <=', $max);
				
				$query1 = $this->db->get('CLASSIC_GAME.dbo.TPVPRECENTTABLE' );
				$asd	= $query1->row();
				
				if($query1->num_rows > 0){
					$query	= $this->db->get_where('CLASSIC_GAME.dbo.TCHARTABLE', array('dwCharID' => $asd->dwCharID));
					$char	= $query->row();
					$nem	= ($char->bSex + $char->bRace * 2) * -36;
					$arc	= ($char->bHair + $char->bFace * 7) * -36;
					
				?>
								

	<div id="rightBox">
			<div class="daily_best">A nap bajnoka:
				<div class="bgline"></div>
			</div>
			

<ul class="userExamples">
		<div class="userrow clearfix">
			<div class="face" style="background-position: <?=$nem?>px <?=$arc?>px"></div>
			<div class="name">Név: <a href="#" title="" ><a href="<?=$this->config->item('base_url')?>main/charinfo/<?=$char->szNAME?>" data-popup-titlebar="false" class="userbox-link popup-open"><?=$char->szNAME?></a>
</a> Lv. <?=$char->bLevel?>  </div>	
			<div class="text">Eredmény pont: <?=$asd->dwPoint?></div>
	</div>	
</ul>
			

</div>
		<?}?>	
	<div id="endrightBox"></div>

	
		
<div id="endrightBox"></div>
	<div id="rightBox" class="">
				
		<div class="loginBefore">
			<h4 class="title">
				<span class="game"></span>
				<span class="text">Felhasználó menü</span>
				<div class="event"></div>
				<div class="bgline"></div>
			</h4>

			<div class="menu">
			
				<a href="/user/administration">Főoldal</a><br>
				
				<a href="<?=$this->config->item('base_url')?>user/sendnewpw" data-popup-titlebar="false" class="popup-open">Új Jelszó</a>
				<a href="<?=$this->config->item('base_url')?>user/emailchange" data-popup-titlebar="false" class="popup-open">Email csere</a>

				<a href="/user/payment" data-popup-titlebar="false" class="popup-open">Prémium Rendelés</a>
				<a href="/user/shop" data-popup-titlebar="false" class="popup-open">Tárgypiac</a>
				<a href="/user/whell" data-popup-titlebar="false" class="popup-open">Végzet kereke</a><br>
				
				<a href="<?=$this->config->item('base_url')?>user/logout">Kijelentkezés</a>
			</div>
		</div>

	</div>
	<div id="endrightBox"></div>

	
	

<div id="rightBox">
	
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/hu_HU/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-page" data-href="https://www.facebook.com/legends4everhu" data-width="331px" data-height="1000px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/legends4everhu"><a href="https://www.facebook.com/legends4everhu">legends4ever HU</a></blockquote></div></div>
	
</div>	<div id="endrightBox"></div>	



		</aside>
		
					
		<div class="left">
<!--		
			<?php
				$battle = $this->db->get_where('CLASSIC_GAME.dbo.TBATTLETIMECHART', array('bType' => 0))->row();
				
				$battleHour = $battle->dwBattleStart/3600;
				$battleDuration = ($battle->dwBattleDur/3600)*60;
				
				$nowHour = date('H');
				$nowMinute = date('i');
				
				$nextBtTime = 0;
				
				if($nowHour==$battleHour-1)
					$nextBtTime = date("Y, n - 1, d, $battleHour, i");
				else if($nowHour==$battleHour && $nowMinute <= $battleDuration)
					$nextBtTime = 1;
			?>
			
			<? if( $nextBtTime != 0 ) { ?>
				<div class="alarm_box">
					<div class="war-countdown">
						<div class="countdown-container">
							<h1 id="countdown-holder"><? $nextBtTime == 1 ? print 'Éppen megy' : ''; ?></h1>
						</div>
					</div>
					<? if( $nextBtTime != 1 ) { ?>
						<script>
							  var clock = document.getElementById("countdown-holder")
								, targetDate = new Date(<?=$nextBtTime?>);
							 
							  clock.innerHTML = countdown(targetDate).toString();
							  setInterval(function(){
								clock.innerHTML = countdown(targetDate).toString();
							  }, 1000);
						</script>
					<? } ?> 
				</div>
				<br>
			<? } ?>
-->				

			<div class="leftCon">
				<?=$this->View_Model->show_user($page, $param1, $param2, $param3)?>
			</div>	
		</div>	
		
		</div>
	</div>

	
	<footer>
	<div class="event"></div>

	<div class="middle">
	<div class="line"></div>
		<div class="left">

			<span class="copyright">
	
				
			</span>
		</div>
		<div class="right">

			<dl>
				<dd class="one">
					<ul>
						<li class="first"><span class="footerLine"></span>További játékok</li>
						
                        	<li><a href="http://classic.legends4ever.hu/">Classic4Ever</a></li>

					</ul>
				</dd>
				<dd class="two">
					<ul>
					<li class="first"><span class="footerLine"></span>Kapcsolat</li>
						<li class="down" ><a target="_blank" class="fb" href="https://www.facebook.com/legends4everhu"></a><li>
						<li class="down" ><a target="_blank" class="yt" href="https://discord.gg/eWQhtvSegH"></a><li>
					</ul>
				</dd>
				<dd class="three">
					<ul>


						
					</ul>
				</dd>

			</dl>
		</div>
		
	</div>
</footer>
	

	





</body></html>