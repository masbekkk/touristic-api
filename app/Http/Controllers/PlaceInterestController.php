<?php

namespace App\Http\Controllers;

use App\Models\PlaceInterest;
use Illuminate\Http\Request;

class PlaceInterestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = PlaceInterest::with('place', 'interest')->get();
        
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
