<?php get_header(); ?>

<!-- ═══════════════════════════════════════════════════════════
     HERO
     ═══════════════════════════════════════════════════════════ -->
<section id="hero" aria-label="Hero">
  <div class="container">
    <div class="hero-inner">

      <!-- Left copy -->
      <div class="hero-copy">
        <div class="hero-tag">
          <span class="hero-tag-dot"></span>
          <?= esc_html( estatein_get('hero_tag', 'No. 1 Real Estate Platform') ) ?>
        </div>

        <h1 class="hero-title">
          Discover Your Dream<br>
          Property with <em>Estatein</em>
        </h1>

        <p class="hero-desc">
          <?= esc_html( estatein_get('hero_desc', 'From cozy starter homes to luxurious estates, Estatein makes finding your perfect property effortless.') ) ?>
        </p>

        <div class="hero-cta">
          <a href="<?= home_url('/about-us') ?>" class="btn btn-outline">
            <?= esc_html( estatein_get('hero_cta_1', 'Learn More') ) ?>
          </a>
          <a href="<?= home_url('/properties') ?>" class="btn btn-primary">
            <?= esc_html( estatein_get('hero_cta_2', 'Browse Properties') ) ?>
            <?= estatein_icon('arrow-right') ?>
          </a>
        </div>

        <!-- Search bar -->
        <div class="hero-search" role="search">
          <div class="hero-search-field">
            <label for="search-location">Location</label>
            <input id="search-location" type="text" placeholder="Search by City or ZIP">
          </div>
          <div class="hero-search-divider"></div>
          <div class="hero-search-field">
            <label for="search-type">Property Type</label>
            <select id="search-type">
              <option value="">All Types</option>
              <option value="house">House</option>
              <option value="apartment">Apartment</option>
              <option value="villa">Villa</option>
              <option value="commercial">Commercial</option>
            </select>
          </div>
          <div class="hero-search-divider"></div>
          <div class="hero-search-field">
            <label for="search-price">Price Range</label>
            <select id="search-price">
              <option value="">Any Price</option>
              <option value="0-250000">Under $250K</option>
              <option value="250000-500000">$250K – $500K</option>
              <option value="500000-1000000">$500K – $1M</option>
              <option value="1000000+">$1M+</option>
            </select>
          </div>
          <a href="<?= home_url('/properties') ?>" class="btn btn-primary" id="hero-search-btn">
            Search <?= estatein_icon('arrow-right') ?>
          </a>
        </div>

      </div><!-- .hero-copy -->

      <!-- Right visual -->
      <div class="hero-visual" aria-hidden="true">
        <div class="hero-img-wrap">
          <?php
          $hero_img = get_theme_mod('hero_image', '');
          if ( $hero_img ) :
            echo '<img src="' . esc_url($hero_img) . '" alt="Featured property" loading="eager">';
          else :
          ?>
          <!-- Placeholder gradient block if no image set -->
          <div style="width:100%;height:100%;background:linear-gradient(135deg,#1e1e1e 0%,#262626 50%,#1a1a1a 100%);display:flex;align-items:center;justify-content:center;font-size:80px;">🏡</div>
          <?php endif; ?>
        </div>

        <!-- Floating stat card -->
        <div class="hero-float-card">
          <div class="hero-float-icon">🏆</div>
          <div>
            <div class="hero-float-num">Award Winner</div>
            <div class="hero-float-sub">Best Real Estate Agency 2024</div>
          </div>
        </div>
      </div><!-- .hero-visual -->

    </div><!-- .hero-inner -->

    <!-- Stats Bar -->
    <div class="hero-stats">
      <div class="hero-stat">
        <div class="hero-stat-num"><?= esc_html( estatein_get('hero_stat_1_num', '200+') ) ?></div>
        <div class="hero-stat-label"><?= esc_html( estatein_get('hero_stat_1_label', 'Happy Customers') ) ?></div>
      </div>
      <div class="hero-stat">
        <div class="hero-stat-num"><?= esc_html( estatein_get('hero_stat_2_num', '10K+') ) ?></div>
        <div class="hero-stat-label"><?= esc_html( estatein_get('hero_stat_2_label', 'Properties For Clients') ) ?></div>
      </div>
      <div class="hero-stat">
        <div class="hero-stat-num"><?= esc_html( estatein_get('hero_stat_3_num', '16+') ) ?></div>
        <div class="hero-stat-label"><?= esc_html( estatein_get('hero_stat_3_label', 'Years of Experience') ) ?></div>
      </div>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     FEATURED PROPERTIES
     ═══════════════════════════════════════════════════════════ -->
<section id="featured-properties" class="section" aria-label="Featured Properties">
  <div class="container">

    <div class="section-top">
      <div>
        <div class="section-label"><span>Properties</span></div>
        <h2 class="section-heading">Discover a World of Possibilities</h2>
        <p class="section-sub">Our portfolio of properties is as diverse as your dreams. Explore the following categories to find the perfect property type for you.</p>
      </div>
      <a href="<?= home_url('/properties') ?>" class="btn btn-outline">
        View All Properties <?= estatein_icon('arrow-right') ?>
      </a>
    </div>

    <div class="properties-grid">
      <?php
      $props = new WP_Query([
        'post_type'      => 'property',
        'posts_per_page' => 6,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'meta_query'     => [
          [ 'key' => '_property_featured', 'value' => '1', 'compare' => '=' ]
        ],
      ]);

      // Fallback if no featured — just show latest
      if ( ! $props->have_posts() ) {
        $props = new WP_Query([ 'post_type' => 'property', 'posts_per_page' => 6 ]);
      }

      if ( $props->have_posts() ) :
        while ( $props->have_posts() ) : $props->the_post();
          $status   = estatein_property_meta('status') ?: 'For Sale';
          $price    = estatein_property_price();
          $beds     = estatein_property_meta('beds');
          $baths    = estatein_property_meta('baths');
          $area     = estatein_property_meta('area');
          $location = estatein_property_meta('location');
          $badge_class = strtolower( str_replace(' ', '-', $status) );
      ?>
      <article class="property-card">
        <div class="property-img">
          <?php if ( has_post_thumbnail() ) : the_post_thumbnail('large'); else: ?>
            <div style="width:100%;height:100%;background:linear-gradient(135deg,#262626,#1e1e1e);display:flex;align-items:center;justify-content:center;font-size:64px;">🏠</div>
          <?php endif; ?>
          <span class="property-badge <?= esc_attr($badge_class) ?>"><?= esc_html($status) ?></span>
        </div>
        <div class="property-body">
          <h3 class="property-name"><?php the_title(); ?></h3>
          <?php if ($location) : ?>
          <div class="property-location">
            <?= estatein_icon('location') ?>
            <?= esc_html($location) ?>
          </div>
          <?php endif; ?>
          <div class="property-features">
            <?php if ($beds)  : ?><div class="property-feat"><strong><?= esc_html($beds) ?></strong><?= estatein_icon('bed') ?> Beds</div><?php endif; ?>
            <?php if ($baths) : ?><div class="property-feat"><strong><?= esc_html($baths) ?></strong><?= estatein_icon('bath') ?> Baths</div><?php endif; ?>
            <?php if ($area)  : ?><div class="property-feat"><strong><?= esc_html($area) ?> m²</strong><?= estatein_icon('area') ?> Area</div><?php endif; ?>
          </div>
          <div class="property-footer">
            <div class="property-price">
              <?= esc_html($price) ?>
              <?php if ($status === 'For Rent') : ?><small>/month</small><?php endif; ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="btn btn-outline" style="padding:10px 20px;font-size:14px;">
              View Details <?= estatein_icon('arrow-right') ?>
            </a>
          </div>
        </div>
      </article>
      <?php
        endwhile; wp_reset_postdata();
      else :
        // Placeholder cards when no properties exist yet
        $placeholders = [
          [ 'name'=>'Seaside Serenity Villa', 'location'=>'Malibu, CA', 'price'=>'$550,000', 'beds'=>4, 'baths'=>3, 'area'=>250, 'status'=>'For Sale', 'emoji'=>'🏖️' ],
          [ 'name'=>'Metropolitan Haven', 'location'=>'Manhattan, NY', 'price'=>'$1,200,000', 'beds'=>3, 'baths'=>2, 'area'=>180, 'status'=>'For Sale', 'emoji'=>'🏙️' ],
          [ 'name'=>'Rustic Retreat Lodge', 'location'=>'Aspen, CO', 'price'=>'$4,200/mo', 'beds'=>5, 'baths'=>4, 'area'=>320, 'status'=>'For Rent', 'emoji'=>'🏔️' ],
        ];
        foreach ( $placeholders as $p ) :
      ?>
      <article class="property-card">
        <div class="property-img">
          <div style="width:100%;height:100%;background:linear-gradient(135deg,#262626,#1e1e1e);display:flex;align-items:center;justify-content:center;font-size:64px;"><?= $p['emoji'] ?></div>
          <span class="property-badge <?= strtolower(str_replace(' ','-',$p['status'])) ?>"><?= $p['status'] ?></span>
        </div>
        <div class="property-body">
          <h3 class="property-name"><?= $p['name'] ?></h3>
          <div class="property-location"><?= estatein_icon('location') ?> <?= $p['location'] ?></div>
          <div class="property-features">
            <div class="property-feat"><strong><?= $p['beds'] ?></strong>Beds</div>
            <div class="property-feat"><strong><?= $p['baths'] ?></strong>Baths</div>
            <div class="property-feat"><strong><?= $p['area'] ?> m²</strong>Area</div>
          </div>
          <div class="property-footer">
            <div class="property-price"><?= $p['price'] ?></div>
            <a href="<?= home_url('/properties') ?>" class="btn btn-outline" style="padding:10px 20px;font-size:14px;">View Details <?= estatein_icon('arrow-right') ?></a>
          </div>
        </div>
      </article>
      <?php endforeach; endif; ?>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     WHY CHOOSE US / FEATURES
     ═══════════════════════════════════════════════════════════ -->
<section id="features" class="section" aria-label="Why Choose Us">
  <div class="container">

    <div style="text-align:center;max-width:640px;margin:0 auto 48px;">
      <div class="section-label" style="justify-content:center;"><span>Our Value</span></div>
      <h2 class="section-heading">Our Commitment to Your Real Estate Success</h2>
      <p class="section-sub" style="margin:0 auto;">We combine technology with local expertise to deliver results that exceed expectations.</p>
    </div>

    <div class="features-grid">
      <?php
      $features = [
        [ 'icon'=>'🏆', 'title'=>'Valuation Mastery',       'desc'=>'Our experts provide precise property valuations using cutting-edge market analysis to ensure you get the best deal.' ],
        [ 'icon'=>'📣', 'title'=>'Strategic Marketing',      'desc'=>'We create targeted campaigns that reach qualified buyers, using the latest digital platforms and traditional channels.' ],
        [ 'icon'=>'🤝', 'title'=>'Negotiation Wizardry',     'desc'=>'Our skilled negotiators work tirelessly to secure the most favorable terms, protecting your interests at every step.' ],
        [ 'icon'=>'✅', 'title'=>'Closing Success',          'desc'=>'We guide you seamlessly through every closing step — ensuring a smooth and stress-free transaction every time.' ],
        [ 'icon'=>'🏠', 'title'=>'Property Management',      'desc'=>'From tenant screening to maintenance oversight, we handle every aspect of managing your investment properties.' ],
        [ 'icon'=>'💡', 'title'=>'Investment Insights',      'desc'=>'Leverage our deep market intelligence to identify high-yield opportunities and build a profitable real estate portfolio.' ],
      ];
      foreach ( $features as $f ) :
      ?>
      <div class="feature-card">
        <div class="feature-icon"><?= $f['icon'] ?></div>
        <h3 class="feature-title"><?= esc_html($f['title']) ?></h3>
        <p class="feature-desc"><?= esc_html($f['desc']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     STATS COUNTER
     ═══════════════════════════════════════════════════════════ -->
<section id="stats" aria-label="Statistics">
  <div class="container">
    <div class="stats-grid">
      <div class="stat-item">
        <div class="stat-num" data-target="200">0<span>+</span></div>
        <div class="stat-label">Happy Customers</div>
      </div>
      <div class="stat-item">
        <div class="stat-num" data-target="10">0<span>K+</span></div>
        <div class="stat-label">Properties For Clients</div>
      </div>
      <div class="stat-item">
        <div class="stat-num" data-target="16">0<span>+</span></div>
        <div class="stat-label">Years of Experience</div>
      </div>
      <div class="stat-item">
        <div class="stat-num" data-target="98">0<span>%</span></div>
        <div class="stat-label">Client Satisfaction Rate</div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     TESTIMONIALS
     ═══════════════════════════════════════════════════════════ -->
<section id="testimonials" class="section" aria-label="Testimonials">
  <div class="container">

    <div class="section-top">
      <div>
        <div class="section-label"><span>Testimonials</span></div>
        <h2 class="section-heading">What Our Clients Say</h2>
        <p class="section-sub">Real stories from real clients who found their perfect property with Estatein.</p>
      </div>
      <a href="<?= home_url('/testimonials') ?>" class="btn btn-outline">
        View All Reviews <?= estatein_icon('arrow-right') ?>
      </a>
    </div>

    <div class="testimonials-grid">
      <?php
      $testimonials = [
        [ 'text'=>"Estatein's expertise and support made finding our dream home effortless. The team was professional, responsive, and truly understood what we were looking for.", 'name'=>'Wade Warren',    'role'=>'Home Buyer',       'stars'=>5, 'emoji'=>'👨' ],
        [ 'text'=>"I couldn't be happier with the service from Estatein. They handled everything seamlessly and got us an amazing deal on our commercial property.", 'name'=>'Esther Howard',   'role'=>'Business Owner',   'stars'=>5, 'emoji'=>'👩' ],
        [ 'text'=>"The team's negotiation skills saved us thousands. Their market knowledge is unmatched — they found us the perfect investment property.", 'name'=>'Cameron Williamson', 'role'=>'Property Investor', 'stars'=>5, 'emoji'=>'🧑' ],
      ];
      foreach ( $testimonials as $t ) :
      ?>
      <div class="testimonial-card">
        <div class="stars">
          <?php for ($i=0; $i<$t['stars']; $i++) echo '<span>★</span>'; ?>
        </div>
        <p class="testimonial-text">"<?= esc_html($t['text']) ?>"</p>
        <div class="testimonial-author">
          <div class="author-avatar">
            <div style="width:100%;height:100%;display:grid;place-items:center;font-size:24px;background:var(--bg-card-2);"><?= $t['emoji'] ?></div>
          </div>
          <div>
            <div class="author-name"><?= esc_html($t['name']) ?></div>
            <div class="author-role"><?= esc_html($t['role']) ?></div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     TEAM
     ═══════════════════════════════════════════════════════════ -->
<section id="team" class="section" aria-label="Our Team">
  <div class="container">

    <div class="section-top">
      <div>
        <div class="section-label"><span>Our Team</span></div>
        <h2 class="section-heading">Meet the Estatein Team</h2>
        <p class="section-sub">At Estatein, our success is driven by a dedicated team of real estate professionals.</p>
      </div>
      <a href="<?= home_url('/about-us') ?>" class="btn btn-outline">
        View All Team <?= estatein_icon('arrow-right') ?>
      </a>
    </div>

    <div class="team-grid">
      <?php
      $team = [
        [ 'name'=>'Max Mitchell',     'role'=>'Founder & CEO',         'emoji'=>'👨‍💼' ],
        [ 'name'=>'Sarah Johnson',    'role'=>'Chief Real Estate Officer','emoji'=>'👩‍💼' ],
        [ 'name'=>'David Parker',     'role'=>'Lead Agent',             'emoji'=>'🧑‍💼' ],
        [ 'name'=>'Emily Rodriguez',  'role'=>'Marketing Director',     'emoji'=>'👩‍🎨' ],
      ];
      foreach ( $team as $m ) :
      ?>
      <div class="team-card">
        <div class="team-img">
          <div style="width:100%;height:100%;display:grid;place-items:center;font-size:72px;background:var(--bg-card-2);"><?= $m['emoji'] ?></div>
        </div>
        <div class="team-body">
          <div class="team-name"><?= esc_html($m['name']) ?></div>
          <div class="team-role"><?= esc_html($m['role']) ?></div>
          <div class="team-socials">
            <a href="#" class="team-social" aria-label="Twitter">𝕏</a>
            <a href="#" class="team-social" aria-label="LinkedIn">in</a>
            <a href="#" class="team-social" aria-label="Instagram">IG</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     CTA / NEWSLETTER
     ═══════════════════════════════════════════════════════════ -->
<section id="cta-section" aria-label="Call to Action">
  <div class="container">
    <div class="cta-box">
      <div class="cta-text">
        <h2 class="cta-title"><?= esc_html( estatein_get('cta_title', 'Start Your Real Estate Journey Today') ) ?></h2>
        <p class="cta-desc"><?= esc_html( estatein_get('cta_desc', 'Your dream property is just a step away. Let Estatein guide you to your perfect home, investment, or commercial space.') ) ?></p>
      </div>
      <div class="cta-form" id="cta-form">
        <input
          type="email"
          class="cta-input"
          id="cta-email"
          placeholder="Enter your email address"
          required
          aria-label="Email address"
        >
        <button type="button" class="btn btn-primary" id="cta-submit">
          <?= esc_html( estatein_get('cta_btn', 'Learn More') ) ?>
          <?= estatein_icon('arrow-right') ?>
        </button>
      </div>
      <div id="cta-msg" style="display:none;font-size:14px;color:#4ade80;margin-top:8px;"></div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
