<?php include __DIR__ . '/partials/footer.php'; ?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZIP - Trouvez votre coiffeur</title>
    <link rel="stylesheet" href="assets/styles/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <div class="container">
      <div class="top-bar">
        <div class="logo-container">
          <span class="logo">ZIP</span>
        </div>
      </div>

      <div class="map-container">
        <img
          src="assets/map-assets.png"
          alt="Carte"
          style="width: 100%; height: 100%; object-fit: cover"
        />
      </div>

      <div class="around-you">
        <h2>Autour de vous</h2>
        <div class="barber-list">
        <?php if (!empty($barbers)): ?>
            <?php foreach ($barbers as $barber): ?>
                <div class="barber-item">
                <i class="fas fa-user-circle barber-icon"></i>
                <div class="barber-name"><?= htmlspecialchars($barber['prenom']) ?> <?= htmlspecialchars($barber['nom']) ?></div>
                <div class="barber-details">
                    <?= htmlspecialchars($barber['adresse']) ?><br>
                    Tarif: <?= htmlspecialchars($barber['tarif']) ?> €
                </div>
                </div>
            <?php endforeach; ?>
            <?php else: ?>
            <p>Aucun coiffeur actif pour le moment.</p>
            <?php endif; ?>
        </div>
      </div>

      <div class="search-bar">
        <i class="fas fa-search search-icon"></i>
        <input
          type="text"
          class="search-input"
          placeholder="Search cuts/barbers"
        />
        <button class="now-button">
          Now <i class="fas fa-chevron-down"></i>
        </button>
      </div>

      <div class="options-list">
        <div class="option-item">
          <i class="far fa-bookmark option-icon"></i>
          Choose a saved barber
        </div>
        <div class="option-item">
          <i class="fas fa-map-marker-alt option-icon"></i>
          Set destination on map
        </div>
        <div class="option-item">
          <i class="fas fa-user-plus option-icon"></i>
          Request a cut for someone else
        </div>
      </div>
      </div>
    </div>
  </body>
</html>