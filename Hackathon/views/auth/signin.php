<!-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="mdp" placeholder="Mot de passe" required><br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html> -->



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - ZIP</title>
    <link rel="stylesheet" href="assets/styles/login.css">
</head>
<body>
    <div class="overlay"></div>
    <div class="login-container">
        <div class="logo">
            <img src="assets/login-image.jpg" alt="Logo ZIP" width="50" height="50">
            ZIP
        </div>
        <h2 class="connection-title">CONNEXION</h2>
        <form method="POST">
            <div class="form-group">
                <label for="email">Adresse mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="mdp" required>
            </div>
            <button type="submit" class="login-button">Se connecter</button>
        </form>
        <!-- <a href="#" class="forgot-password">Mot de passe oublié ?</a> -->
        <!-- <p class="register-link">Pas encore de compte ? <a href="#">Inscrivez-vous</a></p> -->
        <p>Pas encore inscrit ? <a href="index.php?action=signup">Créer un compte</a></p>
        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    </div>
</body>
</html>