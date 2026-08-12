<?php
/**
 * Homepage template — Figma-accurate v2.
 * @package Estatein
 */
get_header(); ?>

<main id="main-content" role="main">

<!-- ============================================================
     HERO
     ============================================================ -->
<section id="hero" aria-label="<?php esc_attr_e( 'Hero', 'estatein' ); ?>">
  <div class="container">
    <div class="hero-inner">

      <!-- Left -->
      <div class="hero-content">

        <div class="hero-badge">
          <span class="dot" aria-hidden="true"></span>
          <?php esc_html_e( 'No. 1 Real Estate Agency', 'estatein' ); ?>
        </div>

        <h1 class="hero-title">
          <?php
          $heading = get_theme_mod( 'estatein_hero_heading', 'Discover Your Dream Property with Estatein' );
          $words   = explode( ' ', $heading );
          $last    = array_pop( $words );
          echo esc_html( implode( ' ', $words ) ) . ' <span class="highlight">' . esc_html( $last ) . '</span>';
          ?>
        </h1>

        <p class="hero-desc">
          <?php echo esc_html( get_theme_mod( 'estatein_hero_sub', 'Welcome to Estatein, where your dream property awaits in every corner of our beautiful world. Explore our curated selection of properties, each offering a unique story, exceptional features, and get ready to experience a world of possibilities.' ) ); ?>
        </p>

        <div class="hero-actions">
          <a href="<?php echo esc_url( home_url( '/properties' ) ); ?>" class="btn btn-primary">
            <?php esc_html_e( 'Explore Properties', 'estatein' ); ?>
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-outline">
            <?php esc_html_e( 'Book a Consultation', 'estatein' ); ?>
          </a>
        </div>

        <div class="hero-stats" role="list" aria-label="<?php esc_attr_e( 'Key Statistics', 'estatein' ); ?>">
          <div class="stat-item" role="listitem">
            <div class="stat-number">200+</div>
            <div class="stat-label"><?php esc_html_e( 'Happy Customers', 'estatein' ); ?></div>
          </div>
          <div class="stat-item" role="listitem">
            <div class="stat-number">10K+</div>
            <div class="stat-label"><?php esc_html_e( 'Properties For Clients', 'estatein' ); ?></div>
          </div>
          <div class="stat-item" role="listitem">
            <div class="stat-number">16+</div>
            <div class="stat-label"><?php esc_html_e( 'Years of Experience', 'estatein' ); ?></div>
          </div>
        </div>

      </div><!-- .hero-content -->

      <!-- Right Visual -->
      <div class="hero-visual" aria-hidden="true">
        <div class="hero-img-main">
          <img
            src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=700&q=80&auto=format&fit=crop"
            alt="Modern city building"
            loading="eager"
          />
          <!-- Floating cards -->
          <div class="hero-float-card card-tl">
            <div class="float-icon purple">🏆</div>
            <div>
              <div class="float-label"><?php esc_html_e( 'Award', 'estatein' ); ?></div>
              <div class="float-value"><?php esc_html_e( 'Best Agency', 'estatein' ); ?></div>
            </div>
          </div>
          <div class="hero-float-card card-br">
            <div class="float-icon gold">📈</div>
            <div>
              <div class="float-label"><?php esc_html_e( 'Property Value', 'estatein' ); ?></div>
              <div class="float-value">+15% <?php esc_html_e( 'this year', 'estatein' ); ?></div>
            </div>
          </div>
        </div>

        <!-- Mini cards -->
        <div class="hero-mini-cards">
          <div class="mini-card">
            <div class="mini-card-thumb">
              <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=120&q=70&auto=format&fit=crop" alt="Villa" />
            </div>
            <div>
              <div class="mini-card-title"><?php esc_html_e( 'Luxury Villa', 'estatein' ); ?></div>
              <div class="mini-card-price">$2.5M</div>
            </div>
          </div>
          <div class="mini-card">
            <div class="mini-card-thumb">
              <img src="https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?w=120&q=70&auto=format&fit=crop" alt="City" />
            </div>
            <div>
              <div class="mini-card-title"><?php esc_html_e( 'City Penthouse', 'estatein' ); ?></div>
              <div class="mini-card-price">$1.8M</div>
            </div>
          </div>
        </div>
      </div><!-- .hero-visual -->

    </div><!-- .hero-inner -->
  </div><!-- .container -->
</section><!-- #hero -->


<!-- ============================================================
     PARTNERS / MARQUEE
     ============================================================ -->
<section id="partners" aria-label="<?php esc_attr_e( 'Partners', 'estatein' ); ?>">
  <div class="container">
    <p class="partners-label"><?php esc_html_e( 'Trusted by industry leaders worldwide', 'estatein' ); ?></p>
  </div>
  <div class="marquee-wrapper">
    <div class="marquee-track" aria-hidden="true">
      <?php
      $partners = array(
        array( 'icon' => '🏦', 'name' => 'Goldman Estate' ),
        array( 'icon' => '🏗️', 'name' => 'BuildCorp' ),
        array( 'icon' => '🌆', 'name' => 'UrbanKey Realty' ),
        array( 'icon' => '🏛️', 'name' => 'Apex Properties' ),
        array( 'icon' => '🔑', 'name' => 'KeyStone Group' ),
        array( 'icon' => '🌍', 'name' => 'Global Homes' ),
        array( 'icon' => '💼', 'name' => 'Premier Invest' ),
        array( 'icon' => '🏠', 'name' => 'HomeBase Co.' ),
      );
      $all = array_merge( $partners, $partners );
      foreach ( $all as $p ) : ?>
      <div class="partner-logo">
        <div class="partner-logo-icon"><?php echo esc_html( $p['icon'] ); ?></div>
        <span><?php echo esc_html( $p['name'] ); ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ============================================================
     FEATURED PROPERTIES
     ============================================================ -->
<section id="featured-properties" aria-label="<?php esc_attr_e( 'Featured Properties', 'estatein' ); ?>">
  <div class="container">

    <div class="section-header">
      <div class="section-header-left">
        <div class="section-eyebrow">
          <span>✦</span> <?php esc_html_e( 'Featured Properties', 'estatein' ); ?>
        </div>
        <h2 class="section-title">
          <?php esc_html_e( 'Discover a World of ', 'estatein' ); ?>
          <span class="highlight"><?php esc_html_e( 'Possibilities', 'estatein' ); ?></span>
        </h2>
      </div>
      <a href="<?php echo esc_url( home_url( '/properties' ) ); ?>" class="btn btn-outline">
        <?php esc_html_e( 'View All Properties', 'estatein' ); ?>
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>

    <div class="properties-grid">
      <?php
      $props_query = new WP_Query( array(
        'post_type'      => 'property',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC',
      ) );

      if ( $props_query->have_posts() ) :
        while ( $props_query->have_posts() ) : $props_query->the_post();
          get_template_part( 'template-parts/property', 'card' );
        endwhile;
        wp_reset_postdata();
      else :
        $fallback_props = array(
          array(
            'img'      => 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=600&q=80&auto=format&fit=crop',
            'badge'    => 'Featured',
            'name'     => 'Seaside Serenity Villa',
            'location' => 'Cape May, New Jersey',
            'beds' => 4, 'baths' => 3, 'sqft' => 2500,
            'price'    => '$1,250,000',
          ),
          array(
            'img'      => 'https://images.unsplash.com/photo-1486325212027-8081e485255e?w=600&q=80&auto=format&fit=crop',
            'badge'    => 'New Listing',
            'name'     => 'Metropolitan Haven',
            'location' => 'New York City, New York',
            'beds' => 2, 'baths' => 2, 'sqft' => 1200,
            'price'    => '$890,000',
          ),
          array(
            'img'      => 'https://images.unsplash.com/photo-1519501025264-65ba15a82390?w=600&q=80&auto=format&fit=crop',
            'badge'    => 'For Sale',
            'name'     => 'Rustic Retreat Cottage',
            'location' => 'Asheville, North Carolina',
            'beds' => 3, 'baths' => 2, 'sqft' => 1800,
            'price'    => '$550,000',
          ),
        );
        foreach ( $fallback_props as $prop ) : ?>
      <article class="property-card reveal" aria-label="<?php echo esc_attr( $prop['name'] ); ?>">
        <div class="property-img">
          <img src="<?php echo esc_url( $prop['img'] ); ?>" alt="<?php echo esc_attr( $prop['name'] ); ?>" loading="lazy" />
          <?php if ( $prop['badge'] ) : ?>
          <span class="property-badge"><?php echo esc_html( $prop['badge'] ); ?></span>
          <?php endif; ?>
        </div>
        <div class="property-body">
          <h3 class="property-name"><?php echo esc_html( $prop['name'] ); ?></h3>
          <p class="property-location">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            <?php echo esc_html( $prop['location'] ); ?>
          </p>
          <div class="property-features" role="list">
            <div class="prop-feat" role="listitem">
              <span class="prop-feat-icon">🛏</span>
              <span><?php echo esc_html( $prop['beds'] ); ?> <?php esc_html_e( 'Bedrooms', 'estatein' ); ?></span>
            </div>
            <div class="prop-feat" role="listitem">
              <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 12h16v4a6 6 0 0 1-12 0v-1H4z"/><path d="M4 12V6a2 2 0 0 1 2-2h1"/></svg>
              <span><?php echo esc_html( $prop['baths'] ); ?> <?php esc_html_e( 'Bathrooms', 'estatein' ); ?></span>
            </div>
            <div class="prop-feat" role="listitem">
              <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
              <span><?php echo esc_html( number_format( $prop['sqft'] ) ); ?> <?php esc_html_e( 'sq ft', 'estatein' ); ?></span>
            </div>
          </div>
          <div class="property-footer">
            <div class="property-price">
              <?php echo esc_html( $prop['price'] ); ?>
              <span><?php esc_html_e( '/ property', 'estatein' ); ?></span>
            </div>
            <a href="<?php echo esc_url( home_url( '/properties' ) ); ?>" class="btn btn-primary" style="padding:10px 20px;font-size:14px;">
              <?php esc_html_e( 'View Details', 'estatein' ); ?>
              <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
          </div>
        </div>
      </article>
      <?php endforeach; endif; ?>
    </div>

  </div>
</section>


<!-- ============================================================
     WHY CHOOSE US — "The Estatein Advantage"
     ============================================================ -->
<section id="why-us" aria-label="<?php esc_attr_e( 'Why Choose Us', 'estatein' ); ?>">
  <div class="container">
    <div class="why-inner">

      <!-- Left: Features list -->
      <div class="why-left">

        <!-- Figma pill badge with "+" prefix -->
        <div class="badge-pill">
          <span class="plus">+</span>
          <?php esc_html_e( 'Our Value', 'estatein' ); ?>
        </div>

        <h2 class="section-title" style="margin-bottom:16px;">
          <?php esc_html_e( 'The Estatein ', 'estatein' ); ?>
          <span class="highlight"><?php esc_html_e( 'Advantage', 'estatein' ); ?></span>
        </h2>
        <p class="section-desc" style="margin-bottom:40px;max-width:460px;">
          <?php esc_html_e( 'From our commitment to personalized service to our deep market expertise, Estatein sets the gold standard for real estate excellence.', 'estatein' ); ?>
        </p>

        <div class="why-features">
          <?php
          $features = array(
            array( 'icon' => '🔍', 'title' => 'Smart Property Matching',      'desc' => 'We use advanced algorithms and personal expertise to match you with properties that align perfectly with your lifestyle and budget.' ),
            array( 'icon' => '🤝', 'title' => 'Expert Negotiation',           'desc' => 'Our seasoned negotiators work tirelessly to secure the best possible terms, ensuring you get maximum value from every transaction.' ),
            array( 'icon' => '📊', 'title' => 'Transparent Market Insights',  'desc' => 'We provide clear, data-driven insights into current market trends so you can make confident, well-informed decisions.' ),
            array( 'icon' => '🛡️', 'title' => 'Secure Transactions',         'desc' => 'Every transaction is handled with the highest level of security and legal compliance, giving you complete peace of mind.' ),
          );
          foreach ( $features as $feat ) : ?>
          <div class="why-feature reveal">
            <div class="why-feature-icon" aria-hidden="true"><?php echo esc_html( $feat['icon'] ); ?></div>
            <div>
              <h3 class="why-feature-title"><?php echo esc_html( $feat['title'] ); ?></h3>
              <p class="why-feature-desc"><?php echo esc_html( $feat['desc'] ); ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

      </div><!-- .why-left -->

      <!-- Right: Visual card with stats overlay -->
      <div class="why-visual" aria-hidden="true">
        <div class="why-img-card">
          <img
            src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=600&q=80&auto=format&fit=crop"
            alt="City skyline"
            loading="lazy"
          />
          <!-- Stats bar overlaid at bottom of card -->
          <div class="why-stat-card">
            <div class="why-stat-row">
              <div class="why-stat-item">
                <div class="why-stat-num">500+</div>
                <div class="why-stat-label"><?php esc_html_e( 'Properties Sold', 'estatein' ); ?></div>
              </div>
              <div class="why-stat-item">
                <div class="why-stat-num">98%</div>
                <div class="why-stat-label"><?php esc_html_e( 'Client Satisfaction', 'estatein' ); ?></div>
              </div>
              <div class="why-stat-item">
                <div class="why-stat-num">$2B+</div>
                <div class="why-stat-label"><?php esc_html_e( 'Property Value', 'estatein' ); ?></div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- .why-visual -->

    </div><!-- .why-inner -->
  </div><!-- .container -->
</section><!-- #why-us -->


<!-- ============================================================
     TESTIMONIALS
     ============================================================ -->
<section id="testimonials" aria-label="<?php esc_attr_e( 'Testimonials', 'estatein' ); ?>">
  <div class="container">

    <div class="section-header">
      <div>
        <div class="section-eyebrow"><span>✦</span> <?php esc_html_e( 'Testimonials', 'estatein' ); ?></div>
        <h2 class="section-title">
          <?php esc_html_e( 'What Our Clients ', 'estatein' ); ?>
          <span class="highlight"><?php esc_html_e( 'Say', 'estatein' ); ?></span>
        </h2>
      </div>
      <a href="<?php echo esc_url( home_url( '/testimonials' ) ); ?>" class="btn btn-outline">
        <?php esc_html_e( 'View All Reviews', 'estatein' ); ?>
      </a>
    </div>

    <div class="testimonials-grid">
      <?php
      $testi_query = new WP_Query( array( 'post_type' => 'testimonial', 'posts_per_page' => 3 ) );
      if ( $testi_query->have_posts() ) :
        while ( $testi_query->have_posts() ) : $testi_query->the_post();
          get_template_part( 'template-parts/testimonial', 'card' );
        endwhile;
        wp_reset_postdata();
      else :
        $fallback_testis = array(
          array( 'name' => 'Wade Warren',         'role' => 'Home Buyer',        'initials' => 'WW', 'rating' => 5, 'text' => 'Estatein truly delivered on their promise of making my home search seamless. From the first consultation to closing day, every detail was handled with precision and care. I found my dream home in record time!' ),
          array( 'name' => 'Arlene McCoy',        'role' => 'Property Investor', 'initials' => 'AM', 'rating' => 5, 'text' => 'As a seasoned investor, I value data and transparency. Estatein provided both in abundance. Their market reports are incredibly detailed and their team actually listened to my investment criteria.' ),
          array( 'name' => 'Cameron Williamson',  'role' => 'First-Time Buyer',  'initials' => 'CW', 'rating' => 5, 'text' => 'Being a first-time buyer was daunting, but Estatein made it an absolute joy. They walked me through every step, answered every question patiently, and secured a price way below my budget.' ),
        );
        foreach ( $fallback_testis as $t ) : ?>
      <div class="testimonial-card reveal">
        <?php echo estatein_stars( $t['rating'] ); ?>
        <blockquote><p class="testi-text"><?php echo esc_html( $t['text'] ); ?></p></blockquote>
        <div class="testi-author">
          <div class="testi-avatar" aria-hidden="true"><?php echo esc_html( $t['initials'] ); ?></div>
          <div>
            <div class="testi-name"><?php echo esc_html( $t['name'] ); ?></div>
            <div class="testi-role"><?php echo esc_html( $t['role'] ); ?></div>
          </div>
        </div>
      </div>
      <?php endforeach; endif; ?>
    </div>

  </div>
</section>


<!-- ============================================================
     FAQ
     ============================================================ -->
<section id="faq" aria-label="<?php esc_attr_e( 'FAQ', 'estatein' ); ?>">
  <div class="container">
    <div class="faq-inner">

      <!-- Left -->
      <div>
        <div class="section-eyebrow"><span>✦</span> <?php esc_html_e( 'FAQ', 'estatein' ); ?></div>
        <h2 class="section-title">
          <?php esc_html_e( 'Frequently Asked ', 'estatein' ); ?>
          <span class="highlight"><?php esc_html_e( 'Questions', 'estatein' ); ?></span>
        </h2>
        <p class="section-desc" style="margin-top:16px;max-width:340px;">
          <?php esc_html_e( 'Find answers to common questions about our services, the buying/renting process, and how Estatein can help you find your perfect property.', 'estatein' ); ?>
        </p>
      </div>

      <!-- Right: Accordion -->
      <div class="faq-list" id="faq-accordion">
        <?php
        $faqs = array(
          array( 'q' => 'How do I find the right property for my needs?',                    'a' => 'Start by defining your priorities—budget, location, size, and must-have features. Our expert agents will then curate a personalised shortlist and guide you through every viewing, negotiating on your behalf to secure the best deal.' ),
          array( 'q' => 'What is the typical process for buying a property through Estatein?','a' => 'The process typically involves an initial consultation, property search, viewing appointments, offer submission, legal due diligence, mortgage finalisation, and closing. Our team supports you at every stage, usually taking 60–120 days from search to keys in hand.' ),
          array( 'q' => 'Are there any additional costs beyond the listed price?',            'a' => 'Yes—plan for closing costs (1–3% of purchase price), property taxes, homeowners insurance, and any HOA fees. For financed purchases, factor in mortgage origination fees. We provide a full cost breakdown during consultation.' ),
          array( 'q' => 'How long does it take to close on a property?',                     'a' => 'Cash purchases can close in as little as 7–14 days. Financed transactions typically take 30–60 days subject to lender timelines. Complex or international transactions may take longer. We keep you informed at every milestone.' ),
          array( 'q' => 'Can Estatein help with property management after purchase?',         'a' => 'Absolutely. Through our partner network we offer full-service property management including tenant sourcing, rent collection, maintenance coordination, and annual compliance reviews—ideal for investors and overseas owners alike.' ),
        );
        foreach ( $faqs as $i => $faq ) :
          $body_id = 'faq-body-' . $i;
        ?>
        <div class="faq-item">
          <button class="faq-question" aria-expanded="false" aria-controls="<?php echo esc_attr( $body_id ); ?>">
            <?php echo esc_html( $faq['q'] ); ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="<?php echo esc_attr( $body_id ); ?>" role="region">
            <div class="faq-answer-inner"><p><?php echo esc_html( $faq['a'] ); ?></p></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>


<!-- ============================================================
     CTA BANNER
     ============================================================ -->
<section id="cta-section" aria-label="<?php esc_attr_e( 'Call to Action', 'estatein' ); ?>">
  <div class="container">
    <div class="cta-box">
      <div>
        <h2 class="cta-title">
          <?php esc_html_e( "Start Your Real Estate Journey ", 'estatein' ); ?>
          <span class="text-purple"><?php esc_html_e( 'Today', 'estatein' ); ?></span>
        </h2>
        <p class="cta-desc">
          <?php esc_html_e( 'Your dream property is just a search away. Whether buying, selling, or investing, our expert team is here to guide you every step of the way.', 'estatein' ); ?>
        </p>
      </div>
      <div class="cta-actions">
        <a href="<?php echo esc_url( home_url( '/properties' ) ); ?>" class="btn btn-primary">
          <?php esc_html_e( 'Explore Properties', 'estatein' ); ?>
          <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-outline">
          <?php esc_html_e( 'Contact Our Team', 'estatein' ); ?>
        </a>
      </div>
    </div>
  </div>
</section>

</main>

<?php get_footer(); ?>
