<div id="alert" class="alert alert-info" role="alert"><!-- success info warning danger-->
	Please use the form below to get the API response.
</div>
<form id="forgotPassword_form" action="<?=base_url()?>api/forgotPassword/checkEmail" method="POST" role="form">
	<div class="form-group">
		<label for="email">Email Address:</label>
		<div><input type="text" value="" name="email" id="email" class="form-control" placeholder="Enter email" /></div>
	</div>
    <div class="form-group">
		<div><input type="hidden" value="<?= $AppToken ? $AppToken : '' ;?>" name="AppToken" id="AppToken" /></div>
	</div>
</form>
<div><button class="btn btn-info" id="forgotPassword_submit" >Submit</button></div>
<script type="text/javascript">
	$(document).ready(function () {

      	$("#forgotPassword_submit").click(function(){
			
			var form	= $("#forgotPassword_form")
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
