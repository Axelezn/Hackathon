<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Modifier le profil</title>
  <link rel="stylesheet" href="assets/styles/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    .container {
      padding: 20px;
    }

    .form-title {
      font-size: 24px;
      margin-bottom: 20px;
      text-align: center;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: 600;
    }

    .form-group input, .form-group select {
      width: 100%;
      padding: 10px;
      border-radius: 10px;
      border: 1px solid #ccc;
    }

    .submit-btn {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
    }

    .submit-btn:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="form-title">Modifier mes informations</h2>
    <form method="POST" action="index.php?action=edit_profile">
      <div class="form-group">
        <label>Nom</label>
        <input type="text" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>
      </div>
      <div class="form-group">
        <label>Prénom</label>
        <input type="text" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required>
      </div>
      <div class="form-group">
        <label>Sexe</label>
        <select name="sexe" required>
          <option value="Homme" <?= $user['sexe'] === 'Homme' ? 'selected' : '' ?>>Homme</option>
          <option value="Femme" <?= $user['sexe'] === 'Femme' ? 'selected' : '' ?>>Femme</option>
          <option value="Autre" <?= $user['sexe'] === 'Autre' ? 'selected' : '' ?>>Autre</option>
        </select>
      </div>
      <div class="form-group">
        <label>Adresse</label>
        <input type="text" name="adresse" value="<?= htmlspecialchars($user['adresse']) ?>" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
      </div>
      <div class="form-group">
        <label>Téléphone</label>
        <input type="text" name="num_tel" value="<?= htmlspecialchars($user['num_tel']) ?>" required>
      </div>
      <button type="submit" class="submit-btn">Enregistrer les modifications</button>
    </form>
  </div>
</body>
</html>
