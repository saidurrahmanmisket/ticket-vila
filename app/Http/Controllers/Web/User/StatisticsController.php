<?php

namespace App\Http\Controllers\Web\User;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        $campaign = Campaign::where('status', Status::PUBLISHED)->first();
        $ticketsSoldToday = Ticket::whereDate('created_at', today())->count();
        if (!empty($campaign)) {
            $previousDaySold = Ticket::where('campaign_id', $campaign->id)
                ->whereDate('created_at', today()->subDays(1))
                ->count();

            $todayProgress = ($previousDaySold > 0)
                ? (($ticketsSoldToday - $previousDaySold) / $previousDaySold) * 100
                : 0;
            $todayProgress = number_format($todayProgress, 2);

        }else {
            $todayProgress = 0;
        }

            return view('user.layouts.statistics', compact( 'ticketsSoldToday',  'todayProgress'));
    }
    public function getSalesData()
    {
        $endDate = Carbon::now()->endOfMonth(); // End of current month
        $startDate = Carbon::now()->subMonths(11)->startOfMonth(); // 7 months ago

        // Fetching data for the last 7 months
        $salesData = Ticket::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m-01") as month, COUNT(*) as count')
            ->groupBy('month')
            ->get()
            ->map(function($data) {
                return [
                    'x' => (new Carbon($data->month))->getTimestamp() * 1000, // Convert to milliseconds
                    'y' => $data->count,
                ];
            });

        // Fill missing months with zero sales
        $allMonths = $this->getAllMonths($startDate, $endDate);
        $salesData = $this->fillMissingMonths($salesData, $allMonths);

        return response()->json($salesData);
    }

    // Helper function to get all months between two dates
    private function getAllMonths($startDate, $endDate)
    {
        $startDate = new Carbon($startDate);
        $endDate = new Carbon($endDate);
        $months = [];

        while ($startDate->lessThanOrEqualTo($endDate)) {
            $months[] = $startDate->format('Y-m-01');
            $startDate->addMonth();
        }

        return $months;
    }

    // Helper function to fill missing months with zero sales
    private function fillMissingMonths($salesData, $allMonths)
    {
        $mappedData = collect($salesData)->keyBy('x')->all();
        $filledData = [];

        foreach ($allMonths as $month) {
            $timestamp = (new Carbon($month))->getTimestamp() * 1000;
            $count = isset($mappedData[$timestamp]) ? $mappedData[$timestamp]['y'] : 0;
            $filledData[] = ['x' => $timestamp, 'y' => $count];
        }

        return $filledData;
    }
}
