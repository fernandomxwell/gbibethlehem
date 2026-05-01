<section id="lokasi" class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="reveal">
                <div class="relative rounded-2xl overflow-hidden shadow-xl aspect-[4/3]">
                    <iframe
                        src="https://maps.google.com/maps?q=-6.1387024,106.7971735&z=17&output=embed&hl=id"
                        width="100%"
                        height="100%"
                        style="border:0; position:absolute; inset:0;"
                        allowfullscreen
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Lokasi {{ config('app.name') }}">
                    </iframe>
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
