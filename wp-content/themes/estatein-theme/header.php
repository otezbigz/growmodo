<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Mobile Nav Overlay -->
<nav class="mobile-nav" id="mobile-nav" aria-hidden="true">
  <button class="btn-icon" id="mobile-close" aria-label="Close menu" style="position:absolute;top:28px;right:24px;font-size:24px;">✕</button>
  <a href="<?= home_url('/') ?>">Home</a>
  <a href="<?= home_url('/about-us') ?>">About Us</a>
  <a href="<?= home_url('/properties') ?>">Properties</a>
  <a href="<?= home_url('/services') ?>">Services</a>
  <a href="<?= home_url('/contact-us') ?>" class="btn btn-primary">Contact Us</a>
</nav>

<!-- Sticky Header -->
<header id="site-header" role="banner">
  <div class="container">
    <div class="nav-inner">

      <!-- Logo -->
      <a href="<?= esc_url( home_url('/') ) ?>" class="site-logo">
        <?php if ( has_custom_logo() ) : the_custom_logo();
        else : ?>
          <div class="logo-icon" aria-hidden="true"></div>
          <span><?php bloginfo('name'); ?></span>
        <?php endif; ?>
      </a>

      <!-- Primary Nav -->
      <nav class="nav-links" aria-label="Primary navigation">
        <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => '',
          'fallback_cb'    => function() {
            $links = [
              'Home'        => home_url('/'),
              'About Us'    => home_url('/about-us'),
              'Properties'  => home_url('/properties'),
              'Services'    => home_url('/services'),
            ];
            foreach ( $links as $label => $url ) {
              $active = ( trailingslashit( $_SERVER['REQUEST_URI'] ) === parse_url( $url, PHP_URL_PATH ) . '/' ) ? ' active' : '';
              echo '<a href="' . esc_url($url) . '" class="' . $active . '">' . esc_html($label) . '</a>';
            }
          },
          'items_wrap'     => '%3$s',
          'walker'         => new Estatein_Nav_Walker(),
        ]);
        ?>
      </nav>

      <!-- Right Actions -->
      <div class="nav-right">
        <a href="<?= home_url('/contact-us') ?>" class="btn btn-outline">Contact Us</a>
        <button class="nav-toggle" id="nav-toggle" aria-label="Toggle mobile menu" aria-expanded="false">
          <span></span><span></span><span></span>
        </button>
      </div>

    </div>
  </div>
</header>

<?php
// Simple walker to add active class
class Estatein_Nav_Walker extends Walker_Nav_Menu {
  function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    $active = in_array('current-menu-item', $item->classes) ? ' active' : '';
    $output .= '<a href="' . esc_url($item->url) . '" class="' . $active . '">' . esc_html($item->title) . '</a>';
  }
}
