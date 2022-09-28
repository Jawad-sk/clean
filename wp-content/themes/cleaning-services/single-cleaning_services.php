<?php
/**
 * Template Name: Single Service
 * Template Post Type: cleaning_services
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package Cleaning_Services
 */

get_header();
?>
<main class="page-main">
    <!-- Breadcrumbs Block -->
<?php 
    $show_breadcrumb = 'on';
    do_action('cleaning_services_breadcrumb'); 
?> 
    <!-- //Breadcrumbs Block -->
    <div class="block">
        <h1 class="text-center h-decor"><?php the_title() ?></h1>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9 aside">
                    <?php the_post_thumbnail('cleaning-services-service-full', array('class' => 'img-responsive')) ?>
                    <?php
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile; // End of the loop.
                    ?>
                </div>
                <div class="col-md-4 col-lg-3 aside">
                    <?php get_sidebar('services'); ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
