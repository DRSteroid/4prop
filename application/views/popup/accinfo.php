	<div id="popup_window">
	<h4 class="tittle">
		<span class="text">Bemutatkozó szerkesztése</span>
		<a class="popup-close" href="#"></a>
		<div class="bgline"></div>
	</h4>	
	<?//=$param2 //valami reakcio hogy okés minden ?>
	<p>Ki rejlik a karakter mögött?<br>
	Írj pár szót magadról, legjobb eredményeidről, vagy játékos karrieredről.</p>
	<p><b>Figyelem: TILOS</b> a reklám, obszcén szavak használata.</p>
	<div class="bem_box">
<script type="text/javascript">
	//karakter limit
		$(".textarea_500x60").keyup(function(){
			el = $(this);
			if(el.val().length >= 500){
				el.val( el.val().substr(0, 500) );
			} else {
				$(".chars").text(500-el.val().length);
			}
		});
</script>
           <form accept-charset="UTF-8" action="<?=$this->config->item('base_url')?>user/accinfo" class="popup-form" data-remote="true" method="post">

			<div class="block asd2">
					<textarea class="textarea_500x60" name="test"><?=(!empty($param1)) ? $param1->text : ''?></textarea>
				</div>
			<br>
				<div class="buttonWrap">
				<input type="submit" name="submit" class="btn" value="MENTÉS">
				</div>
			</form>	
			
<div class="floatingchars">
                <span class="chars">500</span>
                Karakter            </div>
			</div>	
		</div>

		
			