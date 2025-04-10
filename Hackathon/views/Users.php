<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Users</title>
</head>
<body>
    <h1>Nos users</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <?= htmlspecialchars($user['prenom'] . ' ' . $user['nom']) ?> -
                <?= htmlspecialchars($user['adresse']) ?> -
                <?= htmlspecialchars($user['tarif']) ?> €
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
