<section id="ibadah" class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 reveal">
            <span class="inline-block text-primary-600 font-semibold text-sm uppercase tracking-wider mb-3">
                Jadwal Ibadah
            </span>
            <h2 class="text-4xl font-black text-slate-900 mb-4">
                Bergabunglah Bersama Kami
            </h2>
            <p class="text-slate-500 text-lg">
                Temukan jadwal ibadah dan kegiatan gereja yang sesuai untukmu
                dan keluargamu.
            </p>
        </div>

        @forelse($activities as $activity)
        @php
            $icons = ['fa-church', 'fa-users', 'fa-star', 'fa-music', 'fa-hands-praying', 'fa-book-bible'];
            $icon  = $icons[$loop->index % count($icons)];
            $colorSets = [
                ['border-primary-400', 'bg-primary-50',  'text-primary-600'],
                ['border-gold-500',    'bg-amber-50',    'text-amber-600'],
                ['border-emerald-400', 'bg-emerald-50',  'text-emerald-600'],
                ['border-rose-400',    'bg-rose-50',     'text-rose-600'],
                ['border-blue-400',    'bg-blue-50',     'text-blue-600'],
                ['border-purple-400',  'bg-purple-50',   'text-purple-600'],
            ];
            [$border, $cardBg, $iconColor] = $colorSets[$loop->index % count($colorSets)];
        @endphp
        @if($loop->first)
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @endif

        <div class="activity-card card-lift bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 reveal"
             style="transition-delay: {{ $loop->index * 0.08 }}s">
            <div class="h-1.5 {{ str_replace('border-', 'bg-', $border) }}"></div>

            <div class="p-6">
                <div class="flex items-start gap-4 mb-4">
                    <div class="card-icon w-11 h-11 rounded-xl {{ $cardBg }} flex items-center justify-center flex-shrink-0 transition-all duration-200">
                        <i class="fa-solid {{ $icon }} {{ $iconColor }} text-sm"></i>
                    </div>
                    <div class="min-w-0">
                        <h3 class="font-bold text-slate-800 text-base leading-snug">{{ $activity->name }}</h3>
                        @if($activity->start_time)
                        <p class="text-sm text-primary-600 font-medium mt-0.5">
                            <i class="fa-regular fa-clock mr-1 text-xs"></i>
                            {{ $activity->start_time->locale('id')->isoFormat('dddd[, ]HH:mm') }}
                        </p>
                        @endif
                    </div>
                </div>

                @if($activity->description)
                <p class="text-slate-500 text-sm leading-relaxed mb-4 line-clamp-2">
                    {{ $activity->description }}
                </p>
                @endif
            </div>
        </div>

        @if($loop->last)
        </div>
        @endif

        @empty
        <div class="text-center py-16 bg-white rounded-2xl border border-dashed border-slate-200 reveal">
            <div class="w-16 h-16 bg-primary-50 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid fa-calendar-xmark text-primary-400 text-2xl"></i>
            </div>
            <h3 class="font-semibold text-slate-700 mb-2">Jadwal Belum Tersedia</h3>
            <p class="text-slate-400 text-sm max-w-xs mx-auto">
                Jadwal ibadah akan segera ditampilkan. Hubungi kami untuk informasi lebih lanjut.
            </p>
        </div>
        @endforelse
    </div>
</section>
