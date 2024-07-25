@extends('layout')

@section('content')
<div class="container mx-auto px-4">
    <div class="grid grid-cols-1 gap-6 md:grid-cols-1 lg:grid-cols-1">
        <!-- DIVISI BPH -->
        <div class="bg-white rounded-lg shadow-md p-6 mt-6"> <!-- Tambahkan kelas mt-6 di sini -->
            <h1 class="text-3xl font-bold mb-4 text-center font-sans">DIVISI BPH</h1>
            <img src="{{ asset('images/humas.jpg') }}" alt="Divisi Humas" class="w-1/3 h-auto mb-4 mx-auto rounded-lg">
            <p class="mb-6 font-sans">Divisi Badan Pengurus Harian (BPH) adalah divisi yang melakukan fungsi kontrol, koordinasi, pengembangan, dan peningkatan sistem manajemen administrasi dan keuangan serta komunikasi dalam membangun hubungan internal dan eksternal.</p>
        </div>

        <!-- DIVISI HUMAS -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold mb-4 text-center font-sans">DIVISI HUMAS</h1>
            <img src="{{ asset('images/humas.jpg') }}" alt="Divisi Humas" class="w-1/3 h-auto mb-4 mx-auto rounded-lg">
            <p class="mb-6 font-sans">Divisi Humas merupakan divisi yang menjadi fasilitator, membangun komunikasi yang aktif dan menjalin kerja sama dengan pihak internal maupun eksternal.</p>
        </div>

        <!-- DIVISI KWU -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold mb-4 text-center font-sans">DIVISI KWU</h1>
            <img src="{{ asset('images/humas.jpg') }}" alt="Divisi Humas" class="w-1/3 h-auto mb-4 mx-auto rounded-lg">
            <p class="mb-6 font-sans">Divisi Kewirausahaan (KWU) adalah divisi yang bertanggung jawab dalam hal pencarian sumber pemasukan dan pengelolaan keuangan untuk mewujudkan kemandirian dan kesejahteraan IMADIKOM. Selain itu, Divisi Kewirausahaan juga bertanggung jawab dalam pengembangan kreativitas dan mengasah anggota dalam bidang kewirausahaan.</p>
        </div>

        <!-- DIVISI MULTIMEDIA -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold mb-4 text-center font-sans">DIVISI MULTIMEDIA</h1>
            <img src="{{ asset('images/humas.jpg') }}" alt="Divisi Humas" class="w-1/3 h-auto mb-4 mx-auto rounded-lg">
            <p class="mb-6 font-sans">Divisi Multimedia merupakan divisi yang bergerak di bidang digital seperti desain dan pendokumentasian.</p>
        </div>

        <!-- DIVISI PSDM -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold mb-4 text-center font-sans">DIVISI PSDM</h1>
            <img src="{{ asset('images/humas.jpg') }}" alt="Divisi Humas" class="w-1/3 h-auto mb-4 mx-auto rounded-lg">
            <p class="mb-6 font-sans">Pengembangan Sumber Daya Mahasiswa (PSDM) adalah salah satu divisi dalam IMADIKOM yang bertanggung jawab untuk mengembangkan sumber daya anggota IMADIKOM. Memaksimalkan potensi anggota IMADIKOM sebagai mahasiswa yang aktif, kontributif, dan inspiratif.</p>
        </div>

        <!-- DIVISI SOSMA -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h1 class="text-3xl font-bold mb-4 text-center font-sans">DIVISI SOSMA</h1>
            <img src="{{ asset('images/humas.jpg') }}" alt="Divisi Humas" class="w-1/3 h-auto mb-4 mx-auto rounded-lg">
            <p class="mb-6 font-sans">Divisi Sosial Masyarakat (Sosmas) merupakan divisi yang bertanggung jawab dalam kegiatan di bidang sosial kemasyarakatan IMADIKOM. Divisi ini bertujuan untuk membentuk citra IMADIKOM yang peduli antar sesama.</p>
        </div>
    </div>
</div>
@endsection