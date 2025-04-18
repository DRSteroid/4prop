<div id="popup_window">
	<div class="tittle">
		<a class="popup-close" href="#"></a>
		<h1>Galéria képfeltöltés</h1>
	</div>

<?php
if(empty($upload_data)){
echo $error = (empty($error)) ? '' : '<div class="warning">'.$error.'</div>';
}else{
	
?>
feltoltses siekers
<?}?>

<form action="<?=$this->config->item('base_url')?>upload/galery" class="galery_form popup-form" data-remote="true" method="post" enctype="multipart/form-data">

						<input placeholder="Megjegyzés (Max 20 karakter)" class="" name="note" type="text">	
					
						<input placeholder="Címke (Max 20 karakter)" class="" name="tag" type="text">	
					
					<br><br>
		<input type="file" name="userfile" size="20" />



	<div class="submit">					
		<input type="submit" value="Feltöltés" class="btn" />
	</div>
</form>

</div>