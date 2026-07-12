<?php
declare(strict_types=1);
$homePrefix = $homePrefix ?? '';
$activeStaticNav = $activeStaticNav ?? null;
?>
<footer class="site-footer">
  <div class="grid-footer">
    <div>
      <div class="footer-brand">
        <span class="footer-mark">WL</span>
        <span class="footer-divider"></span>
        <span class="footer-brandtext">
          <span class="footer-name"><?= h(FIRM_LAWYER_NAME) ?></span>
          <span class="footer-tagline">KANCELARIA PRAWNA</span>
        </span>
      </div>
      <p class="footer-desc">Profesjonalna obsługa prawna oparta na zaufaniu, dyskrecji i skuteczności.</p>
    </div>
    <div>
      <h5 class="footer-heading">Szybkie linki</h5>
      <div class="footer-links">
        <a href="<?= h($homePrefix) ?>#about" class="footer-link" data-scroll-to="about">O mnie</a>
        <a href="<?= h($homePrefix) ?>#spec" class="footer-link" data-scroll-to="spec">Specjalizacje</a>
        <a href="<?= h($homePrefix) ?>#spec" class="footer-link" data-scroll-to="spec">Usługi</a>
      </div>
    </div>
    <div>
      <h5 class="footer-heading">&nbsp;</h5>
      <div class="footer-links">
        <a href="/blog" class="footer-link">Blog</a>
        <a href="<?= h($homePrefix) ?>#media" class="footer-link" data-scroll-to="media">Aktualności</a>
        <a href="<?= h($homePrefix) ?>#contact" class="footer-link" data-scroll-to="contact">Kontakt</a>
      </div>
    </div>
    <div>
      <h5 class="footer-heading">Bądźmy w kontakcie</h5>
      <div class="social-row">
        <a href="#" class="social-icon" aria-label="Instagram"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"></rect><path d="M7 10v7M7 7v.01M11 17v-7M15 17v-4a2 2 0 0 0-4 0"></path></svg></a>
        <a href="#" class="social-icon" aria-label="Facebook"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h-2a4 4 0 0 0-4 4v3H6v4h3v7h4v-7h3l1-4h-4V7a1 1 0 0 1 1-1h2z"></path></svg></a>
        <a href="#" class="social-icon" aria-label="LinkedIn"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="5"></rect><circle cx="12" cy="12" r="4"></circle><circle cx="17.2" cy="6.8" r="1"></circle></svg></a>
      </div>
    </div>
  </div>
  <div class="footer-divider-line">
    <div class="footer-bottom">
      <span class="footer-copy">© <?= date('Y') ?> Kancelaria Prawna <?= h(FIRM_LAWYER_NAME) ?>. Wszelkie prawa zastrzeżone.</span>
      <span class="footer-legal">
        <a href="#" class="footer-legal-link">Polityka prywatności</a>
        <a href="#" class="footer-legal-link">Regulamin</a>
      </span>
    </div>
  </div>
</footer>

<div class="mobile-menu" id="mobileMenu">
  <div class="mobile-menu-top">
    <span class="brand-text">
      <span class="brand-name"><?= h(FIRM_LAWYER_NAME) ?></span>
      <span class="brand-tagline">KANCELARIA PRAWNA</span>
    </span>
    <button type="button" class="mobile-close" id="mobileCloseBtn" aria-label="Zamknij menu">×</button>
  </div>
  <nav class="mobile-nav">
    <a href="<?= h($homePrefix) ?>#home" class="mobile-nav-link" data-scroll-to="home" data-close-mobile>Strona Główna</a>
    <a href="<?= h($homePrefix) ?>#about" class="mobile-nav-link" data-scroll-to="about" data-close-mobile>O mnie</a>
    <a href="<?= h($homePrefix) ?>#spec" class="mobile-nav-link" data-scroll-to="spec" data-close-mobile>Specjalizacje</a>
    <a href="<?= h($homePrefix) ?>#spec" class="mobile-nav-link" data-scroll-to="spec" data-close-mobile>Usługi</a>
    <a href="/blog" class="mobile-nav-link" data-close-mobile>Blog</a>
    <a href="<?= h($homePrefix) ?>#media" class="mobile-nav-link" data-scroll-to="media" data-close-mobile>Aktualności</a>
    <a href="<?= h($homePrefix) ?>#contact" class="mobile-nav-link" data-scroll-to="contact" data-close-mobile>Kontakt</a>
  </nav>
  <a href="<?= h($homePrefix) ?>#contact" class="mobile-cta" data-scroll-to="contact" data-close-mobile>Umów Spotkanie</a>
</div>

<div class="modal-overlay" id="contactModal">
  <div class="modal-box" id="contactModalBox">
    <button type="button" class="modal-close" id="modalCloseBtn" aria-label="Zamknij">×</button>

    <div class="modal-success">
      <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" style="margin:0 auto 20px;display:block"><circle cx="12" cy="12" r="10"></circle><path d="m8 12 3 3 5-6"></path></svg>
      <h3 class="modal-title">Dziękujemy</h3>
      <p class="modal-desc">Wiadomość została wysłana. Odpowiemy najszybciej, jak to możliwe.</p>
      <button type="button" class="btn btn-dark" id="modalCloseBtn2">Zamknij</button>
    </div>

    <form class="modal-form" id="contactForm" novalidate>
      <h3 class="modal-title">Napisz wiadomość</h3>
      <div class="divider-gold" style="width:44px"></div>

      <label class="form-label" for="cf-name">Imię i nazwisko</label>
      <input class="form-input" type="text" id="cf-name" name="name" autocomplete="name">
      <p class="form-error" id="cf-name-error">Podaj imię i nazwisko.</p>
      <div class="form-spacer"></div>

      <label class="form-label" for="cf-email">E-mail</label>
      <input class="form-input" type="email" id="cf-email" name="email" autocomplete="email">
      <p class="form-error" id="cf-email-error">Podaj poprawny adres e-mail.</p>
      <div class="form-spacer"></div>

      <label class="form-label" for="cf-msg">Wiadomość</label>
      <textarea class="form-input" id="cf-msg" name="msg" rows="4"></textarea>
      <p class="form-error" id="cf-msg-error">Napisz treść wiadomości.</p>
      <div class="form-spacer--lg"></div>

      <button type="submit" class="btn btn-gold btn-block">Wyślij wiadomość</button>
    </form>
  </div>
</div>

<button type="button" class="back-to-top" id="backToTopBtn" aria-label="Powrót na górę">
  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5"></path><path d="m5 12 7-7 7 7"></path></svg>
</button>

<script src="/assets/js/main.js"></script>
</body>
</html>
