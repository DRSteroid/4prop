<div id="popup_window">
	<div class="reg_box" style="overflow: hidden;">
	
		<h4 class="tittle">
			<span class="text">Azonosító létrehozása</span>
			<a class="popup-close" href="#"></a>
			<div class="bgline"></div>
		</h4>
		
<?if ($errors != 'success' ) {?>				

          <p>Hozz létre ingyen azonosítót itt.</p>

<?
			foreach($errors as $error) {
				echo '<p class="tiny-txt">'.$error.'</p>';
			}
?>

           <form accept-charset="UTF-8" action="<?=$this->config->item('base_url')?>main/register<?=( !empty($param1) ? '/'.$param1 : '')?>" class="popup-form" data-remote="true" method="post">
				<div class="userWrap">
					<span class="userIcon"></span>
					<input type="text" placeholder="Felhasználó név" name="name" class="name">
				</div>
				<div class="emailWrap">
					<span class="emailIcon"></span>
					<input type="text" placeholder="Email cím" name="email" class="email">
				</div>
				
				<div class="passwordWrap">
					<span class="passwordIcon"></span>
					<input placeholder="Új Jelszó" class="password" name="password" type="password">	
				</div>

				<div class="checkdWrap"style="margin-top:40px">
						<input type="checkbox" name="tac" class="check">
						Elolvastam a <a target="_blank" href="#">Felhasználási feltételeket</a> és <a target="_blank" href="#">titoktartási elvet</a> és elfogadom őket.                              
								</div>
					
				<div class="buttonWrap">
					<input type="submit" style="margin-top:40px" name="submit"  class="btn" value="KÜLDÉS">
				</div>
		</form>
	</div>			  
<?}elseif ($this->config->item('reg_mail') == TRUE){?>	
	  


<p>
Befejeződött regisztrációd és az adataidat elmentettük.
</p>

<p>Rövidesen egy felszólítást kapsz a postaládádba a <b> regisztrációd megerősítésre</b>. Kérünk, <b>erősítsd meg a jelentkezésedet</b> egy kattintással <b>az emailben található </b>linkre. Csak ez után tudod használni a játék-számládat. Kérjük, vedd figyelembe, hogy a megerősítő link rövid időn belül lejár. Ha már lejárt, adataid törlődni fognak. Ebben az esetben kérjük, kezdd elölről a regisztrációs folyamatot.
Ha az emailt még órák múlva sem kapod meg, akkor fordulj az <a id="active" href="http://support.yirogames.com/">ügyfélszolgálathoz</a>.</p>                                <p></p>
					<p><a id="resendmail" href="#">Nem kaptál e-mailt? Aktivációs levél újraküldése</a></p>





<?} else {?>
<div class="content-box">
  <div class="content-box-first-head">
      <h3></h3>
<div class="inner-box-2">
            <h4>Számla:</h4>
            <img class="pic" src="<?=$this->config->item('base_url')?>design/img/register.jpg" alt="Küldetések" title="Küldetések">
<p>
Befejeződött regisztrációd és az adataidat elmentettük.

<br><br><br>
<h2>Játék letöltése</h2>
<h4></h4>
<a title="JÁTÉK<br />LETÖLTÉSE" class="dl-btn" href="#">JÁTÉK<br>LETÖLTÉSE</a>
                           </p>
        </div>
	 </div>
</div>
		  
<?} ?>		  
	<div class="reg_box" style="top: 20px; position: relative; height: 220px;">

	<h4 class="tittle">
		<span class="text">Játék letöltés</span>
		<div class="bgline"></div>
	</h4>

		<p>Az alábbi linkek segítségével egyszerűen és gyorsan letöltheted a játékot!</p>
	<br>
	<h2>Válassz letöltési típust:</h2>

				<a type="hidden" class="btn" target="_blank" href="<?=$this->config->item('dl_mega')?>">Letöltés<br>(MEGA)</a>
				
				<a type="hidden" class="btn" href="<?=$this->config->item('dl_torrent')?>">Letöltés<br>(TORRENT)</a>

				<a type="hidden" class="btn" href="<?=$this->config->item('dl_direct')?>">Letöltés<br>(DIRECT)</a>

	  </div> 
 </div> 