<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<base href="/">

	<meta content="text/html;charset=utf-8" http-equiv="content-type">
	
		<meta content="IE=edge" http-equiv="X-UA-Compatible">
		<title><?=$this->config->item('page_name')?> | Classic4Ever</title>

		
		<link href="/design/css/shop.css" rel="stylesheet">
		<script src="/design/js/shop/0517dbc738ea24aa73b64a25b30f8d.js" type="text/javascript"></script>		
		<script src="/design/js/shop/7ef645db9fe9c2161d57e2a9684f8c.js" type="text/javascript"></script>
		<script src="/design/js/shop/74a2472b07741e6900b40d529efc36.js" type="text/javascript"></script>
		<script src="/design/js/shop/b1ad0ec9073e2ae4eefbd6ad628e13.js" type="text/javascript"></script>
		<script src="/design/js/shop/44fc21806fac16fd1145ef90d1994a.js" type="text/javascript"></script>
		<script type="text/javascript">
		
			$(document).ready(function() {
			  $(function() {
				$("#characterlist").val('14432');
			  });
			});

				/*	
			function searchFocusGained()
			{
				if (trim(document.searchForm.searchString.value) == 'Suchbegriff')
				{
					document.searchForm.searchString.value = '';
				}
			}

			function searchFocusLost()
			{
				if (trim(document.searchForm.searchString.value) == '')
				{
					document.searchForm.searchString.value = 'Suchbegriff';
				}
			}
			
			
			function trySubmit()
			{
				searchString = trim(document.searchForm.searchString.value);
				return searchString != '' &amp;&amp; searchString != 'Suchbegriff';
			}
*/
			$(document).ready(function() {

			$('#breadcrumbInfoText').fadeIn(1000);
						 $('#optionsBar').mouseenter(function() {
                        $(this).addClass('optionsBarOv').removeClass('optionsBarNorm');
                    }).mouseleave(function(){
                        $(this).addClass('optionsBarNorm').removeClass('optionsBarOv');
                    }).click(function(){
                        $('#optionsSlider').fadeToggle('slow');
                    });
                    $('#optionsSlider').mouseleave(function() {
                        $(this).fadeOut('slow');
                    });
						});
			
		</script>
	</head>
	
	<body class="twoColFixLtHdr" scroll="no">
	  <div id="container">
		<div id="header">
		<div class="logo">TárgyPiac</div>
				<div class="boxSigns">
					<span class="heading">Bónusz Pont (BP):</span>
					<span class="marksValue"><?=$this->Player_Model->user->dwBonus?></span>
				</div>
				<div class="boxCoins">
					<span class="heading">Holdkő (HK):</span>
					<span class="coinsValue"><?=$this->Player_Model->user->dwCash?></span>					
					<a href="/payment" class="<?=$event=( 0 > 1) ? 'purchaseButtonHappyHour' : 'purchaseButton'?>" title="">Holdkő <br> szerzés</a>
				</div>
			</div>

			<ul id="breadcrumb">
				<li class="w"><a href="/shop">Főoldal</a>&nbsp;<span class="wer">&#187;</span></li>
				<li class="d" style="display:none;"><a id="dex" href=""></a>&nbsp;&#187;</li>
				<li class="last"><span id="name_page_cat"></span></li>
			</ul>
			<div id="sidebar1">

				<ul id="mainMenu">

				<? foreach ($this->Player_Model->shop as $category) {?>				
					<li><a title="" href="/shop/category/<?=$category["bID"]?>/"><?=$category["szName"]?></a></li>
				<?}?><br />
				</ul>
			</div>
						<?=$this->View_Model->show_shop($page, $param1, $param2, $param3)?>
			<div class="endContent"></div>
	</div>
</body></html>