<center>	
		<table bordercolor="#260d00" width="460px" cellspacing="1" cellpadding="1" border="1">
			<tbody>
				<tr>
				<th width="90" scope="col"><div align="center">Ár</div></th>
				<th width="100" scope="col"><div align="center"><?=$this->config->item('cash_valuta')?></div></th>
				<th width="100" scope="col"><div align="right"></div></th>
				</tr>

<?			
		$db = $this->load->database('admindb', TRUE);
		$query = $db->get_where('premium2', array('server' => $this->config->item('page_prefix2'), 'type' => 'paypal'));
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
					<td><div align="center"><?=$price?> Ft</div></td>
					<td><div align="center"><?=$coins?> </div></td>
					<td align="center">
                        <a href="https://www.paypal.com/paypalme/tamogatasclassic?country.x=HU&amp;locale.x=en_US" style="text-decoration:none;" target="_blank">
                            <button class="pp_btn"></button>
                        </a>
					</td>
				</tr>
				<?}?>	  
			</tbody>
		</table>	
</center>	