<div id="Inner_shop">
	<div class="blue" id="box2">
		<br />
		<img src="<?php echo base_url();?>design/img/shop/paysafecard-header.png" style="margin-left:5px;"/>
		<br /><br /><br />
		<?php
			if($this->session->userdata('dwUserID') == 4)
			{
		?>

			<table bordercolor="#260d00" width="460px" cellspacing="1" cellpadding="1" border="1">
			<tbody>
				<tr>
				<th width="90" scope="col"><div align="center">Ár</div></th>
				<th width="100" scope="col"><div align="center"><?=$this->config->item('cash_valuta')?></div></th>
				<th width="100" scope="col"><div align="right"></div></th>
				</tr>

<?			
		$db = $this->load->database('admindb', TRUE);
		$query = $db->get_where('premium2', array('server' => $this->config->item('page_prefix2'), 'type' => 'paysafecard'));
		$i = 0;
		foreach ($query->result_array() as $value) {
			$price = $value['price'];
			
			if( $value['event_date'] > date('Y-m-d H:i:s')){
				
				if($value['event_type'] == 1)
					$new_coins = $value['coins'] * (1 + $value['event_rate'] / 100);
				else
					$new_coins = $value['coins'] * $value['event_rate'];
				
				$coins = '<span style="color:#8e8e8e;text-decoration:line-through;font-size:small;">'.$value['coins'].'</span>&nbsp'. $new_coins ;  // szorozzuk osszuk ahogy tetszik  - event rate
			}else {
				//gyári 
				$coins = $value['coins'];
				$new_coins = $value['coins'];
			}
			
			//auto event 50%
			if(date("d") >= date("7") && date("d") < date("14") && date('Y-m-d H:i:s') > $value['event_date']){
				$new_coins = $value['coins'] * (1 + 50 / 100);
				$coins = '<span style="color:#8e8e8e;text-decoration:line-through;font-size:small;">'.$value['coins'].'</span>&nbsp'. $new_coins ;  
			}
			
			//auto event 30%
		/*	if(date("d") >= date("3") && date("d") < date("31") && date('Y-m-d H:i:s') > $value['event_date']){
				$new_coins = $value['coins'] * (1 + 30 / 100);
				$coins = '<span style="color:#8e8e8e;text-decoration:line-through;font-size:small;">'.$value['coins'].'</span>&nbsp'. $new_coins ;  
			}*/
			?>	  
				<tr>
					<td><div align="center"><span style="color:#ffc029">PSC €<?=$price?></font></div></td>
					<td><div align="center"><span style="font-weight:bold;color:#ffb400"><?=$coins?> </span> </div></td>
					<form target="_parent" action="process" method="post"> <?php // remove sandbox=1 for live transactions ?>
					<input type="hidden" name="action" value="process" />
					<!--<input type="hidden" name="cmd" value="_cart" />-->
					<input type="hidden" name="gway" value="paysafecard"/>
					<input type="hidden" name="id" value="<?=$value['id']?>"/>
					<input type="hidden" name="server" value="<?=$value['server']?>"/>
					<td align="center">
						<input name="submit" value="Buy Now" class="btn" type="submit">
						</td>
					</form>
				</tr>
				<?}?>	  
			</tbody>
		</table>
		
	<?php
			}
			else
			{
				echo '<center><h3>Paysafecard payments will be available soon.</h3></center>';
			}
	?>
	</div>
</div>