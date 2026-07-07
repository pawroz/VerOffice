<?php
require __DIR__ . '/includes/functions.php';

$lawyer = get_lawyer((string) ($_GET['id'] ?? ''));

if ($lawyer === null) {
    http_response_code(404);
    $activeNav = 'zespol';
    $pageTitle = 'Nie znaleziono — Kancelaria [Nazwa]';
    require __DIR__ . '/includes/header.php';
    ?>
    <section>
      <div class="wrap static-page">
        <h1>Nie znaleziono prawnika</h1>
        <p>Profil, którego szukasz, nie istnieje lub został przeniesiony.</p>
        <a href="zespol.php" class="btn btn-ghost">Wróć do zespołu →</a>
      </div>
    </section>
    <?php
    require __DIR__ . '/includes/footer.php';
    exit;
}

$activeNav = 'zespol';
$pageTitle = $lawyer['name'] . ' — Kancelaria [Nazwa]';
$office = get_office($lawyer['office']);

require __DIR__ . '/includes/header.php';
?>

<section>
  <div class="wrap profile-layout">
    <div class="profile-photo reveal">
      <div class="photo-placeholder" style="width:100%;height:100%;">[zdjęcie]</div>
    </div>

    <div class="reveal">
      <div class="profile-header">
        <h1><?= h($lawyer['name']) ?></h1>
        <p class="profile-position"><?= h(position_label($lawyer['position'])) ?> · <?= h($office['name']) ?></p>
        <div class="tag-row">
          <?php foreach ($lawyer['practice_areas'] as $slug): ?>
            <a href="zespol.php?obszar=<?= h($slug) ?>"><?php require __DIR__ . '/includes/partials/practice-tag.php'; ?></a>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="profile-actions">
        <a href="index.php?prawnik=<?= h($lawyer['id']) ?>#asystent" class="btn btn-primary">Skontaktuj się</a>
        <a href="vcard.php?id=<?= h($lawyer['id']) ?>" class="btn btn-ghost">Pobierz vCard</a>
      </div>

      <div class="profile-section">
        <h2>Biogram</h2>
        <p><?= h($lawyer['bio']) ?></p>
      </div>

      <?php if (!empty($lawyer['matters'])): ?>
        <div class="profile-section">
          <h2>Wybrane sprawy i transakcje</h2>
          <ul>
            <?php foreach ($lawyer['matters'] as $matter): ?>
              <li><?= h($matter) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <?php if (!empty($lawyer['publications'])): ?>
        <div class="profile-section">
          <h2>Publikacje i wystąpienia</h2>
          <ul>
            <?php foreach ($lawyer['publications'] as $pub): ?>
              <li><?= h($pub['title']) ?> — <?= h($pub['venue']) ?>, <?= h((string) $pub['year']) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <?php if (!empty($lawyer['awards'])): ?>
        <div class="profile-section">
          <h2>Wyróżnienia</h2>
          <ul>
            <?php foreach ($lawyer['awards'] as $award): ?>
              <li><?= h($award) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <div class="profile-section">
        <h2>Kontakt i biuro</h2>
        <dl class="contact-list">
          <dt>E-mail</dt>
          <dd><a href="mailto:<?= h($lawyer['email']) ?>"><?= h($lawyer['email']) ?></a></dd>
          <dt>Telefon</dt>
          <dd><a href="tel:<?= h(preg_replace('/[^+\d]/', '', $lawyer['phone'])) ?>"><?= h($lawyer['phone']) ?></a></dd>
          <dt>Biuro</dt>
          <dd><?= h($office['name']) ?> — <?= h($office['address']) ?></dd>
        </dl>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
