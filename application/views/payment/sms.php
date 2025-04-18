<?if( empty($param1) ) {?>

 <center>
&#65279;    <table width="450px" cellspacing="1" cellpadding="1" border="1">
      <tbody>
	  <tr>
        <th width="90" scope="col"><div align="center">Összeg:</div></th>
        <th width="100" scope="col"><div align="center">SMS szám:</div></th>
        <th width="100" scope="col"><div align="center">Üzenet:</div></th>
        <th width="100" scope="col"><div align="center"><?=$this->config->item('cash_valuta')?>:</div></th>
      </tr>
	  
<?			
		$db = $this->load->database('admindb', TRUE);
		$query = $db->get_where('premium2', array('server' => $this->config->item('page_prefix2'), 'type' => 'sms'));
		$i = 0;
		foreach ($query->result_array() as $value) {
			$price = $value['price'];
			
			$szamok = array( 
				//sms
				0=>'06-90/643-363',	// 508 ft
				1=>'06-90/888-309',	// 1016 ft
				2=>'06-90/888-409',	// 2032 ft
				3=>'06-90/649-549'	// 5080 ft
			);
			
			if( $value['event_date'] > date('Y-m-d H:i:s')){
				
				if($value['event_type'] == 1)
					$new_coins = $value['coins'] * (1 + $value['event_rate'] / 100);
				else
					$new_coins = $value['coins'] * $value['event_rate'];
				
				$coins = '<span style="color:#8e8e8e;text-decoration:line-through;font-size:small;">'.$value['coins'].'</span>&nbsp'. $new_coins ;  // szorozzuk osszuk ahogy tetszik  - event rate
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
        <td><div align="center"><?=$price?> Ft (áfával)</div></td>
        <td><div align="center"><?=$szamok[$i++]?></div></td>
        <td><div align="center"><b>YIRO</b></div></td>
        <td><div align="center"><?=$coins?> <?=$this->config->item('cash_valuta')?> </div></td>
      </tr>  
 
	  
	  <?}?>
    </tbody></table>
</center>

<center>
<div class="card">
    <form method="POST">
      
        <br> Add meg az aktiváló kódot:
          <input type="text" size="16" maxlength="6" name="kartyaszam">
		  <input type="submit" value="Küldés" class="btn" name="submit">
		  <table>
        <tbody><tr>
		  
		   
        </tr>
      </tbody></table>
    </form>

<div class="sms_left">
Az smsrendszert a szerverem.hu biztosítja<br>
Aktiválással kapcsolatos hibákat a <a href="/support"><b>Jegyrendszerünkön</b></a> lehet jelenteni.<br><br>
</div>

<div class="sms_right">
SMS hiba bejelentő szám: (52) 999-337 (Non stop ügyfélszolgálati telefonszám)<br>
aggregátor: szerverem.hu <br>
További információk: (52) 999 337 vagy info@szerverem.hu
	
</div>
	</div>


	</center>
		
				</div>
				
<?} else {?>
<center>
<p class="tiny-txt"><?=$param1?></p>
<a class="btn" href="<?=$this->config->item('base_url')?>payment/sms"> OK<a/>
</center>
<?} ?>
