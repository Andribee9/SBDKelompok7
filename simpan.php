from pathlib import Path

# Membuat ulang file simpan.php dengan perbaikan pada logika penyimpanan warna pita
php_code = """<?php
include 'koneksi.php';

$nama = $_POST['name'];
$no_hp = $_POST['phone'];
$jenis_box = $_POST['giftbox'];
$isi_box = $_POST['boxcontent'];
$ukuran = $_POST['size'];
$warna_pita = $_POST['ribbon'];
$harga = $_POST['price'];
$qty = $_POST['qty'];
$total = $_POST['total_harga'];
$wish = $_POST['wish_card'];
$metode_ambil = $_POST['delivery'];
$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : null;
$waktu = $_POST['time'];
$metode_bayar = $_POST['payment'];
$status_bayar = $_POST['status_bayar'];
$tgl_bayar = $_POST['tanggal_bayar'];
$tgl_pesan = $_POST['tanggal_pesan'];

$status_bayar_db = ($status_bayar == "Sudah Bayar") ? "LUNAS" : "BELUM LUNAS";
$metode_bayar_db = ($metode_bayar == "Cash") ? "COD" : "Transfer";
$metode_ambil_db = ($metode_ambil == "Ambil") ? "Dijemput" : "Diantar";

if (empty($warna_pita)) {
    echo "<script>alert('Warna pita belum dipilih!'); history.back();</script>";
    exit;
}

mysqli_query($conn, "INSERT INTO customer (Nama_Customer, No_HP) VALUES ('$nama', '$no_hp')");
$id_customer = mysqli_insert_id($conn);

mysqli_query($conn, "INSERT INTO pengambilan (Metode_Ambil, Alamat_Ambil, Tanggal_Antar, Waktu_Antar) 
VALUES ('$metode_ambil_db', '$alamat', '$tgl_pesan', '$waktu')");
$id_ambil = mysqli_insert_id($conn);

mysqli_query($conn, "INSERT INTO payment (Metode_Bayar, Tanggal_Bayar, Status_Bayar) 
VALUES ('$metode_bayar_db', '$tgl_bayar', '$status_bayar_db')");
$id_bayar = mysqli_insert_id($conn);

// Cek apakah box dengan kombinasi yang sama sudah ada
$cekBox = mysqli_query($conn, "SELECT KD_Box FROM box WHERE Type='$jenis_box' AND Pilihan='$isi_box' AND Size='$ukuran' AND Warna_Pita='$warna_pita' AND Harga='$harga'");
if (mysqli_num_rows($cekBox) > 0) {
    $row = mysqli_fetch_assoc($cekBox);
    $id_box = $row['KD_Box'];
} else {
    mysqli_query($conn, "INSERT INTO box (Type, Pilihan, Size, Warna_Pita, Harga) 
    VALUES ('$jenis_box', '$isi_box', '$ukuran', '$warna_pita', '$harga')");
    $id_box = mysqli_insert_id($conn);
}

mysqli_query($conn, "INSERT INTO transaction_header (Tanggal_Pesanan, ID_Customer, ID_Ambil, ID_Bayar) 
VALUES ('$tgl_pesan', '$id_customer', '$id_ambil', '$id_bayar')");
$id_transaksi = mysqli_insert_id($conn);

mysqli_query($conn, "INSERT INTO transaction_detail (KD_Pesanan, KD_Box, Amount) 
VALUES ('$id_transaksi', '$id_box', '$qty')");

echo "<script>alert('Pemesanan berhasil!'); window.location.href='index.php';</script>";
?>
"""

file_path = "/mnt/data/simpan_baru.php"
Path(file_path).write_text(php_code)
file_path
