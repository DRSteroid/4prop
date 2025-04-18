<?if(empty($error)){?>
<div class="dynContent">
    <div id="confirmBox" class="item">
        <div class="itemDesc confirmDesc">
            <div class="thumbnailBgSmall"><img width="63px" height="63px" src="/design/img/items/<?=$data->wItemID?>.jpg"></div>
            <p>
                <span class="confirmTitle">Teljes vásárlási folyamat </span><br>
                A tárgy sikeresen hozzá lett adva a fiókodhoz.<br>
                <a title="Weiter einkaufen" class="confirmLink" href="javascript:history.back()">Vásárlás folytatása</a> 
            </p><br class="clearfloat">
        </div>
    </div>
    <div class="hint">
        <div class="itemDesc messageDesc">
            <p>
                <span class="hintTitle">Megjegyzés</span><br>
                A vásárolt tárgyat a HK rekeszedben találod.</p><br class="clearfloat">
        </div>
    </div>
   <div class="box suggestions">
        <h2>Egyéb Ajánlatok:</h2>
        <ol id="suggestions">
		<? 
		$num  = 0;
		$query = $this->db->query("SELECT TOP 7 * FROM TShopItem Order by NEWID()")->result_array();
		 foreach ($query as $item) {
		?>
		<div class="thumbnailBgSmall <?=$test = (++$num > 6) ? 'last' : null?>">
			  <a title="<?=$item["szName"]?>" href="./shop/ajax/<?=$item["wID"]?>" class="suggestion" id="suggestion2500">
				<img width="63" height="63" alt="<?=$item["szName"]?>" src="/design/img/items/<?=$item["wItemID"]?>.jpg">
			  </a>
			</div>
		<?}?>
	</ol>
    </div>
</div>
<?}else{?>
<div class="dynContent">
    <div class="item">
        <div class="itemDesc">
            <div class="thumbnailBgSmall"><img width="63px" height="63px" src="/design/img/items/<?=$data->wItemID?>.jpg"></div>
            <p>
                <span class="errorTitle">HIBA</span>
                <span class="line"></span>
                     Nem rendelkezel elegendő összeggel a tárgy megvásárláshoz!
				</p><br class="clearfloat">
        </div>
    </div>
</div>
<?}?>