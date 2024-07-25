<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMADIKOM</title>
    <!-- Mengimpor Tailwind CSS -->
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="bg-white flex flex-col min-h-screen">
    <header class="bg-white text-black sticky top-0">
        <nav class="container mx-auto flex justify-between items-center p-4">
            <!-- Logo -->
            <div class="flex items-center">
                <img src="{{ asset('images/logogram1.png') }}" alt="Logo-putih" class="h-12">
            </div>

            <!-- Menu -->
            <ul class="hidden md:flex items-center space-x-4 z-10">
                <li class="{{ request()->routeIs('home') ? 'bg-slate-50 text-black font-bold' : '' }}">
                    <a href="{{ route('home') }}" class="block px-4 py-2 font-sans {{ request()->routeIs('home') ? 'text-sky-500' : 'hover:text-sky-500' }}">
                        Home
                    </a>
                </li>
                <li class="{{ request()->routeIs('divisi') ? 'bg-slate-50 text-black font-bold' : '' }}">
                    <a href="{{ route('divisi') }}" class="block px-4 py-2 font-sans {{ request()->routeIs('divisi') ? 'text-sky-500' : 'hover:text-sky-500' }}">
                        Divisi
                    </a>
                </li>
                {{-- <li class="{{ request()->routeIs('divisi') ? 'bg-slate-50 text-black font-bold' : '' }}">
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdownId" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Dropdown button <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                        
                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                            </li>
                            <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                <li class="{{ request()->routeIs('pengurus.index') ? 'bg-slate-50 text-black font-bold' : '' }}">
                    <a href="{{ route('pengurus.index') }}" class="block px-4 py-2 font-sans {{ request()->routeIs('pengurus.index') ? 'text-sky-500' : 'hover:text-sky-500' }}">
                        Pengurus
                    </a>
                </li>
                <li class="{{ request()->routeIs('anggota.index') ? 'bg-slate-50 text-black font-bold' : '' }}">
                    <a href="{{ route('anggota.index') }}" class="block px-4 py-2 font-sans {{ request()->routeIs('anggota.index') ? 'text-sky-500' : 'hover:text-sky-500' }}">
                        Anggota
                    </a>
                </li>
                <li class="{{ request()->routeIs('alumni.index') ? 'bg-slate-50 text-black font-bold' : '' }}">
                    <a href="{{ route('alumni.index') }}" class="block px-4 py-2 font-sans {{ request()->routeIs('alumni.index') ? 'text-sky-500' : 'hover:text-sky-500' }}">
                        Alumni
                    </a>
                </li>
                <li class="{{ request()->routeIs('proker.index') ? 'bg-slate-50 text-black font-bold' : '' }}">
                    <a href="{{ route('proker.index') }}" class="block px-4 py-2 font-sans {{ request()->routeIs('proker.index') ? 'text-sky-500' : 'hover:text-sky-500' }}">
                        Proker
                    </a>
                </li>
                <li class="{{ request()->routeIs('jadwal.index') ? 'bg-slate-50 text-black font-bold' : '' }}">
                    <a href="{{ route('jadwal.index') }}" class="block px-4 py-2 font-sans {{ request()->routeIs('jadwal.index') ? 'text-sky-500' : 'hover:text-sky-500' }}">
                        Jadwal
                    </a>
                </li>
                <li class="{{ request()->routeIs('dokumentasi.index') ? 'bg-slate-50 text-black font-bold' : '' }}">
                    <a href="{{ route('dokumentasi.index') }}" class="block px-4 py-2 font-sans {{ request()->routeIs('dokumentasi.index') ? 'text-sky-500' : 'hover:text-sky-500' }}">
                        Dokumentasi
                    </a>
                </li>
                @if(Auth::check())
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-black font-sans hover:text-sky-500">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </li>
                @else
                <li>
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-black font-sans hover:text-sky-500">
                        Login
                    </a>
                </li>
                @endif
            </ul>

            <!-- Menu Button for Mobile View -->
            <div class="md:hidden">
                <button id="menu-toggle" class="text-black focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>

        <!-- Mobile Menu -->
        <ul id="mobile-menu" class="bg-slate-50 text-black hidden absolute w-full z-50">
            <li class="{{ request()->routeIs('home') ? 'bg-slate-50 text-black font-bold' : '' }}">
                <a href="{{ route('home') }}" class="block px-4 py-2 {{ request()->routeIs('home') ? 'text-sky-500' : 'hover:text-sky-500' }}">
                    Home
                </a>
            </li>
            <li class="{{ request()->routeIs('divisi') ? 'bg-slate-50 text-black font-bold' : '' }}">
                <a href="{{ route('divisi') }}" class="block px-4 py-2 {{ request()->routeIs('divisi') ? 'text-sky-500' : 'hover:text-sky-500' }}">
                    Divisi
                </a>
            </li>
            <li class="{{ request()->routeIs('pengurus.index') ? 'bg-slate-50 text-black font-bold' : '' }}">
                <a href="{{ route('pengurus.index') }}" class="block px-4 py-2 {{ request()->routeIs('pengurus.index') ? 'text-sky-500' : 'hover:text-sky-500' }}">
                    Pengurus
                </a>
            </li>
            <li class="{{ request()->routeIs('proker.index') ? 'bg-slate-50 text-black font-bold' : '' }}">
                <a href="{{ route('proker.index') }}" class="block px-4 py-2 font-sans {{ request()->routeIs('proker.index') ? 'text-sky-500' : 'hover:text-sky-500' }}">
                    Proker
                </a>
            </li>
            <li class="{{ request()->routeIs('jadwal.index') ? 'bg-slate-50 text-black font-bold' : '' }}">
                <a href="{{ route('jadwal.index') }}" class="block px-4 py-2 {{ request()->routeIs('jadwal.index') ? 'text-sky-500' : 'hover:text-sky-500' }}">
                    Jadwal
                </a>
            </li>
            <li class="{{ request()->routeIs('dokumentasi.index') ? 'bg-slate-50 text-black font-bold' : '' }}">
                <a href="{{ route('dokumentasi.index') }}" class="block px-4 py-2 {{ request()->routeIs('dokumentasi.index') ? 'text-sky-500' : 'hover:text-sky-500' }}">
                    Dokumentasi
                </a>
            </li>
            @if(Auth::check())
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-black hover:text-sky-500">
                    Logout
                </a>
            </li>
            @else
            <li>
                <a href="{{ route('login') }}" class="block px-4 py-2 text-black hover:text-sky-500">
                    Login
                </a>
            </li>
            @endif
        </ul>
    </header>

    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- footer-->
    <footer class="cotainer bg-sky-300 text-black p-10 w-full ">
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/Logo-putih.png') }}" alt="Logo-putih" class="h-12 w-auto mb-4 ml-4">
            <p class="text-center text-sm mb-2 mx-auto">Alamat: Jl. Ring Road Utara, Ngringin, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta. 55281</p>
            <div class="flex space-x-4 mb-2">
                <a href="https://www.instagram.com/imadikom/" target="_blank" class="hover:text-gray-500 flex items-center">
                    <i class="fab fa-instagram font-sans"></i>: imadikom
                </a>
                <a href="mailto:imadikom@amikom.ac.id" class="hover:text-gray-500 flex items-center">
                    <i class="far fa-envelope font-sans"></i>: imadikom@amikom.ac.id
                </a>
            </div>
            <p class="text-center text-sm font-sans">© 2024 IMADIKOM</p>

        </div>
    </footer>


    <!-- Script for Mobile Menu Toggle -->
    <script>
        function toggleDivisiDropdown(event) {
            event.preventDefault();
            var divisiDropdown = document.getElementById('divisi-dropdown');
            divisiDropdown.classList.toggle('hidden');
        }

        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

    <!-- Script for Flowbite -->
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>