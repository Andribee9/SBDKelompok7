<?php
$produk = isset($_GET['produk']) ? $_GET['produk'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilih Warna Pita</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background: url('images/cewekgiftbox.png') no-repeat top center;
      background-size: 1000px;
      background-attachment: fixed; 
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: url('images/cewekgiftbox.png') top center no-repeat;
      background-size: 1000px;
      background-attachment: scroll;
      color: #333;
    }
    .container-pita-form {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      justify-content: center;
      align-items: flex-start;
      padding: 20px;
    }
    .pita-list {
      max-width: 300px;
      background-color: #ffeaf4;
      padding: 15px;
      border-radius: 12px;
    }
    .pita-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 10px;
    }
    .pita-grid a {
      display: block;
      text-align: center;
      text-decoration: none;
      color: #333;
    }
    .pita-grid img {
      width: 100%;
      max-height: 100px;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }
    .form-title {
      font-size: 1.4em;
      color: #ff4081;
      margin-bottom: 15px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container-pita-form">
    <div class="pita-list">
      <div class="form-title">Pilih Warna Pita</div>
      <div class="pita-grid">
        <a href="index.php?produk=<?= urlencode($produk) ?>&pita=onyx">
          <img src="images/ribbon_onyx.png" alt="Onyx">
          Onyx - Hitam
        </a>
        <a href="index.php?produk=<?= urlencode($produk) ?>&pita=blush">
          <img src="images/ribbon_blush.png" alt="Blush">
          Blush - Pink
        </a>
        <a href="index.php?produk=<?= urlencode($produk) ?>&pita=sky">
          <img src="images/ribbon_sky.png" alt="Sky">
          Sky - Biru Langit
        </a>
        <a href="index.php?produk=<?= urlencode($produk) ?>&pita=emerald">
          <img src="images/ribbon_emerald.png" alt="Emerald">
          Emerald - Hijau
        </a>
        <a href="index.php?produk=<?= urlencode($produk) ?>&pita=midnight">
          <img src="images/ribbon_midnight.png" alt="Midnight">
          Midnight - Biru Tua
        </a>
        <a href="index.php?produk=<?= urlencode($produk) ?>&pita=scarlet">
          <img src="images/ribbon_scarlet.png" alt="Scarlet">
          Scarlet - Merah
        </a>
        <a href="index.php?produk=<?= urlencode($produk) ?>&pita=fanta">
          <img src="images/ribbon_fanta.png" alt="Fanta">
          Fanta - Pink Fanta
        </a>
        <a href="index.php?produk=<?= urlencode($produk) ?>&pita=choco">
          <img src="images/ribbon_choco.png" alt="Choco">
          Choco - Coklat
        </a>
        <a href="index.php?produk=<?= urlencode($produk) ?>&pita=lavender">
          <img src="images/ribbon_lavender.png" alt="Lavender">
          Lavender - Ungu
        </a>
      </div>
    </div>
  </div>
</body>
</html>
