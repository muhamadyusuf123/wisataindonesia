<?php
// proses_booking.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $tanggal = $_POST['tanggal'];
    
    // Koneksi ke database
    $conn = new mysqli('localhost', 'username', 'password', 'nama_database');
    
    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    
    // Simpan ke database
    $sql = "INSERT INTO bookings (nama, email, telp, tanggal) VALUES ('$nama', '$email', '$telp', '$tanggal')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Pemesanan berhasil disimpan!";
        // Kirim email konfirmasi (gunakan fungsi mail PHP)
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
