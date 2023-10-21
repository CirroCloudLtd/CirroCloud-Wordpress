<?php 
$tronix_copyright = Tronix_options( 'Tronix_copyright_text' );
?>
<div class="footer-wrapper footer-default">
	<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
	<div class="footer-widget-area">
        <div class="container">
            <div class="row">
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    </div><!-- .widget-area -->
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    </div><!-- .widget-area -->
                <?php endif; ?>	

                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                    </div><!-- .widget-area -->
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                        <?php dynamic_sidebar( 'footer-4' ); ?>
                    </div><!-- .widget-area -->
                <?php endif; ?>
            </div>
        </div>
    </div>
	<?php endif?>
    <div class="footer-copyright-wrapper">
        <div class="container">
            <div class="site-info"><?php echo wp_kses( $tronix_copyright, 'tronix_allow_html' ); ?></div>
        </div>
    </div>
</div>