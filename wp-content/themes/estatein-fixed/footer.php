<footer id="site-footer" role="contentinfo">
    <div class="container">

        <!-- Footer Top -->
        <div class="footer-top">

            <!-- Brand Column -->
            <div class="footer-brand">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="<?php bloginfo( 'name' ); ?>">
                    <div class="logo-icon" aria-hidden="true">🏠</div>
                    <span><?php bloginfo( 'name' ); ?></span>
                </a>
                <p class="footer-tagline">
                    <?php echo esc_html( get_bloginfo( 'description' ) ?: __( 'Your trusted partner for finding exceptional properties. We bring your real estate dreams to life with expertise and dedication.', 'estatein' ) ); ?>
                </p>
                <div class="footer-socials" aria-label="<?php esc_attr_e( 'Social Media Links', 'estatein' ); ?>">
                    <a href="#" class="social-link" aria-label="Facebook">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    </a>
                    <a href="#" class="social-link" aria-label="Twitter / X">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
                    </a>
                    <a href="#" class="social-link" aria-label="Instagram">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    </a>
                    <a href="#" class="social-link" aria-label="LinkedIn">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                    </a>
                    <a href="#" class="social-link" aria-label="YouTube">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.6C5.12 20.06 12 20.06 12 20.06s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.95A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" fill="#141414"/></svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="footer-col-title"><?php esc_html_e( 'Home', 'estatein' ); ?></h3>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url( home_url( '/#hero' ) ); ?>"><?php esc_html_e( 'Hero Section', 'estatein' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#featured-properties' ) ); ?>"><?php esc_html_e( 'Featured Properties', 'estatein' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#why-us' ) ); ?>"><?php esc_html_e( 'Our Values', 'estatein' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#testimonials' ) ); ?>"><?php esc_html_e( 'Testimonials', 'estatein' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>"><?php esc_html_e( 'FAQ', 'estatein' ); ?></a></li>
                </ul>
            </div>

            <!-- About Links -->
            <div>
                <h3 class="footer-col-title"><?php esc_html_e( 'About Us', 'estatein' ); ?></h3>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>"><?php esc_html_e( 'Our Story', 'estatein' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/about#team' ) ); ?>"><?php esc_html_e( 'Our Team', 'estatein' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/about#values' ) ); ?>"><?php esc_html_e( 'Our Values', 'estatein' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/about#achievements' ) ); ?>"><?php esc_html_e( 'Achievements', 'estatein' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Contact Us', 'estatein' ); ?></a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="footer-newsletter">
                <h3 class="footer-col-title"><?php esc_html_e( 'Newsletter', 'estatein' ); ?></h3>
                <p><?php esc_html_e( 'Subscribe to our newsletter for the latest property listings and market updates.', 'estatein' ); ?></p>
                <form class="newsletter-form" id="newsletter-form" novalidate>
                    <?php wp_nonce_field( 'estatein_nonce', '_newsletter_nonce' ); ?>
                    <label for="newsletter-email" class="sr-only"><?php esc_html_e( 'Your email address', 'estatein' ); ?></label>
                    <input
                        type="email"
                        id="newsletter-email"
                        name="email"
                        placeholder="<?php esc_attr_e( 'Enter your email', 'estatein' ); ?>"
                        required
                        autocomplete="email"
                    >
                    <button type="submit"><?php esc_html_e( 'Subscribe', 'estatein' ); ?></button>
                </form>
                <p id="newsletter-msg" class="newsletter-msg" aria-live="polite" style="font-size:13px;margin-top:8px;display:none;"></p>
            </div>

        </div><!-- .footer-top -->

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p class="footer-copy">
                &copy; <?php echo esc_html( date( 'Y' ) ); ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>.
                <?php esc_html_e( 'All rights reserved.', 'estatein' ); ?>
            </p>
            <nav class="footer-legal" aria-label="<?php esc_attr_e( 'Legal Navigation', 'estatein' ); ?>">
                <a href="<?php echo esc_url( home_url( '/terms' ) ); ?>"><?php esc_html_e( 'Terms of Service', 'estatein' ); ?></a>
                <a href="<?php echo esc_url( home_url( '/privacy' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'estatein' ); ?></a>
                <a href="<?php echo esc_url( home_url( '/cookies' ) ); ?>"><?php esc_html_e( 'Cookie Policy', 'estatein' ); ?></a>
            </nav>
        </div>

    </div><!-- .container -->
</footer>

<?php wp_footer(); ?>
</body>
</html>
