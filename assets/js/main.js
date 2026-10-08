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
      var id = el.getAttribute('data-scroll-to');
      // On the homepage the target section is in the DOM — smooth-scroll to
      // it. On any other page it isn't, so let the link's href (which
      // already points to /#id) navigate there normally.
      if (document.getElementById(id)) {
        e.preventDefault();
        scrollToId(id);
      }
    });
  });

  /* ---------- Scroll-spy nav highlighting (homepage only) ---------- */
  var sections = ['home', 'about', 'spec', 'contact', 'media'];
  var navEls = Array.from(document.querySelectorAll('[data-nav]'));

  function updateActiveNav() {
    if (!document.getElementById('home')) return;
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

  /* ---------- Contact modal ---------- */
  var contactModal = document.getElementById('contactModal');
  var contactModalBox = document.getElementById('contactModalBox');
  var modalCloseBtn = document.getElementById('modalCloseBtn');
  var modalCloseBtn2 = document.getElementById('modalCloseBtn2');
  var contactForm = document.getElementById('contactForm');

  var cfTitle = document.getElementById('cfTitle');
  var cfBooking = document.getElementById('cfBooking');
  var cfBookingLabel = document.getElementById('cfBookingLabel');
  var cfBookingDate = document.getElementById('cf-booking-date');
  var cfBookingHour = document.getElementById('cf-booking-hour');
  var cfSuccessDesc = document.getElementById('cfSuccessDesc');
  var cfSubmitBtn = document.getElementById('cfSubmitBtn');

  // booking: null (zwykła wiadomość) albo { date: 'RRRR-MM-DD', hour: 'GG:MM', label: '…' }
  // z kalendarza „Umów spotkanie” — ten sam formularz, ta sama wysyłka.
  function openContactModal(booking) {
    var isBooking = !!booking;
    cfTitle.textContent = isBooking ? 'Prośba o termin konsultacji' : 'Napisz wiadomość';
    cfBooking.hidden = !isBooking;
    cfBookingLabel.textContent = isBooking ? booking.label : '';
    cfBookingDate.value = isBooking ? booking.date : '';
    cfBookingHour.value = isBooking ? booking.hour : '';
    cfSubmitBtn.textContent = isBooking ? 'Wyślij prośbę o termin' : 'Wyślij wiadomość';
    cfSuccessDesc.textContent = isBooking
      ? 'Prośba o termin została wysłana. Potwierdzę go mailowo lub telefonicznie.'
      : 'Wiadomość została wysłana. Odpowiem najszybciej, jak to możliwe.';
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

  // The modal lives in the shared footer, so any page can open it with a
  // [data-open-contact] trigger (homepage contact section, /szkolenia CTA).
  document.querySelectorAll('[data-open-contact]').forEach(function (btn) {
    btn.addEventListener('click', function () { openContactModal(null); });
  });
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
    var phone = document.getElementById('cf-phone').value.trim();
    var msg = document.getElementById('cf-msg').value.trim();
    var emailOk = /^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email);
    var phoneOk = phone === '' || /^[+()\d\s-]{7,20}$/.test(phone);

    var hasError = false;
    if (!name) { document.getElementById('cf-name-error').classList.add('is-visible'); hasError = true; }
    if (!emailOk) { document.getElementById('cf-email-error').classList.add('is-visible'); hasError = true; }
    if (!phoneOk) { document.getElementById('cf-phone-error').classList.add('is-visible'); hasError = true; }
    if (!msg) { document.getElementById('cf-msg-error').classList.add('is-visible'); hasError = true; }
    if (hasError) return;

    var submitBtn = cfSubmitBtn;
    submitBtn.disabled = true;
    var wasBooking = cfBookingDate.value !== '';

    fetch('/send-message.php', { method: 'POST', body: new FormData(contactForm) })
      .then(function (r) { return r.json(); })
      .then(function (data) {
        if (data && data.success) {
          contactModalBox.classList.add('is-sent');
          if (wasBooking) document.dispatchEvent(new CustomEvent('booking:sent'));
        } else {
          document.getElementById('cf-server-error').classList.add('is-visible');
        }
      })
      .catch(function () {
        document.getElementById('cf-server-error').classList.add('is-visible');
      })
      .finally(function () {
        submitBtn.disabled = false;
      });
  });

  /* ---------- Booking calendar → prośba o termin przez formularz kontaktowy ---------- */
  /* Nie rezerwuje terminu — wysyła prośbę, którą Weronika potwierdza ręcznie. */
  /* Only present on the homepage contact section — guard the whole block. */
  var calGrid = document.getElementById('calGrid');
  if (calGrid) initBookingCalendar();

  function initBookingCalendar() {
  var MONTHS_LOWER = ['stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca', 'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia'];
  var MONTHS_CAPS = ['STYCZEŃ', 'LUTY', 'MARZEC', 'KWIECIEŃ', 'MAJ', 'CZERWIEC', 'LIPIEC', 'SIERPIEŃ', 'WRZESIEŃ', 'PAŹDZIERNIK', 'LISTOPAD', 'GRUDZIEŃ'];

  var today = new Date();
  today.setHours(0, 0, 0, 0);
  var cal = {
    month: today.getMonth(),
    year: today.getFullYear(),
    selected: null,
    selectedHour: null,
  };

  var calMonthLabel = document.getElementById('calMonthLabel');
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

  // Do wyboru: dni robocze od jutra (dziś i weekendy wyłączone).
  function isBookable(year, month, day) {
    var date = new Date(year, month, day);
    var weekday = date.getDay();
    return date > today && weekday !== 0 && weekday !== 6;
  }

  function pad(n) { return (n < 10 ? '0' : '') + n; }

  function resetResult() {
    bookingResult.textContent = '';
    bookingResult.className = 'booking-result';
  }

  function renderCalendar() {
    calMonthLabel.textContent = MONTHS_CAPS[cal.month] + ' ' + cal.year;
    calPrevBtn.disabled = cal.year === today.getFullYear() && cal.month === today.getMonth();
    calGrid.innerHTML = '';
    buildCells(cal.year, cal.month).forEach(function (cell) {
      var btn = document.createElement('button');
      btn.type = 'button';
      btn.textContent = String(cell.dayNum);
      var bookable = cell.inMonth && isBookable(cal.year, cal.month, cell.dayNum);
      var isSelected = cell.inMonth && cal.selected &&
        cal.selected.d === cell.dayNum && cal.selected.m === cal.month && cal.selected.y === cal.year;
      btn.className = 'cal-cell' + (!bookable ? ' cal-cell--muted' : '') + (isSelected ? ' cal-cell--selected' : '');
      if (bookable) {
        btn.addEventListener('click', function () {
          cal.selected = { d: cell.dayNum, m: cal.month, y: cal.year };
          resetResult();
          renderCalendar();
        });
      } else {
        btn.disabled = true;
      }
      calGrid.appendChild(btn);
    });
  }

  calPrevBtn.addEventListener('click', function () {
    cal.month = cal.month === 0 ? 11 : cal.month - 1;
    cal.year = cal.month === 11 ? cal.year - 1 : cal.year;
    renderCalendar();
  });
  calNextBtn.addEventListener('click', function () {
    cal.month = cal.month === 11 ? 0 : cal.month + 1;
    cal.year = cal.month === 0 ? cal.year + 1 : cal.year;
    renderCalendar();
  });

  hourChips.forEach(function (chip) {
    chip.addEventListener('click', function () {
      cal.selectedHour = chip.getAttribute('data-hour');
      hourChips.forEach(function (c) { c.classList.toggle('hour-chip--selected', c === chip); });
      resetResult();
    });
  });

  bookBtn.addEventListener('click', function () {
    if (!cal.selected || !cal.selectedHour) {
      bookingResult.textContent = 'Wybierz w kalendarzu dzień i godzinę spotkania.';
      bookingResult.className = 'booking-result is-fail';
      return;
    }
    var s = cal.selected;
    openContactModal({
      date: s.y + '-' + pad(s.m + 1) + '-' + pad(s.d),
      hour: cal.selectedHour,
      label: s.d + ' ' + MONTHS_LOWER[s.m] + ' ' + s.y + ', godz. ' + cal.selectedHour,
    });
  });

  document.addEventListener('booking:sent', function () {
    bookingResult.textContent = 'Prośba o termin wysłana — potwierdzę go mailowo lub telefonicznie.';
    bookingResult.className = 'booking-result is-ok';
  });

  renderCalendar();
  } // end initBookingCalendar
})();
