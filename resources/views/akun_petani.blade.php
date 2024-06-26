<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="gambar/Logo SI-SIP.png" type="image/x-icon">
    <title>Akun Petani</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <style>
        .navbar-font{
            font-family: interface;
            font-size: medium;
        }
        .judul-font{
            font-family: Playfair Display;
            font-size: large;
        }
        .warna-footer{
            background-color: #282A3A;
            color: white;
        }
        .navbar-nav .nav-item .nav-link.active {
            color: #7A3220; 
            border-bottom: 3px solid #7A3220;
        }
        .tulisan{
            font-family: 'Inter', sans-serif;
            font-size: 15px;
            font-weight: 500;
        }
        .transparent-form {
            background-color: transparent; /* Hapus warna latar belakang */
            border: none; /* Hapus border jika ada */
            opacity: 0.8; /* Atur tingkat transparansi */
        }
        .transparent-form input {
            background-color: transparent; /* Hapus warna latar belakang input */
            border: none; /* Hapus border input jika ada */
        }
        #eyeIcon {
            width: 20px;
            cursor: pointer;
        }
        .gambar-tombol-edit{
            width: 132px;
            height: 47px;
            background-image: url("gambar/Edit.png");
            background-size: cover;
            border: none;   
        }
        .page-item:not(.active) .page-link {
            color: black; /* Set text color to black for inactive page links */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white sticky-top" >
        <div class="container-fluid">
            <img src="gambar/logo.jpg" width="150px" height="50px">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto px-5 nav-underline">
                    <li class="nav-item px-3">
                        <a class="nav-link navbar-font" href="beranda_login">Halaman Utama</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link navbar-font" aria-current="page" href="pelatihan_petani">Pelatihan</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link navbar-font" href="sertifikasi_petani">Sertifikasi</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link navbar-font" href="promosi_petani_kopi">Promosi</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i> <span class="text-dark">{{ isset($user) ? $user->nama : 'Guest' }}</span> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a>Peran: {{ $user->role }}</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('akun_petani') . '?data=' . $user->username }}" style="color:black">Akun</a></li>
                            <li><a href="{{ route('actionlogout') }}" style="color:red"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>            
        </div>
    </nav>
    @if (session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif    
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>    
    @endif
    <div class="d-flex justify-content-center align-items-end judul-font" style="height: 100px">
        <div class="d-flex justify-content-start" style="width: 1000px">
            <h1>Akun</h1>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center" style="height: 650px">
        <div class="card" style="height: 600px; width:1000px">
            <div class="card-header bg-white">
                <nav class="navbar navbar-expand-lg bg-white">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto nav-underline">
                                @if ($data === 'petani_fasilitator')
                                <li class="nav-item px-3" style="width:150px">
                                    <a class="nav-link navbar-font text-center" href="{{ url('akun_petani') . '?data=' . $user->username }}">Biodata</a>
                                </li>
                                <li class="nav-item px-3">
                                    <a class="nav-link active navbar-font text-center" aria-current="page" href="{{ url('akun_petani') . '?data=petani_fasilitator' }}">Data Fasilitator</a>
                                </li>
                                @else
                                <li class="nav-item px-3" style="width:150px">
                                    <a class="nav-link active navbar-font text-center" href="{{ url('akun_petani') . '?data=' . $user->username }}">Biodata</a>
                                </li>
                                <li class="nav-item px-3">
                                    <a class="nav-link navbar-font text-center" aria-current="page" href="{{ url('akun_petani') . '?data=petani_fasilitator' }}">Data Fasilitator</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="card-body">
                @if ($data == 'petani_fasilitator')
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">Nama</th>
                                <th class="text-center align-middle">Nomor Telepon</th>
                                <th class="text-center align-middle">Alamat</th>
                                <th class="text-center align-middle">Kecamatan</th>
                                <th class="text-center align-middle">Kabupaten</th>
                                <th class="text-center align-middle">Provinsi</th>
                                <th class="text-center align-middle">Username</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <!-- Data akan dimasukkan di sini oleh JavaScript -->
                        </tbody>
                    </table>
                @else
                <div class="d-flex justify-content-center tulisan">
                    <div class="d-flex justify-content-center row g-3 mt-5" style="width:900px">
                        <div class="col-6">
                            <p>Nama<span style="display:inline-block; width: 148px;"></span>: {{ $tampilkan->nama }}</p>
                        </div>
                        <div class="col-6">
                            <p>Kabupaten<span style="display:inline-block; width: 100px;"></span>: {{ $tampilkan->kabupaten }}</p>
                        </div>
                        <div class="col-6">
                            <p>Nomor Telepon<span style="display:inline-block; width: 80px;"></span>: {{ $tampilkan->nomor_telepon }}</p>
                        </div>
                        <div class="col-6">
                            <p>Provinsi<span style="display:inline-block; width: 121px;"></span>: {{ $tampilkan->provinsi }}</p>
                        </div>
                        <div class="col-6">
                            <p>Nama Usaha<span style="display:inline-block; width: 100px;"></span>: {{ $tampilkan->nama_usaha }}</p>
                        </div>
                        <div class="col-6">
                            <p>Username<span style="display:inline-block; width: 105px;"></span>: {{ $tampilkan->username }}</p>
                        </div>
                        <div class="col-6">
                            <p>Alamat<span style="display:inline-block; width: 140px;"></span>: {{ $tampilkan->alamat }}</p>
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-direction-row">
                                <p>Password<span style="display:inline-block; width: 108px;"></span>:</p>
                                <div class="input-group transparent-form" style="width: 200px">
                                    <input type="text" id="showPassword" style="width:150px" class="form-control" value="{{ $tampilkan->password }}" readonly>
                                    <div class="input-group-append">
                                        <button class="btn" type="button" id="togglePassword">
                                            <img src="gambar/hide (1) 1.png" alt="Toggle Password" id="eyeIcon">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <p>Kecamatan<span style="display:inline-block; width: 110px;"></span>: {{ $tampilkan->kecamatan }}</p>
                        </div>
                        <div class="col-12 mt-5">
                            <div class="d-flex justify-content-start">
                                <a href="edit_akun_petani" class="btn gambar-tombol-edit" role="button"></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @if ($data == "petani_fasilitator")
    <div class="d-flex justify-content-center align-items-center" style="height: 100px">
        <nav>
            <ul class="pagination justify-content-center" id="pagination">
                <!-- Tautan paginasi akan dimasukkan di sini oleh JavaScript -->
            </ul>
        </nav>
    </div>
    @else
    <div class="d-flex" style="height: 50px"></div>
    @endif
    <div class="d-flex justify-content-center align-items-center flex-direction:column judul-font warna-footer" style="height: 100px;">
        <div class="row">
            <div class="col-3 mb-3">
                <div class="card warna-footer" style="width:px;border-top:none;border-bottom:none;border-left:none;border-right:none;">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="gambar/Frame 28.png" alt="logo" width="250px" height="80px">
                    </div>
                </div>
            </div>
            <div class="col-9 mb-3">
                <div class="card warna-footer" style="width:600px;border-top:none;border-bottom:none;border-left:none;border-right:none;">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center" style="height:50px">
                            <p class="card-title">
                                © 2024 Sistem Informasi Sertifikasi & Pelatihan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordField = document.getElementById('showPassword');
            var eyeIcon = document.getElementById('eyeIcon');
    
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.src = 'gambar/hide (1) 1.png'; // Ganti gambar mata yang ditutup
            } else {
                passwordField.type = 'password';
                eyeIcon.src = 'gambar/view (1) 1.png'; // Ganti gambar mata yang terbuka
            }
        });
    </script>  
    <!-- Custom JS for pagination -->
    <script>
        $(document).ready(function () {
            const rowsPerPage = 5;
            let currentPage = 1;
            let data = @json($tampilkan); // Mengambil data dari controller

            function renderTable(data, page) {
                $('#table-body').empty();
                let start = (page - 1) * rowsPerPage;
                let end = start + rowsPerPage;
                let paginatedData = data.slice(start, end);

                paginatedData.forEach((row, index) => {
                    $('#table-body').append(`
                        <tr style="height: 85px">
                            <td class="text-center align-middle">${start + index + 1}</td>
                            <td class="text-center align-middle">${row.nama}</td>
                            <td class="text-center align-middle">${row.nomor_telepon}</td>
                            <td class="text-center align-middle">${row.alamat}</td>
                            <td class="text-center align-middle">${row.kecamatan}</td>
                            <td class="text-center align-middle">${row.kabupaten}</td>
                            <td class="text-center align-middle">${row.provinsi}</td>
                            <td class="text-center align-middle">${row.username}</td>
                        </tr>
                    `);
                });
            }

            function renderPagination(data, page) {
                $('#pagination').empty();
                let totalPages = Math.ceil(data.length / rowsPerPage);

                $('#pagination').append(`
                    <li class="page-item ${page === 1 ? 'disabled' : ''}">
                        <a class="page-link" href="#" aria-label="Previous" id="prev-page">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                `);

                for (let i = 1; i <= totalPages; i++) {
                    $('#pagination').append(`
                        <li class="page-item ${i === page ? 'active' : ''}">
                            <a class="page-link" href="#">${i}</a>
                        </li>
                    `);
                }

                $('#pagination').append(`
                    <li class="page-item ${page === totalPages ? 'disabled' : ''}">
                        <a class="page-link" href="#" aria-label="Next" id="next-page">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                `);

                $('.page-link').on('click', function (e) {
                    e.preventDefault();
                    let newPage = $(this).text();
                    if ($(this).attr('aria-label') === 'Previous') {
                        currentPage = currentPage > 1 ? currentPage - 1 : 1;
                    } else if ($(this).attr('aria-label') === 'Next') {
                        currentPage = currentPage < totalPages ? currentPage + 1 : totalPages;
                    } else {
                        currentPage = parseInt(newPage);
                    }
                    renderTable(data, currentPage);
                    renderPagination(data, currentPage);
                });
            }

            renderTable(data, currentPage);
            renderPagination(data, currentPage);
        });
    </script>
</body>
</html>