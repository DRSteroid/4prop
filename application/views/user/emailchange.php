<? $error = $param1 ;?>

<div class="col-2">
        	<div class="first-content"></div>
<div class="content-box">
  <div class="content-box-first-head">
      <h3>Számlád</h3>
      <div class="inner-box-2">
          <h4>Email Cím Megváltoztatása</h4><img title="Elfelejtett jelszó" alt="Elfelejtett jelszó" src="<?=$this->config->item('base_url')?>design/img/forgotpw.jpg" class="pic">
          <p>
<?if($error == 'success'){?>
<p>Kövest az utasításokat amelyeket a régi e-mail címedre küldtünk el hogy a változtatások életbe lépjenek.	</p>  

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
          <div class="form-box">
             <div class="form-head">
                <div class="form-login">
                  <form accept-charset="utf-8" enctype="multipart/form-data" name="form_lostpw" method="post" action="<?=$this->config->item('base_url')?>user/emailchange" class="form-inner">
                       <fieldset>
                            <div class="form-input">
							<p class="tiny-txt"><?=$error = ($param1 != '') ? $param1 : '';?></p>
							
								<div class="input-div">
    	                            <label for="EMAIL">Régi Email-cím: </label>
        	                        <input type="text" value="" maxlength="50" name="old_email" id="EMAIL">
								</div>
								<div class="input-div">
	                                <label for="EMAIL">Új E-Mail cím: </label>
    	                            <input type="text" value="" maxlength="50" name="new_email" id="EMAIL">
								</div>
                                                            </div>
                            <div class="submit">
								<input type="submit" name="submit" class="btn" value="KÜLDÉS">
                            </div>

                      </fieldset>
                  </form>
                 </div>
             </div>
          </div>
          <div class="form-foot"></div>
<?}?>		  
		  
       </div>
	 </div>
</div>
<div class="content-box-last"></div>        </div>