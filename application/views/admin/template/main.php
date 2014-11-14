<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Administration Panel CarShelves</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?=base_url();?>css/dashboard.css" rel="stylesheet">

	<!-- codeMInor css-->
	<link rel="stylesheet" href="<?=base_url();?>css/codeminor/codemirror.css">
	<link rel="stylesheet" href="<?=base_url();?>css/codeminor/paraiso-dark.css">
	
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?=base_url();?>js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?=base_url();?>js/ie10-viewport-bug-workaround.js"></script>
    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="">

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=base_url();?>admin/dashboard">CarShelve.com  </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </div>

      
    <!--BEGIN CONTENT-->
        <?= isset($contents) ? $contents : '';?>
    <!--EOF CONTENT-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
    
    <script src="<?=base_url();?>js/codeminor/codemirror.js"></script>
	<script src="<?=base_url();?>js/codeminor/javascript.js"></script>
    
    <script type="text/javascript">
    	
    	var editor = CodeMirror.fromTextArea(document.getElementById("demotext"), {
	      lineNumbers: true,
	      mode: "application/ld+json",
	      theme: "paraiso-dark",
	      indentUnit: 1,
	      smartIndent: true,
	      tabSize: 3,
	      lineWrapping: true,
	      showCursorWhenSelecting: true,
	      historyEventDelay: 10,

	      
	    });
    	
    	
    	
    	$(document).ready(function () {
			
			$(".link_html").click(function(){
				
				//alert(this.id);return false;
				
				$.ajax({
	                url: "<?=base_url()?>api/"+this.id,
	                type: 'post',
	                dataType: 'html',
	                success: function(response) {
	                	
	                	editor.setValue(response);
	                	
	                	var container  = $('#result1');
                	
	                	container.empty();
	                	container.slideDown(300);
	                    container.html(response);
	                }
	            });
	      	});
    	
		    $('a.tree-toggler').click(function () {
		        $(this).parent().children('ul.tree').toggle(300);
		    });
		});
		
	   function moveAlertClass(obj){
                	
			if(obj){
				if(obj.hasClass("alert-info")) obj.removeClass("alert-info");
				if(obj.hasClass("alert-success")) obj.removeClass("alert-success");
				if(obj.hasClass("alert-warning")) obj.removeClass("alert-warning");
				if(obj.hasClass("alert-danger")) obj.removeClass("alert-danger");
			}
			
			return false;                		
	   }
    </script>
  </body>
</html>
