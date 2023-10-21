<?php
$Tronix_logo1 = Tronix_options('header_default_logo');
$Tronix_mobile = Tronix_options('header_mobile_logo');

$Tronix_enable_sticky_menu1 = Tronix_options( 'Tronix_enable_sticky_menu1' );
if ( $Tronix_enable_sticky_menu1 == true ) {
    $sticky = 'sticky-menu';
} else {
    $sticky = 'no-sticky';
}
?>

<div class="tronix-menu-wrapper">
	<div class="tronix-menu-area text-center">
		<button class="tronix-menu-toggle"><i class="bi bi-x-lg"></i></button>
		<div class="mobile-logo">
			<?php
				if( !empty( $Tronix_mobile['url'] ) ){
					$logoUrl = $Tronix_mobile['url'];
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo esc_url($logoUrl); ?>" alt="<?php esc_attr( bloginfo( 'name' ) ); ?>" >
					</a>
					<?php 
				}elseif(has_custom_logo()){
					the_custom_logo();
				}else{
					?>
					<h2>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php esc_html(bloginfo( 'name' )); ?>
						</a>
					</h2>
					<?php 
				}
			?>
		</div>
		<div class="tronix-mobile-menu">
				<?php
					wp_nav_menu(
						array(
							'container'      => false,
							'theme_location' => 'mainmenu',
							'menu_id'        => 'mainmenu',
							'menu_class'     => '',
							'echo'           => true,
							'fallback_cb'    => 'Tronix_Nav_Walker::fallback',
							'walker'         => new Tronix_Nav_Walker,
						)
					);
				?>
		</div>
	</div>
</div>

<header class="header-area site-header">
	<div class="tronix-header default">
		<div class="sticky-wrapper" id="<?php echo esc_attr( $sticky ); ?>">
			<div class="menu-area ">
				<div class="container">
					<div class="row align-items-center justify-content-between">
						<div class="header-logo col-auto">
							<?php
							if(!empty($Tronix_logo1['url'])){
							$logoUrl = $Tronix_logo1['url'];
							?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img src="<?php echo esc_url($logoUrl); ?>" alt="<?php esc_attr(bloginfo( 'name' )); ?>">
							</a>
							<?php 
						}elseif(has_custom_logo()){
									the_custom_logo();
								}else{
									?>
									<h2>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
											<?php esc_html(bloginfo( 'name' )); ?>
										</a>
									</h2>
									<?php 
								}
							?>

						</div>
						<div class="col-auto">
							<nav class="main-menu d-none d-lg-inline-block">
							<?php
									wp_nav_menu(
										array(
											'container'      => false,
											'theme_location' => 'mainmenu',
											'menu_id'        => 'mainmenu',
											'menu_class'     => '',
											'echo'           => true,
											'fallback_cb'    => 'Tronix_Nav_Walker::fallback',
											'walker'         => new Tronix_Nav_Walker,
										)
									);
								?>
							</nav>
							<button type="button" class="tronix-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div>
</header>

