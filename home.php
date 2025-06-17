
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Fazzle Goodies</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: url('images/background.png') no-repeat top center;
      background-size: cover;
      background-attachment: fixed;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: url('images/background.png') top center no-repeat;
      background-size: cover;
      background-attachment: scroll;
      color: #333;
    }

    section {
      padding: 80px 20px;
      text-align: center;
    }

    .hero {
      background-color: rgba(255, 255, 255, 0.6);
    }

    .hero h1 {
      font-size: 48px;
      color: #d63384;
      margin-bottom: 10px;
    }

    .hero p {
      font-size: 18px;
      color: #555;
    }

    .produk {
      background-color: rgba(255, 255, 255, 0.8);
    }

    .produk h2 {
      color: #d63384;
      margin-bottom: 40px;
    }

    .product-container {
      display: flex;
      justify-content: center;
      gap: 40px;
      flex-wrap: wrap;
    }

    .product {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
      width: 280px;
      padding: 20px;
      transition: transform 0.3s ease;
    }

    .product:hover {
      transform: translateY(-5px);
    }

    .product img {
      width: 100%;
      height: auto;
      border-radius: 8px;
    }

    .product h3 {
      margin-top: 15px;
      color: #333;
    }

    .product a {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 20px;
      background: #d63384;
      color: white;
      text-decoration: none;
      border-radius: 8px;
    }

    .deskripsi, .testimoni, .kontak {
      background-color: rgba(255, 255, 255, 0.85);
    }

    .deskripsi p, .kontak p {
      max-width: 700px;
      margin: auto;
      font-size: 16px;
    }

    .testimoni blockquote {
      max-width: 600px;
      margin: 20px auto;
      font-style: italic;
      color: #555;
    }

    .social-icons a {
      font-size: 24px;
      margin: 10px;
      color: #d63384;
      text-decoration: none;
    }

    footer {
      background: #d63384;
      color: white;
      padding: 30px;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <section class="hero">
    <h1>Welcome to Fazzle Goodies!</h1>
    <p>Giftbox cantik untuk momen spesialmu 🎁💕</p>
  </section>

  <section class="produk">
    <h2>Pilih Giftbox Kamu</h2>
    <div class="product-container">
      <div class="product">
        <img src="images/kraft_box.jpg" alt="Kraft Box">
        <h3>Kraft Box (Hazel)</h3>
        <a href="pilih_pita_kedua.php?produk=Kraft Box">Pilih Ini</a>
      </div>
      <div class="product">
        <img src="images/white_box.jpg" alt="White Box">
        <h3>White Box (Midnight)</h3>
        <a href="pilih_pita.php?produk=White Box">Pilih Ini</a>
      </div>
    </div>
  </section>

  <section class="deskripsi">
    <h2>Mengapa Fazzle Goodies?</h2>
    <p>Kami menghadirkan hampers dengan desain eksklusif, personal touch, dan packaging lucu yang bisa disesuaikan dengan momen istimewa kamu. Cocok untuk ulang tahun, ucapan terima kasih, atau surprise!</p>
  </section>

  <section class="testimoni">
    <h2>Apa Kata Mereka?</h2>
    <blockquote>"Kemasannya super lucu dan isinya lengkap! Penerimanya senang banget. Recommended!"</blockquote>
    <blockquote>"Sudah langganan beberapa kali, pelayanannya cepat dan hasilnya memuaskan!"</blockquote>
  </section>

  <section class="kontak">
    <h2>Hubungi Kami</h2>
    <p>Siap kirim hampers ke orang tersayang? Kontak kami di bawah ini 👇</p>
    <div class="social-icons">
      <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://wa.me/6281234567890" target="_blank"><i class="fab fa-whatsapp"></i></a>
      <a href="mailto:halo@fazzlegoodies.com"><i class="fas fa-envelope"></i></a>
    </div>
  </section>

  <footer>
    © 2025 Fazzle Goodies | Designed with 💕
  </footer>

</body>
</html>