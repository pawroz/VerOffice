<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/functions.php';
$latestArticles = array_slice(get_articles(), 0, 2);
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
        <div class="img-placeholder" role="img" aria-label="Weronika Leśna, radca prawny — portret, format 4:5">portret prawnika · 4:5</div>
      </div>
    </div>
  </div>
</section>

<section id="about" class="about">
  <div class="grid-about">
    <div class="about-portrait" data-reveal>
      <div class="img-placeholder" role="img" aria-label="Wnętrze kancelarii — biurko, notes, detale">biuro · notes · detal</div>
    </div>
    <div data-reveal data-reveal-delay="90">
      <h2 class="section-title">O mnie</h2>
      <div class="divider-gold"></div>
      <p class="about-bio">Jestem radcą prawnym z wieloletnim doświadczeniem w obsłudze klientów indywidualnych oraz biznesowych. Stawiam na rzetelność, dyskrecję i rozwiązania dopasowane do Twoich potrzeb.</p>
      <a href="#contact" class="btn-outline" data-scroll-to="contact">Zobacz więcej</a>
    </div>
    <div class="about-features" data-reveal data-reveal-delay="180">
      <div class="feature-row">
        <svg class="feature-icon" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="5"></circle><path d="M8.5 12.5 7 21l5-3 5 3-1.5-8.5"></path></svg>
        <div>
          <h4 class="feature-title">Doświadczenie</h4>
          <p class="feature-desc">Ponad 10 lat praktyki w różnych dziedzinach prawa.</p>
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
        <svg class="spec-icon" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 4v16M7 20h10M12 6.2 5 9M5 9l-2.4 5a2.7 2.7 0 0 0 4.8 0L5 9M12 6.2 19 9M19 9l-2.4 5a2.7 2.7 0 0 0 4.8 0L19 9"></path></svg>
        <h4 class="spec-title">Prawo cywilne</h4>
        <p class="spec-desc">Sprawy majątkowe, umowy, odszkodowania, spory sądowe.</p>
        <a href="#contact" class="link-arrow link-arrow--gold" data-scroll-to="contact">Dowiedz się więcej →</a>
      </div>
      <div class="spec-card">
        <svg class="spec-icon" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="7" width="18" height="13" rx="1.5"></rect><path d="M8 7V5.4A2 2 0 0 1 10 3.4h4a2 2 0 0 1 2 2V7M3 12.5h18"></path></svg>
        <h4 class="spec-title">Prawo gospodarcze</h4>
        <p class="spec-desc">Obsługa firm, kontrakty handlowe, windykacja, spory gospodarcze.</p>
        <a href="#contact" class="link-arrow link-arrow--gold" data-scroll-to="contact">Dowiedz się więcej →</a>
      </div>
      <div class="spec-card">
        <svg class="spec-icon" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="3.4"></circle><path d="M3 20c0-3 2.7-5 6-5s6 2 6 5"></path><path d="M16 5.2a3.4 3.4 0 0 1 0 5.9M17 15.2c2.1.4 3.9 2.1 3.9 4.8"></path></svg>
        <h4 class="spec-title">Prawo rodzinne</h4>
        <p class="spec-desc">Rozwody, alimenty, podział majątku, opieka nad dziećmi.</p>
        <a href="#contact" class="link-arrow link-arrow--gold" data-scroll-to="contact">Dowiedz się więcej →</a>
      </div>
      <div class="spec-card">
        <svg class="spec-icon" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3h8l4 4v14H6z"></path><path d="M14 3v4h4M9 12h6M9 16h6"></path></svg>
        <h4 class="spec-title">Prawo pracy</h4>
        <p class="spec-desc">Umowy, zwolnienia, spory pracownicze, doradztwo.</p>
        <a href="#contact" class="link-arrow link-arrow--gold" data-scroll-to="contact">Dowiedz się więcej →</a>
      </div>
      <div class="spec-card">
        <svg class="spec-icon" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l7 3v5c0 5-3.5 8-7 10-3.5-2-7-5-7-10V6z"></path><path d="M9 11.5l2 2 4-4"></path></svg>
        <h4 class="spec-title">Prawo karne</h4>
        <p class="spec-desc">Obrona w postępowaniach karnych, reprezentacja pokrzywdzonych.</p>
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
      <div class="contact-row" style="margin-bottom:38px">
        <svg class="contact-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#C6A06A" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"></circle><path d="M12 7v5l3 2"></path></svg>
        <p class="contact-text"><?= h(FIRM_HOURS) ?></p>
      </div>

      <button type="button" class="btn btn-dark" id="openFormBtn">Napisz wiadomość</button>
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
    <div class="media-right" data-reveal data-reveal-delay="100">
      <h2 class="section-title section-title--xs">Aktualności</h2>
      <div class="news-item">
        <div class="news-date"><div class="news-day">14</div><div class="news-month">MAJ</div></div>
        <div>
          <h4 class="news-title">Zmiany w Kodeksie pracy od czerwca 2025</h4>
          <p class="media-desc">Nowe przepisy wprowadzają istotne zmiany dla pracodawców i pracowników. Sprawdź, co się zmienia.</p>
          <a href="#media" class="link-arrow link-arrow--brown" data-scroll-to="media">Czytaj więcej →</a>
        </div>
      </div>
      <div class="news-item">
        <div class="news-date"><div class="news-day">06</div><div class="news-month">MAJ</div></div>
        <div>
          <h4 class="news-title">Nowelizacja przepisów o ochronie danych</h4>
          <p class="media-desc">Omówienie najważniejszych zmian w RODO i ich wpływ na przedsiębiorców.</p>
          <a href="#media" class="link-arrow link-arrow--brown" data-scroll-to="media">Czytaj więcej →</a>
        </div>
      </div>
      <a href="#media" class="link-underline" data-scroll-to="media">Zobacz wszystkie aktualności →</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
