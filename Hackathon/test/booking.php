<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZIP - Réserver votre coupe</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <div class="back-button" style="margin-left: 15px; cursor: pointer;">
                <i class="fas fa-arrow-left"></i>
            </div>
            <div class="logo-container" style="width: 100%; text-align: center; margin-right: 40px;">
                <span class="logo">ZIP</span>
            </div>
        </div>

        <div class="map-container">
            <img src="votre_image_de_carte.png" alt="Carte" style="width: 100%; height: 150px; object-fit: cover;">
        </div>

        <div class="booking-details">
            <h2>Détails de la réservation</h2>
            <div class="barber-info-header">
                <i class="fas fa-user-circle" style="font-size: 30px; margin-right: 10px; color: #555;"></i>
                <span id="selected-barber-name" style="font-weight: bold;">Nom du Coiffeur</span>
            </div>

            <form action="#" method="post" class="booking-form">
                <div class="form-group">
                    <label for="price">Prix (€) souhaité:</label>
                    <input type="number" id="price" name="price" min="10" placeholder="Votre prix">
                </div>

                <div class="form-group">
                    <label for="datetime">Date et heure:</label>
                    <input type="datetime-local" id="datetime" name="datetime">
                </div>

                <div class="form-group">
                    <label for="haircut-type">Type de coiffure:</label>
                    <select id="haircut-type" name="haircut-type">
                        <option value="">Sélectionner un type</option>
                        <option value="homme">Coupe Homme</option>
                        <option value="femme">Coupe Femme</option>
                        <option value="enfant">Coupe Enfant</option>
                        <option value="rasage">Rasage</option>
                        <option value="entretien-barbe">Entretien Barbe</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>

                <button type="submit" class="book-button">Envoyer la demande de réservation</button>
            </form>
        </div>

        <div class="bottom-navigation">
            <div class="nav-item">
                <i class="fas fa-home nav-icon"></i>
                <span class="nav-text">Accueil</span>
            </div>
            <div class="nav-item">
                <i class="fas fa-list-alt nav-icon"></i>
                <span class="nav-text">Activité</span>
            </div>
            <div class="nav-item">
                <i class="fas fa-user-circle nav-icon"></i>
                <span class="nav-text">Compte</span>
            </div>
        </div>
    </div>
</body>
</html>