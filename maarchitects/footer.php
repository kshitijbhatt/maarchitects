<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package maarchitects
 */

?>


</div><!-- #page -->

<!--================================================
	Footer
=================================================-->
<footer class="site_footer">
	<div class="footer_social">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="line"></div>
					<ul>
	                    <?php 
	                    if (get_field('facebook', 'option')) {
	                        ?>
	                        <li><a href="<?php echo get_field('facebook', 'option'); ?>"><i class="fa fa-facebook"></i></a></li>
	                        <?php
	                    }
	                    ?>
	                    <?php 
	                    if (get_field('linkedin', 'option')) {
	                        ?>
	                        <li><a href="<?php echo get_field('linkedin', 'option'); ?>"><i class="fa fa-linkedin"></i></a></li>
	                        <?php
	                    }
	                    ?>
	                    <?php 
	                    if (get_field('twitter', 'option')) {
	                        ?>
	                        <li><a href="<?php echo get_field('twitter', 'option'); ?>"><i class="fa fa-twitter"></i></a></li>
	                        <?php
	                    }
	                    ?>
	                </ul>
				</div>
			</div>
		</div>		
	</div>
</footer>


<style>
.home .site_footer {display: none; padding: 0;}
</style>
<!--================================================
	SCROLL TO TOP
=================================================-->
<a href="javascript:void(0)" id="toTop">	
	<span class="fa fa-angle-up"></span>
</a>


<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/libs/OwlCarousel/dist/owl.carousel.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/libs/OwlCarousel/src/js/owl.autoplay.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/wow.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/SmoothScroll.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/Lightbox.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-touch-events/1.0.5/jquery.mobile-events.js"></script>

<?php wp_footer(); ?>
</body>
</html>
