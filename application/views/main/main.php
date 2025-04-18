<div class="newsList">
<div id="image-fader" >
	<div style="position: relative;" id="image-fader-container">
	
<?
/** Fekete péntek kiszámítása **/
for ($i = 29; $i >= 23; $i--)
{
	$blackFriday = date("Y-11-") . $i;

	if (date('N', strtotime($blackFriday)) == 5)
	{
		break;
	}
}
/** end **/

/* Nincs plakát
if(date("d") >= date("3") && date("d") < date("31")){
	echo '<img  src="/design/img/slide/event_30.jpg">';
}
*/

//karácsonyi poszter
if(date("m.d") > date("12.22") && date("m.d") <= date("12.31")){
	echo '<img  src="/design/img/slide/karacsony.jpg">';
}
//új évi poszter
if(date("m.d") > date("01.01") && date("m.d") <= date("01.14")){	
	echo '<img  src="/design/img/slide/new_year/'.date("Y").'.jpg">';
}
//halloween poszter
if(date("m.d") >= date("10.24") && date("m.d") <= date("10.31")){	
	echo '<img  src="/design/img/slide/hallowineen.jpg">';
}
//valentin poszter
if(date("m.d") == date("02.14")){	
	echo '<img  src="/design/img/slide/valentin.jpg">';
}
//husvét poszter
/*if(date("m.d") >= date('m.d', strtotime("-7 day", strtotime(date("d.m.y", easter_date(date("Y")))))) && date("m.d") <= date('m.d', strtotime("+1 day", strtotime(date("d.m.y", easter_date(date("Y"))))))){	
	echo '<img  src="/design/img/slide/easter.jpg">';
}*/
//fekete péntek poszter  /// nem jó
if(date("m.d") >= date('m.d', strtotime("-7 day", strtotime($blackFriday))) /*&& date("m.d") == date('m.d', strtotime($blackFriday)) ez nem jó h bassza mmeg*/ ){	
	//echo '<img  src="/design/img/slide/black_friday/'.date("y").'_'.date('d', strtotime($blackFriday)).'.jpg">';
}	

//prémium event poszter
if(date("d") >= date("7") && date("d") < date("14") || $this->Player_Model->prem->event_date > date("Y-m-d H:i:s")){
	echo '<img  src="/design/img/slide/event.jpg">';
}

?>		
		<img  src="/design/img/slide/img4.jpg">
		<img  src="/design/img/slide/whell.jpg">
		<img  src="/design/img/slide/img2.jpg">
		<img  src="/design/img/slide/img1.jpg">
	</div>

<div class="mask"></div>
<div id="image-fader-counter"></div>
</div>

	
	
</div>

<div class="newsList">
	<div class="tittle"><h1>Hírek<h1></div>
                     
				<article>
			<div id="container">
			<?			
			$db = $this->load->database('admindb', TRUE);
					

			$db->limit(15);
			$db->order_by('datum', 'DESC');
			$query = $db->get_where('game_news', array('game' => '4s4e'));
			$i = 0;

			foreach ($query->result_array() as $value) {
			?>	
				<i>
				  <div class="divItem close" id="new<?=$value['id']?>">
					<div class="divTitle">
					  <div class="leftBorder"></div>
					  <div class="titleText"><a href="javascript:void(0)" onclick="switchItem(<?=$value['id']?>)"><?=$value['news_name']?></a></div>
					  <div class="rightBorder"></div>
					  <div class="dateText">[<?=$value['datum']?>]</div>
					  <div class="clear"></div>
					</div>
					<div class="divContent"><p><?=nl2br($value['news'])?></div>
				</div>
			<?}?>
	</div>
					<div class='event'></div>
				</article>
	
	<div class="tittle"><h1>Havi Ranglista<h1></div>	
		<div class="ranklist">	


			<table>
			<tr class="label">
					<td>Rang</td>
					<td>Faj</td>
					<td>Név</td>
					<td>Szint</td>
					<td>Becsület</td>
					<td>Nemzet</td>
			</tr>		
				<?php
					$i=0;	
				  $query= $this->db->query( "
					  SELECT TOP 10 *
					  FROM CLASSIC_GAME.dbo.TMONTHPVPOINTTABLE 
					  INNER JOIN CLASSIC_GAME.dbo.TCHARTABLE ON ( CLASSIC_GAME.dbo.TMONTHPVPOINTTABLE.dwCharID  = CLASSIC_GAME.dbo.TCHARTABLE.dwCharID)
					  WHERE szNAME NOT LIKE '%]%' 
					  ORDER BY dwPoint DESC
				  ");
						
					foreach ($query->result() as $row)
					{
						$nem	= ($row->bSex + $row->bRace * 2) * -36;
						$arc	= ($row->bHair + $row->bFace * 7) * -36;
				?>
					<tr>
					<td class="tdunkel"><?=$i++ + 1?></td>
					<td class="tdunkel"><div class="face" style="background-position: <?=$arc?>px <?=$nem?>px"></div></td>
					<td class="tdunkel"><a href="/main/charinfo/<?=$row->szNAME?>" data-popup-titlebar="false" class="userbox-link popup-open"><?=$row->szNAME?></a><br>		
					<small><?=$this->Data_Model->rank_chartype($row->bClass)?></small></td>
					<td class="tdunkel"><?=$row->bLevel?></td>
					<td class="tdunkel"><?=$row->dwPoint?></td>
					<td class="char_country" style="background-position: <?=$row->bCountry * -36?>px 0px"></td>
					</tr>
				<?}?>
		</table>
				<div class="page">
			<a href="<?=$this->config->item('base_url')?>main/rankchar/">Teljes ranglista >></a><br>
		</div>
		<div class='event'></div>
	</div>
</div>	
	
