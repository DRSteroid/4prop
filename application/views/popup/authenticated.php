	<div id="popup_window">
	<h4 class="tittle">
		<span class="text">Aktiváló link újraküldése</span>
		<a class="popup-close" href="#"></a>
		<div class="bgline"></div>
	</h4>
	
	<?if ($error == null) {?>	
	<h2>Sikeres aktiválás!</h2>
		<p>Befejeződött a regisztrációd és az adataidat elmentettük.</p>
	<br><br>
	<h2>Játék letöltése:</h2>

		<a type="hidden" class="btn" target="_blank" href="<?=$this->config->item('dl_mega')?>">Letöltés<br>(MEGA)</a>
				
		<a type="hidden" class="btn" href="<?=$this->config->item('dl_torrent')?>">Letöltés<br>(TORRENT)</a>

		<a type="hidden" class="btn" href="<?=$this->config->item('dl_direct')?>">Letöltés<br>(DIRECT)</a>
	   
	   
	<?}elseif ($error == 2){?>
	<h2>Hiba!</h2>
	<p>
	 A Regisztrációs link már el lett fogadva vagy sérült. </p>
	  
	<p><a id="resendmail" href="#">Nem kaptál e-mailt? Aktivációs levél újraküldése</a></p>

	<?} ?>

</div>



