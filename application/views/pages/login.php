
			<div class="content">
				<div class="breadcrumbs">
					<a href="#">Home</a>
					<img src="<?= base_url().'images/'?>marker_2.gif" alt=""/>
					<span>Sign In</span>
				</div>
				<div class="main_wrapper">
					<!--div class="steps">
						<span>1. Enter</span>
						<span>2. preview</span>
						<span>3. submit</span>
					</div-->
					<!--h1><strong>Register</strong> with us</h1-->
                    <div id="results"></>
					<div class="sell_box sell_box_1">
						<div class="alert alert-info" role="alert" style="width: 500px">
                            <p>
                                <br><br><br><br>
                            </p>
                        </div>
                        <h2><strong>Sign In</strong></h2>
                        <!---->  
                         <form id="loginForm" action="<?= base_url().'login/signin';?>" method="POST" class="form-vertical" data-toggle="validator">
                                <div class="form-group" style="width:500px;" >
                                    <? if(!empty($error) && $error === TRUE){?>
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" >x</button>
                                            <p>
                                                 <?= (isset($msg) && !empty($msg)) ? $msg : 'msg not received' ;?>
                                            </p>
                                        </div>
                                    <?}?>
                                    
                                    <? if(!empty($success) && $success === TRUE){?>
                                        <div class="alert alert-success" role="alert">
                                            <p>
                                                 <?= (isset($msg) && !empty($msg)) ? $msg : 'msg not received' ;?>
                                            </p>
                                        </div>
                                    <?}?>
                                   
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username_email" placeholder="Username Or Email" value="<?=(isset($username_email) && !empty($error) && $error === TRUE) ? $username_email : '' ?>" required/>
                                    </div>
                                     
                                    
                                    <div class="form-group">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Password" required/>
                                    </div>
                                    
                                    
									<div class="form-group">
										<button type="button" id="LoginButton" class="btn btn-facebook" style="text-align: left; width:200px;" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false" onclick="CallAfterLogin();" scope="publish_actions,email"><i class="fa fa-facebook"></i> | Sign in with Facebook</button>
	                           		</div>   
	                           		      
                                    <!--div class="form-group">
                                         <fb:login-button style="text-align: left; width:200px;" class="btn btn-facebook" scope="public_profile,email" onclick="FB.getLoginStatus();"><i class="fa fa-facebook"></i> | Sign in with Facebook</fb:login-button>
                                    </div-->
                                    
                                     <div class="form-group">
                                         <button type="button" style="text-align: left; width:200px;" class="btn btn-google-plus"><i class="fa fa-google-plus"></i> | Sign in with Google</button>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button type="button" style="text-align: left; width:200px;" class="btn btn-twitter"><i class="fa fa-twitter"></i> | Sign in with Twitter</button>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <p>
                                            <a href="<?=base_url().'forgot_password'?>">Forgot Password</a><br/>
                                            <a href="<?=base_url().'register'?>">Create a new account</a>
                                        </p>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary" >Sign In</button>
                                    
                                </div>
                            
                        </form>
                        <!---->
                        
				</div>
               
					<div class="message">
						<h4>Sell your car on <strong><span class="blue">Car</span><span class="gold">Shelves</span></strong> and benefit from more than 1 million potential buyers every month!</h4>
						<p> 
                            Free full access to Vehicules, Dealers, Specials, Discounts and more...<br/>
                            The website is originally designed for an ease usage <br/>
                            Avoid Scums and other low quality service websites <br/>
                            Avoid the high and crazy charges when posting on websites <br/>
                            100 % custmer satisfaction <br/>
                            Safety, Securty, Honesty are our main goals <br/>
                        </p>
                        <p>
                            <strong><a href="<?=base_url().'register-dealer'?>">If you are a dealer, please visit the dealers section</a></strong>
                        </p>
					</div>
                    
			</div>
		</div>
        <!-- container -->
		<div id="myModal" class="modal fade">
		  <div class="modal-dialog">
		    <div class="modal-content gray-layout">
		      <div class="modal-header main-blue">
		      	<img src="<?= base_url();?>images/logo.png" width="60" height="auto">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h3 id="modal-title" class="modal-title" style="color:#F2DEDE"></h3>
		      </div>
		      <div class="modal-body">
		        <div id="modal-msg"></div>
		      </div>
		      <div class="modal-footer main-blue">
		      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <a id="modal-logout" style="display:none;" type="button" href="" class="btn btn-primary" onclick="logout();" >Log Out</a>
		        <a id="modal-redirect" type="button" href="" class="btn btn-primary">Continue</a>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
<<<<<<< HEAD
		</div><!-- /.modal -->
=======
		</div><!-- /.modal -->
>>>>>>> 6b2ba8a060749817280d6185d1d7dda3f0659d2f
