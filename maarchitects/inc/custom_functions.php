<?php
/*======================================================
THEME OPTION
=======================================================*/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}


/*======================================================
AJAX PROJECT FILTER
=======================================================*/
function filter_project_category(){
	/*$msg="";
	$catID = $_REQUEST["catID"];
	$cat_id = explode('_',$catID);
	$single_category_id = $cat_id[1];

	$type = 'projects';
	$args=array(
		'post_type' => $type,		
		'posts_per_page' => -1,
		'order' => 'ASC',
		'tax_query' => array(				
			array(
				'taxonomy' => 'project_categories',
				'field' => 'id',
				'terms' =>$single_category_id,
				'operator' => 'IN',
				
			),
		),
	);*/

	$msg="";
	$catArray = $_REQUEST["catArray"];
	$cat_ids = explode(',',$catArray);	
	$array2 = array();
	$array_list = '';
	foreach ($cat_ids as $row) {
	    if ($row !== ""){
	       $array2[] = $row;
	       $array_list .=$row.',';	
	    }
	}
	// print_r($array2);
	$array_list = substr(trim($array_list), 0, -1);	   
	$type = 'ourprojects';
	// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;	
	if ($catArray=="-1"){
		$args = array(
			'post_type'        => $type,
			// 'paged'			   => $paged,
			'posts_per_page'   => -1,
			'order'            => 'DESC',			
		);
	} else {
		if (!empty($array2)){		
			$args = array(
				'post_type'        => $type,		
				'posts_per_page'   => -1,
				'order'            => 'ASC',
				'tax_query' => array(				
					array(
						'taxonomy' => 'project_categories',
						'field' => 'slug',
						'terms' =>$array2,
						'operator' => 'IN',
						
					),
				), 
				
			);
			
		} else {		
			$args = array(
				'post_type'        => $type,
				// 'paged'			   => $paged,
				'posts_per_page'   => -1,
				'order'            => 'ASC',			
			);
		}
	}
	$my_query = null;
	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) {
		while ($my_query->have_posts()) : $my_query->the_post();
			$thumbnail_id = get_post_thumbnail_id( $post->ID );
			$terms = get_the_terms( $post->ID , 'project_categories' );
			$msg.= '<div class="col-sm-4">
				<div class="pro_box">
					<a href="'.get_the_permalink().'">';
					
					if (has_post_thumbnail()){				
					$msg.= '<div class="pro_image">
						<img src="'.get_the_post_thumbnail_url().'" alt="Pro Image" class="img-responsive">
					</div>';
					} else {
					$msg.= '<div class="pro_image">
						<img src="'.get_template_directory_uri().'/assets/images/prop<?php echo $i; ?>.jpg" alt="Pro Image" class="img-responsive">
					</div>';
					}

					$msg.='<div class="pro_caption">
						<h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';
						if (get_field('client')) {
						$msg.='<p>Client - '.get_field("client").'</p>';
						}
						if (get_field('location')) { 
						$msg.='<p>Location - '.get_field("location").'</p>';
						}
					$msg.='</div>
					</a>
				</div>
			</div>';			
		endwhile;
	} else {
		$msg.='<div class="col-sm-12 text-center"><h1 class="no_post_found">No project found with matching cateria !!</h1></div>';
	}
	$msg.='<div class="ajax_spinner text-center" style="display: none;">
		<img src="http://zunaventures.com/project/maarchitects-cms/wp-content/uploads/2017/11/spinner.gif" alt="Spinner image">
	</div>';


	echo $msg;
	die();
}
add_action("wp_ajax_nopriv_filter_project_category", "filter_project_category");
add_action("wp_ajax_filter_project_category", "filter_project_category");




/*======================================================
AJAX PROJECT FULL DETAILS
=======================================================*/
function show_full_project_details(){
	$postID = $_REQUEST["postID"];
	$msg = "";


	$msg .='<div class="container-fluid single_info">';
			$msg .='<div class="row">';
				if (has_post_thumbnail($postID) ) {
				$msg .='<div class="col-xs-6 col-sm-6 proj_img_col abc1">
					<div class="proj_img">
						<a href="'.get_the_post_thumbnail_url($postID).'" data-rel="lightcase:myCollection:slideshow" data-toggle="lightbox">
							<img src="'.get_the_post_thumbnail_url($postID).'" alt="" class="img-responsive">
						</a>
					</div>';
				$msg .='</div>';
				}


				if (has_post_thumbnail( $postID) ) {
					$msg .='<div class="col-xs-6 col-sm-6 thumbnail_col abc1">';
				} else {
					$msg .='<div class="col-xs-12 col-sm-12 thumbnail_col abc1">';
				}
			
					$msg.='<div class="single_pro_info_wrap">';
					$msg .='<h4>'.get_the_title($postID).'</h4>';
					$msg .='<div class="the_content">'.$_REQUEST["the_post_content"].'</div>';
					$msg.='</div>';
					$prototype_image = get_field('prototype_image',$postID );
					if ($prototype_image ){
						$msg.='<div class="thumb_img hideonMobile"><img src="'.$prototype_image["url"].'"  class="img-responsive" alt="" /></div>';
					}

				$msg .='</div>';
				$msg .='<div class="col-xs-12 hideOnDesktop">
					<div class="thumb_img">
						<img src="'.$prototype_image["url"].'" alt="argus1" class="img-responsive">
					</div>
				</div>
			</div>';

			$msg .='<div class="row summary_blk_1_col">
					<div class="col-sm-12">
						<div class="infoText">'.get_field("summary_block_1", $postID).'</div>
					</div>';

				

				
				if (get_field('featured_image_2', $postID)){
					$msg .='<div class="col-xs-6 col-sm-7 infotext_col">';
				} else {
					$msg .='<div class="col-xs-12 col-sm-12">';
				}
				
					$msg.='<div class="infoText_block">';
						$msg .='<div class="infoText_1">'.get_field("summary_block_2", $postID).'</div>';						 
						$featured_image_1 = get_field('featured_image_1', $postID);
						if ($featured_image_1){ 
						$msg .='<div class="infoImage2 hideonMobile">
							<a href="'.$featured_image_1["url"].'" data-rel="lightcase:myCollection:slideshow" data-toggle="lightbox">
								<img src="'.$featured_image_1["url"].'" alt="" class="img-responsive">';
							}
							$msg .='</a>
						</div>
					</div>					
				</div>';

			 
				if (get_field("summary_block_2", $postID)) {
					$msg.= '<div class="col-xs-6 col-sm-5 summary_block_2_col">';
				} else {
					$msg.= '<div class="col-xs-12 col-sm-12">';
				}
				
				$featured_image_2 = get_field('featured_image_2', $postID);
						if ($featured_image_2){ 
						$msg.='<div class="infoImage">
							<a href="'.$featured_image_2["url"].'" data-rel="lightcase:myCollection:slideshow" data-toggle="lightbox">
							<img src="'.$featured_image_2["url"].'" alt="" class="img-responsive">
							</a>	
						</div>';
						}
				$featured_image_3 = get_field('featured_image_3', $postID);
						if ($featured_image_3){ 
						$msg.='<div class="infoImage1">
							<a href="'.$featured_image_3["url"].'" data-rel="lightcase:myCollection:slideshow" data-toggle="lightbox">
							<img src="'.$featured_image_3["url"].'" alt="" class="img-responsive">
							</a>
						</div>';
						}
				$msg.='</div>
			</div>';
			
			$msg.='<div class="container-fluid">
			<div class="row">';								 
				if( have_rows('project_site_map_images', $postID) ):
					while ( have_rows('project_site_map_images', $postID) ) : the_row();
						$images = get_sub_field('images', $postID);
						
						$msg.='<div class="col-xs-6 col-sm-6">
							<div class="img_box_1">
								<a href="'.$images["url"].'" data-rel="lightcase:myCollection:slideshow" data-toggle="lightbox">
								<img src="'.$images["url"].'" class="img-responsive">
								</a>
							</div>
						</div>';						
					endwhile;
				endif;			
				
				$msg.='<div class="clearfix"></div>';				 
				$main_project_image = get_field('main_project_image', $postID); 
				if ($main_project_image){			
				$msg.='<div class="col-sm-12">
					<div class="bottom_banner_img mt40">
						<a href="'.$main_project_image["url"].'" data-rel="lightcase:myCollection:slideshow" data-toggle="lightbox">
						<img src="'.$main_project_image["url"].'" alt="argus1" class="img-responsive">
						</a>
					</div>
				</div>';
				}
			$msg.='</div>';
			
			$msg.='</div>';		

		$msg.='</div>';		

	$msg.='</div>';
	
	$msg.="<script>
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
</script>";

// $msg.='
// <script>
// var maxHeight = 0;

// $(".abc1").each(function(){
//    if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
// });

// $(".abc1").height(maxHeight);
// </script>';
	
	echo $msg;
	die();
}
add_action("wp_ajax_nopriv_show_full_project_details", "show_full_project_details");
add_action("wp_ajax_show_full_project_details", "show_full_project_details");