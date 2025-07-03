<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Pengguna</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">



    <div class="max-w-6xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6">👥 Manajemen Pengguna</h1>

        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">NIM / ID</th>
                        <th class="px-4 py-2 text-left">Role</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $i => $user)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $i + 1 }}</td>
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2">{{ $user->nim ?? '-' }}</td>
                            <td class="px-4 py-2 capitalize">{{ $user->role ?? 'mahasiswa' }}</td>
                            <td class="px-4 py-2">
