<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fazzle Goodies | Booking</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: url('images/kraft_box.jpg') no-repeat center center fixed;
      background-size: cover;
    }

    .overlay {
      background-color: rgba(255, 255, 255, 0.85);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      text-align: center;
    }

    .welcome-text {
      font-size: 2.5rem;
      font-weight: bold;
      color: #d63384;
      margin-bottom: 20px;
      text-shadow: 2px 2px 5px rgba(0,0,0,0.2);
    }

    .book-btn {
      background-color: #d63384;
      color: white;
      padding: 15px 30px;
      border: none;
      border-radius: 10px;
      font-size: 1.2rem;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .book-btn:hover {
      background-color: #b52a6d;
    }

    .wrapper {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.7);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    .form-box {
      background-color: #fff;
      padding: 30px;
      border-radius: 15px;
      width: 90%;
      max-width: 700px;
      max-height: 90vh;
      overflow-y: auto;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
      position: relative;
    }

    .icon-close {
      position: absolute;
      top: 15px;
      right: 15px;
      font-size: 24px;
      cursor: pointer;
      color: #333;
    }

    .form-box form label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
    }

    .form-box form input,
    .form-box form select,
    .form-box form textarea {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-box button {
      background-color: #d63384;
      color: #fff;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      width: 100%;
      cursor: pointer;
    }

    .form-box button:hover {
      background-color: #b52a6d;
    }
  </style>
</head>
<body>
  <div class="overlay">
    <div class="welcome-text">Welcome to Fazzle Goodies!</div>
    <button class="book-btn" id="openBooking">Book Now</button>
  </div>

  <div class="wrapper" id="bookingWrapper">
    <span class="icon-close" id="closeBookingForm">&times;</span>
    <div class="form-box booking">
      <?php
$produk = isset($_GET['produk']) ? $_GET['produk'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Form Pemesanan Giftbox</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    .box-preview {
      text-align: center;
      margin-bottom: 20px;
    }
    .box-preview img {
      display: none;
      width: 200px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
    .box-preview img.active {
      display: inline-block;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Form Pemesanan Giftbox</h2>

<?php
include 'koneksi.php';

$produk = isset($_GET['produk']) ? $_GET['produk'] : '';
$pita = isset($_GET['pita']) ? $_GET['pita'] : '';

$warna_pita = '';
$harga = '';

if ($produk && $pita) {
  $query = "SELECT * FROM box WHERE Type='$produk' AND Warna_Pita='$pita'";
  $result = mysqli_query($conn, $query);
  if ($row = mysqli_fetch_assoc($result)) {
    $warna_pita = $row['Warna_Pita'];
    $harga = $row['Harga'];
  }
}
?>

    <form action="simpan.php" method="POST">
<input type="hidden" name="produk" value="<?= htmlspecialchars($produk) ?>">

      <label>Nama</label>
      <input type="text" name="name" required />

      <label>No HP</label>
      <input type="text" name="phone" maxlength="14" required 
       oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
       placeholder="Masukkan No HP" />


      <label>Jenis Box</label>
      <div class="box-preview">
        <img src="images/kraft_box.jpg" id="previewKraft" alt="Kraft Box" />
        <img src="images/white_box.jpg" id="previewWhite" alt="White Box" />
      </div>
      <select name="giftbox" id="giftbox" required>
        <option value="">-- Pilih Box --</option>
        <option value="Kraft Box">Kraft Box</option>
        <option value="White Box">White Box</option>
      </select>

      <label>Isi Box</label>
      <select name="boxcontent" id="boxcontent" required>
        <option value="">-- Pilih Isi --</option>
        <option value="Snack">Snack</option>
        <option value="Snack + Lego">Snack + Lego</option>
      </select>

      <label>Ukuran</label>
      <select name="size" id="size" required>
        <option value="">-- Pilih Ukuran --</option>
        <option value="Small">Small</option>
        <option value="Large">Large</option>
      </select>

<label>Warna Pita</label>
<select name="ribbon" required>
  <option value="">-- Pilih Warna Pita --</option>
  <option value="onyx : Hitam">onyx : Hitam</option>
  <option value="Blush : Pink">Blush : Pink</option>
  <option value="Sky : Biru Langit">Sky : Biru Langit</option>
  <option value="Emerald : Hijau">Emerald : Hijau</option>
  <option value="Midnight : Biru Tua">Midnight : Biru Tua</option>
  <option value="Scarlet : Merah">Scarlet : Merah</option>
  <option value="Fanta : Pink Fanta">Fanta : Pink Fanta</option>
  <option value="Choco : Coklat">Choco : Coklat</option>
  <option value="Lavender : Ungu">Lavender : Ungu</option>
</select>




      <label>Harga</label>
      <input type="number" name="price" id="price" value="<?= htmlspecialchars($harga) ?>" readonly />

      <label>Jumlah</label>
      <input type="number" name="qty" id="qty" required />

      <label>Total Harga</label>
      <input type="number" name="total_harga" id="total_harga" readonly />

      <label>Wish Card (Opsional)</label>
      <input type="text" name="wish_card" placeholder="Tulis ucapan jika ada..." />

      <label>Metode Pengambilan</label>
      <select name="delivery" id="delivery" required>
        <option value="">-- Pilih Metode --</option>
        <option value="Antar">Antar</option>
        <option value="Ambil">Ambil</option>
      </select>

      <label>Waktu Pengambilan/Antar</label>
      <input type="text" name="time" required />

      <div id="alamatField">
        <label>Alamat</label>
        <textarea name="alamat" id="alamat" required></textarea>
      </div>

      <label>Metode Pembayaran</label>
      <select name="payment" required>
        <option value="">-- Pilih Metode --</option>
        <option value="Transfer">Transfer</option>
        <option value="Cash">Cash</option>
      </select>

      <label>Status Pembayaran</label>
      <select name="status_bayar" required>
        <option value="">-- Pilih Status --</option>
        <option value="Sudah Bayar">Sudah Bayar</option>
        <option value="Belum Bayar">Belum Bayar</option>
      </select>

      <label>Tanggal Bayar</label>
      <input type="date" name="tanggal_bayar" required />

      <label>Tanggal Pesan</label>
      <input type="date" name="tanggal_pesan" required />

      <button type="submit">Kirim Pesanan</button>
    </form>
  </div>

  <script>

    // Autofill box & ribbon dari URL parameter
    const urlParams = new URLSearchParams(window.location.search);
    const box = urlParams.get("produk");
    const ribbon = urlParams.get("pita");
    if (box) {
      document.getElementById("giftbox").value = box;
      previewBox();
    }
    if (ribbon) {
      document.querySelector("select[name='ribbon']").value = ribbon;
    }
    // Tampilkan gambar berdasarkan box
    function previewBox() {
      const val = document.getElementById("giftbox").value;
      const imgKraft = document.getElementById("previewKraft");
      const imgWhite = document.getElementById("previewWhite");

      imgKraft.classList.remove("active");
      imgWhite.classList.remove("active");

      if (val === "Kraft Box") {
        imgKraft.classList.add("active");
      } else if (val === "White Box") {
        imgWhite.classList.add("active");
      }
    }
    document.getElementById("giftbox").addEventListener("change", previewBox);

    // Hitung harga otomatis
    const sizeInput = document.getElementById("size");
    const contentInput = document.getElementById("boxcontent");
    const priceInput = document.getElementById("price");
    const qtyInput = document.getElementById("qty");
    const totalInput = document.getElementById("total_harga");

    function updatePriceAndTotal() {
      let harga = 0;
      const size = sizeInput.value;
      const content = contentInput.value;

      if (size === "Small") {
        harga = 20000;
      } else if (size === "Large") {
        harga = (content === "Snack + Lego") ? 35000 : 30000;
      }

      priceInput.value = harga;

      const qty = parseInt(qtyInput.value);
      totalInput.value = !isNaN(qty) ? harga * qty : "";
    }

    sizeInput.addEventListener("change", updatePriceAndTotal);
    contentInput.addEventListener("change", updatePriceAndTotal);
    qtyInput.addEventListener("input", updatePriceAndTotal);

    // Sembunyikan kolom alamat saat pilih "Ambil"
    const deliverySelect = document.getElementById("delivery");
    const alamatField = document.getElementById("alamatField");
    const alamatInput = document.getElementById("alamat");

    function toggleAlamat() {
      if (deliverySelect.value === "Antar") {
        alamatField.style.display = "block";
        alamatInput.setAttribute("required", "required");
      } else {
        alamatField.style.display = "none";
        alamatInput.removeAttribute("required");
      }
    }

    deliverySelect.addEventListener("change", toggleAlamat);
    window.addEventListener("DOMContentLoaded", toggleAlamat);
  </script>
</body>
</html>

    </div>
  </div>

  <script>
    const openBooking = document.getElementById('openBooking');
    const closeBooking = document.getElementById('closeBookingForm');
    const bookingWrapper = document.getElementById('bookingWrapper');

    openBooking.addEventListener('click', () => {
      bookingWrapper.style.display = 'flex';
    });

    closeBooking.addEventListener('click', () => {
      bookingWrapper.style.display = 'none';
    });

    window.onclick = function(event) {
      if (event.target == bookingWrapper) {
        bookingWrapper.style.display = 'none';
      }
    }
  </script>
</body>
</html>
