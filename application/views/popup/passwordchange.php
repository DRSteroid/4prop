<? $error = $param3; ?>
	<div id="popup_window">
	<h4 class="tittle">
		<span class="text">Jelszócsere</span>
		<a class="popup-close" href="#"></a>
		<div class="bgline"></div>
	</h4>


 <?if ($this->config->item('reg_mail') == true && empty($param1) && empty($param2) && empty($error) ) { ?>
          <p>Kérj egy módosító linket email-ben és kövesd az utasításokat új jelszó létrehozásához.</p>


             
                <div class="form-login">
                  <form accept-charset="utf-8" class="popup-form" data-remote="true" enctype="multipart/form-data" name="form_lostpw" method="post" action="<?=$this->config->item('base_url')?>user/sendnewpw" class="form-inner">

                            <div class="submit">
								<input type="submit" class="btn" name="submit" value="ELKÜLD">
                            </div>

                  </form>
                 </div>
            
 <?}elseif ($error == 'success') { ?>        
          <p>Rövidesen egy linket tartalmazó email-t küldünk neked, amivel megváltoztathatod a jelszavad.</p>		
		            
 <?}elseif ($error == 'pwchange_success') { ?>        
          <p><?=$this->lang->line('pwchange_success')?></p>		
		  
<?} elseif($param3 == 'fail') {?>	

<p id="result">A link hibás vagy el lett fogadva!</p>

<?

} elseif($this->config->item('reg_mail') == FALSE || !empty($param1) && !empty($param2)) {?>
          <p>Új jelszó megadásához add meg a régi és az új jelszót.</p>
                  <form accept-charset="utf-8" class="popup-form" data-remote="true" enctype="multipart/form-data" name="form_lostpw" method="post" action="<?=$this->config->item('base_url')?>user/newpw/<?=$param1?>/<?=$param2?>" class="form-inner">
                     
							<? if($error != '') {?><div class="warning"><p><b>HIBA: </b><?=$error?></p></div>
<?}?>
							
				<div class="passwordWrap">
					<span class="passwordIcon"></span>
					<input type="password" placeholder="Jelenlegi jelszó" name="old_pw" class="">
				</div>
				<div class="passwordWrap">
					<span class="passwordIcon"></span>
					<input type="password" placeholder="Új Jelszó" name="new_pw" class="">
				</div>
				<div class="passwordWrap">
					<span class="passwordIcon"></span>
					<input type="password" placeholder="Új jelszó ismét" name="confirm_pw" class="">
				</div>
					<br>	<br>	<br>	<br>	
                            <div class="submit">
								<input type="submit" class="btn" value="KÜLDÉS">
                            </div>

                      
                  </form>
             
<?}?>
 </div>