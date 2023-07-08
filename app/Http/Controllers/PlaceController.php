<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\PlaceImage;
use App\Models\PlaceInterest;
use App\Models\Price;
use App\Models\Review;
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
        // try {
        // $placeCache = Cache::get('place-' . $id);
        // // dd($placeCache);
        // if ($placeCache == null) {
        //         $place = Place::where('id', $id)->with('interest', 'review', 'image')->first()->toArray();
        //         // dd($place);
        //         $firstKey = array_key_first($place); // Get the first key

        //         $newKey = 'place_id'; // Define the new key

        //         $modifiedArray = [$newKey => $place[$firstKey]] + array_slice($place, 1, null, true); // Modify the first key

        //         Cache::forever('place-' . $id, $modifiedArray);
        //         // dd($modifiedArray);
        //         // return response()->json(['data' => $place], 200);

        //     }else {
        //         $modifiedArray = Cache::get('place-' . $id);
        //     }

        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Success.',
        //         'data' => $modifiedArray,
        //     ], 200);
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'An error occurred.',
        //         'error' => $e->getMessage(),
        //     ], 500);
        // }
        try {

            // $item = Place::findOrFail($id)->first();
            // dd($item->place_id);
            $placeCache = Cache::get('place-' . $id);
            // dd($placeCache);
            if ($placeCache == null) {
                $item = Place::where('id', $id)->first();
                // dd($item);
                // foreach ($data as $key => $item) {
                $interests = PlaceInterest::where('place_id', $item->id)
                    ->with('interest')
                    ->get();

                $modifiedData = "";
                $listInterest = [];
                $listImages = [];
                $listReviews = [];
                $listPrices = [];

                foreach ($interests as $interest) {
                    $listInterest[] = $interest->interest->name;
                }

                $images = PlaceImage::where('place_id', $item->id)->orderBy('place_id')->get();
                // dd($images->first()->image_url);
                foreach ($images as $image) {
                    $listImages[] = $image->image_url;
                }

                $reviews = Review::where('place_id', $item->id)->orderBy('place_id')->get();

                foreach ($reviews as $review) {
                    $listReviews[] = [
                        'id' => $review->id,
                        'place_id' => $review->place_id,
                        'name' => $review->name,
                        'description' => $review->description,
                        'rating' => $review->rating,
                    ];
                }

                $prices = Price::where('place_id', $item->id)->orderBy('place_id')->get();

                foreach ($prices as $price) {
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
                $modifiedData = [
                    'place_id' => $item->id,
                    'name' => $item->name,
                    'description' => $item->description,
                    'latitude' => $item->latitude,
                    'longitude' => $item->longitude,
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
                Cache::forever('place-' . $id, $modifiedData);
                $data = $modifiedData;
                

            }
            
            // }
            // dd($ratings);
            // dd($ratings->avg('rating'));

            $data = Cache::get('place-' . $id);
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
