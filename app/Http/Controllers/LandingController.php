<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ServiceType;
use Illuminate\Support\Carbon;
use RRule\RRule;

class LandingController extends Controller
{
    public function index()
    {
        $activities = Activity::with('serviceTypes')->get([
            'id',
            'name',
            'description',
            'start_time',
            'rrule'
        ]);

        $now   = now();
        $until = now()->addMonths(3);

        $upcomingSchedules = $activities
            ->flatMap(function ($activity) use ($now, $until) {
                if ($activity->rrule) {
                    $rule  = new RRule($activity->rrule, $activity->start_time->format('Y-m-d H:i:s'));
                    $tz    = config('app.timezone');
                    $dates = collect($rule->getOccurrencesBetween($now, $until))
                        ->map(fn($d) => Carbon::instance($d)->setTimezone($tz));
                } else {
                    $dates = collect([$activity->start_time])
                        ->filter(fn($d) => $d->gte($now));
                }

                return $dates->map(fn($date) => ['activity' => $activity, 'date' => $date]);
            })
            ->sortBy('date')
            ->take(9)
            ->values();

        $recurringActivities = $activities->filter(fn($a) => !empty($a->rrule))->values();

        $stats = [
            'total_kegiatan' => $recurringActivities->count(),
            'total_pelayanan' => ServiceType::count(),
        ];

        return view('landing.index', compact('upcomingSchedules', 'activities', 'recurringActivities', 'stats'));
    }
}
