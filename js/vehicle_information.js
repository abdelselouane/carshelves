$(document).ready(function() {

   
    
   $('#ad_vehicle_form01').bootstrapValidator({
        
        /*feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        message: 'This is a required field.',
        
        submitButtons: 'button[type="submit"]',*/
    });
    
     
   $("#file_1").fileinput({
			initialPreview: ["<img src='./images/car_placeholder.png' class='file-preview-image'>"],
			overwriteInitial: true,
			maxFileSize: 10,
			maxFilesNum: 1,
			showCaption: false,
			showRemove: true,
			showUpload: false,
	});
	
	$("#file_2").fileinput({
			initialPreview: ["<img src='./images/car_placeholder.png' class='file-preview-image'>"],
			overwriteInitial: true,
			maxFileSize: 500,
			maxFilesNum: 1,
			showCaption: false,
			showRemove: true,
			showUpload: false,
	});
	
	$("#file_3").fileinput({
			initialPreview: ["<img src='./images/car_placeholder.png' class='file-preview-image'>"],
			overwriteInitial: true,
			maxFileSize: 500,
			maxFilesNum: 1,
			showCaption: false,
			showRemove: true,
			showUpload: false,
	});
	
	$("#file_4").fileinput({
			initialPreview: ["<img src='./images/car_placeholder.png' class='file-preview-image'>"],
			overwriteInitial: true,
			maxFileSize: 500,
			maxFilesNum: 1,
			showCaption: false,
			showRemove: true,
			showUpload: false,
	});
	
	$("#file_5").fileinput({
			initialPreview: ["<img src='./images/car_placeholder.png' class='file-preview-image'>"],
			overwriteInitial: true,
			maxFileSize: 500,
			maxFilesNum: 1,
			showCaption: false,
			showRemove: true,
			showUpload: false,
	});
	
	$("#file_6").fileinput({
			initialPreview: ["<img src='./images/car_placeholder.png' class='file-preview-image'>"],
			overwriteInitial: true,
			maxFileSize: 500,
			maxFilesNum: 1,
			showCaption: false,
			showRemove: true,
			showUpload: false,
	});
	
	//var $input = $('input[type=file]'); // select your file input
	//$input.on('change', function() { 
	    // select the form and submit
	   // $input.closest('form').submit(); 
	//});
	
    
});