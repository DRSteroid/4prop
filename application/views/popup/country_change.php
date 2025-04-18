	<div id="popup_window">
	<h4 class="tittle">
		<span class="text">Nemzet váltás</span>
		<a class="popup-close" href="#"></a>
		<div class="bgline"></div>
	</h4>	
<?	
$new_country = ($this->Player_Model->cuntry->bCountry == 0) ? $this->Data_Model->char_country($this->Player_Model->cuntry->bCountry +1) : $this->Data_Model->char_country($this->Player_Model->cuntry->bCountry - 1);

if ($msg != 'success' && $msg != 'time_limit') {
		
	if (!empty($msg)) {
			echo '<p>HIBA!</p>';

			if ( $query->num_rows() > 0) {
							echo '<p>Az alábbi karakterek nem lehetnek céhben!</p>';			
	?>
							<table style="width: 370px; margin: 20px 100px; color: rgb(255, 240, 210); font-size: 16px;">
								<tbody>
									<tr class="label" style="font-weight: bold; background-color: rgb(94, 18, 0);">
										<th>Karakter</th>
										<th>Céh</th>
									</tr>
									<tr>
										<?php
											foreach ($query->result() as $row)
											{
												echo "<tr>
												<td align='center'>$row->szNAME</td>
												<td align='center'>$row->szName</td>
												</tr>";
											}
										?>
									</tr>
								</tbody>
							</table>
			<?
			} else {
				echo '<p>'.$msg.'</p>';
			}
	}
		?>
						<p>Nemzet váltás <?=$this->Data_Model->char_country($this->Player_Model->cuntry->bCountry)?>ból <?=$new_country?>ba!</p>
						<p>Figyelem, nemzet váltással elfogadod az alábbi feltételeket:</p>
						<p>
							<!-- - Barát lista törlése<br> -->
							- Céhől való kilépés<br>
							- Visszatérés <?=$this->config->item('country_day_limit')?> nap elteltével vagy <?=$this->config->item('country_buy_premium')?> HK-ért! <br>
						</p>
						<br>
			   <form accept-charset="UTF-8" action="<?=$this->config->item('base_url')?>user/country" class="popup-form" data-remote="true" method="post">
					<div class="buttonWrap">
					<input type="submit" name="submit" class="btn" value="CSERE">
					</div>
				</form>
<?} elseif ($msg == 'time_limit'){?>

	<p><b>HIBA</b></p>
	<p>
	Még nem telt el a 3 nap a legutóbbi váltás óta!<br>
	<?//=sql_date()?>
	Szeretnél azonnal nemzetet cserélni ?<br>
	Ára: <?=$this->config->item('country_buy_premium')?>HK
	</p><br>
	
			   <form accept-charset="UTF-8" action="<?=$this->config->item('base_url')?>user/country" class="popup-form" data-remote="true" method="post">
					<div class="buttonWrap">
					<input type="submit" name="submit" class="btn" value="CSERE (<?=$this->config->item('country_buy_premium')?>HK)">
					<input type="hidden" name="buy">
					</div>
				</form>

<?}else {?>
	<p>A nemzetváltás sikeres!<br>
	Mostantól <b><?=$new_country?></b>ba tartozol.<br><br>
	Következő cseréhez várnod kell legalább 3 napot!
	</p>
<?}?>

</div>

			
			