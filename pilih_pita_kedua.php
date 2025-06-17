<?php
$produk = isset($_GET['produk']) ? $_GET['produk'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pilih Warna Pita</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: url('images/cewekgiftbox.png') no-repeat center center fixed;
      background-size: contain; /* ubah dari cover ke contain agar tidak membesar */
      background-repeat: no-repeat;
      background-color: #fff9f9;
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
    }
  </style>
</head>
<body>
  <div class="container-pita-form">
    <div class="pita-list">
      <h2 class="form-title">Pilih Warna Pita untuk <br><em><?= htmlspecialchars($produk) ?></em></h2>
      <div class="pita-grid">
        <a href="index.php?produk=<?= urlencode($produk) ?>&pita=hazel">
          <img src="images/pita/hazel.png" alt="Hazel">
          Hazel – Coklat Muda
        </a>
        <a href="index.php?produk=<?= urlencode($produk) ?>&pita=black">
          <img src="images/pita/black.png" alt="Black">
          Black – Hitam
        </a>
      </div>
    </div>
  </div>
</body>
</html>
