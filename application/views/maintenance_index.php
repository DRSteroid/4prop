<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?=$this->config->item('page_name')?> | Classic4Ever</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex,nofollow" />
	<meta property="og:title" content="YiroMail" />
	<link href="http://<?=$_SERVER["SERVER_NAME"]?>/design/css/maintenance.css" rel="stylesheet"> 
</head>
<body>
	<div class="header" style="	border-collapse: collapse;border-spacing: 0px;margin-left: auto;margin-right: auto;width: 600px;">
		<img class="company" style="border: 0px none;display: block;max-width: 300px;margin-left: auto;float: left;" src="http://<?=$_SERVER["SERVER_NAME"]?>/design/img/sendmail/yiro_logo.png" alt="" width="325" height="90" />
		<img class="game" style="border: 0px none;display: block;max-width: 300px;margin-left: auto;float: right;" src="http://<?=$_SERVER["SERVER_NAME"]?>/design/img/sendmail/game_logo.png" alt="" width="325" height="90" />
	</div>
	<div class="centered">                
		<h1>Karbantartás alatt</h1>
		
		<p>Az oldal jelenleg karbantartás miatt nem elérhető!<br />Kérlek látogass vissza később.<br /><br />Üdvözlettel:<br />Legends4Ever Private Game Factory</p>
	</div>	
	<div class="footer">  		
		<div class="padded">  	
			Classic4Ever<br />
	
		</div>	
		<div class="subscription">
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/hu_HU/sdk.js#xfbml=1&version=v2.5";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-page" data-href="https://www.facebook.com/legends4everhu" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/legends4everhu"><a href="https://www.facebook.com/legends4everhu">classic.legends4ever.hu</a></blockquote></div></div>
		</div>
	</div>		
</body></html>

<?php exit(); // itt megáll a többi ci fájl betöltése?>