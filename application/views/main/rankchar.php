<?php
	$config['base_url'] = $this->config->item('base_url').'main/rankchar/';
	$config['total_rows'] = SizeOf($this->Player_Model->ep);
	$config['per_page'] = 10;
	$config['num_links'] = 3;
	// $config['next_link'] = 'Következő';
	$config['last_link'] = 'Utolsó ›';
	// $config['prev_link'] = 'Előző';
	$config['first_link'] = '‹ Első';

	$this->pagination->initialize($config);
?>
<div class="newsList">

	<div class="tittle"><h1>Összesített Ranglista<h1></div>	
		<div class="ranklist">	

		<div class="search">
			<form action="/main/rankchar" method="post" id="search">
			
				<div class="searchWrap">
					<span class="searchIcon"></span>
					<input placeholder="<?=$name = ($param2 == true) ? $_POST['name'] : "Karakter név";?>" name="name" value="" class="rank" type="text">
				</div>
				
				<input class="btn" value="Keres" type="submit">

			</form>
		</div>		
			
			<table>
			<tr class="label">
					<td>Helyezés</td>
					<td>Faj</td>
					<td>Név</td>
					<td>Szint</td>
					<td>Becsület</td>
					<td>Nemzet</td>
			</tr>		
			<?php
		if ( $param1 != 'error' or $param2 == null){
				if($param2 == null){	
					$query= $this->db->query( "	
							SELECT TOP 10  *
							FROM 
							(SELECT dwCharID, dwTotalPoint, ROW_NUMBER() OVER(ORDER BY dwTotalPoint DESC) AS rank
								FROM CLASSIC_GAME.dbo.TPVPOINTTABLE
							) t1 , CLASSIC_GAME.dbo.TCHARTABLE
							WHERE t1.dwCharID = CLASSIC_GAME.dbo.TCHARTABLE.dwCharID and rank > $param1 
				");
				}else {		
					$query = $param1 ;
				}			
						
						foreach ($query->result() as $row)
						{
							$nem	= ($row->bSex + $row->bRace * 2) * -36;
							$arc	= ($row->bHair + $row->bFace * 7) * -36;
				
				?>
					<tr>
					<td class="tdunkel"><?=$row->rank?></td>
					<td class="tdunkel"><div class="face" style="background-position: <?=$arc?>px <?=$nem?>px"></div></td>
					<td class="tdunkel"><a href="/main/charinfo/<?=$row->szNAME?>" data-popup-titlebar="false" class="userbox-link popup-open"><?=$row->szNAME?></a><br>
					<small><?=$this->Data_Model->rank_chartype($row->bClass)?></small></td>
					<td class="tdunkel"><?=$row->bLevel?></td>
					<td class="tdunkel"><?=$row->dwTotalPoint?></td>
					<td class="char_country" style="background-position: <?=$row->bCountry * -36?>px 0px"></td>
					</tr>
				<?
				}
				} else {	
				?>
				<tr>
					<br><td class="tdunkel"><br><b>Keresett játékos nem található!</b>
					</td>
				</tr>	
				<?}?>
		</table>
		<div class="page">
		<?
		if($param2 != true) {
			echo  $this->pagination->create_links() ;
		}else{?>	
			<a href="/main/rankchar">Vissza</a>
		<?}?>	
		</div>
		<div class='event'></div>
	</div>
			</div>
	
	
