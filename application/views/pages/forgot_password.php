<!--div id="content"-->
			<div class="content">
				<div class="breadcrumbs">
					<a href="#">Home</a>
					<img src="<?= base_url().'images/'?>marker_2.gif" alt=""/>
					<span>Forgot Password</span>
				</div>
				<div class="main_wrapper">
					<!--div class="steps">
						<span>1. Enter</span>
						<span>2. preview</span>
						<span>3. submit</span>
					</div-->
					<!--h1><strong>Register</strong> with us</h1-->
                   
					<div class="sell_box sell_box_1">
                        <h2><strong>Forgot Password</strong></h2>
                        <!---->
                         <form id="forgotPasswordForm" action="<?= base_url().'forgot_password/forgot';?>" method="POST" class="form-vertical" data-toggle="validator">
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
                                        <input type="email" id="email" class="form-control" name="email" placeholder="Please enter your email address" required/>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary" >Submit</button>
                                    
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
