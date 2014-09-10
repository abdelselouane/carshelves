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
    <!--link rel="stylesheet" href="<?= base_url().'css/';?>bootstrapValidator.css"/-->
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
    
    <script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '785751838158327',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.1' // use version 2.1
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      
      $.ajax({
            url: "<?= base_url()?>ajax_social/fb_login",
            type: 'POST',
            data: response,
            dataType: 'html',
            success: function(data, textStatus, xhr) {
            	alert(data.responseText);
            	console.log(xhr);
            	
            },
            error: function(xhr, textStatus, errorThrown) {
                alert(textStatus);
            }
        });
      
    });
  }
</script>


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
    <? if(!empty($page) && ( $page === 'register' || $page === 'login' || $page === 'forgot_password' || $page === 'reset_password' || $page === 'activation_code') ){?>
   
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
    
</body>
    
</html>
