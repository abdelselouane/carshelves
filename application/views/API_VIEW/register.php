<div id="alert" class="alert alert-info" role="alert"><!-- success info warning danger-->
	Please use the form below to get the API response.
</div>
<form id="register_form" action="<?=base_url()?>api/register/registerUser" method="POST" role="form">
	<div class="form-group">
		<label for="username">Username:</label>
		<div><input type="text" value="" name="username" id="username" class="form-control" placeholder="Enter username" /></div>
	</div>
	<div class="form-group">
		<label for="email">Email:</label>
		<div><input type="text" value="" name="email" id="email" class="form-control" placeholder="Enter email" /></div>
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<div><input type="password" value="" name="password" id="password" class="form-control" placeholder="Enter password" /></div>
	</div>
	<div class="form-group">
		<label for="cpassword" >Confirm Password:</label>
		<div><input type="password" value="" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm your password" /></div>
	</div>
	<div class="form-group">
		<label class="checkbox" for="terms">
			<input type="checkbox" value="on" name="terms" id="terms" checked="checked"/>Terms & Condition
		</label>		    
	</div>
	<div class="form-group">
		<div><input type="hidden" value="<?= $AppToken ? $AppToken : '' ;?>" name="AppToken" id="AppToken" /></div>
	</div>
</form>
<div><button class="btn btn-info" id="register_submit" >Register Now</button></div>
<script type="text/javascript">
	$(document).ready(function () {

      	$("#register_submit").click(function(){
			
			var form	= $("#register_form")
			var post	= form.serialize();
			var url		= form.attr('action');
			
			$.ajax({
                url: url,
                type: 'post',
                data: post,
                success: function(response) {
                	
                	var obj = jQuery.parseJSON(response);
                	var alert = $("#alert");
                	
                	moveAlertClass(alert);
                	if( obj.status === 0 ){
                		alert.addClass("alert-danger");
                	}else{
                		alert.addClass("alert-success");
                	}
                	
                	alert.empty();
                	alert.html(obj.data.msg);
                	editor.setValue(response);
                	
                	return false;
                }
            });
		});
 });
</script>
