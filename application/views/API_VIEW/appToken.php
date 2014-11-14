<div id="alert" class="alert alert-info" role="alert"><!-- success info warning danger-->
	Please use the form below to get the API response.
</div>
<form id="getToken_form" action="<?=base_url()?>api/appToken/getToken" method="POST" role="form">
	<div class="form-group">
		<label for="appToken">Get AppToken For:</label>
		<div>
			<select name="appToken" id="appToken" class="form-control">
				<option value="MobileIosAppToken">Mobile IOS</option>
				<!--option value="MobileAndroidAppToken">Mobile Android</option-->
			</select>
		</div>
	</div>
</form>
<div><button class="btn btn-info" id="getToken_submit" >Get Token</button></div>
<script type="text/javascript">
	$(document).ready(function () {
      	$("#getToken_submit").click(function(){
			
			var form	= $("#getToken_form");
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
                	alert.html(obj.data.token);
                	editor.setValue(response);
                	
                	return false;
                }
            });
		});
 });
</script>