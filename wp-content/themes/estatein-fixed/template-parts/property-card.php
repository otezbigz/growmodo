<?php
/**
 * Template part: single property card (for use in loops).
 * @package Estatein
 */

$price    = estatein_get_property_meta( get_the_ID(), '_property_price', __( 'Price on request', 'estatein' ) );
$beds     = estatein_get_property_meta( get_the_ID(), '_property_beds', '—' );
$baths    = estatein_get_property_meta( get_the_ID(), '_property_baths', '—' );
$sqft     = estatein_get_property_meta( get_the_ID(), '_property_sqft', '—' );
$location = estatein_get_property_meta( get_the_ID(), '_property_location', __( 'Location TBC', 'estatein' ) );
$badge    = estatein_get_property_meta( get_the_ID(), '_property_badge', '' );
?>

<article class="property-card reveal" id="property-<?php the_ID(); ?>" aria-label="<?php the_title_attribute(); ?>">

    <div class="property-img">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'estatein-property', array( 'alt' => get_the_title() ) ); ?>
        <?php else : ?>
            <span aria-hidden="true">🏡</span>
        <?php endif; ?>

        <?php if ( $badge ) : ?>
        <span class="property-badge"><?php echo esc_html( $badge ); ?></span>
        <?php endif; ?>
    </div>

    <div class="property-body">
        <h3 class="property-name">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <p class="property-location">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                <circle cx="12" cy="10" r="3"/>
            </svg>
            <?php echo esc_html( $location ); ?>
        </p>

        <div class="property-features" role="list">
            <div class="prop-feat" role="listitem">
                <span class="prop-feat-icon" aria-hidden="true">🛏</span>
                <span><?php echo esc_html( $beds ); ?> <?php esc_html_e( 'Bedrooms', 'estatein' ); ?></span>
            </div>
            <div class="prop-feat" role="listitem">
                <span class="prop-feat-icon" aria-hidden="true">🚿</span>
                <span><?php echo esc_html( $baths ); ?> <?php esc_html_e( 'Bathrooms', 'estatein' ); ?></span>
            </div>
            <div class="prop-feat" role="listitem">
                <span class="prop-feat-icon" aria-hidden="true">📐</span>
                <span>
                    <?php echo $sqft !== '—' ? esc_html( number_format( (int) $sqft ) ) : '—'; ?>
                    <?php if ( $sqft !== '—' ) esc_html_e( 'sq ft', 'estatein' ); ?>
                </span>
            </div>
        </div>

        <div class="property-footer">
            <div class="property-price">
                <?php echo esc_html( $price ); ?>
                <span><?php esc_html_e( '/ property', 'estatein' ); ?></span>
            </div>
            <a href="<?php the_permalink(); ?>" class="btn btn-ghost" style="padding:10px 18px;font-size:13px;">
                <?php esc_html_e( 'View Details', 'estatein' ); ?>
            </a>
        </div>
    </div>

</article>
