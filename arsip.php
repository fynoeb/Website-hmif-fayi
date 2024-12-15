<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Pengurus HMIF UNAND</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background: #ecf0f3;
        }
        .wrapper {
            position: relative;
            width: 350px;
            padding: 30px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background: #ecf0f3;
            box-shadow: -3px -3px 7px #ffffff, 3px 3px 5px #ceced1;
            margin: 20px;
        }
        .img-area {
            height: 150px;
            width: 150px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .img-area img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
        .name {
            font-size: 23px;
            font-weight: 500;
            color: #31344b;
            margin: 10px 0 5px 0;
        }
        .about {
            color: #44476a;
            font-weight: 400;
            font-size: 16px;
        }
        .buttons {
            display: flex;
            width: 100%;
            justify-content: space-between;
            margin-top: 15px;
        }
        .buttons a {
            color: #31344b;
            font-size: 24px;
            text-decoration: none;
            transition: color 0.3s;
        }
        .buttons a:hover {
            color: #007bff; /* Change color on hover */
        }
        .social-share {
            display: flex;
            width: 100%;
            margin-top: 30px;
            padding: 0 5px;
            justify-content: space-between;
        }
        .social-share .row {
            color: #31344b;
            font-size: 17px;
            cursor: pointer;
            position: relative;
        }
        .social-share .row::before {
            position: absolute;
            content: "";
            height: 100%;
            width: 2px;
            background: #e0e6eb;
            margin-left: -25px;
        }
        .row:first-child::before {
            background: none;
        }
        /* Navbar Styles */
.navbar {
    backdrop-filter: blur(10px); /* Efek blur */
    -webkit-backdrop-filter: blur(10px); /* Efek blur untuk Safari */
    background-color: rgba(248, 249, 250, 0.8); /* Warna bg-light dengan transparansi */
    transition: background-color 0.3s ease; /* Transisi halus untuk warna latar belakang */
}

.navbar.scrolled {
    background-color: rgba(248, 249, 250, 1); /* Latar belakang solid saat digulir */
}
.nav-item.dropdown {
    position: relative;
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

   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="hmif-logo.png" alt="HMIF Logo" width="40" height="40" class="me-2">
                <span><b>HMIF UNAND</b></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                        <a class="nav-link" href="index.html">Beranda</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Arsip Pengurus Section -->
    <section id="arsip" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Arsip Pengurus HMIF UNAND</h2>

            <!-- Search Bar -->
            <div class="mb-4">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari pengurus berdasarkan nama, jabatan, atau angkatan...">
            </div>

            <!-- Cards -->
            <div class="row" id="arsipCards">
                <!-- Card 1 -->
                <div class="col-md-4 pengurus-card" data-jabatan="Sekretaris Divisi Infomed Informasi dan Media" data-nama="Fayi Amatullah Azhara" data-angkatan="2023" data-tahun="periode 2">
                    <div class="wrapper">
                        <div class="img-area">
                            <img src="profile-fayi.jpg" alt="Fayi Amatullah"> <!-- Ganti dengan path gambar -->
                        </div>
                        <div class="name">Fayi Amatullah</div>
                        <div class="about">Sekretaris Divisi Infomed</div>
                        <div class="about">2311537001</div>
                        <div class="about">Periode 2-2024</div>
                        <div class="buttons">
                            <a href="https://www.instagram.com/fayiazharaa" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/fayi-amatullah-77436619b" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        </div>
                        <div class="social-share">
                            <div class="row">
                                <i class="far fa-heart"></i>
                                <span>5</span>
                            </div>
                            <div class="row">
                                <i class="far fa-comment"></i>
                                <span>6</span>
                            </div>
                            <div class="row">
                                <i class="fas fa-share"></i>
                                <span>4</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4 pengurus-card" data-jabatan="Sekretaris Divisi HRD Human Resource Development" data-nama="Ezza Addini" data-angkatan="2022" data-tahun="periode 1">
                    <div class="wrapper">
                        <div class="img-area">
                            <img src="profile-ezza.jpg" alt="Ezza"> 
                        </div>
                        <div class="name">Ezza Addini</div>
                        <div class="about">Sekretaris Divisi HRD</div>
                        <div class="about">2211532001</div>
                        <div class="about">Periode 1-2023</div>
                        <div class="buttons">
                            <a href="https://www.instagram.com/ezzaadn" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/ezza-addini-a05b35226/" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        </div>
                        <div class="social-share">
                            <div class="row">
                                <i class="far fa-heart"></i>
                                <span>6</span>
                            </div>
                            <div class="row">
                                <i class="far fa-comment"></i>
                                <span>4</span>
                            </div>
                            <div class="row">
                                <i class="fas fa-share"></i>
                                <span>5</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-4 pengurus-card" data-jabatan="Staff HRD Human Resource Development" data-nama="Sherly Sukmadira Putri" data-angkatan="2024" data-tahun="periode 2">
                    <div class="wrapper">
                        <div class="img-area">
                            <img src="profile-bucel.jpg" alt="Sherly"> 
                        </div>
                        <div class="name">Sherly Sukmadira Putri</div>
                        <div class="about">Staff HRD</div>
                        <div class="about">2311532090</div>
                        <div class="about">Periode 2-2024</div>
                        <div class="buttons">
                            <a href="" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        </div>
                        <div class="social-share">
                            <div class="row">
                                <i class="far fa-heart"></i>
                                <span>4</span>
                            </div>
                            <div class="row">
                                <i class="far fa-comment"></i>
                                <span>5</span>
                            </div>
                            <div class="row">
                                <i class="fas fa-share"></i>
                                <span>6</span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-2">&copy; 2024 HMIF UNAND. All rights reserved.</p>
            <div>
                <a href="mailto:hmifunand@gmail.com" target="_blank" class="text-white me-3">
                    <i class="fas fa-envelope"></i>
                </a>
                <a href="https://wa.me/6285805138605" target="_blank" class="text-white me-3">
                    <i class="fab fa-whatsapp"></i>
                </a>
                 <a href="https://www.instagram.com/hmif_unand/" target="_blank" class="text-white me-3">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Search Functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            let searchQuery = this.value.toLowerCase();
            let cards = document.querySelectorAll('.pengurus-card');

            cards.forEach(function(card) {
                let jabatan = card.getAttribute('data-jabatan').toLowerCase();
                let nama = card.getAttribute('data-nama').toLowerCase();
                let angkatan = card.getAttribute('data-angkatan').toLowerCase();
                let tahun = card.getAttribute('data-tahun').toLowerCase();

                if (jabatan.includes(searchQuery) || nama.includes(searchQuery) || angkatan.includes(searchQuery) || tahun.includes(searchQuery)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>