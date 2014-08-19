
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?=base_url();?>favicon.ico">

    <title>Signin Administration Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/cover.css" rel="stylesheet">
      
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      
  </head>
    <style type="text/css">
        .gold{color: #FFB01F;}
        .blue{color: #428bca;}
        .formContainer{width:400px;margin-left:140px;text-align:left;}
    </style>

  <body>

     <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">
            
    <h1>Welcome to <span class="blue">Car</span><span class="gold">Shelves</span>.com Administration Panel</h1>
    <hr>
     <div class="formContainer">   
      <form id="adminLoginForm" action="<?=base_url();?>admin/login/signin" method="POST" class="form-signin" role="form">
        
          <h3 class="form-signin-heading gold">Please sign in</h3>
          
        
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required autofocus>
            </div>
          
            <div class="form-group">  
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
          
            <div class="form-group">  
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember_me" class="" value="remember_me">Remember me
                  </label>
                </div>
            </div>
          
            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </div>
        
      </form>
         
         
     </div>
    
    </div></div></div><!-- /container -->

   <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url().'js/'?>bootstrap.min.js"></script>
    
    <script type="text/javascript" src="<?= base_url().'js/'?>bootstrapValidator.min.js"></script>
    <script type="text/javascript" src="<?= base_url().'js/'?>admin_login.js"></script>
   
    <!-- End bootstrap JS-->
  </body>
</html>
