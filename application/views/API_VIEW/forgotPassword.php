<form action="<?=base_url()?>api/forgotPassword/checkEmail" method="POST" >
	<div>
		<label>Email Address:</label>
		<div><input type="text" value="" name="email" id="email" /></div>
	</div>
    <div>
		<div><input type="hidden" value="RCAk3bENwB4MGcTs6maQ8WdjLplOeo9y" name="AppToken" id="AppToken" /></div>
	</div>
	<div><input type="submit" value="submit"/></div>
</form>
