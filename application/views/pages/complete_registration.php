<!--div id="content"-->
			<div class="content">
				<div class="breadcrumbs">
					<a href="#">Home</a>
					<img src="<?= base_url().'images/'?>marker_2.gif" alt=""/>
					<span>Register</span>
				</div>
				<div class="main_wrapper">
					
                    
					<div class="sell_box sell_box_1">
                        <h2><?=(!isset($success) || empty($success)) ? '<strong>Complete Registration</strong>' : '<strong>Registration</strong> Completed' ;?></h2>
                        <!---->
                         <form id="completeRegisterForm" action="<?= base_url().'register/completeRegisterUser';?>" method="POST" class="form-vertical" data-toggle="validator">
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
	                                    	
                                    			<button type="submit" class="btn btn-primary" >Complete Registration</button>
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
        <!-- set up the modal to start hidden and fade in and out -->
		<div id="modal-password" class="modal fade" >
		  <div class="modal-dialog">
		    <div class="modal-content gray-layout modal-small" style="width:300px;">
		      <!-- dialog body -->
		      <div class="modal-header main-blue" >
		      	<img src="<?= base_url();?>images/logo.png" width="60" height="auto">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		      </div>
		      <div class="modal-body">
		        <div class="alert alert-danger" role="alert">
	                <p>
	                    The passwords provided are not matching.<br>
	                    The password must be more than 6 and less than 30 characters long.<br>
	                    The password can only consist of alphabetical, number and underscore.<br>
	                    Please try again.
	                </p>
	            </div>
		      </div>
		      <!-- dialog buttons -->
		      <div class="modal-footer main-blue" ><button type="button" class="btn btn-primary">OK</button></div>
		    </div>
		  </div>
		</div>
