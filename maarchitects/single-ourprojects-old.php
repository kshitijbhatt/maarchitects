<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package maarchitects
 */
get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
<!--================================================
	Main Content
=================================================-->
<?php
$project_banner_image = get_field('project_banner_image');
if ($project_banner_image) {
?>
<div class="single_banner" style="background-image: url('<?php echo $project_banner_image["url"]; ?>');">
	<div class="single_banner_caption"><h1><?php echo get_the_title(); ?></h1></div>
</div>
<?php } else { ?>
<div class="single_banner" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/argus.jpg');">
	<div class="single_banner_caption"><h1><?php echo get_the_title(); ?></h1></div>
</div>
<?php } ?>

<div id="main" class="main">
	<div class="single_wrap">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-6 col-sm-6">
					<p class="backto"><a href="http://localhost/maarchitects-cms/projects/"><i class="fa fa-long-arrow-left"></i> Back</a></p>
				</div>
				<div class="col-xs-6 col-sm-6">
					<p class="shbare text-right">
						<a href="javascript:void(0)" class="shareText">Share</a>
						<a href="javascript:void(0)" class="social_icon"><i class="fa fa-facebook-square"></i></a>
						<a href="javascript:void(0)" class="social_icon"><i class="fa fa-linkedin-square"></i></a>
						<a href="javascript:void(0)" class="social_icon"><i class="fa fa-twitter-square"></i></a>
					</p>
				</div>
			</div>

			<div class="row">
				<?php 
				if( have_rows('quick_project_features') ):
					while ( have_rows('quick_project_features') ) : the_row();
						$features = get_sub_field('features');
						?>
						<div class="col-xs-6 col-sm-3">
							<div class="short_info">
								<h4><?php echo $features; ?></h4>
							</div>
						</div>
						<?php
					endwhile;
				endif;
				?>				
			</div>
		</div>
		<!-- /.container-fluid -->
		
		<div class="container-fluid single_info">
			<div class="row">
				<?php if (has_post_thumbnail( ) ) { ?>
				<div class="col-xs-6 col-sm-6">
					<div class="proj_img">
						<a href="<?php echo get_the_post_thumbnail_url(); ?>" data-rel="lightcase:myCollection:slideshow" data-toggle="lightbox">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="argus1" class="img-responsive">
						</a>
					</div>
				</div>
				<?php } ?>
				<?php if (has_post_thumbnail( ) ) { ?>
				<div class="col-xs-6 col-sm-6">
				<?php } else { ?>
				<div class="col-xs-12 col-sm-12">
				<?php } ?>
					<h4><?php echo get_the_title(); ?></h4>					
					<?php the_content(); ?>
				</div>
				<div class="col-xs-12 hideOnDesktop">
					<div class="thumb_img">
						<img src="http://localhost/maarchitects-cms/wp-content/uploads/2017/11/agrus6.jpg" alt="argus1" class="img-responsive">
					</div>
				</div>
			</div>
			<!-- /row -->

			<div class="row">
				<div class="col-sm-12">
					<div class="infoText">
						<?php echo get_field("summary_block_1"); ?>
					</div>
				</div>
				<?php 
				if (get_field('featured_image_2')){
					echo '<div class="col-xs-6 col-sm-7">';
				} else {
					echo '<div class="col-xs-12 col-sm-12">';
				}
				?>
				<!-- <div class="col-xs-6 col-sm-7"> -->
					<div class="infoText">
						<?php echo get_field("summary_block_2"); ?>
						<?php 
						$featured_image_1 = get_field('featured_image_1');
						if ($featured_image_1){ ?>
						<div class="infoImage2 hideonMobile">
							<a href="<?php echo $featured_image_1['url']; ?>" data-rel="lightcase:myCollection:slideshow" data-toggle="lightbox">
								<img src="<?php echo $featured_image_1['url']; ?>" alt="" class="img-responsive">
							<?php } ?>
							</a>
						</div>
					</div>					
				</div>	

				<?php 
				if (get_field("summary_block_2")) {
					echo '<div class="col-xs-6 col-sm-5">';
				} else {
					echo '<div class="col-xs-12 col-sm-12">';
				}
				?>				
					<?php $featured_image_2 = get_field('featured_image_2');
						if ($featured_image_2){ ?>
						<div class="infoImage">
							<a href="<?php echo $featured_image_2['url']; ?>" data-rel="lightcase:myCollection:slideshow" data-toggle="lightbox">
							<img src="<?php echo $featured_image_2['url']; ?>" alt="" class="img-responsive">
							</a>	
						</div>
					<?php } ?>
					<?php $featured_image_3 = get_field('featured_image_3');
						if ($featured_image_3){ ?>
						<div class="infoImage1">
							<a href="<?php echo $featured_image_3['url']; ?>" data-rel="lightcase:myCollection:slideshow" data-toggle="lightbox">
							<img src="<?php echo $featured_image_3['url']; ?>" alt="" class="img-responsive">
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
			<!-- /row -->
			
			<div class="container-fluid">
			<div class="row">				
				<?php 
				if( have_rows('project_site_map_images') ):
					while ( have_rows('project_site_map_images') ) : the_row();
						$images = get_sub_field('images');
						?>
						<div class="col-xs-6 col-sm-6">
							<div class="img_box_1">
								<a href="<?php echo $images['url']; ?>" data-rel="lightcase:myCollection:slideshow" data-toggle="lightbox">
								<img src="<?php echo $images['url']; ?>" class="img-responsive">
								</a>
							</div>
						</div>
						<?php
					endwhile;
				endif;
				?>	
				
				<div class="clearfix"></div>
				<?php 
				$main_project_image = get_field('main_project_image'); 
				if ($main_project_image){
				?>
				<div class="col-sm-12">
					<div class="img_box_1 mt40">
						<a href="<?php echo $main_project_image['url']; ?>" data-rel="lightcase:myCollection:slideshow" data-toggle="lightbox">
						<img src="<?php echo $main_project_image['url']; ?>" alt="argus1" class="img-responsive">
						</a>
					</div>
				</div>
				<?php } ?>
			</div>
			<!-- /row -->
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="btn_wrap">
						<a href="javascript:void(0);" class="single_btn">Enter Gallery</a>
						<?php
						$download_project = get_field('download_project'); 
						if ($download_project){
						?>
						<a href="<?php echo $download_project['url']; ?>" download class="single_btn">Download Project</a>
						<?php } ?>
					</div>
				</div>
			</div>

		</div>
		<!-- /.container-fluid -->

		<!-- <footer class="site_footer">
			<div class="footer_social">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							<div class="line"></div>
							<ul>
								<li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
								<li><a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>
				</div>		
			</div>
		</footer> -->

	</div>
	<!-- /single_wrap -->

	<!--================================================
			NEXT Project
		=================================================-->
		<section class="next_pro_wrap" style="background-image: url('http://zunaventures.com/project/maarchitects-cms/wp-content/uploads/2017/11/next_pro.jpg');">
			<div class="next_caption">
				<p>Next Project</p>
				<a href="javascript:void(0)">					
					<?php previous_post_link(); ?>    <?php next_post_link(); ?>					
				</a>
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
</script>