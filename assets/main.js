// Rok w stopce
var yearEl = document.getElementById('year');
if (yearEl) yearEl.textContent = new Date().getFullYear();

// Menu mobilne
var toggle = document.querySelector('.nav-toggle');
var links = document.querySelector('.nav-links');
if (toggle && links) {
  toggle.addEventListener('click', function () {
    var open = links.classList.toggle('open');
    toggle.setAttribute('aria-expanded', open);
  });
  links.querySelectorAll('a').forEach(function (a) {
    a.addEventListener('click', function () {
      links.classList.remove('open');
      toggle.setAttribute('aria-expanded', 'false');
    });
  });
}

// Subtelne pojawianie się sekcji
if ('IntersectionObserver' in window) {
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
    });
  }, { threshold: 0.12 });
  document.querySelectorAll('.reveal').forEach(function (el) { io.observe(el); });
} else {
  document.querySelectorAll('.reveal').forEach(function (el) { el.classList.add('in'); });
}

// ---------- Filtrowanie kart (client-side) ----------
// Wszystkie karty renderuje PHP raz; filtry, wyszukiwarka, sortowanie i nawigacja
// archiwum działają na tych samych węzłach DOM przez atrybuty data-*, bez przeładowań.
function initCardFilters(config) {
  var grid = document.querySelector(config.gridSelector);
  if (!grid) return;
  var cards = Array.prototype.slice.call(grid.children);
  var emptyState = document.querySelector(config.emptyStateSelector);
  var controls = document.querySelectorAll(config.controlsSelector);
  var archiveState = { year: null, month: null };

  function matches(card, values) {
    if (archiveState.year && card.getAttribute('data-year') !== archiveState.year) return false;
    if (archiveState.month && card.getAttribute('data-month') !== archiveState.month) return false;

    for (var key in values) {
      var val = values[key];
      if (!val) continue;
      var attr = card.getAttribute('data-' + key);
      if (attr === null) return false;
      if (key === 'name' || key === 'q') {
        if (attr.indexOf(val) === -1) return false;
      } else if (key === 'from') {
        if (attr < val) return false;
      } else if (key === 'to') {
        if (attr > val) return false;
      } else {
        if (attr.split(' ').indexOf(val) === -1) return false;
      }
    }
    return true;
  }

  function readValues() {
    var values = {};
    controls.forEach(function (el) {
      var key = el.getAttribute('data-filter-key');
      values[key] = el.value.trim().toLowerCase();
    });
    return values;
  }

  function apply() {
    var values = readValues();
    var visibleCount = 0;
    cards.forEach(function (card) {
      var visible = matches(card, values);
      card.hidden = !visible;
      if (visible) visibleCount++;
    });
    if (emptyState) emptyState.hidden = visibleCount !== 0;
  }

  controls.forEach(function (el) {
    el.addEventListener('input', apply);
    el.addEventListener('change', apply);
  });

  if (config.sortSelector) {
    var sortSelect = document.querySelector(config.sortSelector);
    if (sortSelect) {
      sortSelect.addEventListener('change', function () {
        var raw = sortSelect.value;
        if (!raw) {
          cards.forEach(function (card) { grid.appendChild(card); });
          return;
        }
        var dir = sortSelect.selectedOptions[0].getAttribute('data-dir') || 'asc';
        var key = raw;
        var sorted = cards.slice().sort(function (a, b) {
          var av = a.getAttribute('data-' + key) || '';
          var bv = b.getAttribute('data-' + key) || '';
          var cmp = isNaN(av) || isNaN(bv) || av === '' || bv === ''
            ? av.localeCompare(bv)
            : (av - bv);
          return dir === 'desc' ? -cmp : cmp;
        });
        sorted.forEach(function (card) { grid.appendChild(card); });
      });
    }
  }

  // Nawigacja archiwum (rok/miesiąc) — kolejna faseta tego samego filtra, nie osobny kod
  if (config.archiveNavSelector) {
    var nav = document.querySelector(config.archiveNavSelector);
    if (nav) {
      var buttons = Array.prototype.slice.call(nav.querySelectorAll('button'));
      buttons.forEach(function (btn) {
        btn.addEventListener('click', function () {
          var wasActive = btn.classList.contains('active');
          buttons.forEach(function (b) { b.classList.remove('active'); });
          if (wasActive) {
            archiveState = { year: null, month: null };
          } else {
            btn.classList.add('active');
            archiveState = { year: btn.getAttribute('data-year'), month: btn.getAttribute('data-month') };
          }
          apply();
        });
      });
    }
  }

  // Deep-link z parametrów URL (np. zespol.php?obszar=ip)
  var params = new URLSearchParams(window.location.search);
  var applied = false;
  controls.forEach(function (el) {
    var param = el.getAttribute('data-url-param');
    if (param && params.has(param)) {
      el.value = params.get(param);
      applied = true;
    }
  });
  apply();
  if (applied) grid.scrollIntoView({ block: 'start' });
}

document.addEventListener('DOMContentLoaded', function () {
  if (document.querySelector('#lawyer-grid')) {
    initCardFilters({
      gridSelector: '#lawyer-grid',
      controlsSelector: '#lawyer-filters [data-filter-key]',
      emptyStateSelector: '#lawyer-empty',
      sortSelector: '#lawyer-sort',
    });
  }
  if (document.querySelector('#insights-grid')) {
    initCardFilters({
      gridSelector: '#insights-grid',
      controlsSelector: '#insights-filters [data-filter-key]',
      emptyStateSelector: '#insights-empty',
      archiveNavSelector: '#archive-nav',
    });
  }
});
