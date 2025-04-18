<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?=$this->config->item('page_name')?> | YiroGames</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex,nofollow" />
	<meta property="og:title" content="YiroMail" />
</head>

<body style="margin: 0px; padding: 0px; min-width: 100%; background-color: #f1f1f1">

	<div class="preheader" style="margin-left: auto;margin-right: auto;width: 600px;border-collapse: collapse;">
		<p style="padding: 10px 0px 12px;vertical-align: top;font-size: 12px;line-height: 21px;width: 300px;color: rgb(153, 153, 153);font-family: sans-serif;" class="webversion">
			Ha a levél nem jól jelenik meg, <a style="color: rgb(146, 131, 134);" href="http://<?=$_SERVER["SERVER_NAME"]?>/email/register/<?=$hash?>" target="_blank"><u>kattints ide</u></a>.
		</p>
		<div class="line" style="height: 1px;margin: 10px;background: #C6C3C1;box-shadow: 0px 0px 1px #FCF8F3;"></div>
	</div>
	
	<div class="header" style="	border-collapse: collapse;border-spacing: 0px;margin-left: auto;margin-right: auto;width: 600px;">
		<img class="company" style="border: 0px none;display: block;max-width: 300px;margin-left: auto;float: left;" src="http://<?=$_SERVER["SERVER_NAME"]?>/design/img/sendmail/yiro_logo.png" alt="" width="325" height="90" />
		<img class="game" style="border: 0px none;display: block;max-width: 300px;margin-left: auto;float: right;" src="http://<?=$_SERVER["SERVER_NAME"]?>/design/img/sendmail/game_logo.png" alt="" width="325" height="90" />
	</div>
	
	<!-- @@@@@@YiroGames@@@@@@ -->
	<div class="centered" style="margin-left: auto;margin-right: auto;width: 600px;background-color: rgb(255, 255, 255);overflow: hidden;border: 1px solid #d8d4d4;margin-top: 30px;">                
		<h1 style="	color: rgb(86, 86, 86);font-size: 36px;font-family: sans-serif;line-height: 44px;padding: 20px;">
			Üdvözlünk, <?=$name?>!
		</h1>
		<p style="color: rgb(86, 86, 86);font-family: Georgia,serif;font-size: 16px;line-height: 24px;padding: 20px;">
			Kezdődhet kalandozásod a <?=$this->config->item('page_name')?>-n! Kérjük, kattints a következő linkre, hogy megerősítsd email címed valódiságát és befejezd regisztrációd. <br><br>
			
			<a style="color: rgb(146, 131, 134);" href="http://<?=$_SERVER["SERVER_NAME"]?>/main/authenticated/<?=$name?>/<?=$hash?>
">http://<?=$_SERVER["SERVER_NAME"]?>/main/authenticated/<?=$name?>/<?=$hash?>
</a><br /><br />
			
			Üdvözlettel,  <br />
			<?=$this->config->item('page_name')?> csapata<br />
			<a style="color: rgb(146, 131, 134);" href="http://<?=$_SERVER["SERVER_NAME"]?>"><?=$_SERVER["SERVER_NAME"]?></a>
		</p>
		
<div class="line" style="height: 1px;margin: 10px;background: #C6C3C1;box-shadow: 0px 0px 1px #FCF8F3;"></div>
		<div class="column" style="text-align: left;float: left;margin-left: 22px;">
			<img style="border: 0;-ms-interpolation-mode: bicubic;display: block;max-width: 480px" src="http://<?=$_SERVER["SERVER_NAME"]?>/design/img/sendmail/screen1.jpg" alt="" width="170" height="150" />
			<h2 style="Margin-top: 0;color: #565656;font-weight: 700;font-size: 20px;Margin-bottom: 21px;font-family: sans-serif;line-height: 26px
">Gyönyörű világ</h2>
		</div>
		<div class="column" style="text-align: left;float: left;margin-left: 22px;">
			<img style="border: 0;-ms-interpolation-mode: bicubic;display: block;max-width: 480px" src="http://<?=$_SERVER["SERVER_NAME"]?>/design/img/sendmail/screen2.jpg" alt="" width="170" height="150" />
			<h2 style="Margin-top: 0;color: #565656;font-weight: 700;font-size: 20px;Margin-bottom: 21px;font-family: sans-serif;line-height: 26px
">Gigantikus harcok</h2>
		</div>
		<div class="column" style="text-align: left;float: left;margin-left: 22px;">
			<img style="border: 0;-ms-interpolation-mode: bicubic;display: block;max-width: 480px" src="http://<?=$_SERVER["SERVER_NAME"]?>/design/img/sendmail/screen3.jpg" alt="" width="170" height="150" />
			<h2 style="Margin-top: 0;color: #565656;font-weight: 700;font-size: 20px;Margin-bottom: 21px;font-family: sans-serif;line-height: 26px
">Számtalan kihívás</h2>
		</div>
		
	</div>	
	
	<!-- @@@@@@YiroGames@@@@@@ -->
	<div class="footer" style="padding: 30px;border-collapse: collapse;border-spacing: 0px;margin-left: auto;margin-right: auto;width: 600px;">  		
		<div class="padded" style="vertical-align: top;word-wrap: break-word;float: left;font-size: 12px;line-height: 20px;color: rgb(153, 153, 153);font-family: sans-serif;width: 150px;">  	
			YiroGames<br />
			info@yirogames.com<br />
			support.yirogames.com<br />
			www.yirogames.com		
		</div>	
		<div class="subscription" style="vertical-align: top;word-wrap: break-word;font-size: 12px;line-height: 20px;color: rgb(153, 153, 153);font-family: sans-serif;float: right;width: 330px;">
			Ezt az e-mailt azért kaptad, mert regisztráltál a "<?=$this->config->item('page_name')?>" játékba a következő e-mail címmel: <?=$email?>.<br />
		<!--	
			<a style="color: rgb(146, 131, 134);" href="http://smail.yirogames.com/Unsubscribe/">
			<span class="block"><unsubscribe style="font-weight:bold;text-decoration:none;">Leiratkozás</unsubscribe></span></a>
		-->	
		</div>
		
	</div>		
</body></html>