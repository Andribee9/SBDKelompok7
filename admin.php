<?php
session_start();
if (!isset($_SESSION['admin_login'])) {
  header("Location: login.php");
  exot;
}
?>



include 'koneksi.php';

// Ambil semua data pesanan dengan join
$query = "
SELECT 
    th.KD_Pesanan,
    th.Tanggal_Pesanan,
    c.Nama_Customer,
    c.No_HP,
    b.Type AS Jenis_Box,
    b.Pilihan AS Isi_Box,
    b.Size,
    b.Warna_Pita,
    b.Harga,
    td.Amount,
    (b.Harga * td.Amount) AS Total_Harga,
    th.ID_Ambil,
    pa.Metode_Ambil,
    pa.Alamat_Ambil,
    pa.Tanggal_Antar,
    pa.Waktu_Antar,
    th.ID_Bayar,
    py.Metode_Bayar,
    py.Tanggal_Bayar,
    py.Status_Bayar
FROM 
    transaction_header th
JOIN customer c ON th.ID_Customer = c.ID_Customer
JOIN transaction_detail td ON th.KD_Pesanan = td.KD_Pesanan
JOIN box b ON td.KD_Box = b.KD_Box
JOIN pengambilan pa ON th.ID_Ambil = pa.ID_Ambil
JOIN payment py ON th.ID_Bayar = py.ID_Bayar
ORDER BY th.Tanggal_Pesanan DESC
";

$result = mysqli_query($conn, $query);
if (!$result) {
  die("Query Error: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin | Data Pesanan Giftbox</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background: #f5f5f5;
    }
    h1 {
      text-align: center;
      color: #d63384;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px 12px;
      text-align: left;
    }
    th {
      background-color: #d63384;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    tr:hover {
      background-color: #f1f1f1;
    }
  </style>
</head>
<body>

<h1>Data Pemesanan Giftbox</h1>

<table>
  <thead>
    <tr>
      <th>No</th>
      <th>Tanggal Pesan</th>
      <th>Nama Customer</th>
      <th>No HP</th>
      <th>Jenis Box</th>
      <th>Isi</th>
      <th>Ukuran</th>
      <th>Warna Pita</th>
      <th>Harga Satuan</th>
      <th>Jumlah</th>
      <th>Total</th>
      <th>Metode Ambil</th>
      <th>Alamat</th>
      <th>Waktu Antar</th>
      <th>Metode Bayar</th>
      <th>Status Bayar</th>
      <th>Tanggal Bayar</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    while($row = mysqli_fetch_assoc($result)):
    ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= htmlspecialchars($row['Tanggal_Pesanan']) ?></td>
      <td><?= htmlspecialchars($row['Nama_Customer']) ?></td>
      <td><?= htmlspecialchars($row['No_HP']) ?></td>
      <td><?= htmlspecialchars($row['Jenis_Box']) ?></td>
      <td><?= htmlspecialchars($row['Isi_Box']) ?></td>
      <td><?= htmlspecialchars($row['Size']) ?></td>
      <td><?= htmlspecialchars($row['Warna_Pita']) ?></td>
      <td>Rp <?= number_format($row['Harga']) ?></td>
      <td><?= $row['Amount'] ?></td>
      <td>Rp <?= number_format($row['Total_Harga']) ?></td>
      <td><?= htmlspecialchars($row['Metode_Ambil']) ?></td>
      <td><?= htmlspecialchars($row['Alamat_Ambil']) ?></td>
      <td><?= htmlspecialchars($row['Waktu_Antar']) ?></td>
      <td><?= htmlspecialchars($row['Metode_Bayar']) ?></td>
      <td><?= htmlspecialchars($row['Status_Bayar']) ?></td>
      <td><?= htmlspecialchars($row['Tanggal_Bayar']) ?></td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>

</body>
</html>
