<section id="lokasi" class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="reveal">
                <div class="relative rounded-2xl overflow-hidden shadow-xl bg-slate-200 aspect-[4/3] flex items-center justify-center">
                    <div class="absolute inset-0"
                         style="background-image: linear-gradient(#cbd5e1 1px, transparent 1px), linear-gradient(90deg, #cbd5e1 1px, transparent 1px); background-size: 40px 40px; background-color: #e2e8f0;">
                    </div>
                    <div class="absolute inset-0">
                        <div class="absolute top-1/3 inset-x-0 h-6 bg-white/60"></div>
                        <div class="absolute left-1/3 inset-y-0 w-5 bg-white/60"></div>
                        <div class="absolute top-2/3 inset-x-0 h-4 bg-white/40"></div>
                        <div class="absolute left-2/3 inset-y-0 w-3 bg-white/40"></div>
                    </div>
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-16 h-16 bg-primary-600 rounded-full shadow-2xl flex items-center justify-center border-4 border-white">
                            <i class="fa-solid fa-church text-white text-2xl"></i>
                        </div>
                        <div class="mt-2 bg-white shadow-lg rounded-lg px-4 py-2 text-center">
                            <p class="font-bold text-slate-800 text-sm">{{ config('app.name') }}</p>
                            <p class="text-slate-400 text-xs">Lokasi gereja</p>
                        </div>
                        <div class="w-3 h-3 bg-primary-600 rotate-45 -mt-1.5 shadow-sm"></div>
                    </div>
                    <div class="absolute bottom-3 right-3 bg-white/80 backdrop-blur-sm rounded-lg px-3 py-1.5 text-xs text-slate-400 font-medium">
                        <i class="fa-brands fa-google mr-1"></i>Google Maps (segera hadir)
                    </div>
                </div>
            </div>

            <div class="reveal" style="transition-delay:0.15s">
                <span class="inline-block text-primary-600 font-semibold text-sm uppercase tracking-wider mb-3">
                    Lokasi Kami
                </span>
                <h2 class="text-4xl font-black text-slate-900 mb-6">
                    Temukan Kami di Sini
                </h2>

                <div class="space-y-5">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-primary-50 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fa-solid fa-location-dot text-primary-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-slate-800 mb-0.5">Alamat</p>
                            <p class="text-slate-500 leading-relaxed">
                                {{ config('church.address.street') }},<br>
                                {{ config('church.address.district') }},<br>
                                {{ config('church.address.city') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-primary-50 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fa-solid fa-clock text-primary-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-slate-800 mb-1">Jam Pelayanan</p>
                            <div class="space-y-1 text-sm text-slate-500">
                                @forelse($activities as $act)
                                @if($loop->index < 4)
                                <div class="flex justify-between gap-8">
                                    <span>{{ $act->name }}</span>
                                    @if($act->start_time)
                                    <span class="font-medium text-slate-700">
                                        {{ $act->start_time->locale('id')->isoFormat('ddd[, ]HH:mm') }}
                                    </span>
                                    @else
                                    <span class="text-slate-400">—</span>
                                    @endif
                                </div>
                                @endif
                                @empty
                                <div class="text-slate-400">Jadwal belum tersedia</div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-primary-50 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fa-solid fa-phone text-primary-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-slate-800 mb-0.5">Telepon</p>
                            <p class="text-slate-500">{{ config('church.phone') }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="https://maps.app.goo.gl/E9RTuuTK5NG9j7jv7"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center gap-2 bg-primary-600 hover:bg-primary-500 text-white font-semibold px-6 py-3 rounded-xl transition-colors text-sm shadow-md">
                        <i class="fa-solid fa-map-location-dot"></i>
                        Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
