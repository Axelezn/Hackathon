<!-- <!DOCTYPE html>
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
        <input type="tel" name="num_tel" placeholder="Numéro de téléphone" required><br>
        <input type="password" name="mdp" placeholder="Mot de passe" required><br>
        <button type="submit">S'inscrire</button>
    </form>
    <p>Déjà un compte ? <a href="index.php?action=signin">Connectez-vous</a></p>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>
 -->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - ZIP</title>
    <link rel="stylesheet" href="assets/styles/signup.css">
</head>
<body>
    <div class="overlay"></div>
    <div class="login-container">
        <div class="logo">
            <img src="assets/login-image.jpg" alt="Logo ZIP" width="50" height="50">
            ZIP
        </div>
        <h2 class="connection-title">S'inscrire</h2>
        <form>
            <div class="form-group">
                <label for="Nom">Nom</label>
                <input type="text" id="Nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="Prenom">Prénom</label>
                <input type="text" id="Prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <select id="genre" name="sexe">
                    <option value="">Sexe</option>
                    <option value="M">Homme</option>
                    <option value="F">Femme</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>
            <div class="form-group">
                <label for="adresse">adresse</label>
                <input type="text" id="adresse" name="adresse" required>
            </div>
            <div class="form-group">
                <label for="email">Adresse mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="mdp" required>
            </div>
            <div class="form-group">
                <label for="num_tel">Numéro de téléphone</label>
                <input type="text" id="tel" name="num_tel" required>
            </div>
            <button type="submit" class="login-button">S'inscrire</button>
        </form>
        <p>Déjà un compte ? <a href="index.php?action=signin">Connectez-vous</a></p>
        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    </div>
</body>
</html>