<div id="popup_window">
	<h4 class="tittle">
		<span class="text">Elfelejtett jelszó?</span>
		<a class="popup-close" href="#"></a>
		<div class="bgline"></div>
	</h4>

<? if($param3 != 'success' and $param3 != 'old') {?>	

          <p>Itt megváltoztathatod a jelszavad</p>
		  	<p class="tiny-txt"><?=$error = ($param3 != null) ? $param3 : '';?></p>
           <form accept-charset="UTF-8" action="<?=$this->config->item('base_url')?>main/passwordlost/<?=$param1?>/<?=$param2?>" class="popup-form" data-remote="true" method="post">

				<div class="passwordWrap">
					<span class="passwordIcon"></span>
						<input placeholder="Új Jelszó" class="password" name="password" type="password">	
					</div>
				<div class="passwordWrap">
					<span class="passwordIcon"></span>
						<input placeholder="Új Jelszó ismét" class="password" name="repassword" type="password">	
					</div>
                            <div class="submit">
								<input type="submit" class="btn" value="ELKÜLD">
                            </div>
                  </form>
                 
<?} elseif($param3 == 'old') {?>	
	<p id="result">A link hibás vagy el lett fogadva!</p>
<?}else{?>
	<p id="result">A jelszavad sikeresen megváltoztatva!</p>
<?}?>

</div>

