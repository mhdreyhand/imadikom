@extends('layout')

@section('content')
@auth
<!-- Menampilkan pesan selamat datang hanya jika pengguna telah login -->
<h2 class="text-xl font-semibold font-sans">Selamat Datang, {{ $user->name }}!</h2>
@endauth

{{-- <div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://pmb.amikom.ac.id/id//assets/themes/pmb_reguler/images/labpraktikum.jpeg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://home.amikom.ac.id/media/2020/01/HEAD.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEihrwQRoJ0b6GsfL__YbkST5GDVBceI2VmcYemVR3BYr8IUr14XCzUPIu_d0S-y8pKn6cuu0n0Jr-ilIGuqQZjQedVNb_GwFvqW4B-gkS5ycC6ibnDAeCDEq7YuVmxG6J9eRNB4BMapg70/s1600/fakultas-program-studi-universitas-amikom.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://i.ytimg.com/vi/H_crsnAiwbo/maxresdefault.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://fokuskampus.com/wp-content/uploads/2023/09/img.211-Pemkab-Sleman-Bersama-Universitas-AMIKOM-Yogyakarta-Menggelar-Program-Beasiswa.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div> --}}

<div class="relative">
    <!-- Background Image -->
    <img src="{{asset('images/slide4.jpg')}}" class="absolute inset-0 w-full h-full object-cover z-0 color opacity-30" alt="Background Image">

    <!-- Content -->
    <div class="text-black py-20 relative">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-2 text-center font-sans">IMADIKOM</h1>
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="h-auto w-full max-w-sm mx-auto mb-4">
            </div>
            <p class="text-center text-lg mb-4 font-bold font-sans">IMADIKOM (Ikatan Mahasiswa Bidikmisi & KIP-K Amikom) merupakan organisasi untuk para penerima beasiswa KIP-K.</p>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-8 flex flex-wrap justify-center">
    <!-- Visi Card -->
    <div class="max-w-md mx-4 bg-white shadow-md rounded px-6 pt-6 pb-8 mb-4">
        <h2 class="text-3xl font-bold text-sky-500 text-center mb-4 font-sans">VISI</h2>
        <p class="mt-1 font-sans">
            Mewujudkan IMADIKOM yang inspiratif
            berkualitas tinggi dengan taraf pendidikan yang berprestasi,
            berinovasi, dengan mahasiswa yang berkarakter, aktif, inovatif,
            solidaritas, dilandasi IMTAQ dan IPTEK dan berwawasan kekeluargaan.
        </p>
    </div>

    <!-- Misi Card -->
    <div class="max-w-md mx-4 bg-white shadow-md rounded px-6 pt-6 pb-8 mb-4">
        <h2 class="text-3xl font-bold text-sky-500 text-center mb-4 font-sans">MISI</h2>
        <ul class="list-disc pl-5 mt-1 font-sans">
            <li>Meningkatkan keimanan dan ketakwaan kepada Tuhan Yang Maha Esa.</li>
            <li>Membangun internal yang kokoh berasaskan profesionalisme dan semangat kekeluargaan.</li>
            <li>Meningkatkan rasa solidaritas dan kekeluargaan antar sesama mahasiswa.</li>
            <li>Membangun hubungan yang baik dan sinergis antar elemen internal dan eksternal Universitas Amikom Yogyakarta.</li>
            <li>Membudayakan hidup disiplin, berbudi pekerti luhur, berjiwa sosial, dan bekerja cerdas.</li>
            <li>Mengadakan dan meneruskan kegiatan yang bersifat positif dan bermanfaat kepada Universitas Amikom Yogyakarta.</li>
            <li>Bersama mewujudkan IMADIKOM yang maju dan berkualitas.</li>
        </ul>
    </div>
</div>

<div class="container mx-auto px-4 py-8 flex flex-wrap justify-center">
    <!-- Visi Card -->
    <div class="max-w-md mx-4 bg-white shadow-md rounded px-6 pt-6 pb-8 mb-4">
        <h2 class="text-3xl font-bold text-sky-500 text-center mb-4 font-sans">VISI</h2>
        <p class="mt-1 font-sans">
            Mewujudkan IMADIKOM yang inspiratif
            berkualitas tinggi dengan taraf pendidikan yang berprestasi,
            berinovasi, dengan mahasiswa yang berkarakter, aktif, inovatif,
            solidaritas, dilandasi IMTAQ dan IPTEK dan berwawasan kekeluargaan.
        </p>
    </div>

    <!-- Misi Card -->
    <div class="max-w-md mx-4 bg-white shadow-md rounded px-6 pt-6 pb-8 mb-4">
        <h2 class="text-3xl font-bold text-sky-500 text-center mb-4 font-sans">MISI</h2>
        <ul class="list-disc pl-5 mt-1 font-sans">
            <li>Meningkatkan keimanan dan ketakwaan kepada Tuhan Yang Maha Esa.</li>
            <li>Membangun internal yang kokoh berasaskan profesionalisme dan semangat kekeluargaan.</li>
            <li>Meningkatkan rasa solidaritas dan kekeluargaan antar sesama mahasiswa.</li>
            <li>Membangun hubungan yang baik dan sinergis antar elemen internal dan eksternal Universitas Amikom Yogyakarta.</li>
            <li>Membudayakan hidup disiplin, berbudi pekerti luhur, berjiwa sosial, dan bekerja cerdas.</li>
            <li>Mengadakan dan meneruskan kegiatan yang bersifat positif dan bermanfaat kepada Universitas Amikom Yogyakarta.</li>
            <li>Bersama mewujudkan IMADIKOM yang maju dan berkualitas.</li>
        </ul>
    </div>
</div>

<div class="container mx-auto px-4 py-8 flex flex-wrap justify-center">
    <!-- Visi Card -->
    <div class="max-w-md mx-4 bg-white shadow-md rounded px-6 pt-6 pb-8 mb-4">
        <h2 class="text-3xl font-bold text-sky-500 text-center mb-4 font-sans">VISI</h2>
        <p class="mt-1 font-sans">
            Mewujudkan IMADIKOM yang inspiratif
            berkualitas tinggi dengan taraf pendidikan yang berprestasi,
            berinovasi, dengan mahasiswa yang berkarakter, aktif, inovatif,
            solidaritas, dilandasi IMTAQ dan IPTEK dan berwawasan kekeluargaan.
        </p>
    </div>

    <!-- Misi Card -->
    <div class="max-w-md mx-4 bg-white shadow-md rounded px-6 pt-6 pb-8 mb-4">
        <h2 class="text-3xl font-bold text-sky-500 text-center mb-4 font-sans">MISI</h2>
        <ul class="list-disc pl-5 mt-1 font-sans">
            <li>Meningkatkan keimanan dan ketakwaan kepada Tuhan Yang Maha Esa.</li>
            <li>Membangun internal yang kokoh berasaskan profesionalisme dan semangat kekeluargaan.</li>
            <li>Meningkatkan rasa solidaritas dan kekeluargaan antar sesama mahasiswa.</li>
            <li>Membangun hubungan yang baik dan sinergis antar elemen internal dan eksternal Universitas Amikom Yogyakarta.</li>
            <li>Membudayakan hidup disiplin, berbudi pekerti luhur, berjiwa sosial, dan bekerja cerdas.</li>
            <li>Mengadakan dan meneruskan kegiatan yang bersifat positif dan bermanfaat kepada Universitas Amikom Yogyakarta.</li>
            <li>Bersama mewujudkan IMADIKOM yang maju dan berkualitas.</li>
        </ul>
    </div>
</div>

@endsection
</html>