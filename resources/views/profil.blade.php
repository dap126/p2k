<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>Platform Pelaporan Kerusakan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4895ef;
            --danger: #f72585;
            --success: #4cc9f0;
            --warning: #f8961e;
            --info: #577590;
            --dark: #1a1a2e;
            --light: #f8f9fa;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to bottom right, #f5f7fa, #e4e8f0);
            color: var(--dark);
        }
        
        .header-bg {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            box-shadow: 0 4px 20px rgba(67, 97, 238, 0.3);
        }
        
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            border: none;
            font-weight: 600;
            letter-spacing: 0.5px;
            padding: 12px 28px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.4);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(67, 97, 238, 0.5);
            opacity: 0.95;
        }
        
        .input-field {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 12px 16px;
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(72, 149, 239, 0.3);
        }
        
        .social-icon {
            width: 42px;
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .facebook {
            background: #3b5998;
            color: white !important;
        }
        
        .facebook:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(59, 89, 152, 0.4);
        }
        
        .google {
            background: #db4437;
            color: white !important;
        }
        
        .google:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(219, 68, 55, 0.4);
        }
        
        .github {
            background: #333;
            color: white !important;
        }
        
        .github:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(51, 51, 51, 0.4);
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            padding-bottom: 8px;
            color: var(--secondary);
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50%;
            height: 4px;
            background: var(--accent);
            border-radius: 2px;
        }
        
        .footer {
            background: var(--dark);
            color: white;
        }
        
        .footer a:hover {
            color: var(--accent);
        }
        
        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <header class="header-bg">
        <div class="container mx-auto px-4 py-6 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <h1 class="text-2xl font-bold">Platform Pelaporan Kerusakan</h1>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-12 space-y-16">

        <!-- Profile Section -->
        <section class="card p-8">
            <h2 class="section-title text-3xl font-bold mb-8">Profil Pengguna</h2>
            <div class="flex items-center space-x-6">
                <img src="https://via.placeholder.com/150" alt="Foto Profil" class="avatar">
                <div>
                    <h3 class="text-xl font-semibold">{{ $user->name }}</h3>
                    <p class="text-gray-600">Email: {{ $user->email }}</p>
                    <p class="text-gray-600">Nomor Telepon: {{ $user->phone ?? '-' }}</p>
                </div>
            </div>
        </section>
        <!-- About Section -->
        <section class="card p-8" id="about">
            <h2 class="section-title text-3xl font-bold mb-8">Tentang Kami</h2>
            <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                <img alt="Ilustrasi platform pelaporan kerusakan" class="w-full md:w-1/3 rounded-xl object-cover shadow-lg" src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"/>
                <div class="space-y-4 text-gray-700">
                    <p class="text-lg leading-relaxed">
                        Platform ini memberikan wadah digital bagi civitas akademika STT-NF untuk melaporkan kerusakan sistem, aplikasi, infrastruktur, maupun perangkat kampus dengan cepat, terstruktur, dan terdokumentasi. Sangat cocok digunakan oleh mahasiswa, dosen, staf, maupun bagian teknis untuk meningkatkan efisiensi penanganan masalah teknis di lingkungan kampus.
                    </p>
                    <p class="text-lg leading-relaxed">
                        Dirancang khusus untuk kebutuhan internal STT-NF, platform ini tidak hanya mencatat dan memproses laporan kerusakan secara efisien, tetapi juga mencerminkan semangat inovasi dan eksplorasi teknologi yang selalu dikembangkan di lingkungan kampus STT-NF. Diharapkan sistem ini mampu mempercepat penanganan masalah, mendorong kolaborasi teknis, serta menjadi sarana belajar berbasis teknologi nyata bagi para mahasiswa.
                    </p>
                </div>
            </div>
        </section>

        <div class="mt-12 border-t pt-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-6">Tim Kami</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <div class="text-center">
                    <img src="{{ asset('images/harun.jpg') }}" alt="Admin 1" class="avatar mx-auto mb-3">
                    <h4 class="font-bold text-gray-800">Harun Yahya</h4>
                    <p class="text-gray-600 text-sm">Teknisi Jaringan</p>
                    <p class="text-xs text-gray-500 mt-1">yahya@stt-nf.ac.id</p>
                </div>
                <div class="text-center">
                    <img src="{{ asset('images/rohmat.jpg') }}" alt="Admin 2" class="avatar mx-auto mb-3">
                    <h4 class="font-bold text-gray-800">Rohmatul Hidayat</h4>
                    <p class="text-gray-600 text-sm">Teknisi Perangkat</p>
                    <p class="text-xs text-gray-500 mt-1">rohmat@stt-nf.ac.id</p>
                </div>
                <div class="text-center">
                <img src="{{ asset('images/aull.jpg') }}" alt="Eshi Aulia" class="mx-auto mb-3 rounded-full shadow-lg w-32 h-32 object-cover">
                <h4 class="font-bold text-gray-800">Eshi Aulia</h4>
                <p class="text-gray-600 text-sm">Developer</p>
                <p class="text-xs text-gray-500 mt-1">eshi@stt-nf.ac.id</p>
                </div>
                <div class="text-center">
                    <img src="{{ asset('images/aila.jpg') }}" alt="Hayatu Suhaila" class="mx-auto mb-3 rounded-full shadow-lg w-32 h-32 object-cover">
                    <h4 class="font-bold text-gray-800">Hayatu Suhaila</h4>
                    <p class="text-gray-600 text-sm">Koordinator</p>
                    <p class="text-xs text-gray-500 mt-1">hayatu@stt-nf.ac.id</p>
                </div>
                <div class="text-center">
                    <img src="{{ asset('images/yadi.jpg') }}" alt="Admin 5" class="avatar mx-auto mb-3">
                    <h4 class="font-bold text-gray-800">Mahyadi Sanusi</h4>
                    <p class="text-gray-600 text-sm">Teknisi Software</p>
                    <p class="text-xs text-gray-500 mt-1">yadi@stt-nf.ac.id</p>
                </div>
                <div class="text-center">
                    <img src="{{ asset('images/mutia.jpg') }}" alt="Mutia Rahma" class="mx-auto mb-3 rounded-full shadow-lg w-32 h-32 object-cover">
                    <h4 class="font-bold text-gray-800">Mutia Rahma</h4>
                    <p class="text-gray-600 text-sm">Teknisi Hardware</p>
                    <p class="text-xs text-gray-500 mt-1">mutia@stt-nf.ac.id</p>
                </div>
            </div>
        </div>

        <div class="mt-12 flex justify-center space-x-6">
            <a href="#" class="social-icon github">
                <i class="fab fa-github text-xl"></i>
            </a>
            <a href="#" class="social-icon facebook">
                <i class="fab fa-facebook-f text-xl"></i>
            </a>
            <a href="#" class="social-icon google">
                <i class="fab fa-google text-xl"></i>
            </a>
        </div>
    </main>

    <footer class="footer py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4 text-white">Platform Pelaporan</h3>
                    <p class="text-gray-300">Sistem pelaporan kerusakan terintegrasi untuk lingkungan kampus STT-NF.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-white">Tautan Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Beranda</a></li>
                        <li><a href="#about" class="text-gray-300 hover:text-white transition">Tentang</a></li>
                        <li><a href="#contact" class="text-gray-300 hover:text-white transition">Kontak</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Panduan</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-white">Kontak Kami</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3"></i>
                            <span>Kampus A : Jl. Situ Indah 116, Tugu, Cimanggis, Depok, Jawa Barat.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone-alt mt-1 mr-3"></i>
                            <span>(021) 1234-5678</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-3"></i>
                            <span>info@nurulfikri.ac.id</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-white">Jam Operasional</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li class="flex justify-between">
                            <span>Senin-Jumat</span>
                            <span>08:00 - 17:00</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Sabtu</span>
                            <span>09:00 - 15:00</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Minggu</span>
                            <span>Libur</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
                <p>© 2025 STT-NF. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html>
