<div class="newsList">

<div class="tittle"><h1>Pillanatképek<h1></div>
	<div class="screen">
	<?
		
	$config['base_url'] = $this->config->item('base_url').'main/screenshots/';
	$config['total_rows'] = SizeOf($this->Player_Model->img);
	$config['per_page'] = 10;
	$config['num_links'] = 3;
	// $config['next_link'] = 'Következő';
	$config['last_link'] = 'Utolsó ›';
	// $config['prev_link'] = 'Előző';
	$config['first_link'] = '‹ Első';

	$this->pagination->initialize($config);
		
		?>

<? if ($this->session->userdata('dwUserID'))  {?>
<div class="galery_update">
	<a href="/user/galery" data-popup-titlebar="false" class="btn popup-open">Feltöltés</a>
</div>	
<?}?>

	<div class="screen_list">
		<?
			$id = 0;
			foreach ($param1->result() as $row)
			{
				if($id >= $param2 and $id < ($param2 + $config['per_page']) )
				{
		?>
		<dl>
						<dd class="screen_img"><a href="/main/screenview/<?=$row->id?>"><img src="<?=$this->config->item('base_url')?>design/img/screenshots/<?=$row->img?>" height="120" width="195"></a></dd>
						<dt class="screen_title"><a href="/main/screenview/<?=$row->id?>"><?=$row->note?></a> <span class="board_cmt"><?=$post=($row->post_count > 0) ? '['.$row->post_count.']' : null?> </span> </dt>
						<dd class="screen_name"><?=$row->user?></dd>
						<dd class="screen_date"><span class="screen_cmt"><img src="/design/img/icons/ic_rec.png" alt="Szavazatok" title="Szavazatok" height="12" width="12"><?=$row->like?><img src="/design/img/icons/ic_pic.png" alt="Megtekintések" title="Megtekintések" height="12" width="12"><?=$row->views?></span><span class="screen_date_right"><?=date("Y/m/d", strtotime($row->date))?></span></dd>
		</dl>
		<?
				}	
				$id++; 
			} 
		?>
	</div>
<div class="board_paging">
				<div class="pagination"><? echo  $this->pagination->create_links() ;?>	</div>

			</div>
			
	<!--	<div class="tittle"><h1>Videók<h1></div> -->
			
		<!--	<div class='event'></div> -->
	</div>
</div>
