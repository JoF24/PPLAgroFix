<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="gambar/Logo SI-SIP.png" type="image/x-icon">
    <title>Pelatihan</title>
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
            font-size: 20px;
            font-weight: 500;
        }
        .transparent-form {
            background-color: transparent; 
            border: none; 
            opacity: 0.8;
        }
        .transparent-form input {
            background-color: transparent; 
            border: none;
        }
        #eyeIcon {
            width: 20px;
            cursor: pointer;
        }
        .gambar-tombol-edit{
            width: 115px;
            height: 47px;
            background-image: url("gambar/Edit.png");
            background-size: cover;
            border: none;   
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
                        <a class="nav-link navbar-font" href="#">Sertifikasi</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link navbar-font" href="#">Promosi</a>
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
                            <li><a href="{{ url('akun_fasilitator') . '?data=' . $user->username }}">Akun</a></li>
                            <li><a href="{{ route('actionlogout') }}"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>            
        </div>
    </nav>
    <div class="d-flex justify-content-center align-items-end judul-font" style="height: 100px">
        <div class="d-flex justify-content-start" style="width: 1000px">
            <h1>Akun</h1>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center" style="height: 700px">
        <div class="card" style="height: 600px; width:1000px">
            <div class="card-header bg-white">
                <nav class="navbar navbar-expand-lg bg-white">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto nav-underline">
                                @if ($data === 'fasilitator_petani')
                                <li class="nav-item px-3" style="width:150px">
                                    <a class="nav-link navbar-font text-center" href="{{ url('akun_fasilitator') . '?data=' . $user->username }}">Biodata</a>
                                </li>
                                <li class="nav-item px-3">
                                    <a class="nav-link active navbar-font text-center" aria-current="page" href="{{ url('akun_fasilitator') . '?data=fasilitator_petani' }}">Data Petani</a>
                                </li>
                                @else
                                <li class="nav-item px-3" style="width:150px">
                                    <a class="nav-link active navbar-font text-center" href="{{ url('akun_fasilitator') . '?data=' . $user->username }}">Biodata</a>
                                </li>
                                <li class="nav-item px-3">
                                    <a class="nav-link navbar-font text-center" aria-current="page" href="{{ url('akun_fasilitator') . '?data=fasilitator_petani' }}">Data Petani</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="card-body">
                @if ($data === 'fasilitator_petani')
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">Nama</th>
                                <th class="text-center align-middle">Nomor Telepon</th>
                                <th class="text-center align-middle">Nama Usaha</th>
                                <th class="text-center align-middle">Alamat</th>
                                <th class="text-center align-middle">Kecamatan</th>
                                <th class="text-center align-middle">Kabupaten</th>
                                <th class="text-center align-middle">Provinsi</th>
                                <th class="text-center align-middle">Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nomor = 1
                            ?>
                            @foreach ($tampilkan as $tampil)
                            <tr style="height: 70px">
                                    <td class="text-center align-middle">{{ $nomor }}</td>
                                    <td class="text-center align-middle">{{ $tampil->nama }}</td>
                                    <td class="text-center align-middle">{{ $tampil->nomor_telepon }}</td>
                                    <td class="text-center align-middle"></td>
                                    <td class="text-center align-middle">{{ $tampil->alamat }}</td>
                                    <td class="text-center align-middle">{{ $tampil->kecamatan }}</td>
                                    <td class="text-center align-middle">{{ $tampil->kabupaten }}</td>
                                    <td class="text-center align-middle">{{ $tampil->provinsi }}</td>
                                    <td class="text-center align-middle">{{ $tampil->username }}</td>
                                </tr>
                            <?php 
                            $nomor ++;
                            ?>
                            @endforeach
                        </tbody>
                    </table>
                @else
                <div class="d-flex justify-content-center tulisan">
                    <div class="d-flex justify-content-center row g-3 mt-5" style="width:900px">
                        <div class="col-6">
                            <p>Nama<span style="display:inline-block; width: 170px;"></span>: {{ $tampilkan->nama }}</p>
                        </div>
                        <div class="col-6">
                            <p>Provinsi<span style="display:inline-block; width: 130px;"></span>: {{ $tampilkan->provinsi }}</p>
                        </div>
                        <div class="col-6">
                            <p>Nomor Telepon<span style="display:inline-block; width: 80px;"></span>: {{ $tampilkan->nomor_telepon }}</p>
                        </div>
                        <div class="col-6">
                            <p>Username<span style="display:inline-block; width: 110px;"></span>: {{ $tampilkan->username }}</p>
                        </div>
                        <div class="col-6">
                            <p>Alamat<span style="display:inline-block; width: 160px;"></span>: {{ $tampilkan->alamat }}</p>
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-direction-row">
                                <p>Password<span style="display:inline-block; width: 115px;"></span>:</p>
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
                            <p>Kecamatan<span style="display:inline-block; width: 120px;"></span>: {{ $tampilkan->kecamatan }}</p>
                        </div>
                        <div class="col-12">
                            <p>Kabupaten<span style="display:inline-block; width: 120px;"></span>: {{ $tampilkan->kabupaten }}</p>
                        </div>
                        <div class="col-12 mt-5">
                            <div class="d-flex justify-content-start">
                                <a href="edit_akun_fasilitator" class="btn gambar-tombol-edit" role="button"></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center flex-direction:column judul-font warna-footer" style="height: 250px;">
        <div class="row">
            <div class="col-4 mb-3">
                <div class="card warna-footer" style="width:350px;border-top:none;border-bottom:none;border-left:none;border-right:none;">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="gambar/Frame 28.png" alt="logo" width="240px">
                    </div>
                </div>
            </div>
            <div class="col-4 mb-3">
                <div class="card warna-footer" style="width:350px;border-top:none;border-bottom:none;border-left:none;border-right:none;">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                            <p class="card-title">
                                email : SI-SIP@gmail.com<br>
                                Phone : +6285 2366 69823
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-3">
                <div class="card warna-footer" style="border-top:none;border-bottom:none;border-left:none;border-right:none;">
                    <div class="card-body">
                        <p class="card-title">Social Media</p>
                        <div class="row">
                            <div class="col-2 mb-3">
                                <img src="gambar/Facebook.png" alt="" width="50px" height="50px">
                            </div>
                            <div class="col-2 mb-3">
                                <img src="gambar/Twitter.png" alt="" width="50px" height="50px">
                            </div>
                            <div class="col-2 mb-3">
                                <img src="gambar/Instagram.png" alt="" width="50px" height="50px">
                            </div>
                            <div class="col-2 mb-3">
                                <img src="gambar/Linkedin.png" alt="" width="50px" height="50px">
                            </div>
                            <div class="col-2 mb-3">
                                <img src="gambar/Youtube.png" alt="" width="60px" height="60px">
                            </div>
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
</body>
</html>