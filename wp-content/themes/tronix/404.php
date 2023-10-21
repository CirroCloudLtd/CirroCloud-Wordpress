<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Tronix
 */

get_header();

$Tronix_error_page_banner = Tronix_options( 'Tronix_error_page_banner', true );
$Tronix_error_page_title = Tronix_options( 'Tronix_error_page_title' );
$Tronix_breadcrumb_select_html = Tronix_options( 'Tronix_breadcrumb_select_html', 'h2' );
$Tronix_error_image = Tronix_options( 'Tronix_error_image' );
$Tronix_not_found_text = Tronix_options( 'Tronix_not_found_text' );
$Tronix_go_back_home = Tronix_options( 'Tronix_go_back_home', true );
$Tronix_error_page_button_text = Tronix_options( 'Tronix_error_page_button_text', esc_html( 'Go Back Home', 'tronix' ) );

?>
<?php if ( $Tronix_error_page_banner == true ): ?>
	<div class="breadcroumb-area">
		<div class="container">
			<div class="breadcroumn-contnt">

				<<?php echo esc_attr( $Tronix_breadcrumb_select_html ); ?> class="page-title">
					<?php if ( !empty( $Tronix_error_page_title ) ) {
						echo esc_html( $Tronix_error_page_title );
					} ?>
				</<?php echo esc_attr( $Tronix_breadcrumb_select_html ); ?>>

				<?php if ( function_exists( 'bcn_display' ) ) : ?>
					<div class="bre-sub"><?php bcn_display(); ?></div>
				<?php endif; ?>

			</div>
		</div>
	</div>
<?php endif;?>

<main id="primary" class="content-area">
	<div class="container not-found-content">
		<div class="row justify-content-center">
			<div class="col-12 col-sm-12 col-md-10 col-xl-8 col-lg-8">
				<div class="not-found-text-wrapper text-center">

					<?php if ( !empty( $Tronix_error_image['url'] ) ) : ?>
					<div class="error-image">
						<img src="<?php echo esc_url( $Tronix_error_image['url'] ); ?>" alt="<?php echo esc_attr( $Tronix_error_image['alt'] ) ?>">
					</div>
					<?php else : ?>
						<div class="text-404">
							<h4><?php echo esc_html__( '404','tronix' ); ?></h4>
						</div>
					<?php endif; ?>

					<div class="error-dec">
						<?php echo wp_kses( $Tronix_not_found_text, 'Tronix_allowed_html' ); ?>
					</div>

					<?php if ( $Tronix_go_back_home == true ): ?>
						<div class="error-button button">
						<a class="theme-btns" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><?php echo esc_html( $Tronix_error_page_button_text ); ?> </span></a>
						</div>
					<?php endif;?>

				</div><!-- .page-content -->
			</div>
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
