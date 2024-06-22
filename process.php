<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aesmoc";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari form
$name = $_POST['name'];
$address = $_POST['address'];

// Menyimpan data ke dalam tabel
$sql = "INSERT INTO entries (name, address) VALUES ('$name', '$address')";

if ($conn->query($sql) === TRUE) {
    $message = "Data berhasil disimpan";
    $success = true;
} else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
    $success = false;
}

// Menutup koneksi
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Input Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <?php if ($success): ?>
            <div class="success-message">
                <h1>Berhasil!</h1>
                <p><?php echo $message; ?></p>
                <a href="index.html" class="button">Kembali</a>
            </div>
        <?php else: ?>
            <div class="error-message">
                <h1>Gagal</h1>
                <p><?php echo $message; ?></p>
                <a href="index.html" class="button">Kembali</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
