<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package maarchitects
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="error404_title">404</h1>
						<h2 class="error404_subtitle">Page Not Found</h2>						
					</div>
					<div class="col-sm-8 col-sm-offset-2">
						<div class="error404_info">
							<p>The page you are looking for dose not exist or any other error occured. <a href="http://maarchitects.in">Go Back</a> to choose a new destination.</p>
						</div>
					</div>
					<div class="col-sm-12 search_wrap404 text-center">
						<form role="search" method="get" class="search-form" action="<?php echo get_home_url(); ?>">
				<label>
					<span class="screen-reader-text">Search for:</span>
					<input type="search" class="search-field" placeholder="Search …" value="" name="s">
				</label>
				<input type="submit" class="search-submit" value="Search">
			</form>					</div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
