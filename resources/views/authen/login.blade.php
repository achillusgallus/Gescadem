<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Connection</title>
    <!-- Assure-toi que Tailwind est chargé dans ton layout/global -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center py-12">

        <div class="flex justify-center mb-4">
            <img src="{{ asset('assets/Design_sans_titre-removebg-preview.png') }}" alt="Logo" class="h-18 w-auto">
        </div>
    <div class="w-full max-w-md bg-white border border-gray-200 rounded-lg shadow-sm p-8">

        <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Connection</h1>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-50 text-red-700 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('authen.login') }}" novalidate class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required>

            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input id="password" name="password" type="password"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required current="password">
                @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            @error('terms')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror

            <div class="pt-4">
                <button type="submit"
                    class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    connectez-vous
                </button>
            </div>

            <p class="mt-4 text-sm text-center text-gray-600">
                 pas de compte ?
                <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">S'inscrire</a>
            </p>
        </form>
    </div>
</body>
</html>
