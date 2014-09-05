
			<div class="content">
				<div class="breadcrumbs">
					<a href="#">Home</a>
					<img src="<?= base_url().'images/'?>marker_2.gif" alt=""/>
					<span>Add an offer</span>
				</div>
				<div class="main_wrapper">
					<div class="steps">
						<span>1. Vehicle Information</span>
						<span>2. Preview</span>
						<span>3. Submit</span>
					</div>
					<h1><strong>Sell</strong> your vehicle</h1>
					<div class="message">
						<h4>Sell your car on <strong><span class="blue">Car</span><span class="gold">Shelves</span><span class="blue">.com</span></strong> and benefit from more than 1 million potential buyers every month!</h4>
						<p>Required fields are marked with *<br/>Please post offers only on the car (parts are a special category).<br/>If you are a dealer, please visit the dealers section<br/>If you have difficulties in posting an offer on the website, please call 0742 016 570</p>
					</div>
					<form id="ad_vehicle_form" action="<?= base_url().'add/addVehicle';?>" enctype="multipart/form-data" method="post">
					<div class="sell_box sell_box_1">
                        
						<h2><strong>Vehicle</strong> data</h2>
                        
                        
							<div class="row">
                            <div class="col-md-4 form-group">
                                <label for="manufacturer" ><span>* </span><strong>Manufacturer:</strong></label>
                                <select id="manufacturer" name="manufacturer" class="form-control" required>
                                    <option value="" class="label">Select</option>
                                    <option value="audi">Audi</option>
                                    <option value="Mercedes">Mercedes-Benz</option>
                                    <option value="BMW">BMW</option>
                                    <option value="Lexus">Lexus</option>
                                    <option value="Lincoln">Lincoln</option>
                                    <option value="Ford">Ford</option>
                                    <option value="Fiat">Fiat</option>
                                    <option value="Dodge">Dodge</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label><span>* </span><strong>Model: </strong></label>
                                <select id="model" name="model" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="R8">R8</option>
                                    <option value="S500">S500</option>
                                    <option value="540i">540i</option>
                                    <option value="RX300">RX300</option>
                                    <option value="Navigator">Navigator</option>
                                    <option value="Taurus">Taurus</option>
                                    <option value="Doblo">Doblo</option>
                                    <option value="Viper">Viper</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label><span>* </span><strong>Year:</strong></label>
                                <select id="year" name="year" class="form-control" required> 
                                    <option value="">Select</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>

                                </select>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4 form-group">
                                <label><span>* </span><strong>Body Type:</strong></label>
                                <select id="body_type" name="body_type" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="Sedan">Sedan</option>
                                    <option value="Coupe">Coupe</option>
                                    <option value="SUV">SUV</option>
                                    <option value="Hatchback">Hatchback</option>
                                    <option value="Tagra">Tagra</option>
                                </select>  
                            </div>
                            <div class="col-md-4 form-group">
                                <label><span>* </span><strong>Fuel Type:</strong></label>
                                <select id="fuel_type" name="fuel_type" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Plus">Plus</option>
                                    <option value="Premium">Premium</option>
                                    <option value="Diesel">Diesel</option>
                                </select>
                            </div>  
                            <div class="col-md-4 form-group">
                                <label><span>* </span><strong>Transmission:</strong></label>
                                <select id="transmission" name="transmission" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="Auto">Auto</option>
                                    <option value="Manual">Manual</option>
                                </select>
                            </div>  
                          </div>
                          <div class="row">
                              <div class="col-md-4 form-group">
                                <label><span>* </span><strong>Doors:</strong></label>
                                <select id="doors" name="doors" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                              </div>
                              <div class="col-md-4 form-group">
                                <label><span>* </span><strong>Cylinders:</strong></label>
                                <select id="cylinders" name="cylinders" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                    <option value="8">8</option>
                                    <option value="10">10</option>
                                    <option value="12">12</option>
                                </select>
                              </div>
                              <div class="col-md-4 form-group">
                                <label><span>* </span><strong>Color:</strong></label>
                                <select id="color" name="color" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="Red">Red</option>
                                    <option value="Green">Green</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Grey">Grey</option>
                                    <option value="White">White</option>
                                    <option value="Black">Black</option>
                                    <option value="Yellow">Yellow</option>
                                    <option value="Maroon">Maroon</option>
                                    <option value="Brown">Brown</option>
                                    <option value="Black">Black</option>
                                    <option value="Other">Other</option>
                                </select>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-4 form-group">
                                <label><span>* </span><strong>VIN / Vehicule Identification Number:</strong></label>
                                <input type="text" id="vin" name="vin" class="form-control" value="" required/>
                              </div>
                              <!--div class="col-md-8 form-group">
                                <button type="submit" class="btn btn-primary">Validate</button>
                              </div-->
                          </div>
                        
                        
						<div class="clear"></div>
					</div>
                        
                        
					<div class="sell_box sell_box_2">
						<h2><strong>Vehicle</strong> equipment</h2>
                        <div class="row">
						<div class="col-md-4">
                            <div class="chb_group">
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox"  name="abs" checked="checked"/>
                                    </span>
                                    <label>ABS</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="sun_roof" checked="checked"/>
                                    </span>
                                    <label>Sun roof</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="differential_lock" checked="checked"/>
                                    </span>
                                    <label>Differential lock</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="leather_interior" checked="checked"/>
                                    </span>
                                    <label>Leather interior</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="radio_cd" checked="checked"/>
                                    </span>
                                    <label>Radio / CD</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="adjustable_suspension" checked="checked"/>
                                    </span>
                                    <label>Adjust suspension</label>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="chb_group">
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="eds" checked="checked"/>
                                    </span>
                                    <label>EDS</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="protection_framework" checked="checked"/>
                                    </span>
                                    <label>Frame Protection</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="tinted_glass" checked="checked"/>
                                    </span>
                                    <label>Tinted glass</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="alloy_wheels" checked="checked"/>
                                    </span>
                                    <label>Alloy wheels</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="heated_seats" checked="checked"/>
                                    </span>
                                    <label>Heated seats</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="leather_upholstery" checked="checked"/>
                                    </span>
                                    <label>Leather upholstery</label>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="chb_group">
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="ESP" checked="checked"/>
                                    </span>
                                    <label>ESP</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="tow" checked="checked"/>
                                    </span>
                                    <label>Tow</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="electric_windows" checked="checked"/>
                                    </span>
                                    <label>Electric windows</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="electric_mirrors" checked="checked"/>
                                    </span>
                                    <label>Electric mirrors</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="parking_sensors" checked="checked"/>
                                    </span>
                                    <label>Parking sensors</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="hatch" checked="checked"/>
                                    </span>
                                    <label>Hatch</label>
                                </span>
                            </div>
                        </div>
                        </div>
						<!--div class="chb_devider"></div-->
                        <div class="row">
                        <div class="col-md-4">
                            <div class="chb_group">
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="air_conditioning" checked="checked"/>
                                    </span>
                                    <label>Air conditioning</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="traction_control" checked="checked"/>
                                    </span>
                                    <label>Traction control</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="immobilizer" checked="checked"/>
                                    </span>
                                    <label>Immobilizer</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="heated_windshield" checked="checked"/>
                                    </span>
                                    <label>Heated windshield</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="rain_sensors" checked="checked"/>
                                    </span>
                                    <label>Rain sensors</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="xenon" checked="checked"/>
                                    </span>
                                    <label>Xenon</label>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="chb_group">
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="airbag" checked="checked"/>
                                    </span>
                                    <label>Airbag</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="board_computer" checked="checked"/>
                                    </span>
                                    <label>Board computer</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="auxiliary_heating" checked="checked"/>
                                    </span>
                                    <label>Auxiliary heating</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="auto_pilot" checked="checked"/>
                                    </span>
                                    <label>Autopilot</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="power_steering" checked="checked"/>
                                    </span>
                                    <label>Power steering</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="4WD" checked="checked"/>
                                    </span>
                                    <label>4WD</label>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="chb_group last">
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="alarm" checked="checked"/>
                                    </span>
                                    <label>Alarm</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="cruise_control" checked="checked"/>
                                    </span>
                                    <label>Cruise control</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="central_locking" checked="checked"/>
                                    </span>
                                    <label>Central locking</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="fog_lights" checked="checked"/>
                                    </span>
                                    <label>Fog lights</label>
                                </span>
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="navigation" checked="checked"/>
                                    </span>
                                    <label>Navigation system</label>
                                </span>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        	<div class="col-md-8 form-group">
                                <label><strong>Additional Equipment: </strong></label>
							     <textarea cols="10" rows="6" name="additional_equipment" class="form-control"></textarea>
                            </div>
                        </div>
						<div class="clear"></div>
					</div>
					<div class="sell_box sell_box_3">
						<h2><strong>Vehicle</strong> price <span class="gold">&amp;</span> condition</h2>
                        
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label><span>* </span><strong>Technical condition: </strong></label>
                                <select name="condition" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="low">Low</option>
                                    <option value="good">Good</option>
                                    <option value="very good">Very Good</option>
                                    <option value="excellent">Excellent</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label><span>* </span><strong>Milage: </strong></label>
							     <input type="text" name="milage" class="form-control" value="" required/>
                            </div>
                            <div class="col-md-4 form-group">
                                <div class="select_wrapper">
                                    <label><span>* </span><strong>Price: </strong></label>
                                    <input type="text" name="price" class="form-control" value="0.00" onblur="if(this.value=='') this.value='0.00';" onfocus="if(this.value=='0.00') this.value='';" required/>
                                </div>
                            </div>
                        </div>
                        <div class="rom">
                            <div class="single_chb_wrapper">
                                <span class="custom_chb_wrapper">
                                    <span class="custom_chb">
                                        <input type="checkbox" name="negotiable" checked="checked" required/>
                                    </span>
                                    <label><span class="gold">Price Negotiable</span></label>
                                </span>
                            </div>
                        </div>
						
						<div class="clear"></div>
					</div>
                    
                    
					<div class="sell_box sell_box_4">
						<h2><strong>Vehicle</strong> photos</h2>
						
                        <div class="row">
                            <div class="col-md-4 photo-wrapper">
                               		<input type="hidden" value="file-1">
                                    <input id="file_1" name="file_1" type="file" multiple="true" class="form-control">
                                
                            </div>
                            <div class="col-md-4 photo-wrapper">
                                
                                    <input id="file_2" name="file_2" type="file" multiple="true">
                               
                            </div>
                            <div class="col-md-4 photo-wrapper">
                               
                                    <input id="file_3" name="file_3" type="file" multiple="true">
                                
                            </div>
                        </div>
                        <div class="divider-photo"></div>
                        <div class="row">
                            <div class="col-md-4 photo-wrapper">
                               
                                    <input id="file_4" name="file_4" type="file" multiple="true">
                                
                            </div>
                            <div class="col-md-4 photo-wrapper">
                                
                                    <input id="file_5" name="file_5" type="file" multiple="true">
                               
                            </div>
                            <div class="col-md-4 photo-wrapper">
                               
                                    <input id="file_6" name="file_6" type="file" multiple="true">
                               
                            </div>
                        </div>
						
						<div class="clear"></div>
					</div>
                    
					<div class="sell_box sell_box_5">
						<h2><strong>Seller</strong> details</h2>
						
                        <div class="row">
                            <div class="input_wrapper form-group col-md-4">
                                <label><span>* </span><strong>First Name: </strong></label>
                                <input type="text" name="first" class="form-control" value="" required/>
                            </div>
                            <div class="input_wrapper form-group col-md-4">
                                <label><strong>Middle: </strong></label>
                                <input type="text" name="middle" class="form-control" value="" />
                            </div>
                            <div class="input_wrapper form-group col-md-4">
                                <label><span>* </span><strong>Last Name: </strong></label>
                                <input type="text" name="last" class="form-control" value="" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input_wrapper form-group col-md-4">
                                <label><span>* </span><strong>Phone (Mobile): </strong></label>
                                <input type="text" name="mobile_phone" class="form-control" value="" required/>
                            </div>
                            <div class="input_wrapper form-group col-md-4">
                                <label><strong>Phone (Home): </strong></label>
                                <input type="text" name="home_phone" class="form-control" value=""/>
                            </div>
                            <div class="input_wrapper form-group col-md-4">
                                <label><strong>Work (Home): </strong></label>
                                <input type="text" name="home_phone" class="form-control" value=""/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="select_wrapper col-md-4 form-group">
                                <label><span>* </span><strong>State: </strong></label>
                                <select name="state" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="1">atlanta</option>
                                    <option value="2">alabama</option>
                                    <option value="3">tenesse</option>
                                    <option value="4">florida</option>
                                    <option value="5">texas</option>
                                    <option value="6">ilinois</option>
                                    <option value="7">chicago</option>
                                </select>
                            </div>
                            <div class="select_wrapper col-md-4 form-group">
                                <label><span>* </span><strong>City: </strong></label>
                                <select name="city" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="1">atlanta</option>
                                    <option value="2">alabama</option>
                                    <option value="3">tenesse</option>
                                    <option value="4">florida</option>
                                    <option value="5">texas</option>
                                    <option value="6">ilinois</option>
                                    <option value="7">chicago</option>
                                </select>
                            </div>
                             <div class="input_wrapper form-group col-md-4">
                                <label><span>* </span><strong>Zip:</strong></label>
                                <input type="text" name="zip" class="form-control" value="" maxlength="5" minlength="5" required/>
                            </div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="sell_submit_wrapper form-group">
						<span class="custom_chb_wrapper fL">
							<span class="custom_chb">
								<input type="checkbox" id="terms" name="terms" class="form-control" required/>
							</span>
							<label><span class="gold">I agree to the Terms and Conditions</span></label>
						</span>
						<button type="submit" class="btn btn-primary" style="float:right;" />Continnue</button>
						<div class="clear"></div>
					</div>
                 </form>
                        
				</div>
			</div>