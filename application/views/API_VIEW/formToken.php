<form action="<?=base_url()?>api/appToken/generateToken" method="POST" >
	<div>
		<label>AppToken:</label>
		<div>
			<select name="appToken" id="appToken">
				<option value="MobileIosAppToken">Mobile IOS</option>
				<option value="MobileAndroidAppToken">Mobile Android</option>
			</select>
		</div>
	</div>
	<div><input type="submit" value="Generate New AppToken"/></div>
</form>
