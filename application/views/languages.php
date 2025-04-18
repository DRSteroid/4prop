	<link type="text/css" rel="stylesheet" href="<?=$this->config->item('base_url')?>design/mmonetbar.css"/>

<?php
	$setting['mysql_db']	= "yg_admin"; 
	$setting['prefix']		= "ikariam"; 
	$connect = mysql_connect ("80.249.165.92","nazulor&999/666","-&20061006&-");
  	$query=mysql_query ("SELECT * FROM ".$setting['mysql_db'].".mmonetbar_news "); 
	$news_data=mysql_fetch_object($query)
?>
		<div id='top_panel'>


					 
 
			 
			 <div class='panel_news'>
			<?php echo $news_data->news ; ?>
			</div>    
											
<script type="text/javascript">
//	jQuery.noConflict();
		(function( $ ) {
		$(document).ready(function() {
		$("a#mmonetbar").fancybox();
		});
	})(jQuery);
</script>	
			 <div class='button'>
		      <a id="mmonetbar" href="/mmonetbar"><?=$this->lang->line('mmobar_button')?> </a>
			 </div>                        
							<!-- Link -->

			 <div class='lang'>
			 <?$query = mysql_query("select * from ".$setting['mysql_db'].".mmonetbar_lang where game = '".$setting['prefix']."'")?>
			 <?while($data = mysql_fetch_object($query)){ ?>
				<?if(mysql_num_rows($query) > 1){ ?>
					<a href="<?=$data->link?>"><img src="<?=$this->config->item('base_url')?>design/mmonetbar/flags/<?=$data->lang?>.png"/></a>
				<?}?>
			 <?}?>
			 </div>
		</div>
		
		
