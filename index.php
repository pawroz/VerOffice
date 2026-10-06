<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/functions.php';
$latestArticles = array_slice(get_articles(), 0, 2);
$aboutLead = get_about_paragraphs(ABOUT_LEAD_COUNT);
$trainingsOffer = get_trainings_offer();
$latestTrainings = get_trainings(2);
require __DIR__ . '/includes/header.php';
?>

<section id="home" class="hero">
  <div class="grid-hero">
    <div data-reveal>
      <h1 class="hero-title">PRAWO.<br>ZAUFANIE.<br>SKUTECZNOŚĆ.</h1>
      <p class="hero-lead">Profesjonalna pomoc prawna dla Ciebie i Twojej firmy. Skutecznie rozwiązujemy złożone problemy prawne.</p>
      <div class="hero-actions">
        <a href="#contact" class="btn btn-gold" data-scroll-to="contact">Umów Konsultację</a>
        <a href="#about" class="hero-more" data-scroll-to="about">Dowiedz się więcej
          <svg width="20" height="14" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12h16M14 6l6 6-6 6"></path></svg>
        </a>
      </div>
    </div>
    <div class="hero-portrait" data-reveal data-reveal-delay="120">
      <div class="hero-portrait-frame">
        <picture>
          <source srcset="/assets/img/weronika-lesna-prawnik.webp" type="image/webp">
          <img src="/assets/img/weronika-lesna-prawnik.jpg" width="920" height="1380" alt="<?= h(FIRM_LAWYER_NAME) ?> — Kancelaria Prawna w Kaliszu" fetchpriority="high" decoding="async">
        </picture>
      </div>
    </div>
  </div>
</section>

<section id="about" class="about">
  <div class="grid-about">
    <div class="about-portrait" data-reveal>
      <picture>
        <source type="image/webp" srcset="/assets/img/weronika-lesna-o-mnie.webp 720w, /assets/img/weronika-lesna-o-mnie-1024.webp 1024w" sizes="(max-width: 1024px) 100vw, 420px">
        <img src="/assets/img/weronika-lesna-o-mnie.jpg" srcset="/assets/img/weronika-lesna-o-mnie.jpg 720w, /assets/img/weronika-lesna-o-mnie-1024.jpg 1024w" sizes="(max-width: 1024px) 100vw, 420px" width="720" height="1080" alt="<?= h(FIRM_LAWYER_NAME) ?> — prawnik, obsługa prawna przedsiębiorców" loading="lazy" decoding="async">
      </picture>
    </div>
    <div data-reveal data-reveal-delay="90">
      <h2 class="section-title">O mnie</h2>
      <div class="divider-gold"></div>
      <div class="about-bio about-text about-text--justify">
        <?php foreach ($aboutLead as $paragraph): ?>
          <p><?= h($paragraph) ?></p>
        <?php endforeach; ?>
      </div>
      <a href="/o-mnie" class="btn-outline">Czytaj więcej</a>
    </div>
    <div class="about-features" data-reveal data-reveal-delay="180">
      <div class="feature-row">
        <svg class="feature-icon" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="5"></circle><path d="M8.5 12.5 7 21l5-3 5 3-1.5-8.5"></path></svg>
        <div>
          <h4 class="feature-title">Doświadczenie</h4>
          <p class="feature-desc">Kilkuletnia praktyka w obsłudze prawnej przedsiębiorców.</p>
        </div>
      </div>
      <div class="feature-row">
        <svg class="feature-icon" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"></circle><path d="M4 20c0-3.6 3.6-6 8-6s8 2.4 8 6"></path></svg>
        <div>
          <h4 class="feature-title">Indywidualne podejście</h4>
          <p class="feature-desc">Każda sprawa jest dla mnie priorytetem.</p>
        </div>
      </div>
      <div class="feature-row">
        <svg class="feature-icon" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><path d="M7 4h10v5a5 5 0 0 1-10 0V4Z"></path><path d="M7 5H4v1.5a3 3 0 0 0 3 3M17 5h3v1.5a3 3 0 0 1-3 3M10 15v3M14 15v3M8 21h8"></path></svg>
        <div>
          <h4 class="feature-title">Skuteczność</h4>
          <p class="feature-desc">Skupiam się na osiąganiu najlepszych rezultatów.</p>
        </div>
      </div>
      <div class="feature-row">
        <svg class="feature-icon" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="11" width="14" height="9" rx="1.5"></rect><path d="M8 11V8a4 4 0 0 1 8 0v3"></path></svg>
        <div>
          <h4 class="feature-title">Dyskrecja</h4>
          <p class="feature-desc">Zachowuję pełną poufność na każdym etapie współpracy.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="spec" class="spec">
  <div class="spec-wrap">
    <h2 class="section-title section-title--center section-title--on-dark" data-reveal>Specjalizacje</h2>
    <div class="divider-gold divider-gold--center" data-reveal></div>
    <div class="grid-spec" data-reveal data-reveal-delay="80">
      <div class="spec-card">
        <svg class="spec-icon" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="7" width="18" height="13" rx="1.5"></rect><path d="M8 7V5.4A2 2 0 0 1 10 3.4h4a2 2 0 0 1 2 2V7M3 12.5h18"></path></svg>
        <h4 class="spec-title">Obsługa przedsiębiorców</h4>
        <p class="spec-desc">Stałe doradztwo i bieżące sprawy związane z prowadzeniem działalności.</p>
        <a href="#contact" class="link-arrow link-arrow--gold" data-scroll-to="contact">Dowiedz się więcej →</a>
      </div>
      <div class="spec-card">
        <svg class="spec-icon" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3h8l4 4v14H6z"></path><path d="M14 3v4h4M9 12h6M9 16h6"></path></svg>
        <h4 class="spec-title">Umowy</h4>
        <p class="spec-desc">Przygotowanie, negocjowanie i analiza umów oraz dokumentacji.</p>
        <a href="#contact" class="link-arrow link-arrow--gold" data-scroll-to="contact">Dowiedz się więcej →</a>
      </div>
      <div class="spec-card">
        <svg class="spec-icon" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 4v16M7 20h10M12 6.2 5 9M5 9l-2.4 5a2.7 2.7 0 0 0 4.8 0L5 9M12 6.2 19 9M19 9l-2.4 5a2.7 2.7 0 0 0 4.8 0L19 9"></path></svg>
        <h4 class="spec-title">Prawo cywilne</h4>
        <p class="spec-desc">Roszczenia i odszkodowania, wezwania do zapłaty oraz polubowne rozwiązywanie sporów.</p>
        <a href="#contact" class="link-arrow link-arrow--gold" data-scroll-to="contact">Dowiedz się więcej →</a>
      </div>
      <div class="spec-card">
        <svg class="spec-icon" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11 12 4l9 7"></path><path d="M5 10v10h14V10"></path><path d="M10 20v-6h4v6"></path></svg>
        <h4 class="spec-title">Nieruchomości i inwestycje</h4>
        <p class="spec-desc">Nabywanie i sprzedaż nieruchomości, najem, procesy inwestycyjne i budowlane oraz zarządzanie nieruchomościami.</p>
        <a href="#contact" class="link-arrow link-arrow--gold" data-scroll-to="contact">Dowiedz się więcej →</a>
      </div>
      <div class="spec-card">
        <svg class="spec-icon" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h11v10H3z"></path><path d="M14 9h4l3 3.5V16h-7"></path><circle cx="7" cy="17.5" r="1.8"></circle><circle cx="17.5" cy="17.5" r="1.8"></circle></svg>
        <h4 class="spec-title">Transport i spedycja</h4>
        <p class="spec-desc">Umowy przewozu i spedycji, odpowiedzialność przewoźników i spedytorów, roszczenia i reklamacje w branży TSL.</p>
        <a href="#contact" class="link-arrow link-arrow--gold" data-scroll-to="contact">Dowiedz się więcej →</a>
      </div>
    </div>
  </div>
</section>

<section id="contact" class="contact">
  <div class="grid-contact">
    <div class="contact-left" data-reveal>
      <h2 class="section-title section-title--sm">Kontakt</h2>
      <div class="divider-gold"></div>

      <div class="contact-row contact-row--top">
        <svg class="contact-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s7-5.5 7-11a7 7 0 0 0-14 0c0 5.5 7 11 7 11Z"></path><circle cx="12" cy="10" r="2.5"></circle></svg>
        <p class="contact-text contact-text--address"><?= h(FIRM_ADDRESS_LINE1) ?><br><?= h(FIRM_ADDRESS_LINE2) ?></p>
      </div>
      <div class="contact-row">
        <svg class="contact-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 4h4l2 5-2.5 1.5a12 12 0 0 0 5 5L16 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2Z"></path></svg>
        <p class="contact-text"><a href="tel:<?= h(preg_replace('/\s+/', '', FIRM_PHONE)) ?>" class="contact-text"><?= h(FIRM_PHONE) ?></a></p>
      </div>
      <div class="contact-row">
        <svg class="contact-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="1.5"></rect><path d="m3 7 9 6 9-6"></path></svg>
        <p class="contact-text"><a href="mailto:<?= h(FIRM_EMAIL) ?>" class="contact-text"><?= h(FIRM_EMAIL) ?></a></p>
      </div>
      <div class="contact-row contact-row--top" style="margin-bottom:38px">
        <svg class="contact-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"></circle><path d="M12 7v5l3 2"></path></svg>
        <p class="contact-text contact-text--address"><?= h(FIRM_AVAILABILITY) ?></p>
      </div>

      <button type="button" class="btn btn-dark" data-open-contact>Napisz wiadomość</button>
    </div>

    <div class="booking-panel">
      <div data-reveal>
        <h3 class="booking-title">Umów spotkanie</h3>
        <p class="booking-lead">Wybierz dogodny termin konsultacji. Spotkanie może odbyć się stacjonarnie lub online.</p>
        <button type="button" class="btn btn-gold" id="bookBtn">Zarezerwuj termin</button>
        <p class="booking-result" id="bookingResult"></p>
      </div>
      <div data-reveal data-reveal-delay="100">
        <div class="cal-nav">
          <button type="button" class="cal-arrow" id="calPrevBtn" aria-label="Poprzedni miesiąc"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 6-6 6 6 6"></path></svg></button>
          <span class="cal-month" id="calMonthLabel"></span>
          <button type="button" class="cal-arrow" id="calNextBtn" aria-label="Następny miesiąc"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 6 6 6-6 6"></path></svg></button>
        </div>
        <div class="cal-weekdays">
          <span class="cal-weekday">PON</span><span class="cal-weekday">WT</span><span class="cal-weekday">ŚR</span>
          <span class="cal-weekday">CZW</span><span class="cal-weekday">PT</span><span class="cal-weekday">SOB</span><span class="cal-weekday">NIEDZ</span>
        </div>
        <div class="cal-grid" id="calGrid"></div>
        <div class="cal-divider"></div>
        <div class="hours-row">
          <span class="hours-label">Dostępne godziny:</span>
          <button type="button" class="hour-chip" data-hour="10:00">10:00</button>
          <button type="button" class="hour-chip" data-hour="12:00">12:00</button>
          <button type="button" class="hour-chip" data-hour="15:00">15:00</button>
          <button type="button" class="hour-chip" data-hour="17:00">17:00</button>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="media" class="media">
  <div class="grid-media">
    <div data-reveal>
      <h2 class="section-title section-title--xs">Blog prawniczy</h2>
      <?php foreach ($latestArticles as $article): ?>
        <?php require __DIR__ . '/includes/partials/article-card.php'; ?>
      <?php endforeach; ?>
      <a href="/blog" class="link-underline">Zobacz wszystkie artykuły →</a>
    </div>
    <div class="media-right" id="szkolenia" data-reveal data-reveal-delay="100">
      <h2 class="section-title section-title--xs">Szkolenia</h2>
      <p class="trainings-lead"><?= h($trainingsOffer['lead']) ?></p>
      <ul class="tag-list">
        <?php foreach ($trainingsOffer['topics'] as $topic): ?>
          <li><?= h($topic) ?></li>
        <?php endforeach; ?>
      </ul>
      <?php foreach ($latestTrainings as $training): ?>
        <?php require __DIR__ . '/includes/partials/training-item.php'; ?>
      <?php endforeach; ?>
      <a href="/szkolenia" class="link-underline">Więcej o szkoleniach →</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
