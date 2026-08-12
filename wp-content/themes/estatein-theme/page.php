<?php get_header(); ?>

<main id="primary" style="padding-top:80px;">
  <div class="container section">
    <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 class="section-heading"><?php the_title(); ?></h1>
        <div class="entry-content" style="color:var(--text-light);line-height:1.8;max-width:760px;">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>
