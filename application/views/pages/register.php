<!--div id="content"-->
			<div class="content">
				<div class="breadcrumbs">
					<a href="#">Home</a>
					<img src="<?= base_url().'images/'?>marker_2.gif" alt=""/>
					<span>Register</span>
				</div>
				<div class="main_wrapper">
					<!--div class="steps">
						<span>1. Enter</span>
						<span>2. preview</span>
						<span>3. submit</span>
					</div-->
					<!--h1><strong>Register</strong> with us</h1-->
                    
					<div class="sell_box sell_box_1">
                        <h2><?=(!isset($success) || empty($success)) ? '<strong>Register</strong>' : '<strong>Registration</strong> Completed' ;?></h2>
                        <!---->
                         <form id="registerForm" action="<?= base_url().'register/registerUser';?>" method="POST" class="form-vertical" data-toggle="validator">
                                <div class="" style="width:500px;" >
                                    
                                    <? if(!empty($error) && $error === TRUE){?>
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" >x</button>
                                            <p>
                                                 <?= (isset($msg) && !empty($msg)) ? $msg : 'msg not received' ;?>
                                            </p>
                                        </div>
                                    <?}

                                    if(!empty($success) && $success === TRUE){?>
                                        <div class="alert alert-success" role="alert">
                                            <p>
                                                 <?= (isset($msg) && !empty($msg)) ? $msg : 'msg not received' ;?>
                                            </p>
                                        </div>
                                    <?}?>
                                    
                                    <?if(!isset($success) || empty($success)){?>
                                    	
                                    	<div class="row-fluid">
										  <div class="span7">
										  	
										  	<div class="row-fluid form-group">
                                        			<input type="text" class="form-control" name="username" placeholder="Username" value="<?=(isset($username) && !empty($error) && $error === TRUE) ? $username : '' ?>" required/>
                                    		</div>
										  	
                                    		<div class="row-fluid form-group">
                                        		<input type="email" class="form-control" name="email" placeholder="Email address" value="<?=(isset($email) && !empty($error) && $error === TRUE) ? $email : '' ?>" required/>
                                    		</div>
                                    		
                                    		<div class="row-fluid form-group">
                                        		<input type="password" id="password" class="form-control" name="password" placeholder="Password" required/>
                                   			</div>
                                   			
                                   			<div class="row-fluid form-group">
	                                        	<input type="password" class="form-control" id="cpassword" name="cpassword"  placeholder="Confirm Password" data-match="#password" data-match-error="Whoops, Passwords don't match" required/>
	                                    	</div>
	                                    	
	                                    	
	                                    		<div class="sell_submit_wrapper">
			                                        <span class="custom_chb_wrapper fL">
			                                            <span class="custom_chb">
			                                                <input type="checkbox" name="terms" required checked/>
			                                            </span>
			                                            <label><span class="gold"><a href="#">I agree to the Terms and Conditions</a></span></label>
			                                        </span>
			                                        <div class="clear"></div>
			                                    </div>
	                                    	
                                    			<button type="submit" class="btn btn-primary" >Register</button>
										  </div>
										  <div class="span5">
										  	
										  	<div class="form-group">
		                                         <button style="text-align: left; width:200px;" class="btn btn-facebook"><i class="fa fa-facebook"></i> | Register with Facebook</button>
		                                    </div>
		                                    
		                                     <div class="form-group">
		                                         <button style="text-align: left; width:200px;" class="btn btn-google-plus"><i class="fa fa-google-plus"></i> | Register with Google</button>
		                                    </div>
		                                    
		                                    <div class="form-group">
		                                        <button style="text-align: left; width:200px;" class="btn btn-twitter"><i class="fa fa-twitter"></i> | Register with Twitter</button>
		                                    </div>
		                                    		
		                                    		
                                    	 </div>                                    	
										</div>
                                    	
                                   
                                    <?}?>
                                </div>
                            
                        </form>
                        <!---->
                        
				</div>
                <?if(!isset($success) || empty($success)){?>
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
                <?}?>
			</div>
		</div>
        <!-- container -->
