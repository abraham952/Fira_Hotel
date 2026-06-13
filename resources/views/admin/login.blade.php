<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - FiraHotel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-[#FAF8F5] to-[#E5E3DC] min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-br from-[#D4AF37] to-[#B59A6A] rounded-xl flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl font-bold">F</span>
                </div>
                <h1 class="font-serif text-3xl text-[#1A1816] mb-2">FiraHotel</h1>
                <p class="text-sm text-[#6B6560] tracking-wider uppercase">Admin Dashboard</p>
            </div>

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('admin.bookings.index') }}" method="GET">
                <div class="mb-6">
                    <label class="block text-xs uppercase tracking-wider text-[#6B6560] mb-2 font-semibold">
                        Admin Password
                    </label>
                    <input 
                        type="password" 
                        name="admin_password" 
                        required
                        autofocus
                        class="w-full px-4 py-3 border border-[#E5E3DC] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C9A961] focus:border-transparent transition-all"
                        placeholder="Enter admin password"
                    >
                </div>

                <button 
                    type="submit"
                    class="w-full bg-gradient-to-r from-[#D4AF37] to-[#B59A6A] text-white font-semibold py-3 rounded-lg hover:shadow-lg transition-all duration-300 uppercase tracking-wider text-sm"
                >
                    Access Dashboard
                </button>
            </form>

            <div class="mt-6 pt-6 border-t border-[#E5E3DC] text-center">
                <a href="{{ route('home') }}" class="text-sm text-[#6B6560] hover:text-[#C9A961] transition-colors">
                    ← Back to Website
                </a>
            </div>
        </div>

        <p class="text-center text-xs text-[#6B6560] mt-6">
            Default password: admin123 (Change in .env)
        </p>
    </div>
</body>
</html>
