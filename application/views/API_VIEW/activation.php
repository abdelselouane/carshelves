<div style="float:right;">
    <a href="<?=base_url();?>api/api">Back To Navigation</a>
</div>
<form action="<?=base_url()?>api/activation/activate" method="POST" >
	<div>
		<label>Activation Code</label>
		<div><input type="text" value="" name="digit_code" id="digit_code" /></div>
	</div>
     <div>
		<div><input type="hidden" value="<?= $AppToken ? $AppToken : '' ;?>" name="AppToken" id="AppToken" /></div>
	</div>
	<div><input type="submit" value="submit"/></div>
</form>
