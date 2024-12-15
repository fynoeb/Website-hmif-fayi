<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "gallery_db"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Proses upload gambar
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"]) && isset($_POST["caption"])) {
    $caption = $_POST["caption"];
    $image = $_FILES["image"];
    
    // Tentukan folder untuk menyimpan gambar
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi file gambar
    if (in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            // Masukkan data gambar ke dalam database
            $sql = "INSERT INTO images (image_path, caption) VALUES ('$target_file', '$caption')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Gambar berhasil diupload!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Gagal mengupload gambar.";
        }
    } else {
        echo "Hanya file gambar dengan format JPG, JPEG, PNG, atau GIF yang diperbolehkan.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Gambar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Upload Gambar ke Galeri</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="image" class="form-label">Pilih Gambar</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <div class="mb-3">
                <label for="caption" class="form-label">Caption Gambar</label>
                <input type="text" class="form-control" id="caption" name="caption" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload Gambar</button>
        </form>

        <!-- Button to return to the gallery -->
        <div class="mt-3">
            <a href="gallery.php" class="btn btn-secondary">Back to Gallery</a>
        </div>
    </div>
</body>
</html>
