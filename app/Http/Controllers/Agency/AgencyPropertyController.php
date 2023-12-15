<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PropertyRequest;
use App\Models\Category;
use App\Models\Property;
use App\Services\Backend\PropertyService;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AgencyPropertyController extends Controller
{
    use JsonResponse;
    protected $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->middleware('auth');
        $this->propertyService = $propertyService;
    }

    public function index()
    {
        $properties = Property::where('user_id', auth()->id())->with('category')->get();
        return view('agency.properties.index', compact('properties'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('agency.properties.create', compact('categories'));
    }


    public function store(PropertyRequest $request)
    {
        $this->propertyService->store($request);
        return $this->success('Property add successfully.', ['success' => true, 'data' => null]);
    }


    public function show($id)
    {
        $property = Property::where('id', $id)->with('category')->first();
        return view('agency.properties.show', compact('property'));
    }


    public function edit($id)
    {
        $property = Property::where('id', $id)->with('category')->first();
        $categories = Category::all();
        return view('agency.properties.edit', compact('property', 'categories'));
    }


    public function update(PropertyRequest $request, $id)
    {
        $this->propertyService->update($request, $id);
        return $this->success('Property update successfully.', ['success' => true, 'data' => null]);
    }


    public function delete($id)
    {
        try
        {
            $this->propertyService->destroy($id);
            return $this->success('Property Deleted Successfully', ['success' => true, 'data' => null]);
        }
        catch (\Throwable $th) {
            return $this->error('Record not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }
}
