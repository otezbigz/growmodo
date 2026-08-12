<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#141414">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="site-header" role="banner">
    <div class="container">
        <nav class="nav-wrapper" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'estatein' ); ?>">

            <!-- Logo -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="<?php bloginfo( 'name' ); ?> – Home">
                <div class="logo-icon" aria-hidden="true">🏠</div>
                <span><?php bloginfo( 'name' ); ?></span>
            </a>

            <!-- Desktop Nav -->
            <div class="primary-nav" role="menubar">
                <?php
                $menu_items = array(
                    home_url( '/' )             => __( 'Home',       'estatein' ),
                    home_url( '/about' )        => __( 'About Us',   'estatein' ),
                    home_url( '/properties' )   => __( 'Properties', 'estatein' ),
                    home_url( '/services' )     => __( 'Services',   'estatein' ),
                    home_url( '/contact' )      => __( 'Contact Us', 'estatein' ),
                );

                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => '',
                        'walker'         => new Estatein_Walker_Nav(),
                        'fallback_cb'    => false,
                    ) );
                } else {
                    foreach ( $menu_items as $url => $label ) {
                        $active = ( untrailingslashit( $url ) === untrailingslashit( home_url( $GLOBALS['wp']->request ) ) ) ? ' active' : '';
                        printf(
                            '<a href="%s" class="%s" role="menuitem">%s</a>',
                            esc_url( $url ),
                            'nav-link' . esc_attr( $active ),
                            esc_html( $label )
                        );
                    }
                }
                ?>
            </div>

            <!-- Nav Actions -->
            <div class="nav-actions">
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-outline">
                    <?php esc_html_e( 'Contact Us', 'estatein' ); ?>
                </a>
            </div>

            <!-- Hamburger -->
            <button class="nav-toggle" aria-label="<?php esc_attr_e( 'Open navigation menu', 'estatein' ); ?>" aria-expanded="false" aria-controls="mobile-nav">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </nav><!-- .nav-wrapper -->
    </div><!-- .container -->

    <!-- Mobile Nav -->
    <nav id="mobile-nav" class="mobile-nav" aria-label="<?php esc_attr_e( 'Mobile Navigation', 'estatein' ); ?>" hidden>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'estatein' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/about' ) ); ?>"><?php esc_html_e( 'About Us', 'estatein' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/properties' ) ); ?>"><?php esc_html_e( 'Properties', 'estatein' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>"><?php esc_html_e( 'Services', 'estatein' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Contact Us', 'estatein' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Get in Touch', 'estatein' ); ?></a>
    </nav>

</header>
<?php
/* Simple nav walker for primary menu */
if ( ! class_exists( 'Estatein_Walker_Nav' ) ) {
    class Estatein_Walker_Nav extends Walker_Nav_Menu {
        public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
            $url     = $item->url;
            $active  = in_array( 'current-menu-item', $item->classes ) ? ' active' : '';
            $output .= sprintf(
                '<a href="%s" class="nav-link%s" role="menuitem">%s</a>',
                esc_url( $url ),
                esc_attr( $active ),
                esc_html( $item->title )
            );
        }
    }
}
?>
