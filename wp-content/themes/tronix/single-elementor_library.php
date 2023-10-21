<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Tronix
 */

get_header();

?>
<div class="breadcroumb-area">
    <div class="container">
        <div class="breadcroumn-contnt">
        <h2 class="page-title"> <?php the_title(); ?> </h2>
            <div class="bre-sub">
            <?php if( function_exists( 'bcn_display' )){
                bcn_display();
            }?>
            </div>
        </div>
    </div>
</div>
<div class="tronix-template-for-elementor">
      <?php
      while ( have_posts() ) : the_post();
            the_content();
      endwhile;
      ?>
</div>
<?php
get_footer();
