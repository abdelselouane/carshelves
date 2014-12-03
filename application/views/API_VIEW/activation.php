<h1 class="page-header">API</h1>
<h2 class="sub-header">Account Activation</h2>
<div id="alert" class="alert alert-info" role="alert"><!-- success info warning danger-->
	Please use the form below to get the API response.
</div>
<form id="activation_form" action="<?=base_url()?>api/activation/activate" method="POST" >
	<div class="form-group">
		<label for="digit_code">Activation Code:</label>
		<div><input type="text" value="" name="digit_code" id="digit_code" class="form-control" placeholder="Enter activation code"/></div>
	</div>
     <div class="form-group">
		<div><input type="hidden" value="<?= $AppToken ? $AppToken : '' ;?>" name="AppToken" id="AppToken" /></div>
	</div>
</form>
<div><button class="btn btn-info" id="activation_submit" >Activate Account</button></div>
<script type="text/javascript">
	$(document).ready(function () {

      	$("#activation_submit").click(function(){
			
			var form	= $("#activation_form")
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
