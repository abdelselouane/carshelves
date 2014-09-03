
<!--BEGIN HEADER-->
    <div id="header">
        <div class="top_info">
            <div class="logo">
                <!--a href="#">Car<span>Shelves</span></a!-->
                <img src="<?=base_url().'images/';?>logo2.png" width="" height="" >
            </div>
            <div class="header_contacts">
                <div class="phone">+1 (800) 455-55-95</div>
                <div>1704 Noble Creek Drive, Alanta, GA, 30327</div>
            </div>
            <div style="font-size:14px;">
                <?if(isset($user_id)){?>
                <a href="<?=base_url().'login/logout'?>">Logout</a>
                <?}else{?>
                <a href="<?=base_url().'login'?>">Login&nbsp;|&nbsp;</a>
                <a href="<?=base_url().'register'?>">Register</a>
                <?}?>
            </div>
            <div class="socials">
                
                <a href="#"><img src="<?=base_url().'images/';?>fb_icon.png" alt=""></a>
                <a href="#"><img src="<?=base_url().'images/';?>twitter_icon.png" alt=""></a>
                <a href="#"><img src="<?=base_url().'images/';?>in_icon.png" alt=""></a>
            </div>
        </div>
      
        <div class="bg_navigation">
            <div class="navigation_wrapper">
                <div id="navigation">
                    <span>Home</span>
                    <ul>
                        <li id="home-main"  <?= (isset($title) && $title == 'Home') ? 'class="current"' : ''; ?> >
                            <a class="main-menu" href="<? echo base_url().'welcome'; ?>">
                            	Home
                            	<b class="caret"></b>
                            </a>
                            <div class="sub-nav">
	                            <ul id="homeSub" style="" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
			                      <li class="active" role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url();?>">Home</a></li>
			                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url().'catalog'?>">Vehiclue Listing</a></li>
			                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url().'catalog'?>">Top Deals</a></li>
			                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url().'catalog'?>">Top Dealers</a></li>
			                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url().'add'?>">Add an Offer</a></li>
			                      <?if(!isset($user_id)){?> 
			                      <li role="presentation" class="divider"></li>
			                         
			                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url().'register'?>">Register</a></li>
			                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url().'login'?>">Login</a></li>
			                      <?}?>
			                    </ul>
			                </div>
                        </li>
                        <li id="about-main" <?= (isset($title) && $title == 'About Us') ? 'class="current"' : ''; ?> >
                        	<a class="main-menu" href="<? echo base_url().'about'; ?>">
                        		About Us
                        		<b class="caret"></b>
                        	</a>
                        	<div class="sub-nav">
                        		<ul id="aboutSub" style="" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
			                      <li class="active" role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url().'about'?>">About Us</a></li>
			                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url().'blog'?>">Pricing</a></li>
			                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url().'blog'?>">Blog</a></li>
			                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url().'news'?>">News</a></li>
			                    </ul>
                        	</div>
                        </li>
                        <li id="dealers-main" <?= (isset($title) && $title == 'Dealers') ? 'class="current"' : ''; ?> >
                        	<a class="main-menu" href="<? echo base_url().'dealers'; ?>">
                        		Dealers
                        		<b class="caret"></b>
                        	</a>
                        	<div class="sub-nav">
	                        	 <ul id="dealersSub" style="" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
			                      <li class="active" role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url().'dealers';?>">Dealers Listing</a></li>
			                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url().'pricing-dealer';?>">Dealers Princing</a></li>
			                      
			                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url().'ad-online'?>">Online Advertising</a></li>
			                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url().'ad-online'?>">Partnership</a></li>
			                    <?if(!isset($user_id)){?>     
			                      <li role="presentation" class="divider"></li>
			                           
			                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url().'register-dealer'?>"> Dealer Register</a></li>
			                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url().'login-dealer'?>">Dealer Login</a></li>
			                    <?}?>
			                    </ul>
			                </div>
                        </li>
                        <li id="sale-main" <?= (isset($title) && $title == 'For Sale') ? 'class="current"' : ''; ?> >
                        	<a class="main-menu" href="<? echo base_url().'sale'; ?>">
                        		For Sale
                        		<b class="caret"></b>
                        	</a>
                        	<div class="sub-nav">
	                        	<ul id="saleSub" style="" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
			                      <li class="active" role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url().'sale';?>">For Sale</a></li>
			                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url().'today-sale';?>">Todays Sale</a></li>
			                      
			                      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= base_url().'special'?>">Special Offers</a></li>  
			                    </ul>
			                </div>
                        </li>
                        <li id="contact-main" style="width:100px;" <?= (isset($title) && $title == 'Contact Us') ? 'class="current"' : ''; ?> >
                        	<a class="main-menu" href="<? echo base_url().'contact'; ?>">Contacts</a>
                        	<div class="sub-nav"></div>
                        </li>
                    </ul>
                    
                </div>
                <div id="">
                    <!--form method="get" action="#">
                        <input type="text" onblur="if(this.value=='') this.value='Search on site';" onfocus="if(this.value=='Search on site') this.value='';" value="Search on site" class="txb_search"/>
                        <input type="submit" value="Search" class="btn_search"/>
                    </form-->
                    <!--form class="navbar-form navbar-left" role="search">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                      </div>
                      <button type="submit" class="btn btn-default">Search</button>
                    </form-->
                </div>
            </div>
        </div>
    </div>
<!--EOF HEADER-->

