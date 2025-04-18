<? $msg = $param3 ;?>

<div class="col-2">
        	<div class="first-content"></div>
<div class="content-box">
  <div class="content-box-first-head">
      <h3>Számlád</h3>
      <div class="inner-box-2">
          <h4>Email Cím Megváltoztatása</h4><img title="Elfelejtett jelszó" alt="Elfelejtett jelszó" src="<?=$this->config->item('base_url')?>design/img/forgotpw.jpg" class="pic">
          <p>
<?if($msg == 'success'){?>
<p>Email címed lecserélve!</p>  

<?}else{?>
<p>A beadott link nem helyes. Esetleg hibásan másoltad a linket az Emailből?</p>

<?}?>	
  
	  
       </div>
	 </div>
</div>
<div class="content-box-last"></div>        </div>