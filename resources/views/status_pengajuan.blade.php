<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Status Pengajuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold mb-6">Status Pengajuan Anda</h2>

        @if($laporans->isEmpty())
            <p class="text-gray-600">Belum ada laporan yang diajukan.</p>
        @else
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                <thead class="bg-gray-100 text-gray-700 font-semibold">
                    <tr>
                        <th class="py-3 px-6 text-left">Tanggal</th>
                        <th class="py-3 px-6 text-left">Lokasi</th>
                        <th class="py-3 px-6 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporans as $laporan)
                        <tr class="border-t">
                            <td class="py-3 px-6">{{ \Carbon\Carbon::parse($laporan->tanggal_melapor)->format('d M Y') }}</td>
                            <td class="py-3 px-6">{{ $laporan->lokasi_kerusakan }}</td>
                            <td class="py-3 px-6">
                                @if($laporan->status == 'proses')
                                    <span class="text-yellow-500 font-semibold">Proses</span>
                                @elseif($laporan->status == 'diterima')
                                    <span class="text-green-600 font-semibold">Diterima</span>
                                @else
                                    <span class="text-red-600 font-semibold">Ditolak</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>