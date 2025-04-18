


	<div id="user_box" class="">

		
			<h4 class="title">
				<span class="game"></span>
				<span class="text">Jelszó újraküldése</span>
				<a class="popup-close" href="#"></a>
				<div class="bgline"></div>
			</h4>

			<p>Új jelszó kéréséhez írd be az azonosítódat és az e-mail címedet.</p><br>
			<p><?=$error = ($param1 != null) ? $param1 : '';?></p><br>
           <form accept-charset="UTF-8" action="<?=$this->config->item('base_url')?>main/captcha" class="popup-form" data-remote="true" method="post">
				   <div id="captcha">
						
								<?=$this->recaptcha->render()?> 
	                           
	                            <div class="submit">
								<input type="submit" class="btn" onclick="document.forms['form_lostpw'].submit();return false;" value="KÜLDÉS">
                            </div> 
						</div>
		</form>
	</div>
