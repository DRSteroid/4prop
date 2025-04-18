<? $error = $param3; ?>
<div class="col-2">
        	<div class="first-content"></div>
<div class="content-box">
  <div class="content-box-first-head">
      <h3>Számlád</h3>
      <div class="inner-box-2">
          <h4>Jelszócsere</h4><img title="Jelszócsere" alt="Jelszócsere" src="<?=$this->config->item('base_url')?>design/img/forgotpw.jpg" class="pic">

 <?if ($this->config->item('reg_mail') == true && empty($param1) && empty($param2) && empty($error) ) { ?>
          <p>Kérj egy módosító linket email-ben és kövesd az utasításokat új jelszó létrehozásához.</p>


             
                <div class="form-login">
                  <form accept-charset="utf-8" enctype="multipart/form-data" name="form_lostpw" method="post" action="<?=$this->config->item('base_url')?>user/passwordchange" class="form-inner">
                       <fieldset>

                            <div class="submit">
								<input type="submit" class="btn" name="submit" value="ELKÜLD">
                            </div>

                      </fieldset>
                  </form>
                 </div>
            
 <?}elseif ($error == 'success') { ?>        
          <p>Rövidesen egy linket tartalmazó email-t küldünk neked, amivel megváltoztathatod a jelszavad.</p>		
		  
<?} elseif($param3 == 'fail') {?>	

<p id="result">A link hibás vagy el lett fogadva!</p>

<?

} elseif($this->config->item('reg_mail') == FALSE || !empty($param1) && !empty($param2)) {?>
          <p>Új jelszó kéréséhez írd be az azonosítódat és az e-mail címedet.</p>
          <div class="form-box">
             <div class="form-head">
                <div class="form-login">
                  <form accept-charset="utf-8" enctype="multipart/form-data" name="form_lostpw" method="post" action="<?=$this->config->item('base_url')?>user/passwordchange/<?=$param1?>/<?=$param2?>" class="form-inner">
                       <fieldset>
                            <div class="form-input">
							<? if($error != '') {?><p class="tiny-txt"><?=$error?></p><?}?>
							
								<div class="input-div">
    	                            <label for="password">Jelenlegi jelszó:</label>
        	                        <input type="password" value="" maxlength="18" name="old_pw" id="password">
								</div>
								<div class="input-div">
	                                <label for="password">Új jelszó:</label>
    	                            <input type="password" value="" maxlength="50" name="new_pw" id="password">
								</div>
								<div class="input-div">
	                                <label for="password">Új jelszó ismét:</label>
    	                            <input type="password" value="" maxlength="50" name="confirm_pw" id="password">
								</div>
                                                            </div>
                            <div class="submit">
								<input type="submit" class="btn" onclick="document.forms['form_lostpw'].submit();return false;" value="KÜLDÉS">
                            </div>

                      </fieldset>
                  </form>
                 </div>
             </div>
          </div>
          <div class="form-foot"></div>
<?} ?>


       </div>
	 </div>
</div>
<div class="content-box-last"></div>        </div>