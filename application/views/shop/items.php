<div id="mainContent" class="poi">
<?
$query = $this->db->query("SELECT * FROM TShopItem WHERE bCategory = ? ORDER BY wID DESC", array($param1));
$category_query = $this->db->query("SELECT * FROM TShopCategory WHERE bID = ?", array($param1));
$category = $category_query->row();

?>
<script>
	$('#name_page_cat').html('<?=$category->szName?>');
</script>
<?
 if (!empty($query) and $query->num_rows() > 0) {
?>
<h1 id="vaio"><?=$category->szName?></h1>
<div style="position:relative" class="dynContent">
  <br>
<?foreach ($query->result_array() as $item) {?>
  
<div class="item">
    <div class="itemDesc">
        <div class="thumbnailBgSmall discount thumbnailBgSmall-discount-ie6">
                                        <a class="openinformation" title="további információk" href="./shop/ajax/<?=$item["wID"]?>">
                    <img width="63px" height="63px" alt="további információk" src="/design/img/items/<?=$item["wItemID"]?>.jpg">
                                    </a>
					
					<?if ($item["dwAkcio"] > 0){ ?>
					<div class="discountPercentCategory">
						<a class="openinformation" title="további információk" href="./shop/ajax/<?=$item["wID"]?>"></a></div>
					<?}?>	
						
					</div>
        <p>
                                    <a class="openinformation" title="további információk" href="./shop/ajax/<?=$item["wID"]?>">
                <span class="itemTitle"><?=$item["szName"]?></span>
            </a>
            <span class="line"></span>
            <?=$item["dwItemInfo"]?>
			<br class="clearfloat">
        </p>
    </div>
	<? $sale = $item["dwMoney"] * ($item["dwAkcio"] / 100) ?>
	<? /* HK ITEM */
		if($item["dwMoney"]!="0") { ?>
	
		<div class="purchaseOptionsWrapper">
			<?if($item["dwAkcio"] == 0){?> 
				<div class="itemPrice">
					<div class="priceValue"><?=$item["bCount"]?> darab:<span class="price">&nbsp;<?=$item["dwMoney"]?> <?=$this->config->item('cash_prefix')?></span></div>
				</div>
			<?}else{?>	
				<div class="itemPrice discount itemPrice-discount-ie6">
				<div class="priceValue discount priceValue-discount-ie6"><?=$item["bCount"]?> darab:</div>
				<div class="price discount price-discount-ie6"><?=floor($item["dwMoney"] - $sale)?> <?=$this->config->item('cash_prefix')?></div>
			   
			  
				<div class="discountOldPriceCategory"><?=$item["dwMoney"]?> <?=$this->config->item('cash_prefix')?></div> 
				<div class="discountPercentCircleCategory"></div>
				
				</div>
			<?}?>	
				<a class="purchaseInfo openinformation <?=$sale =($item["dwAkcio"] > 0) ? 'discount' : null?> purchaseInfo-discount-ie6" title="további információk" href="/shop/ajax/<?=$item["wID"]?>">Részletek</a>
			<br class="clearfloat">
		</div>
		<?}?>

		<? /* BP ITEM */
		if($item["dwBonus"]!="0") { ?>
	
		<div class="purchaseOptionsWrapper">
			
				<div class="itemPrice">
					<div class="priceValue"><?=$item["bCount"]?> darab:<span class="price">&nbsp;<?=$item["dwBonus"]?> BP</span></div>
				</div>	
				<a class="purchaseInfo openinformation purchaseInfo-discount-ie6" title="további információk" href="/shop/ajax/<?=$item["wID"]?>">Részletek</a>
			<br class="clearfloat">
		</div>
		<?}?>
</div>

 <?}?>
 <?}else{ ?>
<div id="mainContent" class="poi">
<script>
	$('#name_page_cat').html('Hiba');
</script>
<h1 id="vaio">Hiba</h1>
<div style="position:relative" class="dynContent">
  <br>
	<div class="item">
		<div class="itemDesc">
        <div class="thumbnailBgSmall"><img width="63px" height="63px" alt="" src="//gf2.geo.gfsrv.net/cdn1c/647aaae5f8b6394c1ce828155a35f8.png"></div>
        <p>
            <span class="errorTitle">Hiba</span>
            <span class="line"></span>
            Ismeretlen hiba lépett fel.</p><br class="clearfloat">
		</div>
	</div>
</div>
 <?} ?>
</div>
</div>
