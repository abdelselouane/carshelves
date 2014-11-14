<div id="alert" class="alert alert-info" role="alert"><!-- success info warning danger-->
	Please use the form below to get the API response.
</div>
<form id="resetPassword_form" action="<?=base_url()?>api/resetCode/resetPassword" method="POST" role="form" >
	<div class="form-group">
		<label for="resetCode">Reset Code:</label>
		<div><input type="text" value="" name="resetCode" id="resetCode" class="form-control" placeholder="Enter reset code" /></div>
	</div>
    <div class="form-group">
		<label for="password">New Password:</label>
		<div><input type="password" value="" name="password" id="password" class="form-control" placeholder="Enter password" /></div>
	</div>
	<div class="form-group">
		<label for="password">Confirm New Password:</label>
		<div><input type="password" value="" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm your password" /></div>
	</div>
    <div class="form-group">
		<div><input type="hidden" value="<?= $AppToken ? $AppToken : '' ;?>" name="AppToken" id="AppToken" /></div>
	</div>
</form>
<div><button class="btn btn-info" id="resetPassword_submit" >Reset Password</button></div>
<script type="text/javascript">
	$(document).ready(function () {

      	$("#resetPassword_submit").click(function(){
			
			var form	= $("#resetPassword_form")
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