<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Coiffeurs</title>
</head>
<body>
    <h1>Nos coiffeurs</h1>
    <ul>
        <?php foreach ($coiffeurs as $coiffeur): ?>
            <li>
                <?= htmlspecialchars($coiffeur['prenom'] . ' ' . $coiffeur['nom']) ?> -
                <?= htmlspecialchars($coiffeur['adresse']) ?> -
                <?= htmlspecialchars($coiffeur['tarif']) ?> €
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
