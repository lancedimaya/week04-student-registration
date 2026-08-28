<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Registration') — CIT Registration System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            300: '#a5b4fc',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">
    <header class="bg-brand-800 text-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-4 flex items-center justify-between">
            <a href="{{ route('students.index') }}" class="flex items-center gap-3 font-bold text-lg tracking-tight hover:text-brand-200 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422A12.083 12.083 0 0121 12v4a12.083 12.083 0 01-2.84 1.422L12 18l-6.16-3.422A12.083 12.083 0 013 12v-4a12.083 12.083 0 012.84-1.422L12 14z" />
                </svg>
                CIT Student Registration
            </a>
            <nav class="flex items-center gap-4 text-sm">
                <a href="{{ route('students.index') }}" class="hover:text-brand-200 transition font-medium">Students</a>
                <a href="{{ route('students.create') }}" class="bg-white text-brand-800 px-4 py-2 rounded-lg font-semibold hover:bg-brand-50 transition shadow-sm">Register Student</a>
            </nav>
        </div>
    </header>

    <main class="flex-1 max-w-6xl w-full mx-auto px-4 sm:px-6 py-8">
        @if (session('success'))
            <div class="mb-6 flex items-center gap-3 bg-brand-100 border border-brand-300 text-brand-900 px-4 py-3 rounded-lg shadow-sm" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-slate-200 text-slate-500 text-center text-sm py-4">
        &copy; {{ date('Y') }} College of Information Technology — Student Registration System
    </footer>
</body>
</html>