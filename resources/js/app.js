import './bootstrap';
import { showToast } from './toast';

// Make toast globally available
window.showToast = showToast;

const ready = (fn) => {
  if (document.readyState !== 'loading') {
    fn();
    return;
  }
  document.addEventListener('DOMContentLoaded', fn);
};

ready(() => {
  const revealItems = document.querySelectorAll('[data-reveal]');
  if (revealItems.length > 0 && 'IntersectionObserver' in window) {
    const revealObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add('is-visible');
          revealObserver.unobserve(entry.target);
        });
      },
      { threshold: 0.2 }
    );

    revealItems.forEach((item) => {
      item.classList.add('reveal');
      revealObserver.observe(item);
    });
  } else {
    revealItems.forEach((item) => item.classList.add('is-visible'));
  }

  const filterGroups = document.querySelectorAll('[data-menu]');
  filterGroups.forEach((group) => {
    const filters = group.querySelectorAll('[data-filter]');
    const items = group.querySelectorAll('[data-menu-item]');

    const applyFilters = () => {
      const activeFilters = Array.from(filters)
        .filter((filter) => filter.getAttribute('aria-pressed') === 'true')
        .map((filter) => filter.dataset.filter);

      items.forEach((item) => {
        const itemFilters = (item.dataset.diet || '').split(' ').filter(Boolean);
        const matches =
          activeFilters.length === 0 ||
          activeFilters.every((filter) => itemFilters.includes(filter));
        item.classList.toggle('hidden', !matches);
      });
    };

    filters.forEach((filter) => {
      filter.addEventListener('click', () => {
        const isPressed = filter.getAttribute('aria-pressed') === 'true';
        filter.setAttribute('aria-pressed', String(!isPressed));
        applyFilters();
      });
    });
  });

  const bookingTriggers = document.querySelectorAll('[data-booking-open]');
  bookingTriggers.forEach((trigger) => {
    trigger.addEventListener('click', () => {
      const targetId = trigger.getAttribute('data-booking-open');
      if (!targetId) return;
      const details = document.getElementById(targetId);
      if (!details) return;
      details.open = true;
      details.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
  });

  const galleries = document.querySelectorAll('[data-gallery]');
  galleries.forEach((gallery) => {
    const slides = gallery.querySelectorAll('[data-gallery-slide]');
    const indicator =
      gallery.querySelector('[data-gallery-indicator]') ||
      (gallery.parentElement ? gallery.parentElement.querySelector('[data-gallery-indicator]') : null);
    if (!indicator || slides.length === 0 || !('IntersectionObserver' in window)) {
      return;
    }

    const galleryObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          const index = Number(entry.target.dataset.gallerySlide || '1');
          indicator.textContent = `${index}/${slides.length}`;
        });
      },
      { root: gallery, threshold: 0.6 }
    );

    slides.forEach((slide) => galleryObserver.observe(slide));
  });
});
