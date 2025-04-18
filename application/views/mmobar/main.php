<?
		$db = $this->load->database('admindb', TRUE);
	
		$query = $db->query("SELECT news FROM mmonetbar_news where country = 'HU' ");
		$news  = $query->row();
?>
<link rel="stylesheet" href="<?=$this->config->item('base_url')?>design/css/mmobar.css" type="text/css" />

<div id="game_bar">
<div id="gameContent" class="gamesmallbar">

<div id="facebook">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/hu_HU/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>	 
<div class="fb-like" data-href="https://www.facebook.com/yirogames" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
</div>

	 <a id='logo' target="_blank" href="http://yirogames.com"></a>	
	 
			 <div class="panel_news"><?=$news->news?></div>    

			 <div class="button">
		      <a href="/yirogames" data-popup-titlebar="false" class="popup-open">További játékok</a>
			 </div>                        
					

<div id="header-lang">
 <!--<p>Válassz országot:</p>-->
	<label class="selected" style="background-image:url(/design/img/mmobar/flags/hu.png)">
		<span>Magyar</span>
	</label> 

	<ul class="drop"> 
		<li>
			<span class="langSelect"> 
			<a class="flag" style="background-image:url(/design/img/mmobar/flags/en.png);" href="http://4story4ever.com/"><span>Angol</span></a> </span>
		</li> 
	</ul> 
</div>


		</div>
		</div>