<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\Status;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\AffiliateTrips;
use Illuminate\Http\Request;

class AffiliateTripsAndTricksController extends Controller
{
    public function index(Request $request)
    {
        //permission check
        if (! has_permission('affiliate manage trips & tricks')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $affiliateTrips = AffiliateTrips::when($request->search, function ($query, $value) {
            $query->where('title_en', 'like', '%'.$value.'%');
        })->paginate(20);

        return view('admin.layouts.affiliate-trips.index', compact('affiliateTrips'));
    }

    public function create()
    {
        //permission check
        if (! has_permission('affiliate manage trips & tricks')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }

        return view('admin.layouts.affiliate-trips.create');
    }

    // Store method to create a new record
    public function store(Request $request)
    {
        //permission check
        if (! has_permission('affiliate manage trips & tricks')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        // Validate input data
        $validatedData = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_de' => 'required|string|max:255',
            'title_hu' => 'required|string|max:255',
            'description_en' => 'required',
            'description_de' => 'required',
            'description_hu' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the file upload using the custom helper
        if ($request->hasFile('image')) {
            $validatedData['image'] = Helper::fileUpload(
                $request->file('image'),
                'affiliate/trips',
                getFileName($request->file('image'))
            );
        } else {
            $validatedData['image'] = '/uploads/affiliate/trips/default.png';
        }
        $validatedData['user_id'] = \Auth::id();
        // Efficiently create a new record using mass assignment
        AffiliateTrips::create($validatedData);

        // Use flash message
        flash()->addSuccess('Affiliate trips created successfully!');

        return redirect()->route('admin.affiliate-trips.index');
    }

    // Edit method to load the edit form
    public function edit(AffiliateTrips $affiliateTrip)
    {
        //permission check
        if (! has_permission('affiliate manage trips & tricks')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }

        return view('admin.layouts.affiliate-trips.edit', compact('affiliateTrip'));
    }

    public function update(Request $request, $id)
    {
        //permission check
        if (! has_permission('affiliate manage trips & tricks')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        // Validate input data
        $validatedData = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_de' => 'required|string|max:255',
            'title_hu' => 'required|string|max:255',
            'description_en' => 'required',
            'description_de' => 'required',
            'description_hu' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $affiliateTrip = AffiliateTrips::findOrFail($id);

        // Handle the file upload if a new image is provided
        if ($request->hasFile('image')) {
            $validatedData['image'] = Helper::fileUpload(
                $request->file('image'),
                'affiliate/trips',
                getFileName($request->file('image'))
            );
            Helper::deleteFile(public_path($affiliateTrip->image));
        } else {
            $validatedData['image'] = $affiliateTrip->image;
        }
        $validatedData['user_id'] = \Auth::id();

        // Efficiently update the record using mass assignment
        $affiliateTrip->update($validatedData);

        // Use flash message
        flash()->addSuccess('Affiliate trips updated successfully!');

        return redirect()->route('admin.affiliate-trips.index');
    }

    public function destroy(string $id)
    {

        //permission check
        if (! has_permission('affiliate manage trips & tricks')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $affiliateTrips = AffiliateTrips::findOrFail($id);
        if (empty($affiliateTrips)) {
            flash()->addError('Affiliate trips fail not found.');

            return redirect()->back();
        }
        Helper::deleteFile(public_path($affiliateTrips->image));
        $affiliateTrips->delete();
        flash()->addSuccess('Affiliate trips deleted successfully.');

        return redirect()->route('admin.affiliate-trips.index');
    }

    public function status(string $id)
    {
        //permission check
        if (! has_permission('affiliate manage trips & tricks')) {
            return response()->json([
                'success' => false,
                'message' => 'Permission denied: You do not have permission access this page',

            ]);
        }
        try {
            $affiliate_trips = AffiliateTrips::findOrFail($id);
            if (empty($affiliate_trips)) {
                abort('404', 'Not found.');
            }
            if ($affiliate_trips->status == Status::ACTIVE) {
                $affiliate_trips->status = Status::INACTIVE;
            } else {
                $affiliate_trips->status = Status::ACTIVE;
            }
            $affiliate_trips->save();

            return response()->json([
                'success' => true,
                'message' => 'Affiliate trips status has been updated successfully.',
                'data' => $affiliate_trips,
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!',
            ]);
        }
    }
}
