<!-- resources/views/admin/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-800 text-white">
            <div class="p-4">
                <h1 class="text-2xl font-bold">Admin Panel</h1>
            </div>
            <nav class="mt-4">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-blue-700 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.training-programs.index') }}" class="block px-4 py-2 hover:bg-blue-700 {{ request()->routeIs('admin.training-programs.*') ? 'bg-blue-700' : '' }}">
                    Training Programs
                </a>
                <a href="{{ route('admin.training-statistics.index') }}" class="block px-4 py-2 hover:bg-blue-700 {{ request()->routeIs('admin.training-statistics.*') ? 'bg-blue-700' : '' }}">
                    Statistics
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4">
                    <h2 class="text-3xl font-bold text-gray-800">@yield('header')</h2>
                </div>
            </header>

            <main class="max-w-7xl mx-auto py-6 px-4">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>