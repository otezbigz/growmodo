<?php get_header(); ?>

<main id="primary" style="padding-top:80px;">
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="container" style="padding-block:80px;">

    <div style="display:grid;grid-template-columns:1.4fr 1fr;gap:48px;align-items:start;">

      <!-- Images -->
      <div>
        <div style="border-radius:var(--radius-xl);overflow:hidden;aspect-ratio:4/3;background:var(--bg-card-2);">
          <?php if ( has_post_thumbnail() ) : the_post_thumbnail('full', ['style'=>'width:100%;height:100%;object-fit:cover;']); else: ?>
            <div style="width:100%;height:100%;display:grid;place-items:center;font-size:80px;">🏠</div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Details -->
      <div style="position:sticky;top:100px;">
        <?php
        $status   = estatein_property_meta('status') ?: 'For Sale';
        $price    = estatein_property_price();
        $beds     = estatein_property_meta('beds');
        $baths    = estatein_property_meta('baths');
        $area     = estatein_property_meta('area');
        $location = estatein_property_meta('location');
        $desc     = estatein_property_meta('description') ?: get_the_excerpt();
        ?>
        <div style="margin-bottom:16px;">
          <span class="property-badge <?= esc_attr(strtolower(str_replace(' ','-',$status))) ?>" style="position:static;display:inline-block;"><?= esc_html($status) ?></span>
        </div>
        <h1 class="section-heading" style="font-size:clamp(24px,2.5vw,36px);"><?php the_title(); ?></h1>
        <?php if ($location) : ?>
        <div class="property-location" style="margin:12px 0 24px;"><?= estatein_icon('location') ?> <?= esc_html($location) ?></div>
        <?php endif; ?>

        <div class="property-features" style="margin-bottom:24px;">
          <?php if ($beds)  : ?><div class="property-feat"><strong><?= esc_html($beds) ?></strong>Beds</div><?php endif; ?>
          <?php if ($baths) : ?><div class="property-feat"><strong><?= esc_html($baths) ?></strong>Baths</div><?php endif; ?>
          <?php if ($area)  : ?><div class="property-feat"><strong><?= esc_html($area) ?> m²</strong>Area</div><?php endif; ?>
        </div>

        <div style="font-size:14px;color:var(--text-light);line-height:1.8;margin-bottom:28px;"><?= esc_html($desc) ?></div>

        <div style="font-size:32px;font-weight:800;margin-bottom:24px;"><?= esc_html($price) ?></div>

        <div style="display:flex;gap:12px;flex-wrap:wrap;">
          <a href="<?= home_url('/contact-us?property='.get_the_ID()) ?>" class="btn btn-primary">Schedule Viewing <?= estatein_icon('arrow-right') ?></a>
          <a href="<?= home_url('/properties') ?>" class="btn btn-outline">← Back to Properties</a>
        </div>

        <!-- Entry content -->
        <?php if ( get_the_content() ) : ?>
        <div class="entry-content" style="margin-top:32px;padding-top:32px;border-top:1px solid var(--border);color:var(--text-light);line-height:1.8;font-size:14px;">
          <?php the_content(); ?>
        </div>
        <?php endif; ?>
      </div>

    </div>

  </div>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
