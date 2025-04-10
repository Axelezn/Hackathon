<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - ZIP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="overlay"></div>
    <div class="login-container">
        <div class="logo">
            <img src="../assets/login-image.jpg" alt="Logo ZIP" width="50" height="50">
            ZIP
        </div>
        <h2 class="connection-title">CONNEXION</h2>
        <form>
            <div class="form-group">
                <label for="Nom">Nom</label>
                <input type="text" id="Nom" name="Nom" required>
            </div>
            <div class="form-group">
                <label for="Prenom">Prénom</label>
                <input type="text" id="Prenom" name="Prenom" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <select id="genre" name="genre">
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                    <option value="non_specifie">Non spécifié</option>
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
                <label for="password">Mot de Passe</label>
                <input type="text" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-button">CONNEXION</button>
        </form>
        <a href="#" class="forgot-password">Mot de passe oublié ?</a>
        <p class="register-link">Pas encore de compte ? <a href="#">Inscrivez-vous</a></p>
    </div>
</body>
</html>