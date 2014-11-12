<div style="float:right;">
    <a href="<?=base_url();?>api/api">Back To Navigation</a>
</div>
<form action="<?=base_url()?>api/resetCode/resetPassword" method="POST" >
	<div>
		<label>Reset Code:</label>
		<div><input type="text" value="" name="resetCode" id="resetCode" /></div>
	</div>
    <div>
		<label>New Password</label>
		<div><input type="password" value="" name="password" id="password" /></div>
	</div>
	<div>
		<label>Confirm New Password</label>
		<div><input type="password" value="" name="cpassword" id="password" /></div>
	</div>
    <div>
		<div><input type="hidden" value="<?= $AppToken ? $AppToken : '' ;?>" name="AppToken" id="AppToken" /></div>
	</div>
	<div><input type="submit" value="submit"/></div>
</form>
