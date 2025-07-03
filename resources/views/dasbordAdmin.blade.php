<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>P2K</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-700 text-white flex flex-col p-6">
      <h2 class="text-2xl font-bold mb-10">P2K</h2>
      <p class="white-space: nowrap;">Platform Pelaporan Kerusakan</p>
      <nav class="space-y-4">
        <a href="#" class="block px-4 py-2 rounded hover:bg-blue-800">🏠 Home</a>
      </nav>
      <form action="/logout" method="POST" class="mt-auto">
        @csrf
        <button type="submit" class="w-full mt-10 bg-red-500 hover:bg-red-600 py-2 rounded text-white">
          Logout
        </button>
      </form>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10">
      <!-- Header -->
      <!-- Header -->
      <div class="flex justify-between items-center mb-8 px-4 py-2 bg-white shadow rounded-xl">
        <!-- Teks Selamat Datang -->
        <h1 class="text-2xl font-semibold text-gray-800">
          Selamat datang, <span class="text-blue-600">{{ Auth::user()->name ?? 'User' }}</span>
        </h1>

        <!-- Profil Lingkaran (dengan hover dan inisial nama) -->
        <div class="relative group">
          <div class="w-12 h-12 rounded-full bg-blue-600 text-white flex items-center justify-center text-lg font-bold cursor-pointer shadow hover:scale-105 transition-transform">
            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
          </div>

          <!-- Tooltip saat hover -->
          <div class="absolute right-0 mt-2 bg-gray-800 text-white text-sm rounded py-1 px-3 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
            {{ Auth::user()->email ?? 'user@example.com' }}
          </div>
        </div>
      </div>

      <!-- Cards -->
      <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
        <!-- Tabel Laporan -->
        <div class="mt-10 bg-white rounded-xl shadow p-6">
          <h2 class="text-xl font-bold mb-4 text-blue-600">Data Laporan Masuk</h2>

          <div class="overflow-x-auto">
              <tbody class="text-sm text-gray-700">
                @forelse ($laporans as $index => $laporan)
                @empty
                  <tr>
                    <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data laporan.</td>
                  </tr>
                @endforelse
              </tbody>
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-100 text-left text-sm font-semibold text-gray-600">
                <tr>
                  <th class="px-4 py-2">No</th>
                  <th class="px-4 py-2">Nama</th>
                  <th class="px-4 py-2">Tanggal</th>
                  <th class="px-4 py-2">Lokasi</th>
                  <th class="px-4 py-2">Deskripsi</th>
                  <th class="px-4 py-2">Status</th>
                  <th class="px-4 py-2">Aksi</th>
                </tr>
              </thead>
              <tbody class="text-sm text-gray-700">
                @forelse ($laporans as $index => $laporan)
                  <tr class="border-t">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $laporan->nama }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($laporan->tanggal_melapor)->format('d-m-Y') }}</td>
                    <td class="px-4 py-2">{{ $laporan->lokasi_kerusakan }}</td>
                    <td class="px-4 py-2">{{ $laporan->deskripsi_kerusakan }}</td>

                    <!-- Form Ubah Status -->
                    <td class="px-4 py-2">
                      <form action="{{ route('laporan.updateStatus', $laporan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" onchange="this.form.submit()" class="px-2 py-1 rounded border text-sm">
                          <option value="proses" {{ $laporan->status == 'proses' ? 'selected' : '' }}>Proses</option>
                          <option value="diterima" {{ $laporan->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                          <option value="ditolak" {{ $laporan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                      </form>
                    </td>

                    <!-- Tombol Aksi -->
                    <td class="px-4 py-2 space-x-2">
                      <a href="javascript:void(0);"
                        onclick="openModal(
                          '{{ $laporan->id }}',
                          '{{ $laporan->nama }}',
                          '{{ $laporan->tanggal_melapor }}',
                          '{{ $laporan->lokasi_kerusakan }}',
                          '{{ $laporan->deskripsi_kerusakan }}'
                        )"
                        class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">
                        Edit
                      </a>

                      <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST" class="inline-block"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">Hapus</button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" class="text-center py-4 text-gray-500">Belum ada data laporan.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>

          </div>
        </div>


      </div>
      <!-- MODAL EDIT -->
      <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg relative">
          <h2 class="text-xl font-bold mb-4 text-blue-600">Edit Laporan</h2>

          <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-400 hover:text-red-500 text-xl font-bold">&times;</button>

          <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" id="laporan_id">

            <div class="mb-4">
              <label class="block font-medium">Nama</label>
              <input type="text" name="nama" id="edit_nama" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
              <label class="block font-medium">Tanggal Melapor</label>
              <input type="date" name="tanggal_melapor" id="edit_tanggal" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
              <label class="block font-medium">Lokasi Kerusakan</label>
              <input type="text" name="lokasi_kerusakan" id="edit_lokasi" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
              <label class="block font-medium">Deskripsi Kerusakan</label>
              <textarea name="deskripsi_kerusakan" id="edit_deskripsi" class="w-full border p-2 rounded" rows="3"></textarea>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded w-full">
              Simpan Perubahan
            </button>
          </form>
        </div>
      </div>


    </main>
  </div>
  <script>
    function openModal(id, nama, tanggal, lokasi, deskripsi) {
      document.getElementById('editModal').classList.remove('hidden');

      // Isi data ke input
      document.getElementById('edit_nama').value = nama;
      document.getElementById('edit_tanggal').value = tanggal;
      document.getElementById('edit_lokasi').value = lokasi;
      document.getElementById('edit_deskripsi').value = deskripsi;

      // Atur action URL form
      const form = document.getElementById('editForm');
      form.action = `/laporan/${id}`;
    }

    function closeModal() {
      document.getElementById('editModal').classList.add('hidden');
    }
  </script>


</body>
</html>
