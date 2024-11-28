<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/js/main.js'])
</head>

<body x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark text-bodydark bg-boxdark-2': darkMode === true }">
    <!-- ===== Preloader Start ===== -->
    <!-- @include('partials.preloader') -->
    <!-- ===== Preloader End ===== -->

    @include('partials.header-landing')
    <section id="appointment" class="appointment section dark-background">

        <img src="{{ asset('landing/hero-1.jpg') }}" alt="" data-aos="fade-in">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            @yield('content')
        </div>

    </section>


    <footer id="footer" class="footer relative bg-gray-900 text-white py-4">

        <div class="container mx-auto text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1">Team Swap</strong> <span>All Rights Reserved</span></p>
            <div class="credits">Design by Gonzales, Lois</div>
        </div>

    </footer>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ session("success") }}',
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        </script>
    @endif
</body>

</html>
