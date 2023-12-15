<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Property;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $properties = Property::all();
        return view('frontend.index', compact('categories', 'properties'));
    }

    public function propertyDetails($id)
    {
        $categories = Category::all();
        $property = Property::with('category')->first();
        return view('frontend.property_details', compact('categories', 'property'));
    }

    public function propertyCategory($category_id)
    {
        $categories = Category::all();
        $properties = Property::where('category_id', $category_id)->get();
        return view('frontend.index', compact('categories', 'properties'));
    }

    public function searchProperty(Request $request)
    {
        if (!is_null($request->title) || !is_null($request->city) || !is_null($request->country))
        {
            $title = $request->title;
            $city = $request->city;
            $country = $request->country;

            $properties = Property::when(!is_null($title), function ($q) use ($title) {
                    $q->where('title', 'like', '%' . $title . '%');
                })
                ->when(!is_null($city), function ($q) use ($city) {
                    $q->where('city', $city);
                })
                ->when(!is_null($country), function ($q) use ($country) {
                    $q->where('country', $country);
                })
                // ->when(!is_null($department), function ($q) use ($department) {
                //     $q->whereHas('department', function ($query) use ($department) {
                //         $query->where('id', $department);
                //     });
                // })
                ->get();
        } else {
            $properties = Property::all();
        }

        $categories = Category::all();
        return view('frontend.index', compact('categories', 'properties'));

    }

    public function contactUs()
    {
        $categories = Category::all();
        return view('frontend.contactus', compact('categories'));
    }

    public function contactUsSave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Process the form data, e.g., send an email

        return redirect()->back()->with('message', 'Your message has been sent successfully!');
    }
}
