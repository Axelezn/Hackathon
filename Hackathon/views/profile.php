<?php
include __DIR__ . '/partials/footer.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php?action=signin");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/styles/profile.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  <title>Profil</title>
</head>
<body>
    <div class="profile-card">
    <div class="map-header">
        <img src="https://i.imgur.com/O1RmRym.png" alt="Josh" class="avatar">
    </div>
        <div class="info">
            <h2><?= htmlspecialchars($_SESSION['user']['prenom']) ?> <?= htmlspecialchars($_SESSION['user']['nom']) ?></h2>
            <div class="tagline">
                <?= ($_SESSION['user']['etat'] == 1) ? "Coiffeur professionnel" : "Client enregistré" ?>
            </div>
            <div class="badge">
                ✅ <a href="#">Inscrit avec l’email : <?= htmlspecialchars($_SESSION['user']['email']) ?></a>
        </div>
    </div>
    <div class="stats">
        <div class="stat">
        <strong>2,314</strong>
        Cuts
        </div>
        <div class="stat">
        <strong>4.99</strong>
        Rating
        </div>
        <div class="stat">
        <strong>2</strong>
        Years Exp.
        </div>
    </div>
    <div class="achievements">
        <h3>Achievements</h3>
        <div class="badges">
        <div>
            <img src="https://i.imgur.com/zfQ2Uxv.png" alt="Trusted Partner">
            <div style="font-size:12px;">Trusted Partner</div>
        </div>
        <div>
            <img src="https://i.imgur.com/UrxmdGh.png" alt="Certified Pro">
            <div style="font-size:12px;">Certified Professional</div>
        </div>
        </div>
    </div>
    <div class="portfolio">
        <h3>Josh's portfolio</h3>
        <div class="portfolio-preview">
        <div class="preview-box"></div>
        <div class="preview-box"></div>
        </div>
        <a class="btn btn-danger" href="index.php?action=logout">Se déconnecter</a>
        <div class="profile-actions">
    <a href="index.php?action=edit_profile" class="edit-button">Modifier le profil</a>
    
    <form action="index.php?action=delete_account" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.');">
    <button type="submit" class="submit-btn" style="background-color: red;">Supprimer mon compte</button>
    </form>

    </div>

    </div>
</body>
</html>