	<div id="popup_window">
	<h4 class="tittle">
		<span class="text">Beragadt karakter</span>
		<a class="popup-close" href="#"></a>
		<div class="bgline"></div>
	</h4>	
	
	<?=$msg2 = (!empty($msg) && $msg == 'success' ) ?  '<div class="'.$msg.'"><p><b>SIKER</b>:Karaktered áthelyzve GOR-ba!</p></div>' : ''?>
	<?=$msg2 = (!empty($msg) && $msg == 'warning' ) ?  '<div class="'.$msg.'"><p><b>HIBA</b>: A karakter nem létezik</p></div>' : ''?>
	<?=$msg2 = (!empty($msg) && $msg == 'status' ) ?  '<div class="warning"><p><b>HIBA</b>: A karakter nem lehet Online</p></div>' : ''?>
	
	<p>Beragadt a kakarekter haza portolása?</p>
           <form accept-charset="UTF-8" action="<?=$this->config->item('base_url')?>user/charport/<?=$param1?>" class="popup-form" data-remote="true" method="post">
			<br>
				<div class="submit">
				<input type="submit" name="submit" class="btn" value="Portol">
				</div>
			</form>	

		</div>

		
			