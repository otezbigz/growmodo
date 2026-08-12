/**
 * Estatein Theme – Main JavaScript
 * Covers: mobile nav, FAQ accordion, scroll reveal, newsletter AJAX, header scroll
 */

(function () {
  'use strict';

  /* ------------------------------------------------------------------
     MOBILE NAV TOGGLE
     ------------------------------------------------------------------ */
  const navToggle = document.querySelector('.nav-toggle');
  const mobileNav = document.getElementById('mobile-nav');

  if (navToggle && mobileNav) {
    navToggle.addEventListener('click', function () {
      const isOpen = mobileNav.classList.toggle('open');
      navToggle.setAttribute('aria-expanded', String(isOpen));
      mobileNav.hidden = !isOpen;

      // Animate hamburger → X
      const spans = navToggle.querySelectorAll('span');
      if (isOpen) {
        spans[0].style.transform = 'translateY(7px) rotate(45deg)';
        spans[1].style.opacity   = '0';
        spans[2].style.transform = 'translateY(-7px) rotate(-45deg)';
        navToggle.setAttribute('aria-label', 'Close navigation menu');
      } else {
        spans[0].style.transform = '';
        spans[1].style.opacity   = '';
        spans[2].style.transform = '';
        navToggle.setAttribute('aria-label', 'Open navigation menu');
      }
    });

    // Close mobile nav on outside click
    document.addEventListener('click', function (e) {
      if (!navToggle.contains(e.target) && !mobileNav.contains(e.target)) {
        closeMobileNav();
      }
    });

    // Close mobile nav on Escape
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeMobileNav();
    });

    function closeMobileNav() {
      mobileNav.classList.remove('open');
      mobileNav.hidden = true;
      navToggle.setAttribute('aria-expanded', 'false');
      navToggle.setAttribute('aria-label', 'Open navigation menu');
      const spans = navToggle.querySelectorAll('span');
      spans[0].style.transform = '';
      spans[1].style.opacity   = '';
      spans[2].style.transform = '';
    }
  }

  /* ------------------------------------------------------------------
     HEADER SCROLL EFFECT
     ------------------------------------------------------------------ */
  const header = document.getElementById('site-header');
  if (header) {
    let lastScroll = 0;
    window.addEventListener('scroll', function () {
      const currentScroll = window.scrollY;
      if (currentScroll > 80) {
        header.style.background = 'rgba(20, 20, 20, 0.98)';
        header.style.boxShadow  = '0 1px 0 rgba(255,255,255,0.05)';
      } else {
        header.style.background = '';
        header.style.boxShadow  = '';
      }
      lastScroll = currentScroll;
    }, { passive: true });
  }

  /* ------------------------------------------------------------------
     FAQ ACCORDION
     ------------------------------------------------------------------ */
  const faqAccordion = document.getElementById('faq-accordion');
  if (faqAccordion) {
    faqAccordion.addEventListener('click', function (e) {
      const btn = e.target.closest('.faq-question');
      if (!btn) return;

      const item   = btn.closest('.faq-item');
      const isOpen = item.classList.contains('open');

      // Close all
      faqAccordion.querySelectorAll('.faq-item').forEach(function (el) {
        el.classList.remove('open');
        el.querySelector('.faq-question').setAttribute('aria-expanded', 'false');
      });

      // Toggle clicked
      if (!isOpen) {
        item.classList.add('open');
        btn.setAttribute('aria-expanded', 'true');
      }
    });

    // Open first item by default
    const firstItem = faqAccordion.querySelector('.faq-item');
    if (firstItem) {
      firstItem.classList.add('open');
      firstItem.querySelector('.faq-question').setAttribute('aria-expanded', 'true');
    }
  }

  /* ------------------------------------------------------------------
     SCROLL REVEAL
     ------------------------------------------------------------------ */
  if ('IntersectionObserver' in window) {
    const revealObserver = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            revealObserver.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
    );

    document.querySelectorAll('.reveal').forEach(function (el) {
      revealObserver.observe(el);
    });
  } else {
    // Fallback: show all immediately
    document.querySelectorAll('.reveal').forEach(function (el) {
      el.classList.add('visible');
    });
  }

  /* ------------------------------------------------------------------
     NEWSLETTER FORM – AJAX SUBMIT
     ------------------------------------------------------------------ */
  const newsletterForm = document.getElementById('newsletter-form');
  const newsletterMsg  = document.getElementById('newsletter-msg');

  if (newsletterForm && newsletterMsg) {
    newsletterForm.addEventListener('submit', function (e) {
      e.preventDefault();

      const emailInput = newsletterForm.querySelector('input[type="email"]');
      const submitBtn  = newsletterForm.querySelector('button[type="submit"]');
      const email      = emailInput ? emailInput.value.trim() : '';

      if (!email) {
        showMsg('Please enter a valid email address.', 'error');
        return;
      }

      submitBtn.disabled    = true;
      submitBtn.textContent = 'Sending…';

      const formData = new FormData();
      formData.append('action', 'estatein_newsletter');
      formData.append('email',  email);

      // Read nonce from hidden field if available
      const nonceField = document.getElementById('_newsletter_nonce');
      if (nonceField) {
        formData.append('nonce', nonceField.value);
      } else if (typeof estateinData !== 'undefined') {
        formData.append('nonce', estateinData.nonce);
      }

      const ajaxUrl = (typeof estateinData !== 'undefined')
        ? estateinData.ajaxUrl
        : '/wp-admin/admin-ajax.php';

      fetch(ajaxUrl, { method: 'POST', body: formData })
        .then(function (res) { return res.json(); })
        .then(function (data) {
          if (data.success) {
            showMsg(data.data.message || 'Thank you for subscribing!', 'success');
            newsletterForm.reset();
          } else {
            showMsg(data.data.message || 'Something went wrong. Please try again.', 'error');
          }
        })
        .catch(function () {
          showMsg('Network error. Please try again.', 'error');
        })
        .finally(function () {
          submitBtn.disabled    = false;
          submitBtn.textContent = 'Subscribe';
        });
    });

    function showMsg(text, type) {
      newsletterMsg.textContent = text;
      newsletterMsg.style.display = 'block';
      newsletterMsg.style.color   = type === 'success' ? '#703bf7' : '#ef4444';
    }
  }

  /* ------------------------------------------------------------------
     SMOOTH SCROLL FOR ANCHOR LINKS
     ------------------------------------------------------------------ */
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const headerH = header ? header.offsetHeight : 76;
        const top     = target.getBoundingClientRect().top + window.scrollY - headerH - 16;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    });
  });

  /* ------------------------------------------------------------------
     ACTIVE NAV LINK ON SCROLL (highlight current section)
     ------------------------------------------------------------------ */
  const sections    = document.querySelectorAll('section[id]');
  const navLinks    = document.querySelectorAll('.primary-nav .nav-link, .mobile-nav a');

  if (sections.length && navLinks.length) {
    const sectionObserver = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            const id = entry.target.getAttribute('id');
            navLinks.forEach(function (link) {
              const href = link.getAttribute('href') || '';
              if (href.includes('#' + id)) {
                link.classList.add('active');
              } else if (href.includes('#')) {
                link.classList.remove('active');
              }
            });
          }
        });
      },
      { threshold: 0.4 }
    );

    sections.forEach(function (s) { sectionObserver.observe(s); });
  }

})();
