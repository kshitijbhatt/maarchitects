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
		<input type="hidden" class="postID" value="<?php echo $post->ID; ?>">
<!--================================================
	Main Content
=================================================-->
<?php
$project_banner_image = get_field('project_banner_image');
if ($project_banner_image) {
?>
<div class="single_banner" style="background-image: url('<?php echo $project_banner_image["url"]; ?>');">
	<div class="single_banner_caption"><h1><?php echo get_the_title(); ?></h1>
<?php 
$city = get_field('city'); 
if ($city) {
?>
<h3 class="cityofproject"><?php echo $city; ?></h3>
<?php } ?>
</div>
</div>
<?php } else { ?>
<div class="single_banner" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/argus.jpg');">
	<div class="single_banner_caption"><h1><?php echo get_the_title(); ?></h1></div>
</div>
<?php } ?>

<div id="main" class="main single_pro_main">
	<div class="single_wrap">
		<div class="container-fluid">
			<div class="row navig_wrap">
				<div class="col-xs-6 col-sm-6">
					<p class="backto"><a href="<?php echo home_url(); ?>/projects/"><i class="fa fa-long-arrow-left"></i> Back to all projects</a></p>
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
		
		<!-- ===================================== SHORT DESCRIPTION ================== -->
		<style>
		.short_project_description {margin: 20px 0; position: relative;}
		.pro_img_box{margin-bottom: 30px; overflow: hidden; position: relative;}
		.pro_img_box img {transition: all 0.5s ease;}
		.pro_img_box img:hover {transition: all 0.5s ease; transform: scale(1.05);}
		.read_more_link {margin-top: 10px; display: inline-block;}
		.image-resizer{max-height:330px; object-fit:cover;overflow:hidden;}
		@media only screen and (min-width:780px){.image-resizer{min-height:330px;}}
		</style>
		<div class="short_project_description">
			<div class="container-fluid">
				<div class="row">
					<?php 
					$project_image_1 = get_field('project_image_1');
					if ($project_image_1){
					?>
					<div class="col-xs-6 col-sm-4 padd_right_0">
						<div class="pro_img_box">
							<a href="<?php echo $project_image_1['url']; ?>" data-rel="lightcase:myCollection:slideshow" data-toggle="lightbox">
								<img src="<?php echo $project_image_1['url']; ?>" alt="" class="img-responsive image-resizer">
							</a>
						</div>
					</div>
					<?php } else { ?>
					<div class="col-xs-6 col-sm-4 padd_right_0">
						<div class="pro_img_box">
							<a href="<?php echo get_the_post_thumbnail_url(); ?>" data-rel="lightcase1" data-toggle="lightbox">
								<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-responsive image-resizer">
							</a>
						</div>
					</div>
					<?php } ?>

					<?php 
					$project_image_2 = get_field('project_image_2');
					if ($project_image_2){
					?>
					<div class="col-xs-6 col-sm-4 padd_left_0">
						<div class="pro_img_box">
							<a href="<?php echo $project_image_2['url']; ?>" data-rel="lightcase:myCollection:slideshow" data-toggle="lightbox">
								<img src="<?php echo $project_image_2['url']; ?>" alt="" class="img-responsive image-resizer">
							</a>
						</div>
					</div>
					<?php } else { ?>
					<div class="col-xs-6 col-sm-4 padd_left_0">
						<div class="pro_img_box">
							<a href="<?php echo get_the_post_thumbnail_url(); ?>" data-rel="lightcase1" data-toggle="lightbox">
								<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-responsive image-resizer">
							</a>
						</div>
					</div>
					<?php } ?>


					<?php 
					$project_image_3 = get_field('project_image_3');
					if ($project_image_3){
					?>
					<div class="col-xs-12 col-sm-4">
						<div class="pro_img_box short_margin_btm">
							<a href="<?php echo $project_image_3['url']; ?>" data-rel="lightcase:myCollection:slideshow" data-toggle="lightbox">
								<img src="<?php echo $project_image_3['url']; ?>" alt="" class="img-responsive image-resizer">
							</a>
						</div>
					</div>
					<?php } ?>
					
					
					<div class="clearfix">
					</div>
					
					<?php 
					$project_short_description = get_field('project_short_description');
					if ($project_short_description){
					?>
					
					<div class="col-sm-12">
						<div class="pro_text_box">
							<?php echo $project_short_description; ?>
							<a href="javascript:void(0)" class="read_more_link" id="read_more_link">[Read more]</a>
						</div>
					</div>
					<?php } else { ?>
					<div class="col-sm-12">
						<div class="pro_text_box text-center">							
							<a href="javascript:void(0)" class="read_more_link single_btn" id="read_more_link">Full Project Details</a>
						</div>
					</div>
					<?php } ?>

					<div class="the_post_content" style="display: none">
						<?php the_content(); ?>
					</div>

					
					</div>
					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
			<div class="ajax_spinner1 text-center" style="display: none;">
				<img src="https://maarchitects.in/test/wp-content/uploads/2017/11/spinner.gif" alt="Spinner image">
			</div>
		</div>
		<!-- /short_project_description -->
			

		<!-- ===================================== FULL DESCRIPTION ================== -->
		<div class="full_details_project"></div>
		<!-- full_detail_project -->
	
		<div class="clearfix"></div>
	<!-- </div> -->
	<!-- single_wrap -->


	<div class="container-fluid" id="gallery_download_block">
		<div class="row">
			<div class="col-sm-12">
				<div class="btn_wrap">
					<!-- <a href="<?php echo home_url(); ?>/projects/" class="single_btn">Enter Gallery</a> -->
					
					<?php 
					$gallery_image = "";
					$pro_thumbnail = get_the_post_thumbnail_url();					
					$project_image_1 = get_field('project_image_1');
					$project_image_2 = get_field('project_image_2');
					$project_image_3 = get_field('project_image_3');

					if ($project_image_1){
						$gallery_image = $project_image_1['url'];
					} else if ($project_image_2) {
						$gallery_image = $project_image_2['url'];
					} else if($project_image_3) {
						$gallery_image = $project_image_3['url'];
					} else if (has_post_thumbnail()){
						$gallery_image = $pro_thumbnail;
					}
					?>
					<a href="<?php echo $gallery_image ; ?>" class="single_btn" id="enter_gallery" data-rel="lightcase:myCollection:slideshow" data-toggle="lightbox">Enter Gallery</a>
					
					
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

	
</div>
<!-- /#main -->
	
<!--=================================================
			Trying to put footer above other files
==================================================-->
	<?php get_footer(); ?>
<!-- /#Footer -->

<!--================================================
			NEXT Project
=================================================-->
<style>
.overly_pro {height: 100%; width: 100%; top: 0; position: absolute; background: rgba(0,0,0,0.5);}
.next_pro_wrap .next_caption {z-index: 99;}
.next_pro_wrap {margin: 0;}
.next_pro_content {margin: 40px 0 0 0; position: relative; overflow: hidden;}
.prev_wrap, .next_wrap {display: inline-block; margin: 0 20px;}
</style>
<?php
$prev_post = get_previous_post();
$next_post = get_next_post();
$bg_img = "";
if (!empty( $next_post ) && empty( $prev_post )) {
	$post_ID = $next_post->ID;
	$post_link = $next_post->guid;
	$next_project_banner = get_field('next_project_banner', $post_ID );
	$pro_image_footer = get_field('project_banner_image', $post_ID );
	$location = get_field('location', $post_ID );
	if ($next_project_banner){
		$bg_img = $next_project_banner['url'];
	} else {
		$bg_img = $pro_image_footer['url'];
	}
?>
<section class="next_pro_content">
	<div class="next_pro_wrap" style="background-image: url('<?php echo $bg_img; ?>');">
		<div class="next_caption text-center">
			<p>Next Project</p>
			<a href="<?php echo $next_post->guid ?>"><?php echo $next_post->post_title ?></a>			
			<span style="margin-left: 10px;" class="fa fa-angle-double-right"></span>
			<div class="nextLoc"><?php echo $location; ?></div>
		</div>
	</div>
	<div class="overly_pro"></div>
</section>
<?php
} else if (!empty( $prev_post ) && empty( $next_post )) {
	$post_ID = $prev_post->ID;
	$post_link = $prev_post->guid;
	$next_project_banner = get_field('next_project_banner', $post_ID );
	$pro_image_footer = get_field('project_banner_image', $post_ID );
	$location = get_field('location', $post_ID );
	if ($next_project_banner){
		$bg_img = $next_project_banner['url'];
	} else {
		$bg_img = $pro_image_footer['url'];
	}
?>
<section class="next_pro_content">
	<div class="next_pro_wrap" style="background-image: url('<?php echo $bg_img; ?>');">
		<div class="next_caption text-center">
			<p>Previous Project</p>
			<span style="margin-right: 5px;" class="fa fa-angle-double-left"></span>
			<a href="<?php echo $prev_post->guid ?>"><?php echo $prev_post->post_title ?></a>
			<div class="nextLoc"><?php echo $location; ?></div>
		</div>
	</div>
	<div class="overly_pro"></div>
</section>
<?php
} else if ( !empty( $prev_post ) && !empty( $next_post )){
	$post_ID = $next_post->ID;
	$post_link = $next_post->guid;
	$next_project_banner = get_field('next_project_banner', $post_ID );
	$pro_image_footer = get_field('project_banner_image', $post_ID );
	$location = get_field('location', $post_ID );
	if ($next_project_banner){
		$bg_img = $next_project_banner['url'];
	} else {
		$bg_img = $pro_image_footer['url'];
	}
?>
<section class="next_pro_content">
	<div class="next_pro_wrap" style="background-image: url('<?php echo $bg_img; ?>');">
		<div class="next_caption">
			<!-- <div class="prev_wrap">
				<p>Previous Project</p>
				<span style="margin-right: 10px;" class="fa fa-angle-double-left"></span>
				<a href="<?php echo $prev_post->guid ?>"><?php echo $prev_post->post_title ?></a>
			</div> -->
			<div class="next_wrap text-center">
				<p>Next Project</p>
				<a href="<?php echo $next_post->guid ?>"><?php echo $next_post->post_title ?></a>				
				<span style="margin-left: 10px;" class="fa fa-angle-double-right"></span>
				<div class="nextLoc"><?php echo $location; ?></div>
			</div>
		</div>
	</div>
	<div class="overly_pro"></div>
</section>
<?php
} else {
?>
<section class="next_pro_wrap" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/next_pro.jpg');">
	<div class="next_caption">
		<p>Next Project</p>
		<a href="javascript:void(0)">					
			<?php previous_post_link(); ?>    <?php next_post_link(); ?>
		</a>
	</div>
</section>
<?php
}
?>



    <?php endwhile; ?>
<?php endif; ?>


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
				swipe: true
				
            }
        }
    });
	
});
  $('a[data-rel^=lightcase]').lightcase();

	
</script>



<script>
jQuery(document).ready(function(){
	jQuery('.read_more_link').on('click',function(){
		var postID = jQuery('.postID').val();
		var the_post_content = jQuery('.the_post_content').text();
		var ajaxUrl = "<?php echo admin_url('admin-ajax.php'); ?>";
		jQuery('.ajax_spinner1').show();
		jQuery.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: ({
            	action : 'show_full_project_details',            	
            	postID : postID,
            	the_post_content : the_post_content,
            }),
            success: function(data) {
            	jQuery('.ajax_spinner1').fadeOut(400);            	
            	jQuery('.short_project_description').fadeOut(400);            	
            	jQuery('.full_details_project').empty();
            	jQuery('.full_details_project').html(data);
            }
   		});

	});
});
</script>