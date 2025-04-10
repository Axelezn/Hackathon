<?php include __DIR__ . '/partials/footer.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ZIP - Activity</title>
  <link rel="stylesheet" href="assets/styles/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
  <div class="activity-container">

    <div class="map-preview">
      <img src="assets/images/map-sample.png" alt="Map preview">
    </div>

    <div class="activity-content">
      <div class="arrival-info">
        <div class="arrival-text">Barber arrives soon</div>
        <div class="arrival-time">2 mins</div>
      </div>

      <div class="barber-section">
        <div class="barber-details">
          <img src="assets/images/barber-avatar.jpg" alt="Barber" class="barber-avatar">
          <div class="barber-name-rating">
            <strong>Josh</strong> · 4.9 ⭐
          </div>
        </div>
        <button class="chat-button"><i class="fas fa-comment-alt"></i> Chat with barber</button>
      </div>

      <div class="info-card">
        <div class="card-top">
          <p>How we are sustainable.</p>
          <button class="learn-btn">Learn more</button>
        </div>
        <img src="assets/images/sustainability.png" class="sustain-image" alt="Sustainable">
      </div>

      <div class="location-section">
        <p><i class="fas fa-map-marker-alt"></i> Home · 4.3 km</p>
        <span>3342 Hill Street, Jacksonville, FL 32202</span>
        <a href="#">Change or Add</a>
      </div>

      <div class="payment-section">
        <p><strong>21.42€</strong></p>
        <span><i class="fab fa-cc-mastercard"></i> Mastercard 2321</span>
        <a href="#">Change</a>
      </div>

      <div class="share-status">
        <p><i class="fas fa-share-alt"></i> Share status</p>
        <a href="#">Share</a>
      </div>

      <div class="button-row">
        <button class="cancel-btn">Cancel cut</button>
        <button class="safety-btn">🛡️ Safety tools</button>
      </div>
    </div>

    <?php include 'views/partials/footer.php'; ?>

  </div>
</body>
</html>
