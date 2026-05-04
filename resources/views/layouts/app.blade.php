<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="@yield('description', 'GBI Bethlehem — komunitas iman di Jakarta Utara. Jadwal ibadah, kegiatan gereja, dan informasi lokasi. Jl. Jembatan Gambang 2, Penjaringan.')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og_title', config('app.name') . ' — Bertumbuh dalam Kasih & Iman')">
    <meta property="og:description" content="@yield('og_description', 'Komunitas iman yang bertumbuh bersama dalam kasih, persekutuan, dan pelayanan kepada Tuhan dan sesama. Jakarta Utara.')">
    <meta property="og:image" content="{{ secure_asset('images/og-image.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="{{ config('app.name') }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', config('app.name'))">
    <meta name="twitter:description" content="@yield('og_description', 'Komunitas iman yang bertumbuh bersama dalam kasih, persekutuan, dan pelayanan kepada Tuhan dan sesama.')">
    <meta name="twitter:image" content="{{ secure_asset('images/og-image.jpg') }}">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Church",
        "name": "{{ config('app.name') }}",
        "url": "{{ url('/') }}",
        "logo": "{{ secure_asset('images/logo.png') }}",
        "image": "{{ secure_asset('images/og-image.jpg') }}",
        "description": "Komunitas iman yang bertumbuh bersama dalam kasih, persekutuan, dan pelayanan kepada Tuhan dan sesama.",
        "address": {
            "@@type": "PostalAddress",
            "streetAddress": "{{ config('church.address.street') }}",
            "addressLocality": "Jakarta Utara",
            "addressRegion": "DKI Jakarta",
            "postalCode": "14450",
            "addressCountry": "ID"
        },
        "geo": {
            "@@type": "GeoCoordinates",
            "latitude": -6.1387024,
            "longitude": 106.7971735
        },
        "telephone": "{{ config('church.phone') }}",
        "email": "{{ config('church.email') }}",
        "sameAs": [
            "{{ config('church.social.instagram') }}"
        ]
    }
    </script>

    <link rel="icon" type="image/x-icon" href="{{ secure_asset('favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .hero-bg {
            background:
                linear-gradient(135deg, rgba(30,27,75,0.82) 0%, rgba(49,46,129,0.75) 55%, rgba(67,56,202,0.68) 100%),
                url('https://images.unsplash.com/photo-1600288480699-0b0d8a456dd8?w=1920&q=80') center/cover no-repeat;
            position: relative;
            overflow: hidden;
        }
        .hero-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.05) 1px, transparent 0);
            background-size: 36px 36px;
        }
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.25;
            pointer-events: none;
        }
        .nav-scrolled {
            background: rgba(255,255,255,0.95) !important;
            backdrop-filter: blur(12px);
            box-shadow: 0 1px 24px rgba(0,0,0,0.08);
        }
        .card-lift {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .card-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .text-gradient {
            background: linear-gradient(135deg, #818cf8, #c7d2fe);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .wave-top {
            position: absolute;
            top: -1px;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }
        .activity-card:hover .card-icon {
            background: #4338ca;
            color: #fff;
        }
        .social-wa:hover  { background: #25D366; color: #fff; }
        .social-ig:hover  { background: linear-gradient(135deg, #f58529, #dd2a7b, #8134af); color: #fff; }
        .social-fb:hover  { background: #1877F2; color: #fff; }
        .date-badge { min-width: 52px; }
        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.55s ease, transform 0.55s ease;
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    @stack('styles')
</head>

<body class="font-sans text-slate-800 antialiased">

    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

    <script>
        // Navbar: transparent → white on scroll
        const navbar    = document.getElementById('navbar');
        const brand     = document.getElementById('nav-brand');
        const navLinks  = document.querySelectorAll('.nav-link');
        const menuBtn   = document.getElementById('menu-btn');
        const menuIcon  = document.getElementById('menu-icon');
        const mobileMenu = document.getElementById('mobile-menu');

        function updateNavbar() {
            const scrolled = window.scrollY > 60;
            if (scrolled) {
                navbar.classList.add('nav-scrolled');
                navbar.style.background = '';
                brand.style.color = '#1e293b';
                navLinks.forEach(l => {
                    l.style.color = '';
                    l.classList.remove('text-white/80', 'hover:text-white', 'hover:bg-white/10');
                    l.classList.add('text-slate-600', 'hover:text-slate-900', 'hover:bg-slate-100');
                });
                menuBtn.classList.remove('text-white/80', 'hover:text-white', 'hover:bg-white/10');
                menuBtn.classList.add('text-slate-600', 'hover:text-slate-900', 'hover:bg-slate-100');
            } else {
                navbar.classList.remove('nav-scrolled');
                navbar.style.background = 'transparent';
                brand.style.color = '#fff';
                navLinks.forEach(l => {
                    l.style.color = '';
                    l.classList.add('text-white/80', 'hover:text-white', 'hover:bg-white/10');
                    l.classList.remove('text-slate-600', 'hover:text-slate-900', 'hover:bg-slate-100');
                });
                menuBtn.classList.add('text-white/80', 'hover:text-white', 'hover:bg-white/10');
                menuBtn.classList.remove('text-slate-600', 'hover:text-slate-900', 'hover:bg-slate-100');
            }
        }
        window.addEventListener('scroll', updateNavbar, { passive: true });
        updateNavbar();

        // Mobile menu toggle
        menuBtn.addEventListener('click', () => {
            const open = mobileMenu.classList.toggle('hidden');
            menuIcon.className = open
                ? 'fa-solid fa-bars text-lg'
                : 'fa-solid fa-xmark text-lg';
        });
        document.querySelectorAll('.mobile-link').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                menuIcon.className = 'fa-solid fa-bars text-lg';
            });
        });

        // Scroll reveal
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                    observer.unobserve(e.target);
                }
            });
        }, { threshold: 0.12 });
        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    </script>

    @stack('scripts')

</body>
</html>
