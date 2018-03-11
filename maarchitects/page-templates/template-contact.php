<?php 
/*
Template Name: Contact
 */
get_header();
?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>


		<!--================================================
			Main Content
		=================================================-->
		<div id="main" class="main contact_page_wrap">
			
			<div class="contact_wrapper">

				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12 text-center"><h2 class="inner_title">Contact Us</h2></div>
						<div class="col-sm-12 text-center"><p class="contact_subheading">Please provide the information below and we <span>will gladly assist you</span></p></div>
					</div>
				</div>

				<div class="container-fluid">
					<div class="form_wrapper">
						<div class="row">
							<?php echo do_shortcode('[contact-form-7 id="14" title="Contact US Form"]'); ?>
								<!-- <div class="form_row">
									<div class="col-sm-12">
										<label for="">Name *</label>
									</div>
									<div class="col-xs-6 col-sm-6">
										<input type="text" class="firstname form-control" id="firstname" name="firstname">
										<span class="input_info">First Name</span>
									</div>
									<div class="col-xs-6 col-sm-6">
										<input type="text" class="lastname form-control" id="lastname" name="lastname">
										<span class="input_info">Last Name</span>
									</div>
								</div>
								<div class="form_row">
									<div class="col-sm-12">
										<label for="emailaddress">Email Address *</label>
										<input type="email" name="emailaddress" class="form-control emailaddress" id="emailaddress">
									</div>
								</div>
								<div class="form_row">
									<div class="col-sm-12">
										<label for="subject">Subject *</label>
										<input type="text" name="subject" class="form-control subject" id="subject">
									</div>
								</div>
								<div class="form_row">
									<div class="col-sm-12">
										<label for="message">Message *</label>
										<textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
									</div>
								</div>
								<div class="form_row">
									<div class="col-sm-12 text-center">
										<input type="submit" name="contact_submit" id="contact_submit" class="btn_contact_submit" value="Submit">
									</div>
								</div> -->
							
						</div>
					</div> 
					<!-- /form_wrapper -->
				</div>

				<div class="pro_inquireies">
					<div class="container-fluid form_wrapper">
						<div class="row">
							<div class="col-sm-12" style="padding-left:0px !important; padding-right:0px !important;">        
								<div class="col-md-4 desktop-add-l"> 
									<h3>Jaipur</h3>
									<h4 style="margin-top:10px;">Greenwoods</h4>
									<span>plot no.1, greenwoods, lal kothi<br />sahkar marg, Jaipur – 302001</span><br/>
									<span><a href="tel:+91-141-4299999">+91-141-4299999</a></span><br/>
									<span style="margin-bottom:15px;"><a href="mailto:studio@maarchitects.in">studio@maarchitects.in</a></span>
								</div>
								<div class="col-md-4 desktop-add-c">
									<h3>Bangalore</h3>
									<h4 style="margin-top:10px;">Chisel Architects</h4>
									<span>2588, IInd cross, 18th main, hal II stage<br />indira nagar, Bangalore – 560008</span><br/>
									<span><a href="tel:+91-80-41153691">+91-80-41153691</a></span><br/>
									<span style="margin-bottom:15px;"><a href="mailto:chisel@maarchitects.in">chisel@maarchitects.in</a></span>
								</div>
								<div class="col-md-4 desktop-add-r">
									<h3>Hyderabad</h3>
									<h4 style="margin-top:10px;">M A Architects</h4>
									<span>502, SVR Castle,Ijjatnagar, Off Hitex Road<br />Kothaguda, Hyderabad – 500084</span><br/>
									<span><a href="tel:+914029708988">+91-40-29708988</a></span><br/>
									<span style="margin-bottom:15px;"><a href="mailto:studio.hyd@maarchitects.in">studio.hyd@maarchitects.in</a></span>
								</div>
           						
							</div>
						</div>
					</div>
				</div>
				
           <!--	<div class="pro_inquireies">
					<div class="container-fluid form_wrapper">
						<div class="row">
							<div class="col-sm-12 text-center"><h4>Project inquireies</h4></div>
							<div class="col-sm-12 text-center"><p>We will happily respond to your inquiry as soon as possible</p></div>
							<div class="col-sm-12 text-center"><a href="mailto:ma@maarchitects.in">ma@maarchitects.in</a></div>
						</div>
					</div>
				</div> -->

				
				<!-- /pro_inquireies -->

				

			</div>
			<!-- /contact_wrapper -->

		</div>
		<!-- /#main -->

		
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>