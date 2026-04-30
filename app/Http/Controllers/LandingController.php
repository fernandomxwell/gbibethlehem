<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Schedule;
use App\Models\ServiceType;

class LandingController extends Controller
{
    public function index()
    {
        $activities = Activity::query()
            // ->with('serviceTypes')
            ->orderBy('start_time')
            ->get();

        // $upcomingSchedules = Schedule::with(['activity', 'serviceType'])
        //     ->where('scheduled_date', '>=', now()->toDateString())
        //     ->orderBy('scheduled_date')
        //     ->get()
        //     ->unique(fn($s) => $s->activity_id . '-' . $s->scheduled_date)
        //     ->take(6)
        //     ->values();

        $stats = [
            'kegiatan' => Activity::count(),
            'pelayanan' => ServiceType::count(),
        ];

        return view('landing.index', compact(
            'activities',
            // 'upcomingSchedules',
            'stats'
        ));
    }
}
