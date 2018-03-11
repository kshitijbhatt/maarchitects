<?php 
/*
Template Name: Projects
 */
get_header();
?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
    	

		<!--================================================
			Main Content
		=================================================-->
		<div id="main" class="main project_main">
			<div class="project_wrap">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-8 fil_bor_btm">
							<a href="javascript:void(0)" class="filter_link">Filter <i class="fa fa-angle-right"></i></a>	
						</div>
						<div class="col-sm-4">
							<div class="search_wrap">
								<div class="form-inline">
									<input type="text" class="searchinput" id="searchinput" name="search" placeholder="Search">
									<input type="button" name="searchbtn" class="searchbtn" id="searchbtn" value="search">
									<span class="fa fa-search fasearch"></span>
								</div>
							</div>				
						</div>
					</div>
					<!-- /row -->
					
					<div class="filter_wrap">
						<div class="row">
							<div class="col-sm-12">
								<h4>Project Type</h4>
							</div>
							<div class="col-sm-3 displayNone borderRight" style="display: none">
								<div class="filter_list1 active-cateory">
									<div class="checkwrap checkMargin">
										<input type="checkbox" checked id="all_list_cat" value="-1">
										<label for="" class="checkLabel"></label>
										<span><?php echo trim("All"); ?></span>
									</div>
								</div>
							</div>
							<?php
							$i=0;
							$taxonomy = 'project_categories';
							$tax_terms = get_terms($taxonomy, array('hide_empty' => false,'orderby' => 'title'));
							foreach ($tax_terms as $tax_term) {
								$i++;
								$cat_ID = $tax_term->term_id;			
								$cat_name = $tax_term->name;
								$cat_slug = $tax_term->slug;
								$cat_term_link = esc_attr(get_term_link($tax_term, $taxonomy));
								if ($i%4==0){
									echo '<div class="col-xs-6 col-sm-3 borderRight1">';
								} else {
									echo '<div class="col-xs-6 col-sm-3 borderRight">';
								}
								?>								
									<div class="checkwrap checkMargin">
										<input type="checkbox" name="filter" class="procategory" value="<?php echo $cat_slug; ?>" id="procategory_<?php echo $cat_ID; ?>">
										<label for="" class="checkLabel"></label>
										<span><?php echo $cat_name; ?></span>
									</div>
							</div>
								<?php
							}		
							?>							
						</div>
						<!-- /row -->
					</div>

				</div>
						
				<div class="pro_filter" id="pro_filter">
					<div class="container-fluid">
						<div class="row">
							<div class="filtersAjax">
							<?php
							$type = 'ourprojects';
							$args=array(
								'post_type' => $type,
								'post_status' => 'publish',
								'posts_per_page' => -1,
								'order' => 'ASC'
							);
							$my_query = null;
							$my_query = new WP_Query($args);
							if( $my_query->have_posts() ) {
								while ($my_query->have_posts()) : $my_query->the_post();
								?>
								<div class="col-sm-3">
									<div class="pro_box">
										<a href="<?php echo get_the_permalink(); ?>">
										<?php 
										if (has_post_thumbnail()){
										?>
										<div class="pro_image">
											<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Pro Image" class="img-responsive img-thumb-resizer">
										</div>
										<?php } else { ?>
										<div class="pro_image">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/prop<?php echo $i; ?>.jpg" alt="Pro Image" class="img-responsive img-thumb-resizer">
										</div>	
										<?php } ?>

										<div class="pro_caption">
											<h2><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
											<?php if (get_field('client')) { ?>
											<p>Client - <?php echo get_field('client'); ?></p>
											<?php } ?>
											<?php if (get_field('location')) { ?>
											<p>Location - <?php echo get_field('location'); ?></p>
											<?php } ?>
										</div>
										</a>
									</div>
								</div>
								<?php
								endwhile;
							}
							wp_reset_query();
							?>	
						</div>
						<div class="ajax_spinner text-center" style="display: none;">
							<img src="https://maarchitects.in/test/wp-content/uploads/2017/11/spinner.gif" alt="Spinner image">
						</div>


					</div>
					<!-- /row -->
				</div>
				<!-- container -->

				

				
			</div>
			<!-- /.project_wrap -->
		</div>
		<!-- /#main -->
		

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>


<script>
jQuery(document).ready(function(){
	jQuery('.procategory').on('click',function(){
		jQuery('#all_list_cat').prop("checked", false);
		jQuery('#all_list_cat').parent('div').removeClass('active-cateory');
		var catID = jQuery(this).attr("id");
		var catArray = "";
		var catArray2 = "";
		jQuery('.procategory').each(function () {
			if (jQuery(this).is(':checked')) {
				jQuery(this).parent('div').addClass('active-cateory');
			} else {
				jQuery(this).parent('div').removeClass('active-cateory');
			}
		    var sThisVal = (this.checked ? jQuery(this).val() : "");
		    catArray +=sThisVal+',';
		    catArray2 +=sThisVal;
		});
		if (catArray2==""){
			jQuery('#all_list_cat').prop("checked", true);
			jQuery('#all_list_cat').parent('div').addClass('active-cateory');
		}


		var ajaxUrl = "<?php echo admin_url('admin-ajax.php'); ?>";
		jQuery('.ajax_spinner').show();
		jQuery('.filtersAjax').css('opacity','0.3');
		jQuery.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: ({
            	action : 'filter_project_category',
            	// catID : catID,
            	catArray : catArray,
            }),
            success: function(data) {
            	jQuery('.ajax_spinner').fadeOut(400);
            	jQuery('.filtersAjax').css('opacity','1');
            	jQuery('.filtersAjax').empty();
            	jQuery('.filtersAjax').html(data);
            }
   		});

	});
});
</script>