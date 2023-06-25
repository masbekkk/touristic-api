<?php

namespace App\Http\Controllers;

use App\Models\PlaceInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PlaceInterestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = PlaceInterest::with('places', 'interest')->get();
            // dd($data);
            if ($data->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No data found.',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Success.',
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getPlacesByInterest(Request $request)
    {

        // dd($data);

        try {
            // $data = PlaceInterest::with('places', 'interest')->whereIn('interest_id', $request->interest_id)->get();
            $data = PlaceInterest::whereIn('interest_id', $request->interest_id)->with('places')
                ->groupBy('place_id')
                ->get(['place_id']);

            $modifiedData = [];
            $listInterest = [];

            foreach ($data as $key => $item) {
                $interests = PlaceInterest::where('place_id', $item->place_id)
                    ->with('interest')
                    ->get();
                foreach ($interests as $interest) {
                    $listInterest[] = $interest->interest->name;
                }
                $modifiedData[] = [
                    'place_id' => $item->place_id,
                    'name' => $item->places->name,
                    'description' => $item->places->description,
                    'latitude' => $item->places->latitude,
                    'longitude' => $item->places->longitude,
                    'interest' => $listInterest
                ];
                unset($listInterest);
            }

            $data = $modifiedData;
            // dd($modifiedData);


            if (empty($data)) {
                return response()->json([
                    'success' => false,
                    'message' => 'No data found.',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Success.',
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PlaceInterest $placeInterest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlaceInterest $placeInterest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PlaceInterest $placeInterest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlaceInterest $placeInterest)
    {
        //
    }
}
