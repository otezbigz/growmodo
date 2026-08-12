<?php
/**
 * Estatein Theme Functions
 * @package Estatein
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* ------------------------------------------------------------------
   THEME SETUP
   ------------------------------------------------------------------ */
function estatein_setup() {
    load_theme_textdomain( 'estatein', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );

    // Custom image sizes
    add_image_size( 'estatein-property',    800, 500, true );
    add_image_size( 'estatein-property-sm', 400, 280, true );
    add_image_size( 'estatein-hero',       1400, 800, true );
    add_image_size( 'estatein-team',        400, 400, true );

    // Register nav menus
    register_nav_menus( array(
        'primary' => __( 'Primary Navigation', 'estatein' ),
        'footer'  => __( 'Footer Navigation',  'estatein' ),
    ) );
}
add_action( 'after_setup_theme', 'estatein_setup' );

/* ------------------------------------------------------------------
   ENQUEUE SCRIPTS & STYLES
   ------------------------------------------------------------------ */
function estatein_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'estatein-fonts',
        'https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;500;600;700;800;900&display=swap',
        array(),
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'estatein-style',
        get_stylesheet_uri(),
        array( 'estatein-fonts' ),
        '1.0.0'
    );

    // Main JS
    wp_enqueue_script(
        'estatein-main',
        get_template_directory_uri() . '/js/main.js',
        array(),
        '1.0.0',
        true
    );

    // Pass data to JS
    wp_localize_script( 'estatein-main', 'estateinData', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'estatein_nonce' ),
        'homeUrl' => home_url(),
    ) );

    // Comment reply
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'estatein_scripts' );

/* ------------------------------------------------------------------
   WIDGET AREAS
   ------------------------------------------------------------------ */
function estatein_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'estatein' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Main sidebar widget area.', 'estatein' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 1', 'estatein' ),
        'id'            => 'footer-1',
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-col-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'estatein_widgets_init' );

/* ------------------------------------------------------------------
   CUSTOM POST TYPE: PROPERTY
   ------------------------------------------------------------------ */
function estatein_register_property_cpt() {
    $labels = array(
        'name'               => __( 'Properties',       'estatein' ),
        'singular_name'      => __( 'Property',         'estatein' ),
        'menu_name'          => __( 'Properties',       'estatein' ),
        'add_new'            => __( 'Add New',          'estatein' ),
        'add_new_item'       => __( 'Add New Property', 'estatein' ),
        'edit_item'          => __( 'Edit Property',    'estatein' ),
        'view_item'          => __( 'View Property',    'estatein' ),
        'search_items'       => __( 'Search Properties','estatein' ),
        'not_found'          => __( 'No properties found', 'estatein' ),
        'not_found_in_trash' => __( 'No properties in trash', 'estatein' ),
    );

    register_post_type( 'property', array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'properties' ),
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-building',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'menu_position'      => 5,
    ) );
}
add_action( 'init', 'estatein_register_property_cpt' );

/* ------------------------------------------------------------------
   CUSTOM TAXONOMY: PROPERTY TYPE
   ------------------------------------------------------------------ */
function estatein_register_property_taxonomy() {
    register_taxonomy( 'property_type', 'property', array(
        'labels'            => array(
            'name'          => __( 'Property Types', 'estatein' ),
            'singular_name' => __( 'Property Type',  'estatein' ),
        ),
        'public'            => true,
        'hierarchical'      => true,
        'show_in_rest'      => true,
        'rewrite'           => array( 'slug' => 'property-type' ),
    ) );
}
add_action( 'init', 'estatein_register_property_taxonomy' );

/* ------------------------------------------------------------------
   CUSTOM POST TYPE: TESTIMONIAL
   ------------------------------------------------------------------ */
function estatein_register_testimonial_cpt() {
    register_post_type( 'testimonial', array(
        'labels'       => array(
            'name'          => __( 'Testimonials',       'estatein' ),
            'singular_name' => __( 'Testimonial',        'estatein' ),
            'add_new_item'  => __( 'Add New Testimonial','estatein' ),
        ),
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-format-quote',
        'supports'     => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'estatein_register_testimonial_cpt' );

/* ------------------------------------------------------------------
   META BOXES (Property Details) — lightweight, no ACF required
   ------------------------------------------------------------------ */
function estatein_add_property_meta_boxes() {
    add_meta_box(
        'property_details',
        __( 'Property Details', 'estatein' ),
        'estatein_property_meta_box_callback',
        'property',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'estatein_add_property_meta_boxes' );

function estatein_property_meta_box_callback( $post ) {
    wp_nonce_field( 'estatein_property_nonce', 'estatein_property_nonce_field' );

    $fields = array(
        '_property_price'    => array( 'label' => 'Price (e.g. $550,000)',    'type' => 'text' ),
        '_property_beds'     => array( 'label' => 'Bedrooms',                 'type' => 'number' ),
        '_property_baths'    => array( 'label' => 'Bathrooms',                'type' => 'number' ),
        '_property_sqft'     => array( 'label' => 'Square Feet',              'type' => 'number' ),
        '_property_location' => array( 'label' => 'Location / Address',       'type' => 'text' ),
        '_property_type'     => array( 'label' => 'Type (Villa / Apartment)', 'type' => 'text' ),
        '_property_status'   => array( 'label' => 'Status (For Sale / Rent)', 'type' => 'text' ),
        '_property_badge'    => array( 'label' => 'Badge (e.g. Featured)',    'type' => 'text' ),
        '_property_garage'   => array( 'label' => 'Garage spaces',            'type' => 'number' ),
    );

    echo '<table class="form-table">';
    foreach ( $fields as $key => $field ) {
        $value = get_post_meta( $post->ID, $key, true );
        printf(
            '<tr><th><label for="%1$s">%2$s</label></th>
             <td><input type="%3$s" id="%1$s" name="%1$s" value="%4$s" class="regular-text"></td></tr>',
            esc_attr( $key ),
            esc_html( $field['label'] ),
            esc_attr( $field['type'] ),
            esc_attr( $value )
        );
    }
    echo '</table>';
}

function estatein_save_property_meta( $post_id ) {
    if ( ! isset( $_POST['estatein_property_nonce_field'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['estatein_property_nonce_field'], 'estatein_property_nonce' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $keys = array(
        '_property_price', '_property_beds', '_property_baths',
        '_property_sqft', '_property_location', '_property_type',
        '_property_status', '_property_badge', '_property_garage',
    );

    foreach ( $keys as $key ) {
        if ( isset( $_POST[ $key ] ) ) {
            update_post_meta( $post_id, $key, sanitize_text_field( $_POST[ $key ] ) );
        }
    }
}
add_action( 'save_post_property', 'estatein_save_property_meta' );

/* ------------------------------------------------------------------
   META BOXES: TESTIMONIAL
   ------------------------------------------------------------------ */
function estatein_add_testimonial_meta_boxes() {
    add_meta_box(
        'testimonial_details',
        __( 'Testimonial Details', 'estatein' ),
        'estatein_testimonial_meta_callback',
        'testimonial', 'normal', 'high'
    );
}
add_action( 'add_meta_boxes', 'estatein_add_testimonial_meta_boxes' );

function estatein_testimonial_meta_callback( $post ) {
    wp_nonce_field( 'estatein_testi_nonce', 'estatein_testi_nonce_field' );

    $fields = array(
        '_testi_rating'  => array( 'label' => 'Rating (1–5)', 'type' => 'number' ),
        '_testi_role'    => array( 'label' => 'Role / Company', 'type' => 'text' ),
        '_testi_initials'=> array( 'label' => 'Avatar Initials (e.g. JD)', 'type' => 'text' ),
    );

    echo '<table class="form-table">';
    foreach ( $fields as $key => $field ) {
        $value = get_post_meta( $post->ID, $key, true );
        printf(
            '<tr><th><label for="%1$s">%2$s</label></th>
             <td><input type="%3$s" id="%1$s" name="%1$s" value="%4$s" class="regular-text"></td></tr>',
            esc_attr( $key ),
            esc_html( $field['label'] ),
            esc_attr( $field['type'] ),
            esc_attr( $value )
        );
    }
    echo '</table>';
}

function estatein_save_testimonial_meta( $post_id ) {
    if ( ! isset( $_POST['estatein_testi_nonce_field'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['estatein_testi_nonce_field'], 'estatein_testi_nonce' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    foreach ( array( '_testi_rating', '_testi_role', '_testi_initials' ) as $key ) {
        if ( isset( $_POST[ $key ] ) ) {
            update_post_meta( $post_id, $key, sanitize_text_field( $_POST[ $key ] ) );
        }
    }
}
add_action( 'save_post_testimonial', 'estatein_save_testimonial_meta' );

/* ------------------------------------------------------------------
   HELPER FUNCTIONS
   ------------------------------------------------------------------ */

/**
 * Get property meta helper.
 */
function estatein_get_property_meta( $post_id, $key, $fallback = '' ) {
    $value = get_post_meta( $post_id, $key, true );
    return $value ? esc_html( $value ) : $fallback;
}

/**
 * Render star rating HTML.
 */
function estatein_stars( $rating = 5 ) {
    $rating = intval( $rating );
    $rating = max( 1, min( 5, $rating ) );
    $html   = '<div class="testi-stars" aria-label="' . esc_attr( $rating ) . ' out of 5 stars">';
    for ( $i = 1; $i <= 5; $i++ ) {
        $html .= $i <= $rating ? '★' : '☆';
    }
    return $html . '</div>';
}

/**
 * Custom excerpt length.
 */
function estatein_excerpt_length( $length ) { return 20; }
add_filter( 'excerpt_length', 'estatein_excerpt_length' );

function estatein_excerpt_more( $more ) { return '&hellip;'; }
add_filter( 'excerpt_more', 'estatein_excerpt_more' );

/* ------------------------------------------------------------------
   AJAX: NEWSLETTER SUBSCRIBE (basic)
   ------------------------------------------------------------------ */
function estatein_newsletter_subscribe() {
    check_ajax_referer( 'estatein_nonce', 'nonce' );

    $email = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';

    if ( ! is_email( $email ) ) {
        wp_send_json_error( array( 'message' => __( 'Please enter a valid email address.', 'estatein' ) ) );
    }

    // Save to option (simple approach — swap for Mailchimp/etc. API as needed)
    $subscribers = get_option( 'estatein_subscribers', array() );
    if ( ! in_array( $email, $subscribers, true ) ) {
        $subscribers[] = $email;
        update_option( 'estatein_subscribers', $subscribers );
    }

    wp_send_json_success( array( 'message' => __( 'Thank you for subscribing!', 'estatein' ) ) );
}
add_action( 'wp_ajax_estatein_newsletter',        'estatein_newsletter_subscribe' );
add_action( 'wp_ajax_nopriv_estatein_newsletter', 'estatein_newsletter_subscribe' );

/* ------------------------------------------------------------------
   CUSTOMIZER OPTIONS
   ------------------------------------------------------------------ */
function estatein_customizer( $wp_customize ) {
    // Section
    $wp_customize->add_section( 'estatein_options', array(
        'title'    => __( 'Estatein Theme Options', 'estatein' ),
        'priority' => 30,
    ) );

    // Hero Heading
    $wp_customize->add_setting( 'estatein_hero_heading', array(
        'default'           => 'Discover Your Dream Property with Estatein',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'estatein_hero_heading', array(
        'label'   => __( 'Hero Heading', 'estatein' ),
        'section' => 'estatein_options',
        'type'    => 'text',
    ) );

    // Hero Sub
    $wp_customize->add_setting( 'estatein_hero_sub', array(
        'default'           => 'Welcome to Estatein, where your dream property awaits in every corner of our beautiful world. Explore our curated selection of properties, each offering a unique story, exceptional features, and get ready to experience a world of possibilities.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'estatein_hero_sub', array(
        'label'   => __( 'Hero Subheading', 'estatein' ),
        'section' => 'estatein_options',
        'type'    => 'textarea',
    ) );

    // Phone
    $wp_customize->add_setting( 'estatein_phone', array(
        'default'           => '+1 (555) 000-0000',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'estatein_phone', array(
        'label'   => __( 'Phone Number', 'estatein' ),
        'section' => 'estatein_options',
        'type'    => 'text',
    ) );

    // Email
    $wp_customize->add_setting( 'estatein_email', array(
        'default'           => 'info@estatein.com',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'estatein_email', array(
        'label'   => __( 'Email Address', 'estatein' ),
        'section' => 'estatein_options',
        'type'    => 'email',
    ) );
}
add_action( 'customize_register', 'estatein_customizer' );

/* ------------------------------------------------------------------
   FLUSH REWRITE RULES ON ACTIVATION
   ------------------------------------------------------------------ */
function estatein_activation() {
    estatein_register_property_cpt();
    estatein_register_property_taxonomy();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'estatein_activation' );
