<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - P3K</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gradient-to-br from-blue-200 via-white to-blue-100 min-h-screen flex items-center justify-center font-sans">

  <div class="w-full max-w-md bg-gradient-to-b from-blue-200 via-blue-100 to-orange-100 rounded-3xl shadow-xl p-8 relative">

    <!-- Logo -->
  <div class="text-center mb-6">
    <img src="{{ asset('images/logo-STT-NF-1.png') }}" alt="Logo STT NF" class="mx-auto h-24 w-24 mb-2">
    <p class="text-xl font-semibold text-blue-700">STT TERPADU NURUL FIKRI</p>
  </div>


    <!-- Error Alert -->
    @if(Session::has('error'))
      <script>
        Swal.fire({
          icon: 'error',
          title: 'Login Failed',
          text: '{{ Session::get('error') }}',
        });
      </script>
    @endif

    <form action="{{ route('login') }}" method="POST" class="space-y-5">
      @csrf

      <!-- Email Field -->
      <div>
        <label class="block text-sm text-gray-700 mb-1">Email or Username</label>
        <div class="flex items-center border border-gray-300 rounded-lg px-3 py-2 bg-white">
          <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
            d="M5.121 17.804A3 3 0 015 17V5a3 3 0 013-3h8a3 3 0 013 3v12a3 3 0 01-.121.804M12 11v2m0 4h.01"/></svg>
          <input type="text" name="email" placeholder="you@example.com"
            class="w-full outline-none text-sm" required />
        </div>
      </div>

      <!-- Password Field -->
      <div>
        <label class="block text-sm text-gray-700 mb-1">Password</label>
        <div class="flex items-center border border-gray-300 rounded-lg px-3 py-2 bg-white">
          <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
            d="M12 11c1.38 0 2.5-1.12 2.5-2.5S13.38 6 12 6s-2.5 1.12-2.5 2.5S10.62 11 12 11z" /><path
            stroke-linecap="round" stroke-linejoin="round"
            d="M21 12.5C19.73 8.36 15.97 5.5 12 5.5S4.27 8.36 3 12.5c1.27 4.14 5.03 7 9 7s7.73-2.86 9-7z" /></svg>
          <input type="password" name="password" id="password" placeholder="********"
            class="w-full outline-none text-sm" required />
          <button type="button" onclick="togglePassword()" class="ml-2 text-sm text-blue-500 hover:underline">👁️</button>
        </div>
      </div>

      <!-- Forgot Password -->
      <div class="text-right">
        <a href="#" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
      </div>

      <!-- Submit Button -->
      <button type="submit" 
        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition font-semibold">
        Login
      </button>
    </form>

  </div>

  <script>
    function togglePassword() {
      const input = document.getElementById("password");
      input.type = input.type === "password" ? "text" : "password";
    }
  </script>

</body>
</html>