<h2>Réserver avec <?= htmlspecialchars($barber['prenom']) ?> <?= htmlspecialchars($barber['nom']) ?></h2>

<form action="index.php?action=confirm_booking" method="POST">
  <input type="hidden" name="barber_id" value="<?= $barber['id'] ?>">

  <label for="jour">Jour :</label>
  <select name="jour" required>
    <?php foreach ($planning as $jour => $horaires): ?>
      <option value="<?= $jour ?>"><?= $jour ?></option>
    <?php endforeach; ?>
  </select>

  <label for="heure">Heure :</label>
  <select name="heure" required>
    <?php foreach ($planning as $jour => $horaires): ?>
      <?php foreach ($horaires as $heure): ?>
        <option value="<?= $heure ?>"><?= $heure ?></option>
      <?php endforeach; ?>
    <?php endforeach; ?>
  </select>

  <button type="submit">Confirmer le rendez-vous</button>
</form>
