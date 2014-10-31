<form action="<?=base_url()?>api/activation/activate" method="GET" >
	<div>
		<label>UserID:</label>
		<div><input type="text" value="" name="userId" id="userId" /></div>
	</div>
	<div>
		<label>Activation Code</label>
		<div><input type="text" value="" name="digit_code" id="digit_code" /></div>
	</div>
	<div><input type="submit" value="submit"/></div>
</form>