<section id="beranda" class="hero-bg min-h-screen flex items-center justify-center pt-16">
    <div class="orb w-96 h-96 bg-purple-500 top-10 -left-20"></div>
    <div class="orb w-80 h-80 bg-indigo-400 bottom-10 right-0"></div>
    <div class="orb w-64 h-64 bg-blue-500 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-4 py-1.5 mb-6">
            <i class="fa-solid fa-cross text-white text-sm"></i>
            <span class="text-white/90 text-sm font-medium">{{ config('app.name') }}</span>
        </div>

        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black text-white leading-tight mb-6">
            Bertumbuh dalam<br>
            <span class="text-gradient">Kasih & Iman</span>
        </h1>

        <p class="text-lg sm:text-xl text-white/70 max-w-2xl mx-auto mb-10 leading-relaxed">
            Komunitas iman yang bertumbuh bersama dalam kasih, persekutuan, dan pelayanan
            kepada Tuhan dan sesama.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="#ibadah"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-gold-500 hover:bg-gold-400 text-white font-semibold px-8 py-3.5 rounded-xl shadow-lg hover:shadow-gold-500/30 transition-all duration-200 text-sm">
                <i class="fa-solid fa-calendar-days"></i>
                Jadwal Ibadah
            </a>
        </div>

        <div class="mt-16 flex justify-center animate-bounce">
            <a href="#ibadah" class="text-white/40 hover:text-white/70 transition-colors">
                <i class="fa-solid fa-chevron-down text-xl"></i>
            </a>
        </div>
    </div>
</section>
