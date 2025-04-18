	<div id="popup_window">
			<h4 class="tittle">
				<span class="game"></span>
				<span class="text">Aktiváló link újraküldése</span>
				<a class="popup-close" href="#"></a>
				<div class="bgline"></div>
			</h4>
			
<?if($this->session->userdata('lastactiv') < date('Y/m/d H:i:s') ){	?>
			<p>Az aktivációs link kiküldéséhez az azonosítód és az e-mail címed kell.</p>
			<p><?=$error = ($param1 != '') ? $param1 : '';?></p>
           <form accept-charset="UTF-8" action="/main/resendactiv" class="popup-form" data-remote="true" method="post">
				<div class="userWrap">
					<span class="userIcon"></span>
					<input type="user" placeholder="Felhasználó név" name="name" class="name">
				</div>
				<div class="emailWrap">
					<span class="emailIcon"></span>
					<input type="email" placeholder="Email cím" name="email" class="email">
				</div>
				<div class="buttonWrap">
				<input type="submit" class="btn" value="KÜLDÉS">

				</div>
		</form>

<? }else{ ?>

			<p>
			Új aktiválólink kéréséhez várnod kell :<br>
			<?=$this->session->userdata('lastactiv') ?> -ig
		</p>
<? } ?>

	</div>