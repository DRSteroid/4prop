<div class="col-2">
        	<div class="first-content"></div>
<div class="content-box">
  <div class="content-box-first-head">
      <h3>Üdvözöllek a Gates of Andaronban</h3>
      <div class="inner-box-2">
          <h4>Bejelentkezés:</h4><img title="Bejelentkezés" alt="Bejelentkezés" src="<?=$this->config->item('base_url')?>design/img/login.jpg" class="pic">
		  <? if ($error != 1000) {?>
          <p>Írd be az adataidat hogy belépj.</p>
          <div class="form-box">
             <div class="form-head">
                <div class="form-login">
                  <form accept-charset="utf-8" enctype="multipart/form-data" name="form_login1" method="post" action="<?=$this->config->item('base_url')?>main/login" class="form-inner">
                       <fieldset>
                            <div class="form-input">
							<p class="tiny-txt"><?=$errorw = ($error != '') ? 'Hibás felhasználó név vagy jelszó' : '';?></p>
								<div class="input-div">
                                	<label for="name">Felhasználói név:</label>
                                  <input type="text" onfocus="this.value=''" value="" maxlength="18" name="name" id="name">
								</div>
								<div class="input-div">
                                	<label for="pwd">Jelszó:</label>
                                  <input type="password" onfocus="this.value=''" value="" maxlength="18" name="password" id="pwd">
                                </div>
								                            </div>
                            <p class="tiny-txt"><a href="<?=$this->config->item('base_url')?>user/lostpw">Elfelejtett jelszó</a></p>
                            <p class="tiny-txt">A belépéssel elfogadom a <a target="_blank" href="#">feltételeket</a></p>
                            <div class="submit">
                                  <input type="submit" class="btn" onclick="document.forms['form_login'].submit();return false;" value="BEJELENTKEZÉS">
                            </div>
                      </fieldset>
                  </form>
                 </div>
             </div>
          </div>
 <div class="form-foot"></div>
		  <? } else {?>
<p>		  
A felhasználói fiók nincs aktiválva!
</p>

<p>Kérünk, <b>erősítsd meg a regisztrációd</b> egy kattintással <b>az emailben található </b>linkre kattintva. Csak ez után tudod használni a játék-számládat. </p>
.                                <p></p>
                                <p><a id="active" href="<?=$this->config->item('base_url')?>main/resendactiv">
                                    Nem kaptál e-mailt? Aktivációs levél újraküldése  
		  <? }?>
		  
         
       </div>
    </div>
</div>
<div class="content-box-last"></div>        </div>