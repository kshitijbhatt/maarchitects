<?php 
/*
Template Name: Home
 */
get_header();
?>

<?php 
$extra_css = get_field('extra_css');
if ($extra_css){
?>
<style> <?php echo $extra_css; ?> </style>
<?php } ?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        
        <section class="hero_image">
            <?php 
            $desktop_bg = "";
            $home_main_image = get_field('home_main_image');
            if ($home_main_image){
                $desktop_bg = $home_main_image["url"];
            } else{
                $desktop_bg = 'https://maarchitects.in/test/wp-content/uploads/2018/02/IMG_7538-2_a.jpg';
            }

            $mobile_bg = "";
            $mobile_image = get_field('mobile_image');
            if ($mobile_image){
                $mobile_bg = $mobile_image["url"];
            } else{
                $mobile_bg = 'https://maarchitects.in/test/wp-content/uploads/2018/02/IMG_7542_a.jpg';
            }
            ?>

            <?php
            $bg_pos = "";
            $bg_pos_mob = "";
            $main_image_background_position = get_field('main_image_background_position');
            if($main_image_background_position){
                $bg_pos = $main_image_background_position;
            }
            $main_image_background_position_mobile_view = get_field('main_image_background_position_mobile_view');
            if ($main_image_background_position_mobile_view){
                $bg_pos_mob = $main_image_background_position_mobile_view;
            }
            ?>
            <style>
                .hero_image .banner_image {
                    background-position: <?php echo $bg_pos; ?>
                }
                @media only screen and (min-width: 768px){
                    .hero_image .banner_image {background-image: url('<?php echo $desktop_bg; ?>');}
                }
                @media only screen and (max-width: 767px){
                    .hero_image .banner_image {
                        background-image: url('<?php echo $mobile_bg; ?>');
                        background-position: <?php echo $bg_pos_mob; ?>;
                    }
                }
            </style>

            <div class="banner_image desktop_home">                
                <div class="banner_menu">
                    <div class="container">
                        <div class="row">
                            <ul>
                                <?php
                                    if( have_rows('home_options') ):
                                        while ( have_rows('home_options') ) : the_row();
                                           $title = get_sub_field('title');
                                           $info_text = get_sub_field('info_text');
                                           $link = get_sub_field('link');
                                           ?>
                                           <li>
                                                <a href="<?php echo $link; ?>" style="font-size: <?php echo get_field('font_size_home_option');?>">
                                                    <?php echo $title; ?>     
                                                </a>
                                                <ul class="sub_info">
                                                    <li>
                                                        <span class="banner_menu_caption">
                                                            <?php echo $info_text; ?>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </li>
                                           <?php
                                        endwhile;
                                    endif;
                                ?>
                               
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
        </section>


    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>