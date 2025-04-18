<div id="char_box">
	<div class="tittle">
		<a class="popup-close" href="#"></a>
		<h1>Karakter - <?=$szNAME?> lv. <?=$bLevel?></h1>
	</div>
	
	<?
	$nem	= ($bSex + $bRace * 2) * -36;
	$arc	= ($bHair + $bFace * 7) * -36;
	$class	= $bClass * -36;	
	?>
	
	<div id="character-box">
			<div id="hpmp-box" class="bck-<?=$this->Data_Model->char_country($bCountry)?>">
				<div id="char-class" style="background-position: <?=$class?>px 0px;"></div>
				<div id="char-face" style="background-position: <?=$arc?>px <?=$nem?>px"></div>
				<div id="char-hp"><?=$dwHP?></div>
				<div id="char-mp"><?=$dwMP?></div>
			</div>	

		<div id="character-inven">	
		<? // Táskák 
		$x = 1;
		$query = $this->db->query("SELECT TOP 5 * FROM CLASSIC_GAME.dbo.TINVENTABLE WHERE dwCharID = $dwCharID ");
		foreach ($query->result() as $row){
			
		$bag = ($row->wItemID  * -32) + 32 ;
		
		?>
			<div style="background:url('/design/img/char/items_11_0.png') no-repeat <?=$bag?>px 0px;" class="item-icon" id="char-inven<?=6 - $x++?>"></div>	
		<?}?>	
			<div style="background:url('/design/img/char/items_11_0.png') no-repeat 0px 0px;" class="item-icon" id="char-inven6"></div>	
			
		<? // Felszerelés 
			for ($i = 0;$i < 14; $i++){

			$query = $this->db->query("
					SELECT *, (t1.bLevel) as itemlvl, (t2.bLevel) as item_minlvl
					FROM  CLASSIC_GAME.dbo.TITEMTABLE t1
					INNER JOIN CLASSIC_GAME.dbo.TITEMCHART t2 on t1.wItemID = t2.wItemID
					INNER JOIN CLASSIC_GAME.dbo.TITEMATTRCHART t3 on t2.wAttrID = t3.wID
					WHERE dwStorageID = 254 AND dwOwnerID = $dwCharID AND t1.bItemID = $i
			");
				

			$item  = $query->row();
			if($query->num_rows() > 0){
				if($i < 3){
					$type = 'weapon';
				}elseif($i > 2 && $i < 9){
					$type = 'equip';
				}elseif($i > 8 && $i < 14){
					$type = 'jewel';
				}	
		?>
			<div style="background:url('/design/img/items/<?=$item->wItemID?>.jpg') no-repeat ; position: absolute;width: 32px;height: 32px;"  aria-id="<?=$i?>" id="char-slot<?=$i+1?>">
			<?if($type != 'jewel'){?><img src="/design/img/items/frame/upgrade<?=$frame = ($item->bLevel < 24) ? $item->bLevel : 24?>.png"><?}?>
			
			<span>
				<img class="item" src="/design/img/items/<?=$item->wItemID?>.jpg">
				<?if($type != 'jewel'){?><img class="frame" src="/design/img/items/frame/upgrade<?=$frame = ($item->bLevel < 24) ? $item->bLevel : 24?>.png"><?}?>
				<p><?=$item->szNAME?> +<?=$item->itemlvl?></p>
				
				<?if($type != 'jewel'){?><img class="gem" src="/design/img/items/gems/gem<?=$item->bGem?>.png"><?}?>
				
				<table >
					<tbody>
						<tr><th>Típus</th><td>Armor</td></tr>
						<tr><th>Szint</th><td><?=$item->item_minlvl?></td></tr>
						<?if($type != 'jewel'){?><tr><th>Effect</th><td><?=$this->Data_Model->item_effect($item->bGradeEffect)?></td></tr><?}?>
						
				<?if($type == 'weapon'){?>		
						<tr><th>Sebesség</th><td>+6</td></tr>
						<tr><th>Sebzés</th><td><?=$item->wMinAP?> - <?=$item->wMaxAP?></td></tr>
				<?}elseif($type == 'equip'){?>	
						<tr><th>Fejlesztések</th><td><?=$item->bRefineCur?>/5</td></tr>
						<tr><th>Fizikai védelem</th><td>+6</td></tr>
						<tr><th>Mágikus védelem</th><td>+4</td></tr>
				<?
				}
				if($item->bMagic1 > 0){
					echo "<tr><th></th><td></td></tr>";
					echo "<tr><th style='color:#3897f3;'>[EGYÉB]</th><td></td></tr>";
					echo "<tr><th>".$this->Data_Model->item_bonusname($item->bMagic1)."</th><td>".$item->wValue1."</td></tr>";
				}
				if($item->bMagic2 > 0){
					echo "<tr><th>".$this->Data_Model->item_bonusname($item->bMagic2)."</th><td>".$item->wValue2."</td></tr>";
				}
				if($item->bMagic3 > 0){
					echo "<tr><th>".$this->Data_Model->item_bonusname($item->bMagic3)."</th><td>".$item->wValue3."</td></tr>";
				}	
				?>	
			
				
					</tbody>
				</table>
									
				
				<!--
				<div style="position:absolute;top:158px;left:8px;color:#3897f3;">[EGYÉB]</div><div style="position:absolute;top:155px;left:115px;"></div>
				-->
			</span>
	
	
	</div>
		<?
			}
		}
		// Kosztum 
			for ($i = 15;$i < 19; $i++){
				$query = $this->db->query("SELECT * FROM CLASSIC_GAME.dbo.TITEMTABLE WHERE dwStorageID = 254 AND dwOwnerID = $dwCharID AND bItemID = $i ");	
				
			$costum  = $query->row();
			if($query->num_rows() > 0){
		?>
		<div style="background:url('/design/img/items/<?=$costum->wItemID?>.jpg') no-repeat ;" class="item-icon" id="char-slot<?=$i?>"></div>
		<?
			}
		}
		?>	
		
			</div>
			
	</div>
	
	<div id="char_infobox">
		Bemutatkozó:
		<div class="bgline"></div>
	<?
		$db = $this->load->database('admindb', TRUE);
		$server = $this->config->item('page_prefix2');
		$query = $db->query("SELECT * FROM rank_char_info WHERE user_id = $dwUserID and game_server = '$server' ")->row();
	?>				
		<div class="text"><?=(!empty($query)) ? nl2br($query->text) : 'Még nem írt bemutatkozást...'?></div>
	</div>
			
			
</div>
