<section id="kegiatan" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="text-center max-w-2xl mx-auto mb-10 reveal">
            <span class="inline-block text-primary-600 font-semibold text-sm uppercase tracking-wider mb-3">
                Kegiatan Gereja
            </span>
            <h2 class="text-4xl font-black text-slate-900 mb-4">
                Apa yang Kami Lakukan
            </h2>
            <p class="text-slate-500 text-lg">
                Berbagai kegiatan ibadah dan pelayanan yang terbuka bagi seluruh jemaat.
            </p>
        </div>

        {{-- Stats bar --}}
        <div class="flex justify-center mb-10 reveal">
            <div class="inline-flex items-center gap-8 bg-slate-50 border border-slate-100 rounded-2xl px-8 py-4">
                <div class="text-center">
                    <p class="text-3xl font-black text-primary-600">{{ $stats['total_kegiatan'] }}</p>
                    <p class="text-xs font-medium text-slate-500 mt-0.5">Jenis Kegiatan</p>
                </div>
                <div class="w-px h-10 bg-slate-200"></div>
                <div class="text-center">
                    <p class="text-3xl font-black text-primary-600">{{ $stats['total_pelayanan'] }}</p>
                    <p class="text-xs font-medium text-slate-500 mt-0.5">Jenis Pelayanan</p>
                </div>
                <div class="w-px h-10 bg-slate-200"></div>
                <div class="text-center">
                    <p class="text-3xl font-black text-primary-600">∞</p>
                    <p class="text-xs font-medium text-slate-500 mt-0.5">Pintu Terbuka</p>
                </div>
            </div>
        </div>

        @if($activities->isNotEmpty())
        {{-- Flex-wrap with justify-center so odd last row stays centered --}}
        <div class="flex flex-wrap justify-center gap-6">
            @foreach($activities as $activity)
            @php
                $icons = ['fa-users', 'fa-church', 'fa-child-reaching', 'fa-person-praying', 'fa-person-dress', 'fa-hands-holding-child'];
                $colorSets = [
                    ['border-primary-400', 'bg-primary-50',  'text-primary-600'],
                    ['border-amber-400',   'bg-amber-50',    'text-amber-600'],
                    ['border-emerald-400', 'bg-emerald-50',  'text-emerald-600'],
                    ['border-rose-400',    'bg-rose-50',     'text-rose-600'],
                    ['border-blue-400',    'bg-blue-50',     'text-blue-600'],
                    ['border-purple-400',  'bg-purple-50',   'text-purple-600'],
                ];
                $idx = $activity->id % count($colorSets);
                [$border, $cardBg, $iconColor] = $colorSets[$idx];
                $bar  = str_replace('border-', 'bg-', $border);
                $icon = $icons[$activity->id % count($icons)];
            @endphp

            {{-- w-full on mobile, 2-col on sm, 3-col on lg — with flex-wrap justify-center the last row stays centered --}}
            <div class="activity-card card-lift w-full sm:w-[calc(50%-0.75rem)] lg:w-[calc(33.333%-1rem)] bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 reveal"
                 style="transition-delay: {{ $loop->index * 0.08 }}s">
                <div class="h-1.5 {{ $bar }}"></div>
                <div class="p-6">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="card-icon w-11 h-11 rounded-xl {{ $cardBg }} flex items-center justify-center flex-shrink-0 transition-all duration-200">
                            <i class="fa-solid {{ $icon }} {{ $iconColor }} text-sm"></i>
                        </div>
                        <div class="min-w-0">
                            <h3 class="font-bold text-slate-800 text-base leading-snug">{{ $activity->name }}</h3>
                            @if($activity->start_time)
                            <p class="text-sm {{ $iconColor }} font-medium mt-0.5">
                                <i class="fa-regular fa-clock mr-1 text-xs"></i>
                                {{ $activity->start_time->locale('id')->isoFormat('dddd[, ]HH:mm') }}
                            </p>
                            @endif
                        </div>
                    </div>

                    @if($activity->description)
                    <div class="activity-desc-wrap">
                        <p class="activity-desc text-slate-500 text-sm leading-relaxed line-clamp-3">
                            {{ $activity->description }}
                        </p>
                        <button type="button"
                                class="activity-desc-toggle hidden mt-1.5 text-xs font-medium {{ $iconColor }} hover:opacity-70 focus:outline-none transition-opacity">
                            Selengkapnya
                        </button>
                    </div>
                    @endif

                    @if($activity->serviceTypes->isNotEmpty())
                    <div class="mt-4 pt-4 border-t border-slate-100">
                        <button type="button"
                                class="service-type-toggle w-full flex items-center justify-between gap-2 group"
                                aria-expanded="false">
                            <div class="flex items-center gap-1.5 min-w-0">
                                <i class="fa-solid fa-hands-holding-heart {{ $iconColor }} text-xs flex-shrink-0"></i>
                                <span class="text-xs font-semibold text-slate-700 leading-snug text-left">
                                    Terbuka untuk pelayanan
                                </span>
                                <span class="text-xs font-medium text-slate-400">({{ $activity->serviceTypes->count() }})</span>
                            </div>
                            <i class="service-type-chevron fa-solid fa-chevron-down text-slate-400 text-[10px] flex-shrink-0 transition-transform duration-200"></i>
                        </button>
                        <p class="text-[11px] text-slate-400 mt-0.5 leading-snug">
                            Bergabunglah dan layani bersama kami.
                        </p>
                        <div class="service-type-list hidden mt-2 flex flex-wrap gap-1.5">
                            @foreach($activity->serviceTypes as $type)
                            <span class="inline-flex items-center gap-1 text-xs font-medium px-2 py-0.5 rounded-full bg-slate-100 text-slate-600">
                                <i class="fa-solid fa-tag text-[9px] opacity-60"></i>
                                {{ $type->name }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 bg-slate-50 rounded-2xl border border-dashed border-slate-200 reveal">
            <div class="w-16 h-16 bg-primary-50 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid fa-church text-primary-400 text-2xl"></i>
            </div>
            <h3 class="font-semibold text-slate-700 mb-2">Kegiatan Belum Tersedia</h3>
            <p class="text-slate-400 text-sm max-w-xs mx-auto">
                Informasi kegiatan gereja akan segera ditampilkan.
            </p>
        </div>
        @endif
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.activity-desc-wrap').forEach(function (wrap) {
        var p      = wrap.querySelector('.activity-desc');
        var toggle = wrap.querySelector('.activity-desc-toggle');

        if (p.scrollHeight > p.clientHeight) {
            toggle.classList.remove('hidden');
        }

        toggle.addEventListener('click', function () {
            var clamped = p.classList.toggle('line-clamp-3');
            toggle.textContent = clamped ? 'Selengkapnya' : 'Lebih sedikit';
        });
    });

    document.querySelectorAll('.service-type-toggle').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var list    = btn.closest('.mt-4').querySelector('.service-type-list');
            var chevron = btn.querySelector('.service-type-chevron');
            var open    = list.classList.toggle('hidden');
            chevron.style.transform = open ? '' : 'rotate(180deg)';
            btn.setAttribute('aria-expanded', open ? 'false' : 'true');
        });
    });
});
</script>
@endpush
