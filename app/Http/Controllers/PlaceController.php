<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Place::all();

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

    public function getPlaceById($id)
    {
        try {
            $placeCache = Cache::get('place-' . $id);
            // dd($placeCache);
            if ($placeCache == null) {
                $place = Place::where('id', $id)->with('interest', 'review', 'image')->first()->toArray();
                // dd($place);
                $firstKey = array_key_first($place); // Get the first key

                $newKey = 'place_id'; // Define the new key

                $modifiedArray = [$newKey => $place[$firstKey]] + array_slice($place, 1, null, true); // Modify the first key

                Cache::forever('place-' . $id, $modifiedArray);
                // dd($modifiedArray);
                // return response()->json(['data' => $place], 200);
               
            }else {
                $modifiedArray = Cache::get('place-' . $id);
            }

            return response()->json([
                'success' => true,
                'message' => 'Success.',
                'data' => $modifiedArray,
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
    public function show($id, Place $place)
    {
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        //
    }
}
