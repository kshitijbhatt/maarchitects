<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maarchitects
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        
        <section class="hero_image">
            <div class="banner_image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/banner1.jpg');" >
                <div class="banner_menu">
                    <div class="container">
                        <div class="row">
                            <ul>
                                <li>
                                    <a href="javascript:void(0)">Dream</a>
                                    <ul class="sub_info">
                                        <li>
                                            <span class="banner_menu_caption">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, enimnon posuere accumsan,dolor dui fringilla tortor, nec tempor elit lorem eu nte. Nulla tempus accumsanmolestie. Phasellus congue ligula eget nisl rutrum imperdiet. Sed turpis erat
                                            </span>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Design</a>
                                    <ul class="sub_info">
                                        <li>
                                            <span class="banner_menu_caption">                                      
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, enimnon posuere accumsan,dolor dui fringilla tortor, nec tempor elit lorem eu nte. Nulla tempus accumsanmolestie. Phasellus congue ligula eget nisl rutrum imperdiet. Sed turpis erat
                                            </span>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Inspire</a>
                                    <ul class="sub_info">
                                        <li>
                                            <span class="banner_menu_caption">                                      
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, enimnon posuere accumsan,dolor dui fringilla tortor, nec tempor elit lorem eu nte. Nulla tempus accumsanmolestie. Phasellus congue ligula eget nisl rutrum imperdiet. Sed turpis erat  
                                            </span>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="home_footer">
            <div class="home_social">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul>
                                <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>      
            </div>
        </section>


    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>