$(document).ready(function() {

   
    
    $('#ad_vehicle_form').bootstrapValidator({
         message: 'This is a required field',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        submitButtons: 'input[type="submit"]'
    });
    
     
   $("#file-1").fileinput({
			initialPreview: ["<img src='./images/car_placeholder.png' class='file-preview-image'>"],
			overwriteInitial: true,
			maxFileSize: 100,
			maxFilesNum: 10,
			showCaption: false,
			showRemove: true,
			showUpload: false,
			//previewFileType: "image",
			/*browseClass: "btn btn-success",
			browseLabel: "Pick Image",
			browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
			removeClass: "btn btn-danger",
			removeLabel: "Delete",
			removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
			uploadClass: "btn btn-info",
			uploadLabel: "Upload",
			uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',*/
	});
	
	$("#file-2").fileinput({
			initialPreview: ["<img src='./images/car_placeholder.png' class='file-preview-image'>"],
			overwriteInitial: true,
			maxFileSize: 100,
			maxFilesNum: 10,
			showCaption: false,
			showRemove: true,
			showUpload: false,
			//previewFileType: "image",
			/*browseClass: "btn btn-success",
			browseLabel: "Pick Image",
			browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
			removeClass: "btn btn-danger",
			removeLabel: "Delete",
			removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
			uploadClass: "btn btn-info",
			uploadLabel: "Upload",
			uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',*/
	});
	
	$("#file-3").fileinput({
			initialPreview: ["<img src='./images/car_placeholder.png' class='file-preview-image'>"],
			overwriteInitial: true,
			maxFileSize: 100,
			maxFilesNum: 10,
			showCaption: false,
			showRemove: true,
			showUpload: false,
			//previewFileType: "image",
			/*browseClass: "btn btn-success",
			browseLabel: "Pick Image",
			browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
			removeClass: "btn btn-danger",
			removeLabel: "Delete",
			removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
			uploadClass: "btn btn-info",
			uploadLabel: "Upload",
			uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',*/
	});
	
	$("#file-4").fileinput({
			initialPreview: ["<img src='./images/car_placeholder.png' class='file-preview-image'>"],
			overwriteInitial: true,
			maxFileSize: 100,
			maxFilesNum: 10,
			showCaption: false,
			showRemove: true,
			showUpload: false,
			//previewFileType: "image",
			/*browseClass: "btn btn-success",
			browseLabel: "Pick Image",
			browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
			removeClass: "btn btn-danger",
			removeLabel: "Delete",
			removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
			uploadClass: "btn btn-info",
			uploadLabel: "Upload",
			uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',*/
	});
	
	$("#file-5").fileinput({
			initialPreview: ["<img src='./images/car_placeholder.png' class='file-preview-image'>"],
			overwriteInitial: true,
			maxFileSize: 100,
			maxFilesNum: 10,
			showCaption: false,
			showRemove: true,
			showUpload: false,
			//previewFileType: "image",
			/*browseClass: "btn btn-success",
			browseLabel: "Pick Image",
			browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
			removeClass: "btn btn-danger",
			removeLabel: "Delete",
			removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
			uploadClass: "btn btn-info",
			uploadLabel: "Upload",
			uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',*/
	});
	
	$("#file-6").fileinput({
			initialPreview: ["<img src='./images/car_placeholder.png' class='file-preview-image'>"],
			overwriteInitial: true,
			maxFileSize: 100,
			maxFilesNum: 10,
			showCaption: false,
			showRemove: true,
			showUpload: false,
			//previewFileType: "image",
			/*browseClass: "btn btn-success",
			browseLabel: "Pick Image",
			browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
			removeClass: "btn btn-danger",
			removeLabel: "Delete",
			removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
			uploadClass: "btn btn-info",
			uploadLabel: "Upload",
			uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',*/
	});
	
	
    
});