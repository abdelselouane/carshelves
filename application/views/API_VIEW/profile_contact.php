<h1 class="page-header">API</h1>
<h2 class="sub-header">Profile Contact Info</h2>
<div id="alert" class="alert alert-info" role="alert"><!-- success info warning danger-->
	Please use the form below to get the API response.
</div>
<form id="profile_contact" action="<?=base_url()?>api/register/registerUser" method="POST" class="" role="form">
	
	<div class="form-group">
		<label for="address1" >Address 1:</label>
		<div><input type="text" value="" name="address1" id="address1" class="form-control" placeholder="Enter Address" /></div>
	</div>
    <div class="form-group">
		<label for="address2" >Address 2:</label>
		<div>
            <input type="text" value="" name="address2" id="address2" class="form-control" placeholder="Enter Address (optional)" />           </div>
    </div>
    <div class="form-group">
		<label for="state" >State:</label>
		<div>
            <select name="state" id="state" class="form-control">
                <option value="">Select State</option>
            </select>
        </div>
	</div>
    <div class="form-group">
		<label for="city" >City:</label>
		<div>
            <select name="city" id="city" class="form-control">
                <option value="">Select city</option>
            </select>
        </div>
	</div>
    <div class="form-group">
		<label for="zip" >zip:</label>
		<div>
            <input type="text" name="zip" id="zip" class="form-control" maxlenght="5"  />
        </div>
	</div>
    <div class="form-group">
		<label for="phone1" >Phone 1:</label>
		<div>
            <input type="text" name="phone1" id="phone1" class="form-control"  />
        </div>
	</div>
    <div class="form-group">
		<label for="phone2" >Phone 2:</label>
		<div>
            <input type="text" name="phon2" id="phon2" class="form-control"  />
        </div>
	</div>
    <div class="form-group">
		<label for="phone3" >Phone 3:</label>
		<div>
            <input type="text" name="phon3" id="phone3" class="form-control"  />
        </div>
	</div>
    <div class="form-group">
		<label for="fax" > Fax:</label>
		<div>
            <input type="text" name="fax" id="fax" class="form-control"  />
        </div>
	</div>
	<div class="form-group">
		<div><input type="hidden" value="<?= $AppToken ? $AppToken : '' ;?>" name="AppToken" id="AppToken" /></div>
	</div>
</form>
<div><button class="btn btn-info" id="profile_contact_submit" >Register Now</button></div>
<script type="text/javascript">
	$(document).ready(function () {

      	$("#profile_contact_submit").click(function(){
			
			var form	= $("#profile_contact")
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
