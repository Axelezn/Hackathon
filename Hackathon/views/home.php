<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenue <?= htmlspecialchars($_SESSION['user']['prenom']) ?> 👋</h1>
    <p>Vous êtes connecté en tant que : <?= htmlspecialchars($_SESSION['user']['email']) ?></p>
    <a href="index.php?action=logout">Se déconnecter</a>
</body>
</html>
