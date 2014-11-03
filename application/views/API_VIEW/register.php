<form action="<?=base_url()?>api/register/registerUser" method="POST" >
	<div>
		<label>Username:</label>
		<div><input type="text" value="" name="username" id="username" /></div>
	</div>
	<div>
		<label>Email</label>
		<div><input type="text" value="" name="email" id="email" /></div>
	</div>
	<div>
		<label>Password</label>
		<div><input type="password" value="" name="password" id="password" /></div>
	</div>
	<div>
		<label>Confirm Password</label>
		<div><input type="password" value="" name="cpassword" id="password" /></div>
	</div>
	<div>
		<label>Terms & Condition</label>
		<div><input type="checkbox" value="on" name="terms" id="terms" checked="checked"/></div>
	</div>
	<div>
		<div><input type="hidden" value="qJB0rGtIn5UB1xG03efyCp10xP3wqM01" name="AppToken" id="AppToken" /></div>
	</div>
	<div><input type="submit" value="submit"/></div>
</form>
