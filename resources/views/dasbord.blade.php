<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <div class="flex min-h-screen">

    <!-- Sidebar -->
<aside class="bg-gradient-to-b from-blue-300 to-blue-100 text-blue-900 w-64 min-h-screen p-5 rounded-r-3xl shadow flex flex-col">
  <h2 class="text-2xl font-bold mb-6">P2K</h2>
  <p class="mb-8 text-sm">Platform Pelaporan Kerusakan</p>
  
    <nav class="space-y-3">
      <!-- Home -->
      <a href="#" class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-white hover:text-blue-700 transition">
        🏠 <span>Home</span>
      </a>

      <!-- Profil -->
      <a href="{{ route('profil') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-white hover:text-blue-700 transition">
        🧑‍💻 <span>Profil</span>
      </a>

      <!-- Status Pengajuan -->
      <a href="{{ route('status.pengajuan') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-white hover:text-blue-700 transition">
        📄 <span>Status Pengajuan</span>
      </a>
    </nav>

  <!-- Logout Button -->
  <form action="/logout" method="POST" class="mt-auto">
    @csrf
    <button type="submit" class="w-full mt-10 bg-red-500 hover:bg-red-600 py-2 rounded-lg text-white font-semibold transition">
      Logout
    </button>
  </form>
</aside>

    <!-- Main Content -->
    <main class="flex-1 p-10">
      <!-- Header -->
      <div class="flex justify-between items-center mb-8 px-4 py-2 bg-white shadow rounded-xl">
        <h1 class="text-2xl font-semibold text-gray-800">
          Selamat datang, <span class="text-blue-600">{{ Auth::user()->name ?? 'User' }}</span>
        </h1>

        <div class="relative group">
          <div class="w-12 h-12 rounded-full bg-blue-600 text-white flex items-center justify-center text-lg font-bold cursor-pointer shadow hover:scale-105 transition-transform">
            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
          </div>
          <div class="absolute right-0 mt-2 bg-gray-800 text-white text-sm rounded py-1 px-3 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
            {{ Auth::user()->email ?? 'user@example.com' }}
          </div>
        </div>
      </div>

<!-- ✅ Form Pelaporan Modern -->
<div class="bg-white rounded-xl shadow-md p-8 w-full max-w-2xl mx-auto">
  <h2 class="text-2xl font-bold mb-6 text-blue-600">Formulir Pelaporan</h2>

  {{-- Alert Sukses --}}
  @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md shadow-sm">
      {{ session('success') }}
    </div>
  @endif

  <form action="/lapor" method="POST" class="space-y-5">
    @csrf

    <!-- Nama -->
    <div>
      <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
      <div class="flex items-center bg-gray-50 border border-gray-300 rounded-xl px-3 py-2 shadow-sm">
        <span class="text-gray-400 mr-2">🧑</span>
        <input type="text" name="nama" id="nama" placeholder="Masukkan nama Anda"
          class="w-full bg-transparent focus:outline-none text-gray-800" />
      </div>
    </div>

    <!-- Tanggal Melapor -->
    <div>
      <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Melapor</label>
      <div class="flex items-center bg-gray-50 border border-gray-300 rounded-xl px-3 py-2 shadow-sm">
        <span class="text-gray-400 mr-2">📅</span>
        <input type="date" name="tanggal_melapor" id="tanggal"
          class="w-full bg-transparent focus:outline-none text-gray-800" />
      </div>
    </div>

    <!-- Lokasi Kerusakan -->
    <div>
      <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-1">Lokasi Kerusakan</label>
      <div class="flex items-center bg-gray-50 border border-gray-300 rounded-xl px-3 py-2 shadow-sm">
        <span class="text-gray-400 mr-2">📍</span>
        <input type="text" name="lokasi_kerusakan" id="lokasi" placeholder="Masukkan lokasi kerusakan"
          class="w-full bg-transparent focus:outline-none text-gray-800" />
      </div>
    </div>

    <!-- Deskripsi Kerusakan -->
    <div>
      <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Kerusakan</label>
      <textarea name="deskripsi_kerusakan" id="deskripsi" rows="4" placeholder="Jelaskan kerusakan dengan detail"
        class="w-full bg-gray-50 border border-gray-300 rounded-xl shadow-sm px-4 py-2 focus:outline-none text-gray-800 resize-none"></textarea>
    </div>

    <!-- Tombol Submit -->
    <button type="submit"
      class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 w-full rounded-xl shadow transition">
      Kirim Laporan 🚀
    </button>
  </form>
</div>


    </main>
  </div>

</body>
</html>
