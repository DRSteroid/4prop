<? $msg = $param3 ;?>
	<div id="popup_window">
	<h4 class="tittle">
		<span class="text">Email Cím Megváltoztatása</span>
		<a class="popup-close" href="#"></a>
		<div class="bgline"></div>
	</h4>

<?if($msg == 'success'){?>
<p>Biztonsági okokból 3 napod van az új e-mail címed megerősítésére, ha ez nem történik meg, a változás nem lesz véglegesítve. Használd az érvényesítő linket az e-mailben ami el lett küldve az új e-mail címedre. Miután az e-mail cím megváltozott, 7 napig nem lehet ismét módosítani.</p>  

<?}elseif($msg == 'activated'){?>
<p>Az Email csere sikertelen, a linked elévült. Kérjük, kérj új linket az Email csere menüpontban.</p>

<?}else{?>
<p>A link hibás vagy el lett fogadva!</p>

<?}?>	
   </div>