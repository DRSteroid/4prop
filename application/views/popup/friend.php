	<div id="popup_window">
	<h4 class="tittle">
		<span class="text">Meghívott barátok</span>
		<a class="popup-close" href="#"></a>
		<div class="bgline"></div>
	</h4>	
			
					<p>Eddigi meghívottjaid (<?=$param2[1]?>):</p>
					<? if($param2[1] > 0) { ?>
					<table class="refTable">
						<tbody>
							<tr class="label">
								<th>Meghívott</th>
								<th>Státusz</th>
							</tr>
							<tr>
								<?php
									for($i = 0; $i < $param2[1]; $i++)
									{
										$status = '';
										switch($param3[$i][0][1])
										{
											case 0:
												$status = 'Függőben';
											break;
											case 1:
												$status = 'Feldolgozva';
											break;
											case 2:
												$status = 'Elutasítva';
											break;
										}
										
										echo "<tr>
										<td align='center'>{$param3[$i][0][0]}</td>
										<td align='center'>$status</td>
										</tr>";
									}
								?>
							</tr>
						</tbody>
					</table>
					<p>A táblázat értelmezése</p>
					<p>A táblázat bal oldali oszlopában a meghívottjaid nevét olvashatod, a jobb oldali oszlopban pedig a meghívás státuszát. A státusz lehet:</p>
					<ul class="feature-list">
						<li><b><u>Függőben:</b></u> A meghívottad még nem aktiválta a felhasználói fiókját, vagy nem teljesítette a feltételeket.</li>
						<li><b><u>Feldolgozva:</b></u>  A meghívottad teljesítette a feltételeket, és mindketten megkaptátok a jutalmat.</li>
						<li><b><u>Elutasítva:</b></u> A meghívás nem érvényes, mert a kódoddal regisztráltál.</li>
					</ul>
					<? } else { ?>
					<p>Nincsenek meghívottjaid.</p>
					<? } ?> 
		</div>

			
			