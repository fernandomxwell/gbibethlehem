<footer class="bg-primary-950 text-primary-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-3 gap-10">
            <div>
                <div class="flex items-center gap-2.5 mb-4">
                    <div class="w-9 h-9 rounded-lg bg-primary-600 flex items-center justify-center">
                        <i class="fa-solid fa-cross text-white text-sm"></i>
                    </div>
                    <span class="font-bold text-white text-lg">{{ config('app.name') }}</span>
                </div>
                <p class="text-sm leading-relaxed mb-6">
                    Komunitas iman yang bertumbuh bersama dalam kasih, persekutuan, dan pelayanan
                    kepada Tuhan dan sesama.
                </p>
                <div class="flex gap-3">
                    {{-- <a href="{{ config('church.social.whatsapp') }}" target="_blank" rel="noopener"
                       class="w-9 h-9 bg-white/10 hover:bg-[#25D366] rounded-lg flex items-center justify-center transition-colors">
                        <i class="fa-brands fa-whatsapp text-sm"></i>
                    </a> --}}
                    <a href="{{ config('church.social.instagram') }}" target="_blank" rel="noopener"
                       class="w-9 h-9 bg-white/10 hover:bg-pink-500 rounded-lg flex items-center justify-center transition-colors">
                        <i class="fa-brands fa-instagram text-sm"></i>
                    </a>
                    {{-- <a href="{{ config('church.social.facebook') }}" target="_blank" rel="noopener"
                       class="w-9 h-9 bg-white/10 hover:bg-[#1877F2] rounded-lg flex items-center justify-center transition-colors">
                        <i class="fa-brands fa-facebook text-sm"></i>
                    </a> --}}
                </div>
            </div>

            <div>
                <h4 class="font-bold text-white mb-4">Navigasi</h4>
                <ul class="space-y-2.5 text-sm">
                    @foreach(config('church.nav') as $item)
                    <li>
                        <a href="{{ $item['href'] }}"
                           class="hover:text-white transition-colors inline-flex items-center gap-2">
                            <i class="fa-solid fa-angle-right text-primary-600 text-xs"></i>
                            {{ $item['label'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-white mb-4">Kontak</h4>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-location-dot text-primary-500 mt-0.5 flex-shrink-0"></i>
                        <span>{{ config('church.address.short') }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-phone text-primary-500 flex-shrink-0"></i>
                        <span>{{ config('church.phone') }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-regular fa-envelope text-primary-500 flex-shrink-0"></i>
                        <span>{{ config('church.email') }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-12 pt-6 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-primary-500">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Hak Cipta Dilindungi.</p>
            <p>Dibuat dengan <i class="fa-solid fa-heart text-rose-400 mx-1"></i> untuk kemuliaan Tuhan</p>
        </div>
    </div>
</footer>
