<h1 class="page-header">API</h1>
<h2 class="sub-header">Profile Personal Info</h2>
<div id="alert" class="alert alert-info" role="alert"><!-- success info warning danger-->
	Please use the form below to get the API response.
</div>
<form id="profile_personal" action="<?=base_url()?>api/register/registerUser" method="POST" class="" role="form">
    <div class="form-group">
		<label for="profile_picture">Profile Picture / Logo:</label>
		<div><input type="file" value="" name="profile_picture" id="profile_picture" class="form-control"/></div>
	</div>
	<div class="form-group">
		<label for="first">First Name:</label>
		<div><input type="text" value="" name="first" id="first" class="form-control" placeholder="Enter first name" /></div>
	</div>
    <div class="form-group">
		<label for="first">Middle Name:</label>
		<div><input type="text" value="" name="first" id="first" class="form-control" placeholder="Enter middle name" /></div>
	</div>
    <div class="form-group">
		<label for="last">Last Name:</label>
		<div><input type="text" value="" name="last" id="last" class="form-control" placeholder="Enter last name" /></div>
	</div>
    <div class="form-group">
		<label for="email">Email:</label>
		<div><input type="text" value="" name="email" id="email" class="form-control" placeholder="Enter email" /></div>
	</div>
    <div class="form-group">
		<label for="role">Role:</label>
		<div>
            <select name="role" id="role" class="form-control" >
                <option value="">Select</option>
                <option value="suscriber">Suscriber</option>
                <option value="dealer">Dealer</option>
                <option value="manager">Manager</option>
                <option value="sales_agent">Sales Agent</option>
            </select>
        </div>
	</div>
    <div class="form-group">
		<label for="company">Company Name:</label>
		<div><input type="text" value="" name="company" id="company" class="form-control" placeholder="Enter company name" /></div>
	</div>
	<div class="form-group">
		<label for="description">Description:</label>
		<div><textarea name="description" id="description" class="form-control" placeholder="Enter description" cols="50" rows="5"></textarea></div>
	</div>
	<div class="form-group">
		<div><input type="hidden" value="<?= $AppToken ? $AppToken : '' ;?>" name="AppToken" id="AppToken" /></div>
	</div>
</form>
<div><button class="btn btn-info" id="profile_personal_submit" >Register Now</button></div>
<script type="text/javascript">
	$(document).ready(function () {

      	$("#profile_personal_submit").click(function(){
			
			var form	= $("#profile_personal")
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
