document.addEventListener('DOMContentLoaded', function () {
  // --- Mobile menu toggle ---
  var toggle = document.getElementById('mobile-menu-toggle');
  var menu = document.getElementById('mobile-menu');

  if (toggle && menu) {
    toggle.addEventListener('click', function () {
      var expanded = toggle.getAttribute('aria-expanded') === 'true' ? false : true;
      toggle.setAttribute('aria-expanded', expanded);
      menu.classList.toggle('hidden');
      document.body.classList.toggle('overflow-hidden', expanded);
    });
  }

  // --- Mobile submenu accordion ---
  document.querySelectorAll('#mobile-menu .menu-item-has-children').forEach(function (li) {
    var btn = li.querySelector('.submenu-toggle');
    var sub = li.querySelector('.sub-menu');
    if (!btn || !sub) return;

    btn.addEventListener('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      var open = btn.getAttribute('aria-expanded') === 'true' ? false : true;
      btn.setAttribute('aria-expanded', open);
      sub.classList.toggle('max-lg:max-h-0', !open);
      sub.classList.toggle('max-lg:max-h-[500px]', open);
      sub.classList.toggle('max-lg:pb-2', open);
      btn.querySelector('svg').classList.toggle('rotate-180', open);
    });
  });

  // --- AJAX cart count ---
  var cartCount = document.getElementById('nicopaz-cart-count');
  if (cartCount) {
    document.body.addEventListener('added_to_cart', function () {
      fetch(nicopazData.ajaxUrl + '?action=nicopaz_cart_count')
        .then(function (r) { return r.json(); })
        .then(function (data) {
          if (data.count !== undefined) {
            cartCount.textContent = data.count;
            cartCount.parentElement.classList.remove('hidden');
          }
        });
    });
  }

  // --- Dark mode toggle ---
  var themeToggle = document.getElementById('theme-toggle');
  var sunIcon = document.getElementById('theme-icon-sun');
  var moonIcon = document.getElementById('theme-icon-moon');

  function setTheme(dark) {
    if (dark) {
      document.documentElement.classList.add('dark');
      localStorage.setItem('nicopaz-theme', 'dark');
      if (sunIcon) sunIcon.classList.remove('hidden');
      if (moonIcon) moonIcon.classList.add('hidden');
    } else {
      document.documentElement.classList.remove('dark');
      localStorage.setItem('nicopaz-theme', 'light');
      if (sunIcon) sunIcon.classList.add('hidden');
      if (moonIcon) moonIcon.classList.remove('hidden');
    }
  }

  var stored = localStorage.getItem('nicopaz-theme');
  if (stored === 'dark' || (!stored && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    setTheme(true);
  }

  if (themeToggle) {
    themeToggle.addEventListener('click', function () {
      setTheme(!document.documentElement.classList.contains('dark'));
    });
  }

  // --- Hero carousel ---
  var heroSlides = document.getElementById('hero-slides');
  if (heroSlides) {
    var slides = heroSlides.querySelectorAll('.hero-slide');
    var dots = document.querySelectorAll('.hero-dot');
    var current = 0;
    var interval = parseInt(heroSlides.getAttribute('data-interval')) || 6000;
    var timer = null;

    function goTo(index) {
      slides.forEach(function (s, i) {
        s.classList.toggle('opacity-100', i === index);
        s.classList.toggle('opacity-0', i !== index);
        s.classList.toggle('pointer-events-none', i !== index);
      });
      dots.forEach(function (d, i) {
        d.classList.toggle('bg-white', i === index);
        d.classList.toggle('w-7', i === index);
        d.classList.toggle('bg-white/40', i !== index);
        d.classList.toggle('hover:bg-white/70', i !== index);
      });
      current = index;
    }

    function goNext() {
      goTo((current + 1) % slides.length);
    }

    function startTimer() {
      stopTimer();
      timer = setInterval(goNext, interval);
    }

    function stopTimer() {
      if (timer) { clearInterval(timer); timer = null; }
    }

    dots.forEach(function (dot) {
      dot.addEventListener('click', function () {
        goTo(parseInt(this.getAttribute('data-index')));
        startTimer();
      });
    });

    var carousel = document.getElementById('hero-carousel');
    if (carousel) {
      carousel.addEventListener('mouseenter', stopTimer);
      carousel.addEventListener('mouseleave', startTimer);
      carousel.addEventListener('touchstart', stopTimer);
    }

    startTimer();
  }

  // --- FAQ accordion ---
  var faqAccordion = document.getElementById('faq-accordion');
  if (faqAccordion) {
    faqAccordion.addEventListener('click', function (e) {
      var trigger = e.target.closest('.faq-trigger');
      if (!trigger) return;

      var item = trigger.closest('.faq-item');
      var content = item.querySelector('.faq-content');
      var chevron = trigger.querySelector('.faq-chevron');
      var expanded = trigger.getAttribute('aria-expanded') === 'true';

      document.querySelectorAll('.faq-item').forEach(function (other) {
        if (other !== item) {
          other.querySelector('.faq-trigger').setAttribute('aria-expanded', 'false');
          other.querySelector('.faq-content').classList.add('hidden');
          var otherChevron = other.querySelector('.faq-chevron');
          if (otherChevron) otherChevron.classList.remove('rotate-180');
        }
      });

      trigger.setAttribute('aria-expanded', expanded ? 'false' : 'true');
      content.classList.toggle('hidden');
      if (chevron) chevron.classList.toggle('rotate-180');
    });
  }

  // --- Touch-device hover polyfill ---
  if ('ontouchstart' in window) {
    document.querySelectorAll('.main-navigation .menu-item-has-children').forEach(function (li) {
      li.addEventListener('click', function (e) {
        if (e.target.closest('a') && !e.target.closest('.sub-menu')) {
          var sub = this.querySelector('.sub-menu');
          if (sub && sub.classList.contains('max-lg:hidden')) {
            e.preventDefault();
            sub.classList.remove('max-lg:hidden');
            sub.classList.add('max-lg:block');
          }
        }
      });
    });
  }

  // --- Animated number counters ---
  var counters = document.querySelectorAll('.counter');
  if (counters.length) {
    var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function animateCounter(el) {
      var target = parseInt(el.getAttribute('data-target'), 10);
      if (isNaN(target)) return;

      if (prefersReducedMotion) {
        el.textContent = target;
        return;
      }

      var duration = 1600;
      var start = null;
      function step(timestamp) {
        if (!start) start = timestamp;
        var progress = Math.min((timestamp - start) / duration, 1);
        var eased = 1 - Math.pow(1 - progress, 3);
        el.textContent = Math.round(target * eased);
        if (progress < 1) requestAnimationFrame(step);
        else el.textContent = target;
      }
      requestAnimationFrame(step);
    }

    if ('IntersectionObserver' in window) {
      var counterObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            counterObserver.unobserve(entry.target);
          }
        });
      }, { threshold: 0.4 });

      counters.forEach(function (c) { counterObserver.observe(c); });
    } else {
      counters.forEach(animateCounter);
    }
  }
});
