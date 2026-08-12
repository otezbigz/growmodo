<?php
/**
 * Estatein Theme Functions
 */

// ── Theme Support ─────────────────────────────────────────
function estatein_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form','comment-form','comment-list','gallery','caption','style','script' ] );
    add_theme_support( 'custom-logo', [
        'width'       => 200,
        'height'      => 48,
        'flex-width'  => true,
        'flex-height' => true,
    ] );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'woocommerce' );

    register_nav_menus( [
        'primary'  => __( 'Primary Navigation', 'estatein' ),
        'footer-1' => __( 'Footer – Home', 'estatein' ),
        'footer-2' => __( 'Footer – About', 'estatein' ),
        'footer-3' => __( 'Footer – Properties', 'estatein' ),
        'footer-4' => __( 'Footer – Services', 'estatein' ),
        'footer-5' => __( 'Footer – Contact', 'estatein' ),
    ] );
}
add_action( 'after_setup_theme', 'estatein_setup' );

// ── Enqueue ───────────────────────────────────────────────
function estatein_scripts() {
    // Google Font: Urbanist
    wp_enqueue_style(
        'estatein-fonts',
        'https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'estatein-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [ 'estatein-fonts' ],
        '1.0.0'
    );

    wp_enqueue_script(
        'estatein-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        '1.0.0',
        true
    );

    wp_localize_script( 'estatein-main', 'estateinAjax', [
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'estatein_nonce' ),
    ] );
}
add_action( 'wp_enqueue_scripts', 'estatein_scripts' );

// ── Custom Post Types ─────────────────────────────────────

// Properties CPT
function estatein_register_cpts() {
    register_post_type( 'property', [
        'labels' => [
            'name'          => __( 'Properties', 'estatein' ),
            'singular_name' => __( 'Property', 'estatein' ),
            'add_new_item'  => __( 'Add New Property', 'estatein' ),
            'edit_item'     => __( 'Edit Property', 'estatein' ),
        ],
        'public'       => true,
        'has_archive'  => true,
        'show_in_rest' => true,
        'supports'     => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'rewrite'      => [ 'slug' => 'properties' ],
        'menu_icon'    => 'dashicons-building',
    ] );

    register_taxonomy( 'property_type', 'property', [
        'labels'       => [ 'name' => 'Property Types', 'singular_name' => 'Property Type' ],
        'public'       => true,
        'hierarchical' => true,
        'rewrite'      => [ 'slug' => 'property-type' ],
        'show_in_rest' => true,
    ] );

    register_taxonomy( 'property_location', 'property', [
        'labels'       => [ 'name' => 'Locations', 'singular_name' => 'Location' ],
        'public'       => true,
        'hierarchical' => false,
        'rewrite'      => [ 'slug' => 'location' ],
        'show_in_rest' => true,
    ] );
}
add_action( 'init', 'estatein_register_cpts' );

// ── Customizer ────────────────────────────────────────────
function estatein_customizer( $wp_customize ) {

    // ── Hero Section ──
    $wp_customize->add_section( 'estatein_hero', [
        'title'    => __( 'Hero Section', 'estatein' ),
        'priority' => 30,
    ] );

    $fields = [
        'hero_tag'    => [ 'label' => 'Hero Tag (small badge text)',  'default' => "No. 1 Real Estate Platform" ],
        'hero_title'  => [ 'label' => 'Hero Title (use %s for purple word)', 'default' => "Discover Your Dream\nProperty with %sEstatein%s" ],
        'hero_desc'   => [ 'label' => 'Hero Description', 'default' => "From cozy starter homes to luxurious estates, Estatein makes finding your perfect property effortless." ],
        'hero_cta_1'  => [ 'label' => 'CTA Button 1 Text', 'default' => 'Learn More' ],
        'hero_cta_2'  => [ 'label' => 'CTA Button 2 Text', 'default' => 'Browse Properties' ],
        'hero_stat_1_num'   => [ 'label' => 'Stat 1 Number', 'default' => '200+' ],
        'hero_stat_1_label' => [ 'label' => 'Stat 1 Label', 'default' => 'Happy Customers' ],
        'hero_stat_2_num'   => [ 'label' => 'Stat 2 Number', 'default' => '10K+' ],
        'hero_stat_2_label' => [ 'label' => 'Stat 2 Label', 'default' => 'Properties For Clients' ],
        'hero_stat_3_num'   => [ 'label' => 'Stat 3 Number', 'default' => '16+' ],
        'hero_stat_3_label' => [ 'label' => 'Stat 3 Label', 'default' => 'Years of Experience' ],
    ];

    foreach ( $fields as $key => $opts ) {
        $wp_customize->add_setting( $key, [ 'default' => $opts['default'], 'sanitize_callback' => 'wp_kses_post' ] );
        $wp_customize->add_control( $key, [
            'label'   => $opts['label'],
            'section' => 'estatein_hero',
            'type'    => 'text',
        ] );
    }

    // ── CTA Section ──
    $wp_customize->add_section( 'estatein_cta', [
        'title'    => __( 'CTA / Newsletter Section', 'estatein' ),
        'priority' => 50,
    ] );
    foreach ( [
        'cta_title' => [ 'label' => 'CTA Title', 'default' => "Start Your Real Estate Journey Today" ],
        'cta_desc'  => [ 'label' => 'CTA Description', 'default' => "Your dream property is just a step away. Let Estatein guide you to your perfect home, investment, or commercial space." ],
        'cta_btn'   => [ 'label' => 'CTA Button Text', 'default' => 'Learn More' ],
    ] as $key => $opts ) {
        $wp_customize->add_setting( $key, [ 'default' => $opts['default'], 'sanitize_callback' => 'sanitize_text_field' ] );
        $wp_customize->add_control( $key, [ 'label' => $opts['label'], 'section' => 'estatein_cta', 'type' => 'text' ] );
    }
}
add_action( 'customize_register', 'estatein_customizer' );

// ── Helpers ───────────────────────────────────────────────
function estatein_get( $key, $default = '' ) {
    return get_theme_mod( $key, $default );
}

function estatein_property_price( $post_id = null ) {
    $price = get_post_meta( $post_id ?: get_the_ID(), '_property_price', true );
    return $price ? '$' . number_format( (float) $price ) : '';
}

function estatein_property_meta( $key, $post_id = null ) {
    return get_post_meta( $post_id ?: get_the_ID(), '_property_' . $key, true );
}

// ── AJAX: Newsletter ──────────────────────────────────────
function estatein_newsletter_subscribe() {
    check_ajax_referer( 'estatein_nonce', 'nonce' );
    $email = sanitize_email( $_POST['email'] ?? '' );
    if ( ! is_email( $email ) ) {
        wp_send_json_error( [ 'message' => 'Invalid email address.' ] );
    }
    // Store as user meta or pass to your email service here
    update_option( 'estatein_subscriber_' . md5( $email ), $email );
    wp_send_json_success( [ 'message' => 'Thanks for subscribing!' ] );
}
add_action( 'wp_ajax_estatein_subscribe',        'estatein_newsletter_subscribe' );
add_action( 'wp_ajax_nopriv_estatein_subscribe', 'estatein_newsletter_subscribe' );

// ── SVG Icons helper ─────────────────────────────────────
function estatein_icon( $name ) {
    $icons = [
        'location' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>',
        'arrow-right' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>',
        'arrow-up'    => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg>',
        'bed'  => '🛏',
        'bath' => '🚿',
        'area' => '📐',
    ];
    return $icons[ $name ] ?? '';
}
