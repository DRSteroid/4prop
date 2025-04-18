<? $error = $param1 ;?>
	<div id="popup_window">
	<h4 class="tittle">
		<span class="text">Email Cím Változtatása</span>
		<a class="popup-close" href="#"></a>
		<div class="bgline"></div>
	</h4>
	

       
<?if($error == 'success'){?>
<p>Kövest az utasításokat amelyeket a régi e-mail címedre küldtünk el hogy a változtatások életbe lépjenek.	<br><br>
<a href="http://<?=$mailaddres?>" target="_blank">Tovább a postafiókhoz
</p>  

<?}elseif($error == 'waiting'){?>
<p>Nem kaptuk meg az e-mail változtatási beleegyezésedet. Nézd meg a régi e-mail címed bejövő leveleit.</p>

<?}elseif($error == 'step2'){?>
<p>Meg kell erősítened az új email címed. Kérlek ellenőrizd az új címre beérkezett üzeneteidet, különösen a törölt, Junk vagy spam mappádat.</p>
<?}elseif($error == 'waiting7day'){?>
<p>Már megerősítetted az új e-mail címedet. A következő 7 napban nem változtathatod meg ismét.</p>
<
<?}elseif($error == 'nomail_success'){?>
<p>Email címed lecserélve!</p>
<?}else{?>	
          <p>Másik e-mail cím megadása</p>

                  <form accept-charset="utf-8" class="popup-form" data-remote="true" enctype="multipart/form-data" name="form_lostpw" method="post" action="<?=$this->config->item('base_url')?>user/emailchange" class="form-inner">
				  
<?
			foreach($error as $errors) {
				echo '<p class="tiny-txt">'.$errors.'</p>';
			}
?>

							
				<div class="emailWrap">
					<span class="emailIcon"></span>
					<input type="text" placeholder="Régi Email-cím" name="old_email" class="email">
				</div>
				<div class="emailWrap">
					<span class="emailIcon"></span>
					<input type="text" placeholder="Új E-Mail cím" name="new_email" class="email">
				</div>
				<div class="buttonWrap">
				<input type="submit" class="btn" name="submit" value="KÜLDÉS">
				</div>

                  </form>

<?}?>		  
 </div>