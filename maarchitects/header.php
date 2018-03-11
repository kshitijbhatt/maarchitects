<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package maarchitects
 */

?>
<html <?php language_attributes(); ?>>
<html>
<head>
	<html <?php language_attributes(); ?>>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
	<title>Ma Architects</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/libs/OwlCarousel/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/Lightbox.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/animate.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/responsive.css">	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="page" class="site">

	<!--================================================
		Header
	=================================================-->
	<?php
	if (is_home() || is_front_page()){
		echo '<header class="site_header">';
	} else {
		echo '<header class="site_header inner_header">';
	}
	?>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4">
					<div class="site_logo">
						
						<?php
						if (is_home() || is_front_page()){
							$site_logo = get_field('site_logo', 'option');
							if ($site_logo){
							?>
								<a href="<?php echo home_url(); ?>">
									<img src="<?php echo $site_logo['url']; ?>" alt="Logo" class="img-responsive">
								</a>
							<?php } else { ?>
								<a href="<?php echo home_url(); ?>"><strong><i>m</i><i>a</i></strong><span>architects</span></a>
							<?php } ?>
						<?php } else { ?>
							<?php
							$inner_page_logo = get_field('inner_page_logo', 'option');
							if ($inner_page_logo){
							?>
								<a href="<?php echo home_url(); ?>">
									<img src="<?php echo $inner_page_logo['url']; ?>" alt="Logo" class="img-responsive">
								</a>
							<?php } else { ?>
								<a href="<?php echo home_url(); ?>"><strong><i>m</i><i>a</i></strong><span>architects</span></a>
							<?php } ?>
						<?php } ?>
						
					</div>
				</div>
				<div class="col-sm-8 menu-custom-position">
					<div class="main_menu">
						<nav>						
							<?php $defaults = array(
							    'theme_location'  => '' ,
							    'menu'            => 'main_menu',
							    'container'       => '',
							    'container_class' => '',
							);
							?>	
							<?php wp_nav_menu( $defaults ); ?>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>