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
<p>Biztonsági okokból 3 napod van az új e-mail címed megerősítésére, ha ez nem történik meg, a változás nem lesz véglegesítve. Használd az érvényesítő linket az e-mailben ami el lett küldve az új e-mail címedre. Miután az e-mail cím megváltozott, 7 napig nem lehet ismét módosítani.</p>  

<?}else{?>
<p>A beadott link nem helyes. Esetleg hibásan másoltad a linket az Emailből?</p>

<?}?>	
  
	  
       </div>
	 </div>
</div>
<div class="content-box-last"></div>        </div>