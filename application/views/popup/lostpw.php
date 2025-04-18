	<div id="popup_window">

			<h4 class="tittle">
				<span class="game"></span>
				<span class="text">Jelszó újraküldése</span>
				<a class="popup-close" href="#"></a>
				<div class="bgline"></div>
			</h4>
<?if($param1 == 1) {?>
	
<p><b>Új jelszó kérés sikertelen</b>	</p>
<p>Túl sokszor próbáltál új jelszót kérni.</p>	
<p>Próbáld később!</p>

<?} elseif ($param1 == 2){?>
	
        <p>  <b>Sikres jelszó igénylés!</b></p>
         <p> Rövidesen egy Emailt kapsz megerősítő linkkel, amivel egy új jelszót tudsz megadni.</p>

<?} else {?>
			<p>Új jelszó kéréséhez írd be az azonosítódat és az e-mail címedet.</p>
			<p><?=$error = ($param1 != '') ? $param1 : '';?></p>
           <form accept-charset="UTF-8" action="<?=$this->config->item('base_url')?>main/lostpw" class="popup-form" data-remote="true" method="post">
				<div class="userWrap">
					<span class="userIcon"></span>
					<input type="text" placeholder="Felhasználó név" name="name" class="name">
				</div>
				<div class="emailWrap">
					<span class="emailIcon"></span>
					<input type="text" placeholder="Email cím" name="email" class="email">
					
				</div>
				<div class="buttonWrap">
				<input type="submit" class="btn" value="KÜLDÉS">

				</div>
		</form>

<?}?>		
	</div>
