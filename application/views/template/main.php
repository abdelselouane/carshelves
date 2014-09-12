<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!-- Facebook APP ID -->
	<meta property="fb:app_id" content="12345"/>

	<meta name="keywords" content="Car-Shelves, Buy-Car, Car-dealers, Auto-Dealers, Auto-Trade, Car-trade, Car-Dealer, auto-salon, automobile, business, car, car-gallery, car-shop, dealership, cars, dealers, vehicle-marketplace, car-marketplace, buy-car, sell-car, car-listing, vehicle-listing, free-car, free-ad, free-listing, , vehicle" />
	<meta name="description" content="Car Shelves - Buy and sell cars online" />

	<!-- Open Graph -->
	<meta property="og:site_name" content="Auto Dealer HTML"/>
	<meta property="og:title" content="Home" />
	<meta property="og:url" content="http://localhost/home.html" />
	<meta property="og:image" content="http://cdn.winterjuice.com/example/autodealer/image.jpg" />
	<meta property="og:description" content="Car Shelves - Buy and sell cars online" />

	<!-- Page Title -->
	<title><?= isset($title) ? $title : 'Missing Title'; ?></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url().'css/';?>style.css" />
    <link rel="shortcut icon" href="<?= base_url();?>favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?= base_url();?>favicon.ico" type="image/x-icon">
	
    
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url().'css/';?>bootstrap.min.css"/>
    <link rel="stylesheet" href="<?= base_url().'css/';?>bootstrap-theme.min.css" >
    <link rel="stylesheet" href="<?= base_url().'css/';?>bootstrap-responsive.css"/>
    <link rel="stylesheet" href="<?= base_url().'css/';?>bootstrap-modal.css"/>
    <link rel="stylesheet" href="<?= base_url().'css/';?>bootstrapValidator.min.css"/>
    <link rel="stylesheet" href="<?= base_url().'css/';?>social-buttons.css"/>
    <link rel="stylesheet" href="<?= base_url().'css/';?>font-awesome.css"/>
    <link rel="stylesheet" href="<?= base_url().'css/';?>navbar.css"/>
    <link rel="stylesheet" href="<?= base_url().'css/'?>carousel.css" >
    <link rel="stylesheet" href="<?= base_url().'css/'?>theme.css" >
    <link  media="all" rel="stylesheet" href="<?= base_url().'css/' ?>fileinput.css" type="text/css" />
    <!--link  media="all" rel="stylesheet" href="<?= base_url().'css/' ?>fileinput.min.css" type="text/css" /-->
    <!-- End bootstrap CSS -->
    
   
    
	<!--link rel="stylesheet" type="text/css" href="<?= base_url().'css/';?>jquery.fancybox-1.3.4.css" media="screen" />
	<!--[if IE]>
	<link href="<?= base_url().'css/';?>style_ie.css" rel="stylesheet" type="text/css">
	<![endif]-->
	
	<!--script type="text/javascript" src="<?= base_url().'js/'?>jquery.easing.1.3.js"></script-->
	<!--script type="text/javascript" src="<?= base_url().'js/'?>jquery.bxslider.js"></script-->
	<!--script type="text/javascript" src="<?= base_url().'js/'?>jquery.mousewheel.js"></script>
	<!--script type="text/javascript" src="<?= base_url().'js/'?>jquery.selectik.js"></script-->
	<!--script type="text/javascript" src="<?= base_url().'js/'?>jquery.mousewheel-3.0.4.pack.js"></script>
	<!--script type="text/javascript" src="<?= base_url().'js/'?>jquery.fancybox-1.3.4.pack.js"></script-->
	<!--script type="text/javascript" src="<?= base_url().'js/'?>jquery.countdown.js"></script-->
	
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?= base_url().'js/'?>ie10-viewport-bug-workaround.js"></script>
 
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
    <style type="text/css">
    	
    	/*@media (min-width: 700px) and (orientation: landscape) {
    		
    		#homeSub{
    			display:none; margin-left:181px;
    		}
    		
    		#aboutSub{
    			display:none;margin-left:275px;
    		}
    		
    		#dealersSub{
    			display:none; margin-left:389px;
    		}
    		
    		#saleSub{
    			display:none; margin-left:495px;
    		}
    		
    	}*/
    	
    </style>

	
</head>
<body class="page">
    
    

	<!--BEGIN HEADER-->
	     <!--?= base_url().'header.php'?-->
         <? include('header.php'); ?>
	<!--EOF HEADER-->
   
    <!--BEGIN CONTENT-->
        <?= isset($contents) ? $contents : '';?>
    <!--EOF CONTENT-->
    
    <!--BEGIN FOOTER-->
        <? include('footer.php'); ?>
	<!--EOF FOOTER-->
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?= base_url().'js/'?>jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?= base_url().'js/'?>bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url().'js/'?>bootstrapValidator.min.js"></script>
    <script type="text/javascript" src="<?= base_url().'js/'?>bootstrap-modalmanager.js"></script>
    <script type="text/javascript" src="<?= base_url().'js/'?>bootstrap-modal.js"></script>
    <? if(!empty($page) && ( $page === 'register' || $page === 'complete_registration' || $page === 'login' || $page === 'forgot_password' || $page === 'reset_password' || $page === 'activation_code') ){?>
   
    <script type="text/javascript" src="<?= base_url().'js/'?>register.js"></script>
    <script type="text/javascript" src="<?= base_url().'js/'?>login.js"></script>
    <? } ?>
    <!-- End bootstrap JS-->
    <? if(!empty($page) && ( $page === 'profile' ) ){?>
    <script type="text/javascript" src="<?= base_url().'js/'?>profile.js"></script>
    <? } ?>
    <script type="text/javascript" src="<?= base_url().'js/'?>vehicle_information.js"></script>
    <script type="text/javascript" src="<?= base_url().'js/'?>js.js"></script>
    <script type="text/javascript" src="<?= base_url().'js/'?>jquery.checkbox.js"></script>
    <script type="text/javascript" src="<?= base_url().'js/'?>fileinput.min.js" ></script>
    <script type="text/javascript" src="<?= base_url().'js/'?>fileinput.js" ></script>
    
    <!--script type="text/javascript" src="<?= base_url().'js/'?>collapse.js"></script-->
	<!--script type="text/javascript" src="<?= base_url().'js/'?>transition.js"></script-->
<script type="text/javascript">

  $(function(){

    $.fn.modalmanager.defaults.resize = true;

    $('[data-source]').each(function(){
      var $this = $(this),
        $source = $($this.data('source'));

      var text = [];
      $source.each(function(){
        var $s = $(this);
        if ($s.attr('type') == 'text/javascript'){
          text.push($s.html().replace(/(\n)*/, ''));
        } else {
          text.push($s.clone().wrap('<div>').parent().html());
        }
      });
      
      $this.text(text.join('\n\n').replace(/\t/g, '    '));
    });

   // prettyPrint();
  });
</script>    
<div id="fb-root"></div>
<script type="text/javascript">


window.fbAsyncInit = function() {
    FB.init({
        appId: '785751838158327',
        cookie: true,
        xfbml: true,
        channelUrl: "<?= base_url()?>ajax_social/fb_login",
        version    : 'v2.1',
        oauth: true
        });
    };
(function() {
    var e = document.createElement('script');
    e.async = true;e.src = document.location.protocol +'//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);}());

function CallAfterLogin(){
	
	
	FB.getLoginStatus(function (response) {
		//console.log(response);
		
		 if (response.status !== 'connected' ){
		 	
		 	FB.login(function(response) {       
		        if (response.status === "connected") 
		        {
		          
		            FB.api('/me', function(data) {
		              
		              if(data.email == null)
		              {   
				        $('#modal-title').empty();
			        	$('#modal-msg').empty();
			        	$('#modal-redirect').attr('href', '');
					 	
					 	HTMLtitle		= '<span class="blue">Welcome to <span class="gold">Carshelves</span>.com</span>';
			    		HTMLdiv 		= '<div class="alert alert-danger" role="alert"><p>You are not connected with your <strong>Facebook Account</strong>, Please try again <strong> Email Permission Needed </strong> </p></div>';
			    		HTMLredirect	= '<?=base_url().'login'?>';
			    		
			    		$('#modal-logout').show();
			    		
			    		$('#modal-title').append(HTMLtitle);
				    	$('#modal-msg').append(HTMLdiv);
				    	$('#modal-redirect').attr('href', HTMLredirect);
					 	
					 	$('#myModal').modal({
			        		keyboard: false
			        	});
		
		              }else{
		              		
		                $.ajax({
					            url: "<?= base_url()?>ajax_social/fb_login",
					            type: 'POST',
					            dataType: "html",
								data: {
									'data': data
								 },
					            success: function(data, textStatus, xhr) {
					            	//alert(data);
					            	var dataInfo = JSON.parse(data);
					            					            	
					            	
					            	$('#modal-msg').empty();
					            	$('#modal-redirect').attr('href', '');
					            	
					            	var HTMLdiv			= '';
					            	var HTMLredirect	= '';
					            	
					            	if(dataInfo.success){
					            		
					            		HTMLdiv			= '<div class="alert alert-success" role="alert"><p>'+dataInfo.msg+'</p></div>';
					            		HTMLredirect	= dataInfo.redirect;
					            	}else{
					            		
					            		HTMLdiv 		= '<div class="alert alert-danger" role="alert"><p>'+dataInfo.msg+'</p></div>';
					            		HTMLredirect	= dataInfo.redirect;
					            	}
					            	
					            	
					            	$('#modal-msg').append(HTMLdiv);
					            	$('#modal-redirect').attr('href', HTMLredirect);
					            	
					            	$('#myModal').modal({
					            		keyboard: false
					            	});
					            	
					            	
					            },
					            error: function(xhr, textStatus, errorThrown) {
					              console.log(errorThrown);
					            }
					        });
		              }
		              
		          });
		         }
		    },
		    {scope:'publish_actions,email'});
		 	
		 }else if( response.status === 'connected' ){
		 	
		 	
        	$('#modal-msg').empty();
        	$('#modal-redirect').attr('href', '');
		 	
		 	
    		HTMLdiv 		= '<div class="alert alert-success" role="alert"><p>You are already connected with your <strong>Facebook Account</strong></p></div>';
    		HTMLredirect	= '<?=base_url().'profile'?>';
    		
    		$('#modal-logout').show();
    		
	    	$('#modal-msg').append(HTMLdiv);
	    	$('#modal-redirect').attr('href', HTMLredirect);
		 	
		 	$('#myModal').modal({
        		keyboard: false
        	});
		 }else{
		 	
		 	//alert('login failed');
		 	
		 	
        	$('#modal-msg').empty();
        	$('#modal-redirect').attr('href', '');
		 	
		 	
    		HTMLdiv 		= '<div class="alert alert-danger" role="alert"><p>You are not connected with your <strong>Facebook Account</strong>, Please try again <strong>Login Failed</strong> </p></div>';
    		HTMLredirect	= '<?=base_url().'login'?>';
    		
    		$('#modal-logout').show();
    		
	    	$('#modal-msg').append(HTMLdiv);
	    	$('#modal-redirect').attr('href', HTMLredirect);
		 	
		 	$('#myModal').modal({
        		keyboard: false
        	});
		 	
		 }
		
		
	});
	
	
    
}

function logout(){
	
	FB.getLoginStatus(function (response) {
		if (response.status === 'connected' ){
			FB.logout(function(response) {
			  // user is now logged out
			  window.location.href = "<?=base_url()?>login/logout";
			});
		}else{
			window.location.href = "<?=base_url()?>login/logout";
		}
		
	});
	
	
}


</script>
</body>
    
</html>
