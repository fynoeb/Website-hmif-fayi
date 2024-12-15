<?php
// Koneksi ke database
$servername = "localhost"; // Ganti dengan host database Anda
$username = "root";        // Ganti dengan username database Anda
$password = "";            // Ganti dengan password database Anda
$dbname = "gallery_db";    // Nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mendapatkan gambar-gambar dari database
$sql = "SELECT * FROM images ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            transition: all 0.3s ease; /* Smooth transition untuk efek blur */
        }
        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            transition: all 0.3s ease; /* Smooth transition */
        }
        .image-item {
            width: 300px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            position: relative;
        }
        .image-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            cursor: pointer;
        }
        .caption {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }
        .created-at {
            font-size: 12px;
            color: #aaa; /* Muted color */
            margin-top: 5px;
        }
        .no-images {
            text-align: center;
            color: #555;
            font-size: 18px;
            margin-top: 20px;
        }

        /* Tombol logo home dengan latar belakang semi melingkar di kiri atas */
.home-button {
    position: fixed;
    left: 0;
    margin-top: 10px;
    width: 60px;
    height: 60px;
    background-color: rgba(0, 0, 0, 0.4); /* Translucent black background */
    border: none;
    color: white; /* Mengubah warna ikon menjadi putih */
    font-size: 28px;
    text-align: center;
    line-height: 60px;
    cursor: pointer;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    border-top-right-radius: 50%; /* Membuat efek semi melingkar di sudut kiri atas */
    border-bottom-right-radius: 50%;
    z-index: 10;

    /* Blur effect for background */
    backdrop-filter: blur(5px); /* Adding blur effect */
    -webkit-backdrop-filter: blur(5px); /* Webkit-based browsers (Safari) */
}
.edit-button {
    position: fixed;
    left: 0;
    margin-top: 10px;
    width: 60px;
    height: 60px;
    background-color: rgba(0, 0, 0, 0.4); /* Translucent black background */
    border: none;
    color: white; /* Mengubah warna ikon menjadi putih */
    font-size: 28px;
    text-align: center;
    line-height: 60px;
    cursor: pointer;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    z-index: 10;

    /* Blur effect for background */
    backdrop-filter: blur(5px); /* Adding blur effect */
    -webkit-backdrop-filter: blur(5px); /* Webkit-based browsers (Safari) */
}

.home-button:hover {
    background-color: rgba(0, 0, 0, 0.6); /* Darker background on hover */
}

        .home-button:hover {
            background-color: #333; /* Warna saat hover */
        }

        /* Modal untuk gambar */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 10px;
            box-sizing: border-box;
            overflow: hidden;
        }
        .modal-content {
            margin: 0 auto;
            display: block;
            max-width: 90%;
            max-height: 80%;
            object-fit: contain;
        }
        .modal-caption {
            text-align: center;
            color: #fff;
            margin-top: 10px;
            font-size: 16px;
        }

        /* Ikon overlay di kiri atas */
        .overlay-icons {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 10;
            display: flex;
            flex-direction: column;
        }
        .overlay-icons a {
            color: white;
            margin: 5px;
            font-size: 22px;
            text-decoration: none;
        }

        /* Tombol untuk navigasi kiri-kanan */
        .nav-buttons {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            z-index: 10;
        }
        .nav-buttons button {
            background-color: transparent; /* Menghilangkan latar belakang */
            border: none;
            color: white;
            font-size: 28px; /* Ukuran font lebih besar */
            padding: 15px; /* Padding untuk memperbesar tombol */
            cursor: pointer;
            border-radius: 50%; /* Menambahkan border radius untuk tombol berbentuk bulat */
            transition: background-color 0.3s ease;
            width: 50px; /* Lebar tombol */
            height: 50px; /* Tinggi tombol */
            display: flex;
            justify-content: center;
            align-items: center;
            outline: none; /* Menghilangkan border outline ketika tombol diklik */
        }
        .nav-buttons button:hover {
            background-color: rgba(0, 0, 0, 0.1); /* Warna saat hover */
        }

        /* Style untuk tombol kembali di dalam modal */
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: transparent; /* Menghilangkan latar belakang */
            border: none;
            color: white;
            font-size: 28px;
            padding: 10px 20px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 20;
            outline: none; /* Menghilangkan outline */
        }
        .back-button:hover {
            background-color: rgba(0, 0, 0, 0.1); /* Warna saat hover */
        }

        /* Efek blur pada background gallery-container */
        .blurred-background {
            filter: blur(10px);
        }
/* Container tombol Home dan Edit */
.home-container {
    position: fixed;
    left: 0;
    top: 0;
    z-index: 40;
    display: flex;
    flex-direction: row; /* Tombol disusun secara horizontal */
    transition: all 0.3s ease;
}

/* Tombol Home dan Edit */
.home-button, .edit-button {
    width: 60px;
    height: 60px;
    background-color: rgba(0, 0, 0, 0.4);
    color: white;
    border: none;
    font-size: 28px;
    text-align: center;
    line-height: 60px;
    cursor: pointer;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    backdrop-filter: blur(5px); /* Efek blur pada tombol */
    transition: all 0.3s ease;
}

/* Tombol Home: setengah lingkaran kanan atas */
.home-button {
    border-top-right-radius: 50%;
    border-bottom-right-radius: 50%;
}

/* Tombol Edit: kotak dan efek blur */
.edit-button {
    transform: translateX(-100%); /* Posisi Edit di luar layar */
}

/* Hover pada container: geser kedua tombol ke kanan */
.home-container:hover .home-button,
.home-container:hover .edit-button {
    transform: translateX(60px); /* Geser kedua tombol ke kanan */
    background-color: rgba(0, 0, 0, 0.6); /* Latar belakang lebih gelap */
}
.home-container:hover .edit-button {
    transform: translateX(60px); /* Geser kedua tombol ke kanan */
    background-color: rgba(0, 0, 0, 0.6); /* Latar belakang lebih gelap */
}

/* Saat hover, tombol Edit akan muncul dengan posisi yang sejajar dengan tombol Home */
.home-container:hover .edit-button {
    transform: translateX(0px); /* Tombol Edit bergeser setelah tombol Home */
}


        /* Style untuk scrollbar */
::-webkit-scrollbar {
  width: 16px; /* Lebar scrollbar */
}

::-webkit-scrollbar-track {
  background-color: #f0f0f0; /* Warna latar track scrollbar */
  border-radius: 8px; /* Membuat track dengan ujung melingkar */
}

::-webkit-scrollbar-thumb {
  border-radius: 8px; /* Membuat ujung scrollbar bulat */
  background: linear-gradient(135deg, #1b2b54 25%, #04eaea 25%, #04eaea 50%, #1b2b54 50%, #1b2b54 75%, #04eaea 75%);
  background-size: 40px 40px; /* Ukuran pola garis miring */
  animation: zebra-scroll 2s linear infinite; /* Animasi berjalan terus */
}

/* Animasi pola garis miring bergerak */
@keyframes zebra-scroll {
  from {
      background-position: 0 0;
  }
  to {
      background-position: 40px 40px;
  }
}


    </style>
</head>
<body>

    <div class="gallery-container">
        <?php
        $images = [];
        if ($result->num_rows > 0) {
            // Menyimpan gambar-gambar dari database ke dalam array
            while ($row = $result->fetch_assoc()) {
                $images[] = $row; // Menyimpan data gambar dalam array
                echo '<div class="image-item">';
                echo '<img src="' . $row["image_path"] . '" alt="Image" onclick="openModal(' . $row["id"] . ')">';
                echo '<div class="caption">' . $row["caption"] . '</div>';
                echo '<div class="created-at">' . date("F j, Y, g:i a", strtotime($row["created_at"])) . '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="no-images">No images found.</div>';
        }
        ?>
    </div>

    <!-- Modal untuk gambar -->
    <div id="myModal" class="modal">
        <div class="overlay-icons">
            <a href="#" id="downloadLink" download><i class="fas fa-download"></i></a>
            <a href="https://www.example.com/share-link" id="shareLink" target="_blank"><i class="fas fa-share-alt"></i></a>
        </div>
        <img class="modal-content" id="modalImage">
        <div id="modalCaption" class="modal-caption"></div>

        <!-- Tombol navigasi kiri-kanan -->
        <div class="nav-buttons">
            <button onclick="changeImage(-1)"><i class="fas fa-chevron-left"></i></button>
            <button onclick="changeImage(1)"><i class="fas fa-chevron-right"></i></button>
        </div>

        <!-- Tombol Kembali di dalam modal -->
        <button class="back-button" onclick="closeModal()"><i class="fas fa-arrow-left"></i></button>
    </div>

    <!-- Tombol edit & home -->
    <div class="home-container">
    <!-- Tombol Edit -->
    <a href="upload.php">
        <button class="edit-button"><i class="fas fa-edit"></i></button>
    </a>

    <!-- Tombol Home -->
    <a href="index.html">
        <button class="home-button"><i class="fas fa-home"></i></button>
    </a>
</div>



    

    <script>
        // Menyimpan gambar-gambar dari database
        const images = <?php echo json_encode($images); ?>;
        let currentIndex = 0;

        // Fungsi untuk membuka modal dan menampilkan gambar lebih besar
        function openModal(imageId) {
            currentIndex = images.findIndex(image => image.id == imageId); // Menemukan gambar berdasarkan ID

            const modal = document.getElementById("myModal");
            const modalImg = document.getElementById("modalImage");
            const captionText = document.getElementById("modalCaption");
            const downloadLink = document.getElementById("downloadLink");

            modal.style.display = "block";
            modalImg.src = images[currentIndex].image_path;
            captionText.innerHTML = images[currentIndex].caption;

            // Update download link
            downloadLink.href = images[currentIndex].image_path;

            // Tambahkan efek blur pada background gallery-container
            document.querySelector('.gallery-container').classList.add('blurred-background');
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            const modal = document.getElementById("myModal");
            modal.style.display = "none";

            // Menghilangkan efek blur pada background gallery-container
            document.querySelector('.gallery-container').classList.remove('blurred-background');
        }

        // Fungsi untuk mengganti gambar ke kiri atau kanan
        function changeImage(direction) {
            currentIndex += direction;
            if (currentIndex < 0) currentIndex = images.length - 1;
            if (currentIndex >= images.length) currentIndex = 0;

            const modalImg = document.getElementById("modalImage");
            const captionText = document.getElementById("modalCaption");
            const downloadLink = document.getElementById("downloadLink");

            modalImg.src = images[currentIndex].image_path;
            captionText.innerHTML = images[currentIndex].caption;

            // Update download link
            downloadLink.href = images[currentIndex].image_path;
        }
        // Fungsi untuk membuka modal dan menampilkan gambar lebih besar
function openModal(imageId) {
    currentIndex = images.findIndex(image => image.id == imageId); // Menemukan gambar berdasarkan ID

    const modal = document.getElementById("myModal");
    const modalImg = document.getElementById("modalImage");
    const captionText = document.getElementById("modalCaption");
    const downloadLink = document.getElementById("downloadLink");
    const homeButton = document.querySelector(".home-button");

    modal.style.display = "block";
    modalImg.src = images[currentIndex].image_path;
    captionText.innerHTML = images[currentIndex].caption;

    // Update download link
    downloadLink.href = images[currentIndex].image_path;

    // Tambahkan efek blur pada background gallery-container
    document.querySelector('.gallery-container').classList.add('blurred-background');

    // Sembunyikan tombol home saat modal dibuka
    homeButton.style.display = "none";
}

// Fungsi untuk menutup modal
function closeModal() {
    const modal = document.getElementById("myModal");
    const homeButton = document.querySelector(".home-button");

    modal.style.display = "none";

    // Menghilangkan efek blur pada background gallery-container
    document.querySelector('.gallery-container').classList.remove('blurred-background');

    // Tampilkan tombol home saat modal ditutup
    homeButton.style.display = "block";
}

        
    </script>

    <?php
    // Menutup koneksi
    $conn->close();
    ?>
</body>
</html>
