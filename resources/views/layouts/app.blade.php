<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - GESCADMEC</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->

        <x-sidebar />

        <!-- Main Content -->
        <div class="flex-1">
            <header class="bg-white shadow">
                <div class="flex items-center justify-between px-8 py-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Tableau de bord</h2>
                    <div class="flex items-center">
                        <form method="POST" action="{{ route('dashboard.store') }}">
                            @csrf
                            <button type="submit"
                                    class="text-indigo-600 hover:text-indigo-800 px-4 py-2 rounded-md text-sm">
                                 Retour au tableau de bord
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            @yield('content')

        </div>
    </div>
</body>
</html>
