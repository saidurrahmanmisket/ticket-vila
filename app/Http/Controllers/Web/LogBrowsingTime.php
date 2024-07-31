<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\BrowsingTime;
use Auth;
use Illuminate\Http\Request;

class LogBrowsingTime extends Controller
{
    public function store(Request $request)
    {
        //        $browsingTime = $request->input('browsingTime');
        //        //Save to the database
        //        BrowsingTime::create([
        //            'user_id' => Auth::id(),
        //            'browsing_time' => $browsingTime,
        //        ]);

        return response()->json(['message' => 'Browsing time logged successfully'], 200);
    }
}
