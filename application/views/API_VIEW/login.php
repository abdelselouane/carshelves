<div id="alert" class="alert alert-info" role="alert"><!-- success info warning danger-->
	Please use the form below to get the API response.
</div>
<form id="login_form" action="<?=base_url()?>api/login/signin" role="form">
	<div class="form-group">
		<label for="username_email">Username:</label>
		<div><input type="text" value="" name="username_email" id="username_email" class="form-control" placeholder="Enter username or email" /></div>
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<div><input type="password" value="" name="password" id="password" class="form-control" placeholder="Password" /></div>
	</div>
    <div class="form-group">
		<div><input type="hidden" value="<?= $AppToken ? $AppToken : '' ;?>" name="AppToken" id="AppToken" /></div>
	</div>
</form>
<div><button class="btn btn-info" id="login_submit" >Login In</button></div>
<script type="text/javascript">
	$(document).ready(function () {
      	$("#login_submit").click(function(){
			
			var form	= $("#login_form")
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