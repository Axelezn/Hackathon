<?php include __DIR__ . '/partials/footer.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ZIP - Activity</title>
  <link rel="stylesheet" href="assets/styles/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
  <div class="booking-form">
    <h2>Réserver avec
      <?php echo htmlspecialchars($barber['prenom']) ?>
      <?php echo htmlspecialchars($barber['nom']) ?>
    </h2>

    <form action="index.php?action=confirm_booking" method="POST">
      <input type="hidden" name="barber_id" value="<?php echo $barber['id'] ?>">

      <label for="type_coupe" class="booking-form-label">Type de coupe :</label>
      <select name="type_coupe" required class="booking-form-select">
        <option value="" disabled selected>Sélectionner un type de coupe</option>
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
        <option value="enfant">Enfant</option>
        <option value="rasage">Rasage</option>
        <option value="entretien_barbe">Entretien de la barbe</option>
      </select>

      <label for="jour" class="booking-form-label">Jour :</label>
      <select name="jour" required class="booking-form-select">
        <option value="" disabled selected>Sélectionner un jour</option>
        <?php foreach ($planning as $jour => $horaires): ?>
          <option value="<?php echo $jour ?>"><?php echo $jour ?></option>
        <?php endforeach; ?>
      </select>

      <label for="heure" class="booking-form-label">Heure :</label>
      <select name="heure" required class="booking-form-select">
        <option value="" disabled selected>Sélectionner une heure</option>
        <?php foreach ($planning as $jour => $horaires): ?>
          <optgroup label="<?php echo $jour ?>">
            <?php foreach ($horaires as $heure): ?>
              <option value="<?php echo $jour ?>|<?php echo $heure ?>"><?php echo $heure ?></option>
            <?php endforeach; ?>
          </optgroup>
        <?php endforeach; ?>
      </select>

      <div class="booking-form-price-adjustment">
        <label for="prix_coupe" class="booking-form-label">Ajuster votre prix :</label>
        <input type="number" name="prix_coupe" step="0.5" min="<?php echo $barber['prix_coupe'] - 1 ?? 0 ?>" value="<?php echo htmlspecialchars($barber['prix_coupe'] ?? '') ?>" class="booking-form-input-number">
      </div>

      <label for="adresse" class="booking-form-label">Adresse</label>
      <input type="text" name="adresse" required class="booking-form-input-text">

      <label for="ville" class="booking-form-label">Ville</label>
      <input type="text" name="ville" required class="booking-form-input-text">

      <button type="submit" class="booking-form-button-submit">Confirmer le rendez-vous</button>
    </form>
  </div>
  <?php include 'views/partials/footer.php'; ?>
</body>
</html>