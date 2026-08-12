<?php
/**
 * Template part: single testimonial card.
 * @package Estatein
 */

$rating   = get_post_meta( get_the_ID(), '_testi_rating', true )   ?: 5;
$role     = get_post_meta( get_the_ID(), '_testi_role', true )      ?: __( 'Client', 'estatein' );
$initials = get_post_meta( get_the_ID(), '_testi_initials', true )  ?: strtoupper( substr( get_the_title(), 0, 2 ) );
?>

<div class="testimonial-card reveal">
    <?php echo estatein_stars( $rating ); ?>

    <blockquote>
        <p class="testi-text"><?php echo esc_html( get_the_excerpt() ?: get_the_content() ); ?></p>
    </blockquote>

    <div class="testi-author">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="testi-avatar" style="padding:0;overflow:hidden;">
                <?php the_post_thumbnail( 'thumbnail', array( 'style' => 'width:44px;height:44px;object-fit:cover;border-radius:50%;', 'alt' => get_the_title() ) ); ?>
            </div>
        <?php else : ?>
            <div class="testi-avatar" aria-hidden="true"><?php echo esc_html( $initials ); ?></div>
        <?php endif; ?>
        <div>
            <div class="testi-name"><?php the_title(); ?></div>
            <div class="testi-role"><?php echo esc_html( $role ); ?></div>
        </div>
    </div>
</div>
