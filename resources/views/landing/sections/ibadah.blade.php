<section id="ibadah" class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-10 reveal">
            <div>
                <span class="inline-block text-primary-600 font-semibold text-sm uppercase tracking-wider mb-2">
                    Jadwal Mendatang
                </span>
                <h2 class="text-4xl font-black text-slate-900">
                    Bergabunglah Bersama Kami
                </h2>
            </div>
            @if(count($upcomingSchedules) > 0)
            <div class="flex items-center gap-2 flex-shrink-0">
                <button id="carousel-prev"
                        class="w-9 h-9 rounded-full bg-white border border-slate-200 shadow-sm flex items-center justify-center text-slate-500 hover:text-primary-600 hover:border-primary-300 transition disabled:opacity-30 disabled:cursor-not-allowed"
                        disabled>
                    <i class="fa-solid fa-chevron-left text-xs"></i>
                </button>
                <button id="carousel-next"
                        class="w-9 h-9 rounded-full bg-white border border-slate-200 shadow-sm flex items-center justify-center text-slate-500 hover:text-primary-600 hover:border-primary-300 transition disabled:opacity-30 disabled:cursor-not-allowed">
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </button>
            </div>
            @endif
        </div>

        @if(count($upcomingSchedules) > 0)
        <div id="schedule-carousel"
             class="flex gap-4 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-4 -mx-4 sm:-mx-6 lg:mx-0"
             style="scroll-padding-left: 1.25rem; scrollbar-width: none; -ms-overflow-style: none;">
            {{-- Spacer kiri: supaya card pertama tidak menempel ke tepian --}}
            <div class="flex-shrink-0 w-4 sm:w-6 lg:hidden" aria-hidden="true"></div>
            @foreach($upcomingSchedules as $i => $item)
            @php
                $activity = $item['activity'];
                $date     = $item['date'];

                $colorSets = [
                    ['bg-primary-400', 'bg-primary-50',  'text-primary-600',  'bg-primary-100 text-primary-700'],
                    ['bg-amber-400',   'bg-amber-50',    'text-amber-600',    'bg-amber-100 text-amber-700'],
                    ['bg-emerald-400', 'bg-emerald-50',  'text-emerald-600',  'bg-emerald-100 text-emerald-700'],
                    ['bg-rose-400',    'bg-rose-50',     'text-rose-600',     'bg-rose-100 text-rose-700'],
                    ['bg-blue-400',    'bg-blue-50',     'text-blue-600',     'bg-blue-100 text-blue-700'],
                    ['bg-purple-400',  'bg-purple-50',   'text-purple-600',   'bg-purple-100 text-purple-700'],
                ];
                [$bar, $iconBg, $iconColor, $badgeCls] = $colorSets[$i % count($colorSets)];

                $daysAway = (int) now()->startOfDay()->diffInDays($date->copy()->startOfDay(), false);
                $countdownLabel = match(true) {
                    $daysAway === 0 => 'Hari ini',
                    $daysAway === 1 => 'Besok',
                    default         => $daysAway . ' hari lagi',
                };
            @endphp

            <div class="snap-start flex-shrink-0 w-56 bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 reveal"
                 style="transition-delay: {{ $i * 0.06 }}s">
                <div class="h-1 {{ $bar }}"></div>
                <div class="p-5">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                {{ $date->locale('id')->isoFormat('ddd') }}
                            </p>
                            <p class="text-3xl font-black text-slate-800 leading-none mt-0.5">
                                {{ $date->format('j') }}
                            </p>
                            <p class="text-xs text-slate-500 mt-0.5">
                                {{ $date->locale('id')->isoFormat('MMM YYYY') }}
                            </p>
                        </div>
                        <span class="text-xs font-semibold px-2 py-0.5 rounded-full {{ $badgeCls }} whitespace-nowrap">
                            {{ $countdownLabel }}
                        </span>
                    </div>

                    <div class="border-t border-slate-100 pt-3">
                        <div class="flex items-center gap-2 mb-1.5">
                            <div class="w-7 h-7 rounded-lg {{ $iconBg }} flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-church {{ $iconColor }} text-xs"></i>
                            </div>
                            <h3 class="font-bold text-slate-800 text-sm leading-snug">
                                {{ $activity->name }}
                            </h3>
                        </div>
                        <p class="{{ $iconColor }} text-xs font-medium">
                            <i class="fa-regular fa-clock mr-1"></i>{{ $activity->start_time->format('H:i') }} WIB
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- Spacer kanan: browser tidak render padding setelah item terakhir di overflow scroll --}}
            <div class="flex-shrink-0 w-4 sm:w-6 lg:hidden" aria-hidden="true"></div>
        </div>
        @else
        <div class="text-center py-16 bg-white rounded-2xl border border-dashed border-slate-200 reveal">
            <div class="w-16 h-16 bg-primary-50 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid fa-calendar-xmark text-primary-400 text-2xl"></i>
            </div>
            <h3 class="font-semibold text-slate-700 mb-2">Jadwal Belum Tersedia</h3>
            <p class="text-slate-400 text-sm max-w-xs mx-auto">
                Jadwal ibadah akan segera ditampilkan. Hubungi kami untuk informasi lebih lanjut.
            </p>
        </div>
        @endif
    </div>
</section>

@push('scripts')
<script>
(function () {
    var carousel = document.getElementById('schedule-carousel');
    var btnPrev  = document.getElementById('carousel-prev');
    var btnNext  = document.getElementById('carousel-next');

    if (!carousel) return;

    var cardWidth = function () {
        var card = carousel.querySelector('.snap-start');
        return card ? card.offsetWidth + 16 : 240; // card + gap-4
    };

    var updateButtons = function () {
        btnPrev.disabled = carousel.scrollLeft <= 0;
        btnNext.disabled = carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth - 1;
    };

    btnPrev.addEventListener('click', function () {
        carousel.scrollBy({ left: -cardWidth(), behavior: 'smooth' });
    });

    btnNext.addEventListener('click', function () {
        carousel.scrollBy({ left: cardWidth(), behavior: 'smooth' });
    });

    carousel.addEventListener('scroll', updateButtons, { passive: true });
    updateButtons();
})();
</script>
@endpush
