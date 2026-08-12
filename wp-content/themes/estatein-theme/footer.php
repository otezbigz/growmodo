<footer id="site-footer" role="contentinfo">
  <div class="container">

    <div class="footer-top">

      <!-- Brand col -->
      <div class="footer-brand">
        <a href="<?= esc_url( home_url('/') ) ?>" class="footer-logo">
          <div class="logo-icon" aria-hidden="true"></div>
          <span><?php bloginfo('name'); ?></span>
        </a>
        <p class="footer-tagline">Turning Your Vision of the Perfect Home into Reality — One Property at a Time.</p>
        <div class="footer-socials">
          <a href="#" class="footer-social" aria-label="Facebook">f</a>
          <a href="#" class="footer-social" aria-label="Twitter">𝕏</a>
          <a href="#" class="footer-social" aria-label="Instagram">in</a>
          <a href="#" class="footer-social" aria-label="LinkedIn">li</a>
        </div>
      </div>

      <!-- Home -->
      <div class="footer-col">
        <p class="footer-col-title">Home</p>
        <ul>
          <li><a href="<?= home_url('/') ?>">Hero Section</a></li>
          <li><a href="<?= home_url('/#features') ?>">Features</a></li>
          <li><a href="<?= home_url('/#properties') ?>">Properties</a></li>
          <li><a href="<?= home_url('/#testimonials') ?>">Testimonials</a></li>
          <li><a href="<?= home_url('/#faq') ?>">FAQ's</a></li>
        </ul>
      </div>

      <!-- About -->
      <div class="footer-col">
        <p class="footer-col-title">About Us</p>
        <ul>
          <li><a href="<?= home_url('/about-us') ?>">Our Story</a></li>
          <li><a href="<?= home_url('/about-us/#team') ?>">Our Works</a></li>
          <li><a href="<?= home_url('/about-us/#team') ?>">Our Team</a></li>
          <li><a href="<?= home_url('/about-us/#clients') ?>">Our Clients</a></li>
          <li><a href="<?= home_url('/about-us/#roadmap') ?>">Roadmap</a></li>
        </ul>
      </div>

      <!-- Properties -->
      <div class="footer-col">
        <p class="footer-col-title">Properties</p>
        <ul>
          <li><a href="<?= home_url('/properties') ?>">Portfolio</a></li>
          <li><a href="<?= home_url('/properties/?type=residential') ?>">Residential</a></li>
          <li><a href="<?= home_url('/properties/?type=commercial') ?>">Commercial</a></li>
          <li><a href="<?= home_url('/properties/?status=for-rent') ?>">For Rent</a></li>
        </ul>
      </div>

      <!-- Services -->
      <div class="footer-col">
        <p class="footer-col-title">Services</p>
        <ul>
          <li><a href="<?= home_url('/services/#valuation') ?>">Valuation Mastery</a></li>
          <li><a href="<?= home_url('/services/#marketing') ?>">Strategic Marketing</a></li>
          <li><a href="<?= home_url('/services/#negotiation') ?>">Negotiation Wizardry</a></li>
          <li><a href="<?= home_url('/services/#closing') ?>">Closing Success</a></li>
          <li><a href="<?= home_url('/services/#management') ?>">Property Management</a></li>
        </ul>
      </div>

    </div><!-- .footer-top -->

    <!-- Bottom bar -->
    <div class="footer-bottom">
      <p class="footer-copy">&copy; <?= date('Y') ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
      <div class="footer-links">
        <a href="<?= home_url('/terms') ?>">Terms &amp; Conditions</a>
        <a href="<?= home_url('/privacy') ?>">Privacy Policy</a>
      </div>
    </div>

  </div>
</footer>

<!-- Scroll-to-top -->
<button id="scroll-top" aria-label="Scroll to top">
  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
</button>

<?php wp_footer(); ?>
</body>
</html>
