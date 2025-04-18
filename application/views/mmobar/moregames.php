<div id="mmowindow">
	<a class="popup-close" href="#"></a>

<?

foreach ($category->result_array() as $row2){
	
				$new = ( $row2['category'] == "new") ? "_new" : "" ;
				if( $row2['category'] == "new" ){
				$category = 'Kiemelt/Új játékok' ;
				} else if ($row2['category'] == "more"){
				$category = 'Egyéb' ;
				} else if ($row2['category'] != "more" and $row2['category'] != "new" ){
				$category =	$row2['category'] ;
				}
?>

<div class="tittle">
<h1><?=$category?><h1>
</div>

<?
	foreach ($game->result_array() as $row){
		
		$image = ( $row['category'] == "new") ? $row['big_image'] : $row['image'] ;
		if($row2['category'] == $row['category'] ) {
			?>

	<li class="game_card<?=$new?>">	
		<a target="_blank" href="<?=$row['link_page']?>" title="<?=$row['game_name']?>">
			<span class="image-wrap<?=$new?>" style="display:inline-block;  background:url(http://mmobar.yirogames.com/<?=$image?>) no-repeat center center; "></span>

		</a>
			<div class="game_card_play_bg">
				<a type="hidden" class="test" target="_blank" href="<?=$row['link_page']?>">Játsz MOST!</a>
			</div>							
			<div class="game_card_fb_bg">
									<a class="button_calltoaction_fb" target="_blank" href="<?=$row['link_fb']?>">Közösség</a>
										</div>
	</li>			

	<?}}}?>

 </div>
