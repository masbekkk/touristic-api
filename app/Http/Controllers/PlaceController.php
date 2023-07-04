<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $csvFile = Storage::disk('local')->path('database/seeders/place_images.csv');
        while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
            dd($data);
            // $review = new Review();
            // $review->id = $data[0];
            // $review->place_id = $data[1];
            // $review->name = "Toretto";
            // $review->description = $data[2];
            // $review->rating = $data[3];

            // $review->save();
        }
        fclose($csvFile);
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
    public function show(Place $place)
    {
        //
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
