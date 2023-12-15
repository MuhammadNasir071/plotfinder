@extends('backend.layouts.master-admin')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form id="update_property_form" method="post" data-id="{{ $property->id }}">
                <div class="card">
                    <div class="card-header"><h4>Edit Property</h4></div>
                    <div class="card-body">
                        <div class="cart-title mb-2"><h5>Basic Info</h5></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Title<font color="red">*</font></label>
                                    <input type="text" id="title" name="title"  class="form-control" value="{{isset($property->title) ? $property->title : ''}}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="status" class="control-label mb-1">Status<font color="red">*</font></label>
                                    <select name="status" class="form-control" id="status" >
                                        <option value="LEASE" {{isset($property->status) && ($property->status == 'LEASE') ? 'selected' : ''}}>LEASE</option>
                                        <option value="OWNER" {{isset($property->status) && ($property->status == 'OWNER') ? 'selected' : ''}}>OWNER</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <label for="listed_in" class="control-label mb-1">Listed In<font color="red">*</font></label>
                                    <select name="listed_in"  class="form-control" id="listed_in">
                                        <option value="Hot" {{isset($property->listed_in) && ($property->listed_in == 'Hot') ? 'selected' : ''}}>Hot</option>
                                        <option value="Super Hot" {{isset($property->listed_in) && ($property->listed_in == 'Super Hot') ? 'selected' : ''}}>Super Hot</option>
                                        <option value="Normal" {{isset($property->listed_in) && ($property->listed_in == 'Normal') ? 'selected' : ''}}>Normal</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="category" class="control-label mb-1">Category<font color="red">*</font></label>
                                    <select name="category" id="category" class="form-control">
                                        @if(isset($categories) && count($categories) > 0)
                                            @foreach($categories as $category)
                                                <option value="{{$category['id']}}" {{isset($property->category_id) && ($property->category_id == $category['id']) ? 'selected' : ''}}>{{$category['name']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group pb-3">
                                    <label for="price" class="control-label mb-1">Price in Rs. (only numbers)<font color="red">*</font></label>
                                    <input type="number" name="price" id="price" class="form-control" value="{{isset($property->price) ? $property->price : ''}}">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="cart-title my-3"><h5>Listing Location</h5></div>
                        <div class="row">
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="country" class="control-label mb-1">Country<font color="red">*</font></label>
                                    <input type="text" name="country" id="country" class="form-control" value="Pakistan" readonly>
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group mt-1">
                                    <label for="state" class="control-label mb-1">State<font color="red">*</font></label>
                                    <select name="state" id="state" class="form-control">
                                        <option value="Punjab" {{isset($property->state) && ($property->state == 'Punjab') ? 'selected' : ''}}>Punjab</option>
                                        <option value="Sindh" {{isset($property->state) && ($property->state == 'Sindh') ? 'selected' : ''}}>Sindh</option>
                                        <option value="Khyber Pakhtunkhwa" {{isset($property->state) && ($property->state == 'Khyber Pakhtunkhwa') ? 'selected' : ''}}>Khyber Pakhtunkhwa</option>
                                        <option value="Balochistan" {{isset($property->state) && ($property->state == 'Balochistan') ? 'selected' : ''}}>Balochistan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="city" class="control-label mb-1">City<font color="red">*</font></label>
                                    <input type="text" name="city" id="city" class="form-control" required value="{{isset($property->city) ? $property->city : ''}}">
                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="apartment" class="control-label mb-1">Apartment (optional)</label>
                                    <input type="text" name="apartment"  class="form-control" id="apartment" value="{{isset($property->apartment) ? $property->apartment : ''}}">
                                </div>
                            </div>
                            <div class="col col-8">
                                <div class="form-group">
                                    <label for="address" class="control-label mb-1">Address<font color="red">*</font></label>
                                    <textarea type="text" name="address" id="address" class="form-control" required>{{isset($property->apartment) ? $property->apartment : ''}}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-4">
                                <img class="mb-2" width="170px" id="imagePreview" src="{{!is_null($property['image']) ? url('Uploads/property/'.$property['image']) : asset('backend/images/placeholder_image.png') }}">
                                <div class="form-group">
                                    <input id="upload-photo" name="image" type="file" onchange="loadFile(event)" accept="image/*">
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col col-12" wire:ignore>
                                <div class="form-group">
                                    <label for="description">{{__('Property Description')}}<font color="red">*</font></label>
                                    <textarea type="text" class="form-control" name="description" rows="4" id="description">{!! $property['description'] !!}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="card-body">
                        <div class="cart-title my-3"><h5>Listing Details</h5></div>
                        <div class="row">
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="size_square_meter" class="control-label mb-1">Size in m2 (only numbers)<font color="red">*</font></label>
                                    <input type="number" id="size_square_meter" name="size_square_meter"  class="form-control" required value="{{isset($property->size_square_meter) ? $property->size_square_meter : ''}}">
                                    @error('size_square_meter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="lot_size" class="control-label mb-1">Lot Size in m2 (only numbers)<font color="red">*</font></label>
                                    <input type="number" name="lot_size" id="lot_size" class="form-control" value="{{isset($property->lot_size) ? $property->lot_size : ''}}">
                                    @error('lot_size')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="rooms" class="control-label mb-1">Rooms (only numbers)</label>
                                    <input type="number" name="rooms" id="rooms" class="form-control" value="{{isset($property->rooms) ? $property->rooms : ''}}">
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="kitchen" class="control-label mb-1">Kitchen</label>
                                    <input type="text" name="kitchen" id="kitchen" class="form-control" value="{{isset($property->kitchen) ? $property->kitchen : ''}}">
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="bedrooms" class="control-label mb-1">Bedrooms (only numbers)</label>
                                    <input type="number" id="bedrooms" name="bedrooms" class="form-control" value="{{isset($property->bedrooms) ? $property->bedrooms : ''}}">
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="bathrooms" class="control-label mb-1">Bathrooms (only numbers)</label>
                                    <input type="number" name="bathrooms" id="bathrooms" class="form-control" value="{{isset($property->bathrooms) ? $property->bathrooms : ''}}">
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="build_date" class="control-label mb-1">Year Built (date)<font color="red">*</font></label>
                                    <input type="date" name="build_date" id="build_date" class="form-control" required value="{{isset($property->build_date) ? $property->build_date : ''}}">
                                    @error('build_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="garages" class="control-label mb-1">Garages</label>
                                    <select id="garages" name="garages"  class="form-control">
                                        <option value="Not"  {{isset($property->garages) && ($property->garages == 'Not') ? 'selected' : ''}}>Not Available</option>
                                        <option value="One" {{isset($property->garages) && ($property->garages == 'One') ? 'selected' : ''}}>One</option>
                                        <option value="Two" {{isset($property->garages) && ($property->garages == 'Two') ? 'selected' : ''}}>Two</option>
                                        <option value="Three" {{isset($property->garages) && ($property->garages == 'Three') ? 'selected' : ''}}>Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="bathrooms" class="control-label mb-1">Garage Size</label>
                                    <select id="garage_size" name="garage_size"  class="form-control">
                                        <option value="Not" {{isset($property->garage_size) && ($property->garage_size == 'Not') ? 'selected' : ''}}>Not Available</option>
                                        <option value="One Car"  {{isset($property->garage_size) && ($property->garage_size == 'One Car') ? 'selected' : ''}}>One Car</option>
                                        <option value="Two Car"  {{isset($property->garage_size) && ($property->garage_size == 'Two Car') ? 'selected' : ''}}>Two Car</option>
                                        <option value="Three Car"  {{isset($property->garage_size) && ($property->garage_size == 'Three Car') ? 'selected' : ''}}>Three Car</option>>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="available_date" class="control-label mb-1">Available from (date)<font color="red">*</font></label>
                                    <input type="date" name="available_date" id="available_date" class="form-control" required value="{{isset($property->available_date) ? $property->available_date : ''}}">
                                    @error('available_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="basement" class="control-label mb-1">Basement (text)</label>
                                    <input type="text" id="basement" name="basement" class="form-control" value="{{isset($property->basement) ? $property->basement : ''}}">
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="roofing" class="control-label mb-1">Roofing (text)</label>
                                    <input type="text" id="roofing" name="roofing" class="form-control" value="{{isset($property->roofing) ? $property->roofing : ''}}">
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="external_construction" class="control-label mb-1">External construction (text)</label>
                                    <input type="text" name="external_construction" id="external_construction" class="form-control" value="{{isset($property->external_construction) ? $property->external_construction : ''}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="card-body pb-5">
                        <div class="cart-title my-3">
                            <h5>Amenities and Features</h5>
                        </div>
                        <div class="cart-title"><h6>Outdoor Details</h6></div>
                        <div class="row">
                            <div class="col col-3">
                                <div class="form-group">
                                    <input type="checkbox" id="balcony" name="balcony" class="mr-3" value="1" {{isset($property['balcony']) && $property['balcony'] == 1 ? 'checked' : ''}}>
                                    <label for="balcony" class="form-check-label">Balcony?</label>
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <input type="checkbox" id="garden" name="garden" class="mr-3"  value="1"{{isset($property['garden']) && $property['garden'] == 1 ? 'checked' : ''}} >
                                    <label for="garden" class="form-check-label">Garden?</label>
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <input type="checkbox" id="chair_accessible" name="chair_accessible" class="mr-3" value="1"{{isset($property['chair_accessible']) && $property['chair_accessible'] == 1 ? 'checked' : ''}}>
                                    <label for="chair_accessible" class="form-check-label">Chair Accessible?</label>
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <input type="checkbox" id="doorman" name="doorman" class="mr-3" value="1"{{isset($property['doorman']) && $property['doorman'] == 1 ? 'checked' : ''}}>
                                    <label for="doorman" class="form-check-label">Doorman?</label>
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <input type="checkbox" id="elevator" name="elevator" class="mr-3" value="1"{{isset($property['elevator']) && $property['elevator'] == 1 ? 'checked' : ''}}>
                                    <label for="elevator" class="form-check-label">Elevator?</label>
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <input type="checkbox" id="front_yard" name="front_yard" class="mr-3" value="1"{{isset($property['front_yard']) && $property['front_yard'] == 1 ? 'checked' : ''}}>
                                    <label for="front_yard" class="form-check-label">Front Yard?</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mx-3">
                        <button type="submit" id="update_property_btn" class="btn btn-outline-info">Update property</button>
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>
 </div>
 @stack('scripts')
 @endsection
 @section('scripts')
 <script src="{{asset('backend/custom/properties/create.js')}}"></script>
@endsection
