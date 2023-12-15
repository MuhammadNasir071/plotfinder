<?php

namespace App\Services\Backend;

use App\Models\Property;

class PropertyService
{

    public function store($request)
    {

        // store Property Image && record
        $fileName = null;
        if($request->has('image') && !is_null($request->image))
        {
            $image = $request->file('image');
            $fileName = date('d').'_'.date('m').'_'.date('Y').'_'.$image->getClientOriginalName();
            $destinationPath = public_path().'/Uploads/property' ;
            $image->move($destinationPath,$fileName);
        }
        $property = Property::create([
            'title' => $request->title,
            'user_id' => auth()->id(),
            'status' => $request->status,
            'listed_in' => $request->listed_in,
            'category_id' => $request->category,
            'price' => $request->price,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'apartment' => $request->apartment,
            'address'=> $request->address,
            'image' => $fileName,
            'description' => $request->description,
            'size_square_meter' => $request->size_square_meter,
            'lot_size' => $request->lot_size,
            'rooms' => $request->rooms,
            'kitchen' => $request->kitchen,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'build_date' => $request->build_date,
            'garages' => $request->garages,
            'garage_size' => $request->garage_size,
            'available_date' => $request->available_date,
            'basement' => $request->basement,
            'roofing' =>$request->roofing,
            'external_construction' =>$request->external_construction,

            'balcony' => $request->balcony ?? 0 ,
            'garden' => $request->garden ?? 0,
            'chair_accessible' => $request->chair_accessible ?? 0,
            'doorman' => $request->doorman ?? 0,
            'elevator' => $request->elevator ?? 0,
            'front_yard' => $request->front_yard ?? 0,
        ]);

        return;
    }


    public function update($request, $id)
    {
        // Update Property Image && record
        $property = Property::where('id', $id)->first();
        if($property)
        {
            $fileName = $property->image;
            if($request->has('image') && !is_null($request->image))
            {
                $image = $request->file('image');
                $fileName = date('d').'_'.date('m').'_'.date('Y').'_'.$image->getClientOriginalName();
                $destinationPath = public_path().'/Uploads/property' ;
                $image->move($destinationPath,$fileName);
            };
            Property::where('id', $id)->update([
                'title' => $request->title,
                'user_id' => auth()->id(),
                'status' => $request->status,
                'listed_in' => $request->listed_in,
                'category_id' => $request->category,
                'price' => $request->price,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'apartment' => $request->apartment,
                'address'=> $request->address,
                'image' => $fileName,
                'description' => $request->description,
                'size_square_meter' => $request->size_square_meter,
                'lot_size' => $request->lot_size,
                'rooms' => $request->rooms,
                'kitchen' => $request->kitchen,
                'bedrooms' => $request->bedrooms,
                'bathrooms' => $request->bathrooms,
                'build_date' => $request->build_date,
                'garages' => $request->garages,
                'garage_size' => $request->garage_size,
                'available_date' => $request->available_date,
                'basement' => $request->basement,
                'roofing' =>$request->roofing,
                'external_construction' =>$request->external_construction,

                'balcony' => $request->balcony ?? 0 ,
                'garden' => $request->garden ?? 0,
                'chair_accessible' => $request->chair_accessible ?? 0,
                'doorman' => $request->doorman ?? 0,
                'elevator' => $request->elevator ?? 0,
                'front_yard' => $request->front_yard ?? 0,
            ]);
        }
        return;
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        return $property->delete();
    }
}
