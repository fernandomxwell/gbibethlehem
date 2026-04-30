<nav id="navbar" class="fixed top-0 inset-x-0 z-50 transition-all duration-300" style="background: transparent;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <a href="#beranda" class="flex items-center gap-2.5 group">
                <div class="w-9 h-9 rounded-lg bg-primary-600 flex items-center justify-center shadow-md group-hover:bg-primary-500 transition-colors">
                    <i class="fa-solid fa-cross text-white text-sm"></i>
                </div>
                <span id="nav-brand" class="font-bold text-lg text-white transition-colors">{{ config('app.name') }}</span>
            </a>

            <div class="hidden md:flex items-center gap-1">
                @foreach(config('church.nav') as $item)
                <a href="{{ $item['href'] }}"
                   class="nav-link px-3 py-2 text-sm font-medium text-white/80 hover:text-white rounded-md hover:bg-white/10 transition-all">
                    {{ $item['label'] }}
                </a>
                @endforeach
            </div>

            <button id="menu-btn" class="md:hidden p-2 rounded-md text-white/80 hover:text-white hover:bg-white/10 transition-colors">
                <i class="fa-solid fa-bars text-lg" id="menu-icon"></i>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden border-t border-white/10 bg-primary-950/95 backdrop-blur-md">
        <div class="px-4 py-3 space-y-1">
            @foreach(config('church.nav') as $item)
            <a href="{{ $item['href'] }}"
               class="mobile-link block px-3 py-2.5 text-sm font-medium text-white/80 hover:text-white rounded-md hover:bg-white/10 transition-all">
                {{ $item['label'] }}
            </a>
            @endforeach
        </div>
    </div>
</nav>
