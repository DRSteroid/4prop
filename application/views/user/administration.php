<?$char_data  = $this->Player_Model->player;?>
<div class="newsList">
	<div class="tittle"><h1>Felhasználó fiók - <?=$this->Player_Model->user->szUserName?><h1></div>

<article>
	<div class="user-info">
		<fieldset>
				<legend>Felhasználói adatok</legend>
				
				<li><b>Azonosító neve:</b> <?=$this->Player_Model->user->szUserName?></li>
                <li><b>E-Mail:</b> <?=$this->Player_Model->user->szUserID?></li><br>
				

				
					<?if (isset($this->Player_Model->banuser->dwUserID) and sql_date($this->Player_Model->banuser->regDate) > date('Y-m-d H:i:s')){ ?>
					<li><b>Státusz:</b> Zárolt <? //echo '(OK:'. $this->Player_Model->banuser->bBlockReason.')';?><br>
					<?=sql_date($this->Player_Model->banuser->regDate)?>
					<? }else{ ?>
						<li><b>Státusz:</b> Aktív<br>
				<? }?>
				</li>
				
				
                <li><b>Első belépés:</b> <?=$this->Player_Model->user->dFirstLogin?></li>
                <li><b>Utolsó belépés:</b> <?=$this->Player_Model->user->dFirstLogin?></li><br>
						<li><b>Prémium:</b> <?=$cash = ($this->Player_Model->user->dwCash > 0) ? $this->Player_Model->user->dwCash ." Holdkő": "Nincs holdköved";?><br>
						<li><b>Bónusz Pont:</b> <?=$cash = ($this->Player_Model->user->dwBonus > 0) ? $this->Player_Model->user->dwBonus : "Nincs Bónusz Pontod";?><br>
						
						
		</fieldset>
		
		
		<fieldset>
				<legend>Fiók adatok</legend>
						<li><b>Barátok:</b> <?=$this->Player_Model->user->ref_count?> Meghívott <a href="/user/friend/" data-popup-titlebar="false" class="userbox-link popup-open">Részletek</a></li><br>
						<li><b>Nemzet:</b> <?=$this->Data_Model->char_country($this->Player_Model->cuntry->bCountry)?><a href="/user/country/" data-popup-titlebar="false" class="userbox-link popup-open">Nemzet csere</a></li><br>
						<li><b>Bemutatkozó:</b> <a href="/user/accinfo/" data-popup-titlebar="false" class="popup-open">Szerkeszt</a></li><br>
					<? if ($this->session->userdata('dwUserID') == 1)  {?>
						<li><b>Napi ingyen Prémium: 0/5</b> </li><br>
					<?}?>
		</fieldset>
		

<div class="char-info">		
		<fieldset>
				<legend>Karakter adatok</legend>
				
				<?php
					$i=0;
					foreach ($this->Player_Model->player as $row)
					{
						$nem	= ($row['bSex'] + $row['bRace'] * 2) * -36;
						$arc	= ($row['bHair'] + $row['bFace'] * 7) * -36;
				?>
				
					<div class="char_list">
						<tr>
						<td class="tdunkel"><div class="face" style="background-position: <?=$arc?>px <?=$nem?>px"></div></td>
						<td class="tdunkel">Név: <a href="/main/charinfo/<?=$row['szNAME']?>" data-popup-titlebar="false" class="userbox-link popup-open"><?=$row['szNAME']?></a> Lv. <?=$row['bLevel']?>
						<a href="/user/charport/<?=$row['szNAME']?>" data-popup-titlebar="false" style="float: right" class="popup-open">Haza port</a>

						<br>
						
						
						<small><?=$this->Data_Model->rank_chartype($row['bClass'])?></small></td>
						<td class="char_country" style="background-position: <?=$row['bCountry'] * -36?>px 0px"></td>
						</tr>
					</div>
				<?}?>
		</fieldset>
		
		</div>	
	</div>	
			</article>
			
	<div class="tittle"><h1>Hívd meg barátaidat<h1></div>	

	<div class="content">
	Hívd meg a barátaidat és szerezz <b>INGYEN</b> <?=$this->config->item('ref_invite_coins')?> Höldkövet meghívásoként!<br /><br />


	
	<p>Oszd meg az egyedi kódodat a barátaiddal. Ha a Te kódodon keresztül regisztrálnak, jutalmat kapsz Te (<?=$this->config->item('ref_invite_coins')?><?=$this->config->item('cash_prefix')?>), és a meghívottad is (<?=$this->config->item('ref_friend_coins')?><?=$this->config->item('cash_prefix')?>).</p>
		<div class="ref_box"><?=$this->Player_Model->user->szRefCode?><br />

		<textarea type="text">http://<?=$_SERVER['SERVER_NAME']?>/main/register/<?=$this->Player_Model->user->szRefCode?></textarea>
</div>

</div>
    </div>

	
