<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-6xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-4">Manajemen Pengguna</h2>
        <table class="w-full bg-white shadow rounded-lg">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4">No</th>
                    <th class="py-2 px-4">Nama</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $i => $user)
                <tr class="border-b">
                    <td class="py-2 px-4">{{ $i + 1 }}</td>
                    <td class="py-2 px-4">{{ $user->name }}</td>
                    <td class="py-2 px-4">{{ $user->email }}</td>
                    <td class="py-2 px-4">{{ $user->role ?? 'mahasiswa' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
