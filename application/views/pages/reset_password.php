<!--div id="content"-->
			<div class="content">
				<div class="breadcrumbs">
					<a href="#">Home</a>
					<img src="<?= base_url().'images/'?>marker_2.gif" alt=""/>
					<span>Reset Password</span>
				</div>
				<div class="main_wrapper">
					
                    <div class="alert alert-info" role="alert">
                    	<p>	
                    		Please do not refresh this page till you provide your <strong>New Password</strong> and <strong>Confirm It</strong>. <br>
                    		This page displays one time per <strong>RESET</strong>, otherwise you may need to go trough the same process to get a <strong>Reset Password Link</strong> sent to your email.
                    	</p>
                    </div>
					<div class="sell_box sell_box_1">
                        <h2><strong>Reset Password</strong></h2>
                       

                         <form id="resetPasswordForm" action="<?= base_url().'reset_password/reset';?>" method="POST" class="form-vertical" data-toggle="validator">
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
                                    
                                    <? if(!isset($success) || $success === FALSE || $success === '') {?>
                                    <div class="form-group">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Please enter your password" required/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="password" id="cpassword" class="form-control" name="cpassword" placeholder="Please confirm your password" required/>
                                    </div>
                                    
                                    <input type="hidden" id="user_id" class="form-control" name="user_id" value="<?=(isset($user_id) && !empty($user_id)) ? $user_id : '' ?>"/>
                                    <?}?>
                                    
                                    <button type="submit" class="btn btn-primary" >Reset</button>
                                    
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
