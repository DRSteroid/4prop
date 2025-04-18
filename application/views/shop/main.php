<?
$query = $this->db->query("SELECT top 8 * FROM TShopItem WHERE dwAkcio > 0 ORDER BY wID DESC");
$test = $this->db->query("SELECT * FROM TGAINMSBONUSLOG");
?>
<div id="mainNews" class="poi">
<script>
	$('#name_page_cat').html('Heti ajánlat');
</script>
<h1 id="vaio">Heti ajánlat</h1>
<div style="position:relative" class="dynContent">
  <br>
<?

 if ($this->session->userdata('dwUserID') != 2) {
foreach ($query->result_array() as $item) {?>
  
<div class="promotedItem">
    <div class="withDescription">
	
        <div class="thumbnailBgSmall discount thumbnailBgSmall-discount-ie6">
                                        <a class="openinformation" title="további információk" href="./shop/ajax/<?=$item["wID"]?>">
                    <img width="63px" height="63px" alt="további információk" src="/design/img/items/<?=$item["wItemID"]?>.jpg">
                                    </a>
					
					<?if ($item["dwAkcio"] > 0){ ?>
					<div class="discountPercentCategory">
						<a class="openinformation" title="további információk" href="./shop/ajax/<?=$item["wID"]?>"></a></div>
					<?}?>	
						
					</div>
        
                <h4><?=$item["szName"]?></h4>

	<? $sale = $item["dwMoney"] * ($item["dwAkcio"] / 100) ?>
	<div class="promotedItemBtns">
			<div class="itemPrice">
				<div class="priceValue"><?=$item["bCount"]?> darab:<span class="price">&nbsp;<?=floor($item["dwMoney"] - $sale)?> <?=$this->config->item('cash_prefix')?></span></div>
				<div class="discountOldPriceCategory"><?=$item["dwMoney"]?> <?=$this->config->item('cash_prefix')?></div> 
			</div>
	
			<a class="buy openinformation" title="további információk" href="/shop/ajax/<?=$item["wID"]?>">Részletek</a>
		<br class="clearfloat">
	</div>
	
</div>
 </div>
 <?}?>
 <?}?>
 
 
 <?
 
 if ($this->session->userdata('dwUserID') == 2) {
 foreach ($test->result_array() as $item) {
	 
	 ?>
  
<div class="promotedItem">
    <div class="withDescription">
	


        
                <?=$item["dwUserID"]?><br><br>
                <?=$item["dwCash"]?><br><br>
                <?=$item["dDate"]?><br><br>


	
</div>
 </div>
 <?
 }
 }
 
 ?>
 
 
</div>
</div>

<div id="News" >
	<a href="/shop/wheel/" class="spot">
	<h1>Végzet Kereke</h1>
	<h2>Tedd próbára a szerencséd és szerezz értékes tárgyakat!</h2>
	</a>
</div>


