<?php
/**
 * The template for displaying all team single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Tronix
 */

get_header();
if(get_post_meta( get_the_ID(), 'Tronix_metabox', true)) {
    $Tronix_commonMeta = get_post_meta( get_the_ID(), 'Tronix_metabox', true );
} else {
    $Tronix_commonMeta = array();
}
$Tronix_team_title = Tronix_options('Tronix_team_title');
$Tronix_breadcrumb_select_html = Tronix_options('Tronix_breadcrumb_select_html', 'h2');
$Tronix_team_banner_enable = Tronix_options('Tronix_team_banner_enable');
if(array_key_exists('Tronix_layout_meta', $Tronix_commonMeta) && !empty($Tronix_commonMeta['Tronix_layout_meta'])){
    $Tronix_team_Layout = $Tronix_commonMeta['Tronix_layout_meta'];
}else{
    $Tronix_team_Layout = 'full-width';
}
if(is_array($Tronix_commonMeta) && array_key_exists('Tronix_sidebar_meta', $Tronix_commonMeta)){
    $Tronix_selectedSidebar = $Tronix_commonMeta['Tronix_sidebar_meta'];
}else{
    $Tronix_selectedSidebar = 'sidebar';
}

if($Tronix_team_Layout == 'left-sidebar' && is_active_sidebar($Tronix_selectedSidebar) || $Tronix_team_Layout == 'right-sidebar' && is_active_sidebar($Tronix_selectedSidebar)){
    $Tronix_teamColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8';
}else{
    $Tronix_teamColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12';
}

if($Tronix_team_banner_enable == false ){
    $Tronix_team_post_Banner = false;
}elseif(array_key_exists('Tronix_meta_enable_banner', $Tronix_commonMeta)){
    $Tronix_team_post_Banner = $Tronix_commonMeta['Tronix_meta_enable_banner'];
}else{
    $Tronix_team_post_Banner = true;
}
?>
	<?php if($Tronix_team_post_Banner == true ) : ?>
	<div class="breadcroumb-area">
		<div class="container">
			<div class="breadcroumn-contnt">
			<<?php echo esc_attr($Tronix_breadcrumb_select_html); ?> class="page-title">
			
				<?php if(!empty($Tronix_team_title)){
					echo esc_html($Tronix_team_title);
				}else{
					echo esc_html('Team Details','tronix');
				}?>
				</<?php echo esc_attr($Tronix_breadcrumb_select_html); ?>>

				<?php if(function_exists('bcn_display')) : ?>
					<div class="bre-sub"><?php bcn_display(); ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<main id="primary" class="site-main content-area team-details">
		<div class="container">
			<div class="page-layout <?php echo esc_attr($Tronix_team_Layout); ?>">
				<div class="row">
					<?php
					if($Tronix_team_Layout == 'left-sidebar' && is_active_sidebar($Tronix_selectedSidebar)){
						get_sidebar();
					}
					?>
					<div class="<?php echo esc_attr($Tronix_teamColumnClass); ?>">
						<div class="all-posts-wrapper">
						<?php
							while ( have_posts() ) :
								the_post();
								the_content();
							endwhile; // End of the loop.
							?>
						</div>
					</div>
					<?php
                    if($Tronix_team_Layout == 'right-sidebar' && is_active_sidebar($Tronix_selectedSidebar)){
                        get_sidebar();
                    }?>
				</div>
			</div>
		</div>
	</main><!-- #main -->
<?php
get_footer();