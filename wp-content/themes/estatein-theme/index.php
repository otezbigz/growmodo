<?php get_header(); ?>

<main id="primary" style="padding-top:80px;">
  <div class="container section">
    <?php if ( have_posts() ) : ?>
      <div class="section-top">
        <div>
          <h1 class="section-heading"><?php wp_title(''); ?></h1>
        </div>
      </div>
      <div class="properties-grid">
        <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class('property-card'); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
            <div class="property-img"><?php the_post_thumbnail('large'); ?></div>
            <?php endif; ?>
            <div class="property-body">
              <h2 class="property-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <div class="section-sub" style="margin-top:12px;"><?php the_excerpt(); ?></div>
              <div style="margin-top:16px;">
                <a href="<?php the_permalink(); ?>" class="btn btn-outline" style="font-size:14px;padding:10px 18px;">Read More</a>
              </div>
            </div>
          </article>
        <?php endwhile; ?>
      </div>
      <div style="margin-top:48px;">
        <?php the_posts_navigation(); ?>
      </div>
    <?php else : ?>
      <p style="color:var(--text-light);">No content found.</p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
