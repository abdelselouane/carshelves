<h1 class="page-header">API</h1>
<h2 class="sub-header">Profile Login Info</h2>
<div id="alert" class="alert alert-info" role="alert"><!-- success info warning danger-->
	Please use the form below to get the API response.
</div>
<form id="profile_login" action="<?=base_url()?>api/register/registerUser" method="POST" class="" role="form">
    <div class="form-group">
		<label for="username">Username:</label>
		<div><input type="text" value="<?= ($username) ? $username : '' ?>" name="username" id="username" class="form-control" placeholder="Enter username" readonly/></div>
	</div>
    <div class="form-group">
		<label for="display_name">Display Name:</label>
		<div><input type="text" value="<?= ($display_name) ? $display_name : '' ?>" name="display_name" id="display_name" class="form-control" placeholder="Enter display name" /></div>
	</div>
	<div class="form-group">
		<label for="email">Email:</label>
		<div><input type="text" value="<?= ($email) ? $email : '' ?>" name="email" id="email" class="form-control" placeholder="Enter email" /></div>
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<div><input type="password" value="" name="password" id="password" class="form-control" placeholder="Enter password" /></div>
	</div>
	<div class="form-group">
		<label for="cpassword" >Confirm Password:</label>
		<div><input type="password" value="" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm your password" /></div>
	<div class="form-group">
		<div><input type="hidden" value="<?= $AppToken ? $AppToken : '' ;?>" name="AppToken" id="AppToken" /></div>
	</div>
</form>
<div><button class="btn btn-info" id="profile_login_submit" >Register Now</button></div>
<script type="text/javascript">
	$(document).ready(function () {

      	$("#profile_login_submit").click(function(){
			
			var form	= $("#profile_login")
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
