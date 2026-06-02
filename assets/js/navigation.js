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

  // --- Navbar position picker ---
  var navbar = document.getElementById('site-navbar');
  var pickerBtn = document.getElementById('position-picker-btn');
  var pickerMenu = document.getElementById('position-picker-menu');
  var positionOptions = document.querySelectorAll('.position-option');
  var mainContent = document.getElementById('content');
  var STORAGE_KEY = 'nicopaz-navbar-position';
  var SCROLL_THRESHOLD = 60;

  var preferredPosition = 'top';

  function setNavbarPosition(position) {
    if (!navbar) return;
    if (window.matchMedia('(max-width: 639px)').matches) {
      position = 'top';
    }
    // Remove old position classes
    navbar.classList.remove('navbar-top', 'navbar-left', 'navbar-right', 'navbar-bottom');
    // Add new position class
    navbar.classList.add('navbar-' + position);
    navbar.setAttribute('data-navbar-position', position);

    // Update active state in menu based on user preference
    positionOptions.forEach(function (opt) {
      var isActive = opt.getAttribute('data-position') === preferredPosition;
      opt.classList.toggle('is-active', isActive);
    });

    // Update body offset class
    document.body.classList.remove('navbar-offset-top', 'navbar-offset-left', 'navbar-offset-right', 'navbar-offset-bottom');
    if (position !== 'top') {
      document.body.classList.add('navbar-offset-' + position);
    }
  }

  function updateNavbarPositionAndScroll() {
    if (!navbar) return;
    var scrollY = window.pageYOffset || document.documentElement.scrollTop;

    // Check if we are inside the hero section
    var hero = document.getElementById('hero-carousel');
    var isInHero = false;

    if (hero) {
      var heroHeight = hero.offsetHeight;
      // Force top alignment when inside the hero section (with 50px buffer)
      isInHero = scrollY < (heroHeight - 50);
    } else {
      // Fallback threshold if no hero carousel is present
      isInHero = scrollY < SCROLL_THRESHOLD;
    }

    var activePosition = isInHero ? 'top' : preferredPosition;
    setNavbarPosition(activePosition);

    // Update scrolled state classes
    var isScrolled = scrollY > SCROLL_THRESHOLD;
    navbar.classList.toggle('navbar-scrolled', isScrolled);
  }

  // Load user alignment preference from local storage
  try {
    var saved = localStorage.getItem(STORAGE_KEY);
    if (saved && ['top', 'bottom', 'left', 'right'].indexOf(saved) !== -1) {
      preferredPosition = saved;
    }
  } catch (e) { /* ignore */ }

  if (pickerBtn && pickerMenu) {
    pickerBtn.addEventListener('click', function (e) {
      e.stopPropagation();
      var isOpen = pickerMenu.classList.toggle('is-open');
      pickerBtn.setAttribute('aria-expanded', isOpen);
    });

    // Close menu on outside click
    document.addEventListener('click', function (e) {
      if (pickerMenu.classList.contains('is-open') &&
          !pickerMenu.contains(e.target) &&
          !pickerBtn.contains(e.target)) {
        pickerMenu.classList.remove('is-open');
        pickerBtn.setAttribute('aria-expanded', 'false');
      }
    });

    // Close menu on Escape
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && pickerMenu.classList.contains('is-open')) {
        pickerMenu.classList.remove('is-open');
        pickerBtn.setAttribute('aria-expanded', 'false');
        pickerBtn.focus();
      }
    });

    // Position change handlers
    positionOptions.forEach(function (option) {
      option.addEventListener('click', function () {
        var position = this.getAttribute('data-position');
        preferredPosition = position;

        // Save preference
        try {
          localStorage.setItem(STORAGE_KEY, position);
        } catch (e) { /* localStorage may be disabled */ }

        updateNavbarPositionAndScroll();

        pickerMenu.classList.remove('is-open');
        pickerBtn.setAttribute('aria-expanded', 'false');

        // Close mobile menu drawer if it's open (in case it was open before switching)
        var mobileMenu = document.getElementById('mobile-menu');
        var mobileToggle = document.getElementById('mobile-menu-toggle');
        if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
          mobileMenu.classList.add('hidden');
        }
        if (mobileToggle) {
          mobileToggle.setAttribute('aria-expanded', 'false');
        }
      });
    });
  }

  // --- Scroll-triggered position and color change ---
  if (navbar) {
    var scrollTicking = false;
    function onScroll() {
      if (!scrollTicking) {
        window.requestAnimationFrame(function () {
          updateNavbarPositionAndScroll();
          scrollTicking = false;
        });
        scrollTicking = true;
      }
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    updateNavbarPositionAndScroll();
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
    var dotThumbs = document.querySelectorAll('.hero-dot-thumb');
    var current = 0;
    var interval = parseInt(heroSlides.getAttribute('data-interval')) || 6000;
    var timer = null;

    function goTo(index) {
      slides.forEach(function (s, i) {
        s.classList.toggle('opacity-100', i === index);
        s.classList.toggle('opacity-0', i !== index);
        s.classList.toggle('pointer-events-none', i !== index);
      });
      dotThumbs.forEach(function (d, i) {
        if (i === index) {
          d.classList.remove('border-white/20', 'scale-100');
          d.classList.add('border-celeste', 'scale-105', 'shadow-[0_0_15px_rgba(117,170,219,0.6)]');
        } else {
          d.classList.remove('border-celeste', 'scale-105', 'shadow-[0_0_15px_rgba(117,170,219,0.6)]');
          d.classList.add('border-white/20', 'scale-100');
        }
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

    dotThumbs.forEach(function (dot) {
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
