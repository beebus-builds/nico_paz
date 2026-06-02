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

  // --- Navbar scroll-triggered style change ---
  var navbar = document.getElementById('site-navbar');
  var SCROLL_THRESHOLD = 20;

  if (navbar) {
    var scrollTicking = false;
    function onScroll() {
      if (!scrollTicking) {
        window.requestAnimationFrame(function () {
          var scrollY = window.pageYOffset || document.documentElement.scrollTop;
          navbar.classList.toggle('is-scrolled', scrollY > SCROLL_THRESHOLD);
          scrollTicking = false;
        });
        scrollTicking = true;
      }
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
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

  // --- Image lazy-load + fade in (loading states, CLS prevention) ---
  if ('IntersectionObserver' in window) {
    var imgObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var img = entry.target;
          var clearLoading = function () {
            img.classList.remove('img-loading');
            img.classList.add('is-loaded');
            imgObserver.unobserve(img);
          };
          if (img.complete && img.naturalHeight !== 0) {
            clearLoading();
          } else {
            img.addEventListener('load', clearLoading, { once: true });
            img.addEventListener('error', clearLoading, { once: true });
            // Fallback timeout
            setTimeout(clearLoading, 5000);
          }
        }
      });
    }, { rootMargin: '50px 0px', threshold: 0.01 });

    document.querySelectorAll('img.img-fade-in').forEach(function (img) {
      imgObserver.observe(img);
    });
  }

  // --- Back-to-top button (usability, F-pattern) ---
  var backToTop = document.getElementById('back-to-top');
  if (backToTop) {
    var backToTopTicking = false;
    function updateBackToTop() {
      var scrollY = window.pageYOffset || document.documentElement.scrollTop;
      backToTop.classList.toggle('is-visible', scrollY > 600);
      backToTopTicking = false;
    }
    function onBackToTopScroll() {
      if (!backToTopTicking) {
        window.requestAnimationFrame(function () {
          updateBackToTop();
          backToTopTicking = false;
        });
        backToTopTicking = true;
      }
    }
    window.addEventListener('scroll', onBackToTopScroll, { passive: true });
    updateBackToTop();

    backToTop.addEventListener('click', function () {
      var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
      if (prefersReduced) {
        window.scrollTo(0, 0);
      } else {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }
      // Move focus to a logical place after scroll
      setTimeout(function () {
        var skip = document.querySelector('.skip-link');
        if (skip) skip.focus({ preventScroll: true });
      }, 500);
    });
  }

  // --- Reading progress indicator (long content) ---
  var readingProgress = document.getElementById('reading-progress');
  if (readingProgress) {
    var progressTicking = false;
    function updateReadingProgress() {
      var docHeight = document.documentElement.scrollHeight - window.innerHeight;
      var scrollY = window.pageYOffset || document.documentElement.scrollTop;
      var progress = docHeight > 0 ? Math.min(scrollY / docHeight, 1) : 0;
      readingProgress.style.transform = 'scaleX(' + progress + ')';
      progressTicking = false;
    }
    function onProgressScroll() {
      if (!progressTicking) {
        window.requestAnimationFrame(function () {
          updateReadingProgress();
          progressTicking = false;
        });
        progressTicking = true;
      }
    }
    window.addEventListener('scroll', onProgressScroll, { passive: true });
    updateReadingProgress();
  }

  // --- Toast notification system (feedback, error recovery) ---
  var toastContainer = document.getElementById('toast-container');
  if (toastContainer) {
    window.nicopazToast = function (options) {
      var opts = typeof options === 'string'
        ? { message: options }
        : (options || {});
      var type = opts.type || 'info';
      var title = opts.title || '';
      var message = opts.message || '';
      var duration = typeof opts.duration === 'number' ? opts.duration : 4000;

      var icons = {
        success: '<svg xmlns="http://www.w3.org/2000/svg" class="toast-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>',
        error: '<svg xmlns="http://www.w3.org/2000/svg" class="toast-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>',
        warning: '<svg xmlns="http://www.w3.org/2000/svg" class="toast-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>',
        info: '<svg xmlns="http://www.w3.org/2000/svg" class="toast-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
      };

      var toast = document.createElement('div');
      toast.className = 'toast toast-' + type;
      toast.setAttribute('role', type === 'error' ? 'alert' : 'status');
      toast.innerHTML =
        icons[type] + '<div class="toast-content">' +
        (title ? '<div class="toast-title">' + escapeHtml(title) + '</div>' : '') +
        '<div class="toast-message">' + escapeHtml(message) + '</div>' +
        '</div><button type="button" class="toast-close" aria-label="Close notification">' +
        '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>' +
        '</button>';

      toastContainer.appendChild(toast);
      // Force reflow before adding class for transition
      void toast.offsetHeight;
      requestAnimationFrame(function () {
        toast.classList.add('is-visible');
      });

      var close = function () {
        toast.classList.remove('is-visible');
        setTimeout(function () {
          if (toast.parentNode) toast.parentNode.removeChild(toast);
        }, 300);
      };

      toast.querySelector('.toast-close').addEventListener('click', close);
      if (duration > 0) {
        setTimeout(close, duration);
      }
    };
  }

  // --- Cookie consent banner (trust signals, legal compliance) ---
  var cookieBanner = document.getElementById('cookie-banner');
  if (cookieBanner) {
    var COOKIE_KEY = 'nicopaz-cookie-consent';
    var existingConsent = null;
    try { existingConsent = localStorage.getItem(COOKIE_KEY); } catch (e) {}

    if (!existingConsent) {
      setTimeout(function () {
        cookieBanner.classList.add('is-visible');
      }, 1500);
    }

    cookieBanner.querySelectorAll('[data-cookie-action]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var action = this.getAttribute('data-cookie-action');
        try { localStorage.setItem(COOKIE_KEY, action); } catch (e) {}
        cookieBanner.classList.remove('is-visible');
        setTimeout(function () {
          if (cookieBanner.parentNode) cookieBanner.parentNode.removeChild(cookieBanner);
        }, 400);
        if (window.nicopazToast) {
          window.nicopazToast({
            type: action === 'accept' ? 'success' : 'info',
            title: action === 'accept' ? 'Cookies accepted' : 'Cookies declined',
            message: action === 'accept'
              ? 'Thanks! You can change this anytime in settings.'
              : 'Non-essential cookies have been disabled.',
            duration: 3500,
          });
        }
      });
    });
  }

  // --- Form validation feedback (error prevention, error recovery) ---
  document.querySelectorAll('form[data-validate]').forEach(function (form) {
    form.addEventListener('submit', function (e) {
      var hasError = false;
      form.querySelectorAll('[required]').forEach(function (input) {
        var field = input.closest('.form-field');
        if (!input.value.trim()) {
          if (field) field.classList.add('has-error');
          input.setAttribute('aria-invalid', 'true');
          hasError = true;
        } else {
          if (field) field.classList.remove('has-error');
          input.setAttribute('aria-invalid', 'false');
        }
      });
      if (hasError) {
        e.preventDefault();
        if (window.nicopazToast) {
          window.nicopazToast({
            type: 'error',
            title: 'Please fix the errors',
            message: 'Some required fields are missing or invalid.',
            duration: 4000,
          });
        }
        // Focus first error
        var firstError = form.querySelector('.has-error input, .has-error textarea, .has-error select');
        if (firstError) firstError.focus();
      } else {
        // Show loading state
        var submitBtn = form.querySelector('[type="submit"]');
        if (submitBtn && !submitBtn.disabled) {
          submitBtn.classList.add('btn-loading');
          submitBtn.setAttribute('aria-busy', 'true');
        }
      }
    });

    // Clear error on input
    form.querySelectorAll('input, textarea, select').forEach(function (input) {
      input.addEventListener('input', function () {
        var field = input.closest('.form-field');
        if (field && field.classList.contains('has-error') && input.value.trim()) {
          field.classList.remove('has-error');
          input.setAttribute('aria-invalid', 'false');
        }
      });
    });
  });

  // --- Section jump nav active state (scroll-spy for scannability) ---
  var jumpNav = document.querySelector('.section-jump-nav');
  if (jumpNav && 'IntersectionObserver' in window) {
    var jumpLinks = jumpNav.querySelectorAll('a[href^="#"]');
    var sectionsById = {};
    jumpLinks.forEach(function (link) {
      var id = link.getAttribute('href').substring(1);
      var section = document.getElementById(id);
      if (section) sectionsById[id] = link;
    });
    var jumpObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        var id = entry.target.id;
        var link = sectionsById[id];
        if (!link) return;
        if (entry.isIntersecting) {
          jumpLinks.forEach(function (l) { l.classList.remove('is-active'); });
          link.classList.add('is-active');
        }
      });
    }, { rootMargin: '-40% 0px -50% 0px' });
    Object.keys(sectionsById).forEach(function (id) {
      var section = document.getElementById(id);
      if (section) jumpObserver.observe(section);
    });
  }
});

/* Tiny HTML escaper for safe toast messages */
function escapeHtml(str) {
  if (str == null) return '';
  return String(str)
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#39;');
}
