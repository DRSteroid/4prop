<script type="text/javascript">
    var userAmountLocaString = 'dasa';
</script>
<?
 if (!isset($error)) {
?>
<h1 class="mainHeadline"><?=$szName?></h1>
<div class="dynContent detail">
<div class="box boxLeft visual">
	<img alt="<?=$szName?>" src="/design/img/items/<?=$wItemID?>.jpg">
	<?if($dwAkcio > 0){?>
	<div id="discountPercent"></div>
	<?}?>
</div>
    <div class="box desc descOnlyItem">
        <div class="detailBadge">
            <div class="detailBadgeInner"></div>
        </div>
		<h2><?=$szName?></h2>

		<p><?=$dwItemInfo?></p>
	
	</div>
	<? $sale_price = $dwMoney * ($dwAkcio / 100) ?>
	<? $price =($dwAkcio > 0) ? floor($dwMoney - $sale_price) : $dwMoney ;?>
	<div class="box boxRight buy <?=$sale =($dwAkcio > 0) ? "discount" : null?> onlyItem">

	<?if($bCount > 1 && $dwAkcio == 0 && $dwMoney > 0){?>
		<div class="priceSelect">
			<div class="big" id="selectItemContainer">
				<table cellspacing="0" id="selectItem">
					<input type="hidden" value="<?=$wID?>" id="deko">
					<tbody>
								<tr value="&gt;<?=$bCount?>:<?=$price?>:<?=$price?>:<?=$price?>:0:<?=$bCount?>" class="bgSelected">
						<td><?=$bCount?> Db.</td>
						<td class="price"><?=$price?>&nbsp;<?=$this->config->item('cash_prefix')?></td>
					</tr>
					<?if($bCount * 10 <= 200){?>
								<tr value="<?=$bCount * 5?>:<?=$price * 5?>:<?=$price * 5?>:<?=$price * 5?>:0:<?=$bCount * 5?>">
						<td><?=$bCount * 5?> Db.</td>
						<td class="price"><?=$price * 5?>&nbsp;<?=$this->config->item('cash_prefix')?></td>
					</tr>
					<?} if($bCount * 20 <= 200){?>
								<tr value="<?=$bCount * 10?>:<?=$price * 10?>:<?=$price * 10?>:<?=$price * 10?>:0:<?=$bCount * 10?>">
						<td><?=$bCount * 10?> Db.</td>
						<td class="price"><?=$price * 10?>&nbsp;<?=$this->config->item('cash_prefix')?></td>
					</tr>
								<tr value="<?=$bCount * 20?>:<?=$price * 20?>:<?=$price * 20?>:<?=$price * 20?>:0:<?=$bCount * 20?>">
						<td><?=$bCount * 20?> Db.</td>
						<td class="price"><?=$price * 20?>&nbsp;<?=$this->config->item('cash_prefix')?></td>
					</tr>
					<?}?>
								</tbody>
				</table>
			</div>
		</div>
	<?}?>
	
        <div id="priceRight">
		
		<?if($dwMoney != 0){?> 
			<div class="sprice">
				<?if($dwAkcio > 0){?>
					<div id="oldPriceAmountDiv"><span id="oldPriceAmount"><?=$dwMoney?></span>&nbsp;<?=$this->config->item('cash_prefix')?></div>
				<?}?>	
					Ár: <span id="priceAmount"><?=$price?> </span><?=$this->config->item('cash_prefix')?>
			</div>
		<?}?>
		
		<?if($dwBonus != 0){?> 
			<div class="sprice">
					Ár: <span id="priceAmount"><?=$dwBonus?> </span>BP
			</div>
		<?}?>	
		
			<a href="./shop/buy/<?=$wID?>" class="tip  <?=$sale =($dwAkcio > 0) ? "discount" : null?>" id="buyItemLink">Megveszem</a>
			<a href="#" class="blank" id="buyItemLinkBlank">Megveszem</a>	
			
			<?if($this->Player_Model->user->dwCash < $price){?>
			<div class="buyInfo"><span id="mileageAmount"><?=$price - $this->Player_Model->user->dwCash?></span> <?=$this->config->item('cash_valuta')?> hiányzik a tárgy megvásárlásához</div>
			<?}?>
			
		</div>
	</div>
	
	<?if($dwAkcio > 0){?>
	        <div id="volumeDiscount" style="display: block;">
            <h3>Kedvezmény:</h3>
            <p style="color: rgb(255, 240, 210);">Megtakarítás: <span><?=floor($sale_price)?></span> <?=$this->config->item('cash_valuta')?>!</p>
        </div>
	<?}?>	
	
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
<?
 }else{
?>
dadasd
<?
 }
?>