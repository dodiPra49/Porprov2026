<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use App\Models\Contingent;
use App\Models\MatchResult;
use App\Models\MedalTally;
use App\Models\News;
use App\Models\Schedule;
use App\Models\Sport;
use App\Models\SupporterCheer;
use App\Models\Venue;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_athletes' => Athlete::count(),
            'total_contingents' => Contingent::count(),
            'total_sports' => Sport::count(),
            'total_venues' => Venue::count(),
            'total_news' => News::count(),
            'total_cheers' => SupporterCheer::count(),
            'total_completed_matches' => Schedule::where('status', 'completed')->count(),
        ];

        $topMedals = MedalTally::with('contingent')
            ->orderBy('gold', 'desc')
            ->orderBy('silver', 'desc')
            ->orderBy('bronze', 'desc')
            ->take(5)
            ->get();

        $recentNews = News::with('category', 'author')
            ->latest('published_at')
            ->take(5)
            ->get();

        $todaySchedules = Schedule::with(['subSport.sport', 'venue', 'matchResult'])
            ->latest('scheduled_at')
            ->take(5)
            ->get();

        $recentCheers = SupporterCheer::with('contingent')
            ->latest()
            ->take(6)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'topMedals',
            'recentNews',
            'todaySchedules',
            'recentCheers'
        ));
    }
}
