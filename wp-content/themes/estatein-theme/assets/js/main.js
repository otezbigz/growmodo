/* Estatein — main.js */
(function () {
  'use strict';

  /* ── Mobile Nav ─────────────────────────────────── */
  const toggle   = document.getElementById('nav-toggle');
  const mobileNav = document.getElementById('mobile-nav');
  const closeBtn  = document.getElementById('mobile-close');

  function openNav() {
    mobileNav?.classList.add('open');
    mobileNav?.removeAttribute('aria-hidden');
    toggle?.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
  }
  function closeNav() {
    mobileNav?.classList.remove('open');
    mobileNav?.setAttribute('aria-hidden', 'true');
    toggle?.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  }

  toggle?.addEventListener('click', openNav);
  closeBtn?.addEventListener('click', closeNav);
  mobileNav?.querySelectorAll('a').forEach(a => a.addEventListener('click', closeNav));

  /* ── Active nav link ─────────────────────────────── */
  const path = window.location.pathname;
  document.querySelectorAll('.nav-links a, .mobile-nav a').forEach(a => {
    const href = new URL(a.href, location.origin).pathname;
    if (href === path || (path === '/' && href === '/')) a.classList.add('active');
  });

  /* ── Scroll-to-top ───────────────────────────────── */
  const scrollBtn = document.getElementById('scroll-top');
  window.addEventListener('scroll', () => {
    scrollBtn?.classList.toggle('visible', window.scrollY > 400);
  }, { passive: true });
  scrollBtn?.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

  /* ── Sticky header shadow ────────────────────────── */
  const header = document.getElementById('site-header');
  window.addEventListener('scroll', () => {
    header?.classList.toggle('scrolled', window.scrollY > 10);
  }, { passive: true });

  /* ── Counter animation ───────────────────────────── */
  function animateCounter(el, target, suffix) {
    let start = 0;
    const duration = 1800;
    const step = timestamp => {
      if (!start) start = timestamp;
      const progress = Math.min((timestamp - start) / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3); // easeOutCubic
      el.childNodes[0].textContent = Math.floor(eased * target);
      if (progress < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  }

  const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const el = entry.target;
      if (el.dataset.done) return;
      el.dataset.done = '1';
      const target = parseInt(el.dataset.target, 10);
      const suffix = el.querySelector('span')?.textContent || '';
      animateCounter(el, target, suffix);
      counterObserver.unobserve(el);
    });
  }, { threshold: 0.5 });

  document.querySelectorAll('.stat-num[data-target]').forEach(el => counterObserver.observe(el));

  /* ── Hero search redirect ────────────────────────── */
  const searchBtn = document.getElementById('hero-search-btn');
  searchBtn?.addEventListener('click', (e) => {
    e.preventDefault();
    const loc   = document.getElementById('search-location')?.value || '';
    const type  = document.getElementById('search-type')?.value || '';
    const price = document.getElementById('search-price')?.value || '';
    const params = new URLSearchParams();
    if (loc)   params.set('location', loc);
    if (type)  params.set('type', type);
    if (price) params.set('price', price);
    const base = document.querySelector('base')?.href || window.location.origin;
    window.location.href = (base + '/properties/').replace(/\/+$/, '/') + '?' + params.toString();
  });

  /* ── Newsletter AJAX ────────────────────────────── */
  const ctaSubmit = document.getElementById('cta-submit');
  const ctaEmail  = document.getElementById('cta-email');
  const ctaMsg    = document.getElementById('cta-msg');

  ctaSubmit?.addEventListener('click', async () => {
    const email = ctaEmail?.value.trim();
    if (!email || !email.includes('@')) {
      showMsg('Please enter a valid email address.', '#f87171');
      return;
    }
    ctaSubmit.disabled = true;
    ctaSubmit.textContent = 'Subscribing...';

    try {
      const data = new FormData();
      data.append('action', 'estatein_subscribe');
      data.append('email', email);
      data.append('nonce', window.estateinAjax?.nonce || '');

      const res = await fetch(window.estateinAjax?.ajaxurl || '/wp-admin/admin-ajax.php', {
        method: 'POST', body: data,
      });
      const json = await res.json();

      if (json.success) {
        showMsg('🎉 Thanks for subscribing!', '#4ade80');
        ctaEmail.value = '';
      } else {
        showMsg(json.data?.message || 'Something went wrong.', '#f87171');
      }
    } catch {
      showMsg('Network error. Please try again.', '#f87171');
    } finally {
      ctaSubmit.disabled = false;
      ctaSubmit.textContent = 'Learn More';
    }
  });

  function showMsg(text, color) {
    if (!ctaMsg) return;
    ctaMsg.textContent = text;
    ctaMsg.style.color = color;
    ctaMsg.style.display = 'block';
    setTimeout(() => { ctaMsg.style.display = 'none'; }, 4000);
  }

  /* ── Scroll reveal (light) ───────────────────────── */
  const style = document.createElement('style');
  style.textContent = `
    .reveal { opacity:0; transform:translateY(20px); transition:opacity .5s ease, transform .5s ease; }
    .reveal.visible { opacity:1; transform:none; }
  `;
  document.head.appendChild(style);

  const revealEls = document.querySelectorAll(
    '.property-card, .feature-card, .testimonial-card, .team-card, .stat-item, .hero-stat'
  );
  revealEls.forEach(el => el.classList.add('reveal'));

  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
      if (entry.isIntersecting) {
        setTimeout(() => entry.target.classList.add('visible'), i * 80);
        revealObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });

  revealEls.forEach(el => revealObserver.observe(el));

})();
