<h1 class="page-header">API</h1>
<h2 class="sub-header">Profile Social Media Info</h2>
<div id="alert" class="alert alert-info" role="alert"><!-- success info warning danger-->
	Please use the form below to get the API response.
</div>
<form id="profile_social" action="<?=base_url()?>api/register/registerUser" method="POST" class="" role="form">
    <div class="form-group">
		<label for="website">Website:</label>
		<div><input type="text" value="" name="website" id="website" class="form-control" placeholder="Enter website URL" /></div>
	</div>
	<div class="form-group">
		<label for="facebook">Facebook:</label>
		<div><input type="text" value="" name="facebook" id="facebook" class="form-control" placeholder="Enter facebook address" /></div>
	</div>
    <div class="form-group">
		<label for="twitter">Twitter:</label>
		<div><input type="text" value="" name="twitter" id="twitter" class="form-control" placeholder="Enter twitter address" /></div>
	</div>
	<div class="form-group">
		<label for="google_plus">Google Plus:</label>
		<div><input type="text" value="" name="google_plus" id="google_plus" class="form-control" placeholder="Enter google plus address" /></div>
	</div>
	<div class="form-group">
		<div><input type="hidden" value="<?= $AppToken ? $AppToken : '' ;?>" name="AppToken" id="AppToken" /></div>
	</div>
</form>
<div><button class="btn btn-info" id="profile_social_submit" >Register Now</button></div>
<script type="text/javascript">
	$(document).ready(function () {

      	$("#profile_social_submit").click(function(){
			
			var form	= $("#profile_social")
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
