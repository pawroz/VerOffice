(function () {
  'use strict';

  var HEADER_OFFSET = 66;

  function scrollToId(id) {
    var el = document.getElementById(id);
    if (!el) return;
    var y = el.getBoundingClientRect().top + window.scrollY - HEADER_OFFSET;
    window.scrollTo({ top: y, behavior: 'smooth' });
  }

  document.querySelectorAll('[data-scroll-to]').forEach(function (el) {
    el.addEventListener('click', function (e) {
      e.preventDefault();
      scrollToId(el.getAttribute('data-scroll-to'));
    });
  });

  /* ---------- Scroll-spy nav highlighting ---------- */
  var sections = ['home', 'about', 'spec', 'contact', 'media'];
  var navEls = Array.from(document.querySelectorAll('[data-nav]'));

  function updateActiveNav() {
    var y = window.scrollY + 100;
    var current = 'home';
    sections.forEach(function (id) {
      var el = document.getElementById(id);
      if (el && el.offsetTop <= y) current = id;
    });
    navEls.forEach(function (a) {
      a.classList.toggle('is-active', a.getAttribute('data-active') === current);
    });
  }

  /* ---------- Back-to-top ---------- */
  var backToTopBtn = document.getElementById('backToTopBtn');

  function updateBackToTop() {
    backToTopBtn.classList.toggle('is-visible', window.scrollY > 480);
  }

  window.addEventListener('scroll', function () {
    updateActiveNav();
    updateBackToTop();
  }, { passive: true });
  updateActiveNav();
  updateBackToTop();

  backToTopBtn.addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  /* ---------- Reveal on scroll ---------- */
  var revealEls = Array.from(document.querySelectorAll('[data-reveal]'));
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });
    revealEls.forEach(function (el) { io.observe(el); });
  } else {
    revealEls.forEach(function (el) { el.classList.add('is-visible'); });
  }

  /* ---------- Mobile menu ---------- */
  var mobileMenu = document.getElementById('mobileMenu');
  var burgerBtn = document.getElementById('burgerBtn');
  var mobileCloseBtn = document.getElementById('mobileCloseBtn');

  function closeMobileMenu() { mobileMenu.classList.remove('is-open'); }

  burgerBtn.addEventListener('click', function () { mobileMenu.classList.add('is-open'); });
  mobileCloseBtn.addEventListener('click', closeMobileMenu);
  mobileMenu.querySelectorAll('[data-close-mobile]').forEach(function (el) {
    el.addEventListener('click', closeMobileMenu);
  });

  /* ---------- Contact modal (front-end only — see note below) ---------- */
  /*
   * Zgodnie z zakresem tej migracji formularz NIE wysyła wiadomości nigdzie —
   * tylko waliduje i pokazuje ekran "Dziękujemy", identycznie jak w prototypie.
   * Realne wysyłanie e-maila (PHP mail()/SMTP) to osobne zadanie.
   */
  var contactModal = document.getElementById('contactModal');
  var contactModalBox = document.getElementById('contactModalBox');
  var openFormBtn = document.getElementById('openFormBtn');
  var modalCloseBtn = document.getElementById('modalCloseBtn');
  var modalCloseBtn2 = document.getElementById('modalCloseBtn2');
  var contactForm = document.getElementById('contactForm');

  function openContactModal() {
    contactModalBox.classList.remove('is-sent');
    clearFormErrors();
    contactModal.classList.add('is-open');
  }
  function closeContactModal() { contactModal.classList.remove('is-open'); }

  function clearFormErrors() {
    contactForm.querySelectorAll('.form-error').forEach(function (p) {
      p.classList.remove('is-visible');
    });
  }

  openFormBtn.addEventListener('click', openContactModal);
  modalCloseBtn.addEventListener('click', closeContactModal);
  modalCloseBtn2.addEventListener('click', closeContactModal);
  contactModal.addEventListener('click', function (e) {
    if (e.target === contactModal) closeContactModal();
  });

  contactForm.addEventListener('submit', function (e) {
    e.preventDefault();
    clearFormErrors();

    var name = document.getElementById('cf-name').value.trim();
    var email = document.getElementById('cf-email').value.trim();
    var msg = document.getElementById('cf-msg').value.trim();
    var emailOk = /^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email);

    var hasError = false;
    if (!name) { document.getElementById('cf-name-error').classList.add('is-visible'); hasError = true; }
    if (!emailOk) { document.getElementById('cf-email-error').classList.add('is-visible'); hasError = true; }
    if (!msg) { document.getElementById('cf-msg-error').classList.add('is-visible'); hasError = true; }
    if (hasError) return;

    contactModalBox.classList.add('is-sent');
  });

  /* ---------- Booking calendar (front-end only, no backend/Google Calendar) ---------- */
  var MONTHS_LOWER = ['stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca', 'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia'];
  var MONTHS_CAPS = ['STYCZEŃ', 'LUTY', 'MARZEC', 'KWIECIEŃ', 'MAJ', 'CZERWIEC', 'LIPIEC', 'SIERPIEŃ', 'WRZESIEŃ', 'PAŹDZIERNIK', 'LISTOPAD', 'GRUDZIEŃ'];

  var today = new Date();
  var cal = {
    month: today.getMonth(),
    year: today.getFullYear(),
    selected: null,
    selectedHour: null,
  };

  var calMonthLabel = document.getElementById('calMonthLabel');
  var calGrid = document.getElementById('calGrid');
  var calPrevBtn = document.getElementById('calPrevBtn');
  var calNextBtn = document.getElementById('calNextBtn');
  var hourChips = Array.from(document.querySelectorAll('.hour-chip'));
  var bookBtn = document.getElementById('bookBtn');
  var bookingResult = document.getElementById('bookingResult');

  function buildCells(year, month) {
    var start = (new Date(year, month, 1).getDay() + 6) % 7;
    var daysInMonth = new Date(year, month + 1, 0).getDate();
    var daysInPrevMonth = new Date(year, month, 0).getDate();
    var cells = [];
    for (var i = 0; i < 42; i++) {
      var dayNum, inMonth;
      if (i < start) { dayNum = daysInPrevMonth - start + 1 + i; inMonth = false; }
      else if (i < start + daysInMonth) { dayNum = i - start + 1; inMonth = true; }
      else { dayNum = i - start - daysInMonth + 1; inMonth = false; }
      cells.push({ dayNum: dayNum, inMonth: inMonth });
    }
    return cells;
  }

  function renderCalendar() {
    calMonthLabel.textContent = MONTHS_CAPS[cal.month] + ' ' + cal.year;
    calGrid.innerHTML = '';
    buildCells(cal.year, cal.month).forEach(function (cell) {
      var btn = document.createElement('button');
      btn.type = 'button';
      btn.textContent = String(cell.dayNum);
      var isSelected = cell.inMonth && cal.selected &&
        cal.selected.d === cell.dayNum && cal.selected.m === cal.month && cal.selected.y === cal.year;
      btn.className = 'cal-cell' + (!cell.inMonth ? ' cal-cell--muted' : '') + (isSelected ? ' cal-cell--selected' : '');
      if (cell.inMonth) {
        btn.addEventListener('click', function () {
          cal.selected = { d: cell.dayNum, m: cal.month, y: cal.year };
          bookingResult.textContent = '';
          bookingResult.className = 'booking-result';
          renderCalendar();
        });
      }
      calGrid.appendChild(btn);
    });
  }

  calPrevBtn.addEventListener('click', function () {
    cal.month = cal.month === 0 ? 11 : cal.month - 1;
    cal.year = cal.month === 11 ? cal.year - 1 : cal.year;
    bookingResult.textContent = '';
    bookingResult.className = 'booking-result';
    renderCalendar();
  });
  calNextBtn.addEventListener('click', function () {
    cal.month = cal.month === 11 ? 0 : cal.month + 1;
    cal.year = cal.month === 0 ? cal.year + 1 : cal.year;
    bookingResult.textContent = '';
    bookingResult.className = 'booking-result';
    renderCalendar();
  });

  hourChips.forEach(function (chip) {
    chip.addEventListener('click', function () {
      cal.selectedHour = chip.getAttribute('data-hour');
      hourChips.forEach(function (c) { c.classList.toggle('hour-chip--selected', c === chip); });
      bookingResult.textContent = '';
      bookingResult.className = 'booking-result';
    });
  });

  bookBtn.addEventListener('click', function () {
    var inCurrentMonth = cal.selected && cal.selected.m === cal.month && cal.selected.y === cal.year;
    if (!inCurrentMonth || !cal.selectedHour) {
      bookingResult.textContent = 'Wybierz dzień w bieżącym miesiącu oraz godzinę spotkania.';
      bookingResult.className = 'booking-result is-fail';
      return;
    }
    bookingResult.textContent = 'Rezerwacja wstępna: ' + cal.selected.d + ' ' + MONTHS_LOWER[cal.month] + ' ' +
      cal.year + ', godz. ' + cal.selectedHour + '. Potwierdzimy telefonicznie.';
    bookingResult.className = 'booking-result is-ok';
  });

  renderCalendar();
})();
