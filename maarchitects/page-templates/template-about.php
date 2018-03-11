<?php 
/*
Template Name: About
 */
get_header();
?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		
		<!--================================================
			Main Content
		=================================================-->
		<div id="main" class="about_us_page">
			
			<section class="main_content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							<?php 
							$about_title = get_field("about_title");
							if ($about_title) {
							?>
							<h2 class="inner_title mobile_about">Who we are!</h2>
							<?php } else { ?>
							<h2 class="inner_title mobile_about"><?php echo get_the_title(); ?></h2>
							<?php } ?>
							<div class="desc_text">								
								<?php the_content(); ?>
							</div>
						</div>
					</div>
					<!-- /row -->
					<div class="row">
						<div class="col-sm-12">
							<?php 
							$defines_us_title = get_field("defines_us_title"); 
							if ($defines_us_title){
							?>
							<h2 class="inner_title mobile_about"><?php echo $defines_us_title; ?></h2>
							<?php } else { ?>
							<h2 class="inner_title mobile_about"></h2>
							<?php } ?>
						</div>

						<!-- =================================================== -->
						<div class="tabbablemenu col-sm-12">
							<?php
							if( have_rows('define_us_box') ):
								echo '<ul class="nav nav-tabs">';
	                            while ( have_rows('define_us_box') ) : the_row();
	                            	$title = get_sub_field("title");
	                            	$title = trim(strip_tags($title));
	                            	$string = preg_replace('/\s+/', '', $title);
	                            	?>	                            	
									<li><a data-toggle="tab" href="#<?php echo $string; ?>"><?php echo $title; ?></a></li>									
	                            	<?php
	                            	$image = get_sub_field("image");
	                           	endwhile;
	                           	echo '</ul>';
                       		endif;
							?>
							<?php
							$i=1;
							if( have_rows('define_us_box') ):
								echo '<div class="tab-content">';
	                            while ( have_rows('define_us_box') ) : the_row();
	                            	$title = get_sub_field("title");
	                            	$image = get_sub_field("image");
	                            	$title = trim(strip_tags($title));
	                            	$string = preg_replace('/\s+/', '', $title);                            	
	                            	if ($i==1){
	                            	?>	                            	
									<div id="<?php echo $string; ?>" class="tab-pane fade in active">
									<?php } else { ?>
									<div id="<?php echo $string; ?>" class="tab-pane fade in">
									<?php } ?>
									<a href="<?php echo $image['url']; ?>" data-rel="lightcase:myCollection:slideshow" data-toggle="lightbox">
										<img src="<?php echo $image['url']; ?>" alt="Image" class="img-responsive">	
									</a>
									</div>
	                            	<?php
                            		$i++;
	                           	endwhile;
	                           	echo '</div>';
                       		endif;
							?>
							<script>
								jQuery(document).ready(function(){
									jQuery('.nav-tabs li:first').addClass('active');
								});
							</script>
						</div>
						<!-- =================================================== -->


						
					</div>
				</div>
			</section>

			<section class="our_team mobile_about">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							<h2 class="inner_title team_title text-center mobile_about">
								<?php 
								if (get_field("team_title")){
									 echo get_field("team_title");
								}
								?>
							</h2>
						</div>
					</div>
					<div class="row">
						<?php 
						if( have_rows('select_top_members') ):
                            while ( have_rows('select_top_members') ) : the_row();
                            	$members = get_sub_field('members');
                            	$memberID = $members->ID;
                            	$memberName = $members->post_title;                            	
                            	// echo '<pre>'; print_r($members); echo '</pre>';
                            	?>
                            	<div class="col-xs-6 col-sm-3">
									<div class="team_box">
										<div class="thumbnail">
											<img src="<?php echo get_the_post_thumbnail_url($memberID); ?>" alt="Team" class="img-responsive">
										</div>
										<div class="team_caption">
											<div class="team_cap_wrap">
											<h3 class="team_name"><a href="javascript:void(0);"><?php echo $memberName; ?></a></h3>
											<p class="team_desig"><?php echo get_field( 'designation', $memberID ) ?></p>
											<p class="team_social">
												<?php 
							                    if (get_field('team_facebook', $memberID)) {
							                        ?>
							                        <a href="<?php echo get_field('team_facebook', $memberID); ?>">
							                        	<i class="fa fa-facebook"></i>
							                        </a>
							                        <?php
							                    }
							                    ?>
							                    <?php 
							                    if (get_field('team_linkedin', $memberID)) {
							                        ?>
							                        <a href="<?php echo get_field('team_linkedin', $memberID); ?>">
							                        	<i class="fa fa-linkedin"></i>
							                        </a>
							                        <?php
							                    }
							                    ?>
							                    <?php 
							                    if (get_field('team_twitter', $memberID)) {
							                        ?>
							                        <a href="<?php echo get_field('team_twitter', $memberID); ?>">
							                        	<i class="fa fa-twitter"></i>
							                        </a>
							                        <?php
							                    }
							                    ?>
												
											</p>
											</div>
										</div>
									</div>
								</div>
                            	<?php
                        	endwhile;
                        endif;
						?>		
					</div>				
					<!-- /row -->

					<div class="row">
						<div class="sub_teams">
							<?php 
							if( have_rows('other_team_members') ):
                            while ( have_rows('other_team_members') ) : the_row();
                            	$members = get_sub_field('other_members');
                            	$memberID = $members->ID;
                            	$memberName = $members->post_title;
                            	// echo '<pre>'; print_r($members); echo '</pre>';
                            	?>
                            	<div class="col-xs-4 col-sm-3 col-md-2">
									<div class="team_box_no_animation">
										<div class="thumbnail">
											<img src="<?php echo get_the_post_thumbnail_url($memberID); ?>" alt="Team" class="img-responsive">
										</div>
										<div class="caption_wrap">
											<h3><?php echo $memberName; ?></h3>
											
										</div>
									</div>
								</div>
                            	<?php
                            	endwhile;
                       		 endif;
                            ?>
							
						</div>
					</div>
					<!-- /row -->
				</div>
			</section>

		</div>
		<!-- /#main -->


    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>

<script>
/* Gallery Lighbox
================================== */
jQuery(document).ready(function($) {
  $('a[data-rel^=lightcase]').lightcase({
        onFinish : {
            custom: function() {
                var caption = $(this).find('.caption');
                if (caption.length) {
                    lightcase.get('caption').html(caption.html());
                    $('#lightcase-caption').show();
                } 
                lightcase.resize();
            }
        }
    });
});
$('a[data-rel^=lightcase1]').lightcase();
</script>