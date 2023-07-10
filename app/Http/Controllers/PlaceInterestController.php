<?php

namespace App\Http\Controllers;

use App\Models\PlaceImage;
use App\Models\PlaceInterest;
use App\Models\Price;
use App\Models\Review;
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
        // if($request->isMethod('post'))
        // dd($request->interest_id);
        // else dd($request->interest_id);
        
        try {
            // $data = PlaceInterest::with('places', 'interest')->whereIn('interest_id', $request->interest_id)->get();
            if( $request->interest_id != null) {
            // dd($request->interest_id == null);
            $data = PlaceInterest::whereIn('interest_id', $request->interest_id)->with('places')
                ->groupBy('place_id')
                ->get(['place_id']);
            }else {
                $data = PlaceInterest::with('places')->groupBy('place_id')->get(['place_id']);
            }
           
            $modifiedData = [];
            $listInterest = [];
            $listImages = [];
            $listReviews = [];
            $listPrices = [];

            foreach ($data as $key => $item) {
                $interests = PlaceInterest::where('place_id', $item->place_id)
                    ->with('interest')
                    ->get();

                foreach ($interests as $interest) {
                    $listInterest[] = $interest->interest->name;
                }

                $images = PlaceImage::where('place_id', $item->place_id)->orderBy('place_id')->get();
                // dd($images->first()->image_url);
                foreach ($images as $image) {
                    $listImages[] = $image->image_url;
                    
                }

                $reviews = Review::where('place_id', $item->place_id)->orderBy('place_id')->get();

                foreach ($reviews as $review) {
                    $listReviews[] = [
                        'id' => $review->id,
                        'place_id' => $review->place_id,
                        'name' => $review->name,
                        'description' => $review->description,
                        'rating' => $review->rating,
                    ];
                }

                $prices = Price::where('place_id', $item->place_id)->orderBy('place_id')->get();

                foreach($prices as $price)
                {
                    $listPrices[] = [
                        'id' => $price->id,
                        'place_id' => $price->place_id,
                        'type' => $price->type,
                        'price' => $price->price
                    ];
                }

                // dd($listPrices);
                $avgRatingEachPlace = $reviews->avg('rating');
                // dd($ratings->avg('rating'));
                $modifiedData[] = [
                    'place_id' => $item->place_id,
                    'name' => $item->places->name,
                    'description' => $item->places->description,
                    'latitude' => $item->places->latitude,
                    'longitude' => $item->places->longitude,
                    'interest' => $listInterest,
                    'images' => $listImages,
                    'reviews' => $listReviews,
                    'avg_rating' => number_format($avgRatingEachPlace, 1),
                    'prices' => $listPrices,
                    // 'first_image' => $images->first()->image_url,
                ];
                // dd($listReviews);
                unset($listInterest);
                unset($listImages);
                unset($listReviews);
                unset($listPrices);
            }
            // dd($ratings);
            // dd($ratings->avg('rating'));

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
