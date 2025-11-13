


<div class="w-64 bg-blue-500 ">

            <div class="flex items-center justify-center h-20 shadow-md">
                <img src="{{ asset('assets/Design_sans_titre-removebg-preview.png') }}" alt="Logo" class="justify-center items-center h-20 w-20"/>
                <h1 class="text-white text-2xl font-bold">GESCADMEC</h1>
            </div>
            <nav class="mb-300">
                <a href="{{ route('students.inscription') }}"
                   class="flex items-center mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:text-gray-100">
                    <span class="mx-3">Inscriptions</span>
                </a>

                <a href="{{ route('students.paiement') }}"
                   class="flex items-center mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:text-gray-100">
                    <span class="mx-3">Paiements</span>
                </a>

                <a href="{{ route('students.besoin') }}"
                   class="flex items-center mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:text-gray-100">
                    <span class="mx-3">Besoins</span>
                </a>

                <a href="{{ route('students.info') }}"
                    class="flex items-center mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:text-gray-100">
                     <span class="mx-3">Informations Étudiants</span>
                </a>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center mt-4 py-2 px-6 text-gray-300 hover:bg-gray-700 hover:text-gray-100">
                    <span class="mx-3">Tableau de bord</span>
                </a>

            </nav>

        <div class="border-t border-gray-700 mt-30">

        </div>
        <form method="POST" action="{{ route('logout') }}" class="p-30">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2  w-full mt-50">
                Déconnexion
            </button>
        </form>

        </div>

