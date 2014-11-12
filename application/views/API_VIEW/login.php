<div style="float:right;">
    <a href="<?=base_url();?>api/api">Back To Navigation</a>
</div>
<form action="<?=base_url()?>api/login/signin" method="POST" >
	<div>
		<label>Username:</label>
		<div><input type="text" value="" name="username_email" id="username_email" /></div>
	</div>
	<div>
		<label>Password</label>
		<div><input type="password" value="" name="password" id="password" /></div>
	</div>
    <div>
		<label><a href="<?=base_url()?>api/forgotPassword/">Forgot Password?</a></label>
	</div>
	<div>
		<label><a href="<?=base_url()?>api/activation/">Account Activation</a></label>
	</div>
    <div>
		<div><input type="hidden" value="<?= $AppToken ? $AppToken : '' ;?>" name="AppToken" id="AppToken" /></div>
	</div>
	<div><input type="submit" value="submit"/></div>
</form>
