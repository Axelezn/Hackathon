<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form method="POST">
        <input type="text" name="nom" placeholder="Nom" required><br>
        <input type="text" name="prenom" placeholder="Prénom" required><br>
        <select name="sexe" required>
            <option value="">Sexe</option>
            <option value="M">Homme</option>
            <option value="F">Femme</option>
            <option value="Autre">Autre</option>
        </select><br>
        <input type="text" name="adresse" placeholder="Adresse" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="tel" name="tel" placeholder="Numéro de téléphone" required><br>
        <input type="password" name="mdp" placeholder="Mot de passe" required><br>
        <button type="submit">S'inscrire</button>
    </form>
    <p>Déjà un compte ? <a href="index.php?action=signin">Connectez-vous</a></p>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>
