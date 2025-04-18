<center>



 <table width="300" cellspacing="1" cellpadding="1" border="1">
      <tbody
	  ><tr>
        <th width="90" scope="col"><div align="center">Összeg:</div></th>

        <th width="100" scope="col"><div align="center"><?=$this->config->item('cash_valuta')?>:</div></th>
      </tr>
<?			
		$db = $this->load->database('admindb', TRUE);
		$query = $db->get_where('premium2', array('server' => $this->config->item('page_prefix2'), 'type' => 'bank'));
		$i = 0;
		foreach ($query->result_array() as $value) {
			$price = $value['price'];
			
			if( $value['event_date'] > date('Y-m-d H:i:s') ){
				
				if($value['event_type'] == 1)
					$new_coins = $value['coins'] * (1 + $value['event_rate'] / 100);
				else
					$new_coins = $value['coins'] * $value['event_rate'];
				
				$coins = '<span style="color:#8e8e8e;text-decoration:line-through;font-size:small;">'.$value['coins'].'</span>&nbsp'. $new_coins ;  
			} else {
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
        <td><div align="center"><?=$coins?> <?=$this->config->item('cash_valuta')?> </div></td>
      </tr>
      <tr>

 
<?}?>
    </tbody></table>
<br>
Bank információk:<table>
<tbody>
<tr>
<td class="left">Számlatulajdonos:</td>
<td class="right">Rácz Alex</td>
</tr>
<tr>
<td class="left">Számlaszám:</td>
<td class="right">11773425-02998943</td>
</tr>
<tr>
<td class="left">Bank neve:</td>
<td class="right">OTP Bank Nyrt.</td>
</tr>
<tr>
<td class="left">Összeg:</td>
<td class="right">A kívánt Érme ára (pl.:5000Ft)</td>
</tr>
<tr>
<td class="left">Közlemény:</td>
<td class="right">4S4E <?=$this->Player_Model->user->szUserName?></td>
</tr>
</tbody></table>

<br> 
<b>Figyelem:</b> A rendelésed <b>azután</b> lesz elfogadva hogy a pénz megérkezett a számlánkra. Ez eltarthat pár napig. Kérjük figyelmesen töltsd ki az átutalás közleményét.

<br><br>
Rendeléssel kapcsolatos hibákat a <a href="/support"><b>Jegyrendszerünkön</b></a> lehet jelenteni.<br><br>
</center>		
				